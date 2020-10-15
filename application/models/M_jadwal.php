<?php

class M_jadwal extends CI_Model{

	public function get_jadwal(){

		$hsl=$this->db->query("SELECT  jadwal_id, bus_nama, hari_nama, terminal_nama as asal,terminal_nama as tujuan, jadwal_jam_berangkat, jadwal_jam_sampai,jadwal_terminal_tujuan as tujuan
			FROM tbl_jadwal as jdw
			join tbl_bus on jadwal_bus_id=bus_id
			join tbl_hari on jadwal_hari=hari_id
			join tbl_terminal as A on jdw.jadwal_terminal_awal=A.terminal_id
			-- join tbl_terminal as B on tbl_jadwal.jadwal_terminal_tujuan=B.terminal_id

								");
		return $hsl->result();
	}

	 public function get_search($search){
		$hsl=$this->db->query("SELECT * FROM tbl_jadwal where jadwal_hari='$search' or jadwal_terminal_awal='$search' or jadwal_terminal_tujuan='$search' or jadwal_bus_id='$search'");
		return $hsl->result();
  }

   public function simpan($data)
    {
        $this->db->insert('tbl_jadwal', $data);
        return $this->db->affected_rows();
    }
 function get_id(){
		$q = $this->db->query("SELECT MAX(jadwal_id) AS kd_max FROM tbl_jadwal");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $kd = ((int)$k->kd_max)+1;
            }
        }else{
            $kd = "1";
        }
        return $kd;
	}


}
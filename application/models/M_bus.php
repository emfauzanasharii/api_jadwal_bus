<?php

class M_bus extends CI_Model{

public function get_all_bus()
    {
            $hsl= $this->db->get('tbl_bus');
            return $hsl->result();    
        
    }

public function simpan($data)
    {
        $this->db->insert('tbl_bus', $data);
        return $this->db->affected_rows();
    }

 function get_id(){
		$q = $this->db->query("SELECT MAX(bus_id) AS kd_max FROM tbl_bus");
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

	 public function hapus($id)
    {
        $this->db->delete('tbl_bus', ['bus_id'=> $id]);
        return $this->db->affected_rows();
    }

}
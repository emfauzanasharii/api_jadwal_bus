<?php

class M_terminal extends CI_Model{

public function get_all_terminal()
    {
            $hsl= $this->db->get('tbl_terminal');
            return $hsl->result();    
        
    }

public function simpan($data)
    {
        $this->db->insert('tbl_terminal', $data);
        return $this->db->affected_rows();
    }

 function get_id(){
		$q = $this->db->query("SELECT MAX(terminal_id) AS kd_max FROM tbl_terminal");
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

    public function cek_nama($nama){
        $hsl=$this->db->query("SELECT terminal_nama from tbl_terminal where terminal_nama='$nama'");
        return $hsl->num_rows();
    }

}
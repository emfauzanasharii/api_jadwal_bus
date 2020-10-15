<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Terminal extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_terminal');

    }

     public function terminal_get() {
           
                $terminal=$this->m_terminal->get_all_terminal();
                $this->response($terminal, REST_Controller::HTTP_OK); 
        
            if ($terminal) {
                    $this->response([
                            'status' => TRUE,
                            'data' => $terminal
                    ], REST_Controller::HTTP_OK);
            }else {
                $this->response([
                             'status' => FALSE,
                             'message' => 'Kode Tidak Ada'
                    ], REST_Controller::HTTP_NOT_FOUND);
            }
             
        }

public function tambah_post(){
        $nama=$this->post('nama');
        $cek=$this->m_terminal->cek_nama($nama);
        // print_r($cek);
        // die();
        if ($cek>0) {
            $this->response([
                             'status' => FALSE,
                             'message' => 'Nama tidak boleh sama'
                    ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $id=$this->m_terminal->get_id();
            $data=[
            'terminal_id'=>$id,
            'terminal_nama'=>$this->post('nama')
        ];

         if ($this->m_terminal->simpan($data)>0) {
                        $this->response([
                            'status' => TRUE,
                            'message'=>'Termnal berhasil ditambah'
                    ], REST_Controller::HTTP_CREATED);
        }else {
                        $this->response([
                             'status' => FALSE,
                             'message' => 'Gagal Menambahakan'
                    ], REST_Controller::HTTP_BAD_REQUEST);
    }

        }
        
}

 }
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Jadwal extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_jadwal');

    }

    //Menampilkan data kontak
   public function index_get() {
           
        $jadwal=$this->m_jadwal->get_jadwal();
        $this->response($jadwal, REST_Controller::HTTP_OK); 
        
    if ($jadwal) {
            $this->response([
                    'status' => TRUE,
                    'data' => $jadwal
            ], REST_Controller::HTTP_OK);
    }else {
        $this->response([
                        'status' => FALSE,
                        'message' => 'Jadwal Tidak Ada'
            ], REST_Controller::HTTP_NOT_FOUND);
          }
             
        }

           public function search_get(){
        $search=$this->get('search');
        if (empty($search)) {
            $jadwal=$this->m_jadwal->get_jadwal();
            $this->response($jadwal, REST_Controller::HTTP_OK);
            
        }else{
             $jadwal=$this->m_jadwal->get_search($search);
            $this->response($jadwal, REST_Controller::HTTP_OK);
        }
        if ($jadwal) {
            $this->response([
                            'status' => TRUE,
                            'data' => $jadwal
                    ], REST_Controller::HTTP_OK);
            }else {
                $this->response([
                             'status' => FALSE,
                             'message' => 'Kode atau nama Tidak Ada'
                    ], REST_Controller::HTTP_NOT_FOUND);
            }

    }


    public function simpan_post(){
        $id=$this->m_jadwal->get_id();
        // print_r($id);
        // die();
            $data=[
            'jadwal_id'=>$id,
            'jadwal_bus_id'=>$this->post('bus'),
            'jadwal_terminal_awal'=>$this->post('asal'),
            'jadwal_terminal_tujuan'=>$this->post('tujuan'),
            'jadwal_hari'=>$this->post('hari'),
            'jadwal_jam_berangkat'=>$this->post('berangkat'),
            'jadwal_jam_sampai'=>$this->post('tiba')
        ];

         if ($this->m_jadwal->simpan($data)>0) {
                        $this->response([
                            'status' => TRUE,
                            'message'=>'jadwal berhasil ditambahkan'
                    ], REST_Controller::HTTP_CREATED);
        }else {
                        $this->response([
                             'status' => FALSE,
                             'message' => 'Gagal Menambahakan jadwal'
                    ], REST_Controller::HTTP_BAD_REQUEST);
    }

        }
        

}
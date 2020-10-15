<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Bus extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_bus');

    }

 public function bus_get() {
           
                $bus=$this->m_bus->get_all_bus();
                $this->response($bus, REST_Controller::HTTP_OK); 
        
            if ($bus) {
                    $this->response([
                            'status' => TRUE,
                            'data' => $bus
                    ], REST_Controller::HTTP_OK);
            }else {
                $this->response([
                             'status' => FALSE,
                             'message' => 'Kode Tidak Ada'
                    ], REST_Controller::HTTP_NOT_FOUND);
            }
             
        }

    

 public function tambah_post(){
        $id=$this->m_bus->get_id();
         $config['upload_path'] = './assets/image/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = FALSE; //nama yang terupload nantinya
	            $config['max_size']     = 3024; // 3MB
	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name'])) //1
	            {
	                if ($this->upload->do_upload('filefoto')) //2
	                {
	                        $gbr = $this->upload->data();
        // print_r($id);
        // die();
            $data=[
            'bus_id'=>$id,
            'bus_nama'=>$this->post('nama'),
            'bus_foto'=>$gbr['file_name']
        ];

         if ($this->m_bus->simpan($data)>0) {
                        $this->response([
                            'status' => TRUE,
                            'message'=>'Bus berhasil ditambahkan'
                    ], REST_Controller::HTTP_CREATED);
        }else {
                        $this->response([
                             'status' => FALSE,
                             'message' => 'Gagal Menambahakan Bus'
                    ], REST_Controller::HTTP_BAD_REQUEST);
    }

        }
    }


  }

    public function hapus_delete(){
        $id =  $this->delete('bus_id');

        // Validate the id.
        if ($id == null)
        {
            $this->response([
                             'status' => FALSE,
                             'message' => 'ID Tidak Boleh Kosong'
                    ], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else {
            if ($this->m_bus->hapus($id)>0) {
                //hapus
                $this->response([
                            'status' => TRUE,
                            'id' => $id,
                            'message'=>' Bus Terhapus'
                    ], REST_Controller::HTTP_OK);
            }else {
                $this->response([
                             'status' => FALSE,
                             'message' => 'ID Not found'
                    ], REST_Controller::HTTP_NO_CONTENT);
            }
        }

    }
}
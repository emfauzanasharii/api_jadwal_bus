<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

function __construct(){
		parent::__construct();
		$this->load->model('m_cek');
		// $this->load->library('barcode');
	}

	public function index_get(){
		$x['data']=$this->m_cek->data()->result_array();
		print_r($x);
		die();
	}

}
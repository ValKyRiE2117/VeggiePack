<?php

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_pengguna', 'm_pengguna');
        $this->load->model('M_barang', 'm_barang');

        $this->data['all_barang'] = $this->m_barang->lihat();
	}

	public function index(){

		$this->data['all_barang'] = $this->m_barang->lihat();
		$this->data['all_customer'] = $this->m_customer->lihat();
		$this->load->view('webpage/home', $this->data);
	}
}
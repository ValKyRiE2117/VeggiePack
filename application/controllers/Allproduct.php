<?php

use Dompdf\Dompdf;

class Allproduct extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_pengguna', 'm_pengguna');
       

		$this->data['aktif'] = 'barang';
        $this->data['all_barang'] = $this->m_barang->lihat();
	}

	public function index(){

		$this->data['all_barang'] = $this->m_barang->lihat();

		$this->load->view('webpage/allproduct', $this->data);
	}

	public function detail($kode_barang){
		$this->data['title'] = 'Detail Barang';
		// $this->data['pengeluaran'] = $this->m_barang->lihat_no_keluar($kode_barang);
		$this->data['barang'] = $this->m_barang->lihat_id($kode_barang);


		$this->load->view('webpage/detail', $this->data);
	}
}
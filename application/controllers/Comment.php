<?php

class Comment extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
        $this->data['aktif'] = 'comment';
		$this->load->model('M_customer', 'm_customer');
        $this->load->model('M_barang', 'm_barang');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_contact', 'm_contact');
	}

	public function index(){
        $this->data['title'] = 'Data Komentar';
		$this->data['all_comment'] = $this->m_contact->lihat();
		$this->data['no'] = 1;

		$this->load->view('comment/lihat', $this->data);
	}
}
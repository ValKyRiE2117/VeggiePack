<?php

class Contactus extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_customer', 'm_customer');
        $this->load->model('M_barang', 'm_barang');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_contact', 'm_contact');
	}

	public function index(){
		$this->load->view('webpage/contactus.php');
	}

	public function tambah() {
		if ($this->session->login['role'] != 'customer') redirect();
		$data = [
			'name' => $this->input->post('name'),
			'date' => date('Y-m-d'),
			'email' => $this->input->post('email'),
			'comment' => $this->input->post('comment'),
		];

		if($this->m_contact->tambah($data)){
			$this->session->set_flashdata('success', 'Thank You for your feedback');
		} else {
			$this->session->set_flashdata('error', 'Data Customer <strong>Gagal</strong> Ditambahkan!');
		}
	
		redirect('contactus');
	}
	
}
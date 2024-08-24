<?php

class Profile extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_pengguna', 'm_pengguna');
        $this->load->model('M_barang', 'm_barang');
		$this->data['aktif'] = 'customer';
	}

	public function index(){
		if ($this->session->login['role'] !== 'customer'){
			redirect('home');
		}

		$this->data['all_customer'] = $this->m_customer->lihat();
		$this->data['no'] = 1;
		
		$this->load->view('webpage/profile');
	}

	public function ubah($kode) {
		
		$this->data['customer'] = $this->m_customer->lihat_id($kode);

		$this->load->view('webpage/profile', $this->data);
	}

	public function proses_ubah($kode){

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
			'username_customer' => $this->input->post('username_customer'),
			'password_customer' => $this->input->post('password_customer'),
		];

		if($this->m_customer->ubah($data, $kode)){
			$this->session->set_flashdata('success', 'Edit Profile <strong>Success</strong>!');
			redirect('profile/ubah/' . $kode);
		} else {
			$this->session->set_flashdata('error', 'Edit Profile <strong>Error</strong>!');
			redirect('profile/ubah/' . $kode);
		}
	}
}
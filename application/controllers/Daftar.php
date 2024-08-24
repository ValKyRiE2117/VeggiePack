<?php

class Daftar extends CI_Controller{

	public function __construct() {
        parent::__construct();
        $this->load->model('M_customer');
    }
	
	public function index(){
		$this->load->view('daftar');
	}

	public function proses_tambah(){

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'username_customer' => $this->input->post('username_customer'),
                'password_customer' => $this->input->post('password_customer'),
            );

            if ($this->M_customer->tambah($data)) {
                // Pendaftaran sukses, Anda dapat mengarahkan pengguna ke halaman lain atau menampilkan pesan sukses.
                redirect(); // Contoh mengarahkan ke halaman login.
            } else {
                $this->session->set_flashdata('error', 'Password Salah!');
				redirect();
            }
        } else {
            $this->session->set_flashdata('error', 'Username Salah!');
				redirect();
        }
		
	}
}
<?php

use Dompdf\Dompdf;

class Barang extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'customer' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'barang';
		$this->load->model('M_barang', 'm_barang');
	}

	public function index(){
		$this->data['title'] = 'Data Barang';
		$this->data['all_barang'] = $this->m_barang->lihat();
		
		$this->data['no'] = 1;

		$this->load->view('barang/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'customer'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Barang';

		$this->load->view('barang/tambah', $this->data);
	}


	public function proses_tambah(){
		if ($this->session->login['role'] == 'customer'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}
	
		$data = [
			'kode_barang' => $this->input->post('kode_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'stok' => $this->input->post('stok'),
			'gambar' => $this->input->post('gambar'),
			'harga_barang' => $this->input->post('harga_barang'),
			'tgl_barang_dibuat' => $this->input->post('tgl_barang_dibuat'),
			'deskripsi_barang' => $this->input->post('deskripsi_barang'),
		];

		$formatted_harga = 'Rp ' . number_format($this->input->post('harga_barang'), 0, ',', '.');
    	$data['harga_barang'] = $formatted_harga;
		
		if($this->input->method() === 'post') {
			// Konfigurasi unggah gambar
			$config['upload_path'] = './uploads/'; // Direktori untuk menyimpan gambar
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 10000; // Ukuran maksimal gambar (10MB)
			$config['overwrite'] = true;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {

				$data = $this->input->post();
				$upload_data = $this->upload->data();
				$data['gambar'] = $upload_data['file_name'];
			}
		}
	
			if ($this->m_barang->tambah($data)) {
				$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambah!');
				redirect('barang');
			} else {
				$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambah!');
				redirect('barang');
			}
		
	}

	public function ubah($kode_barang){
		if ($this->session->login['role'] == 'customer'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_barang->lihat_id($kode_barang);

		$this->load->view('barang/ubah', $this->data);
	}

	public function proses_ubah($kode_barang){
		if ($this->session->login['role'] == 'customer'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode_barang' => $this->input->post('kode_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'stok' => $this->input->post('stok'),
			'gambar' => $this->input->post('gambar'),
			'harga_barang' => $this->input->post('harga_barang'),
			'tgl_barang_dibuat' => $this->input->post('tgl_barang_dibuat'),
			'deskripsi_barang' => $this->input->post('deskripsi_barang'),
		];

		if($this->input->method() === 'post') {
			// Konfigurasi unggah gambar
			$config['upload_path'] = './uploads/'; // Direktori untuk menyimpan gambar
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 10000; // Ukuran maksimal gambar (10MB)
			$config['overwrite'] = true;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$data = $this->input->post();
				$upload_data = $this->upload->data();
				$data['gambar'] = $upload_data['file_name'];
			}
		}
	
			if ($this->m_barang->ubah($data, $kode_barang)) {
				$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
				redirect('barang');
			} else {
				$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
				redirect('barang');
			}

	}

	public function hapus($kode_barang){
		if ($this->session->login['role'] == 'customer'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}
		
		if($this->m_barang->hapus($kode_barang)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('barang');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('barang');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_barang'] = $this->m_barang->lihat();
		$this->data['title'] = 'Laporan Data Barang';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('barang/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Barang Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	public function detail($kode_barang){
		$this->data['title'] = 'Detail Barang';
		// $this->data['pengeluaran'] = $this->m_barang->lihat_no_keluar($kode_barang);
		$this->data['barang'] = $this->m_barang->lihat_id($kode_barang);
		$this->data['no'] = 1;

		$this->load->view('barang/detail', $this->data);
	}
}
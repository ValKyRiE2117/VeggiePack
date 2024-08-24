<?php

use Dompdf\Dompdf;

class Myorder extends CI_Controller  
{
   
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_shopping_cart', 'm_shopping_cart'); // Use the correct property name 'm_shopping_cart'
        $this->load->model('M_orders', 'm_orders');
        $this->load->model('M_order_detail', 'm_order_detail');
        $this->load->model('M_order_confirmation', 'm_order_confirmation');
		$this->data['aktif'] = 'myorder';
    }

    public function detail($order_id) {
        // Assuming $data['order'] is defined somewhere before this point
        $data['order_detail'] = $this->m_order_detail->getOrderDetailData($order_id);
		$data['order_confirmation'] = $this->m_order_confirmation->getOrderConfirmationData($order_id);

        $this->load->view('webpage/orders-detail', $data);
    }

    public function confirmation() {
        $data = [
            'order_id' => $this->input->post('order_id'),
			'account_name' => $this->input->post('account_name'),
			'account_number' => $this->input->post('account_number'),
			'note' => $this->input->post('note'),
			'nominal' => $this->input->post('nominal'),
			'evidence' => $this->input->post('evidence'),
			'method' => $this->input->post('method'),
			
		];
		
		if($this->input->method() === 'post') {
			// Konfigurasi unggah gambar
			$config['upload_path'] = './uploads/'; // Direktori untuk menyimpan gambar
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 10000; // Ukuran maksimal gambar (10MB)
			$config['overwrite'] = true;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('evidence')) {

				$data = $this->input->post();
				$upload_data = $this->upload->data();
				$data['evidence'] = $upload_data['file_name'];
			}
		}
	
			if ($this->m_order_confirmation->tambah($data)) {
                $order_id = $this->input->post('order_id');
                $this->m_orders->updateOrderStatus($order_id, 'Dibayar');
				$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
				redirect('');
			} else {
				$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
				redirect('');
			}
		
	}
	public function update_status_batal() {
		$order_id = $this->input->get('order_id');
		$status = 'Request Batal';
	
		// Load necessary models
		$this->load->model('M_orders');
		$this->load->model('M_order_detail');
		$this->load->model('M_barang');
	
		// Get order details
		$order_detail = $this->M_order_detail->getOrderDetailData($order_id);
	
		// Rollback stock for the canceled order
		foreach ($order_detail as $detail) {
			$this->M_barang->rollbackStock($detail->kode_barang, $detail->quantity);
		}
	
		// Call the model method to update the status
		$this->M_orders->updateOrderStatus($order_id, $status);
	
		// Redirect or show success message
		redirect('Orders'); // Redirect to the order detail page, adjust the URL as needed
	}

	public function update_status_selesai() {
		$order_id = $this->input->post('order_id');
		$status = 'Selesai';
	
		// Load necessary models
		$this->load->model('M_orders');
		$this->load->model('M_order_detail');
		$this->load->model('M_barang');
	
		$this->M_orders->updateOrderStatus($order_id, $status);
	
		// Redirect or show success message
		redirect('Orders'); // Redirect to the order detail page, adjust the URL as needed
	}
    
}
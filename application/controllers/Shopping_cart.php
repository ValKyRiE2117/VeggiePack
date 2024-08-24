<?php

use Dompdf\Dompdf;

class Shopping_cart extends CI_Controller  
{
   
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_customer', 'm_customer');
        $this->load->model('M_shopping_cart', 'm_shopping_cart'); // Use the correct property name 'm_shopping_cart'
        $this->load->library('rajaongkir');
    }

    public function index() {
        if ($this->session->login['role'] != 'customer') redirect();
        $customer_id = $this->session->login['id'];

        $shopping_cart_data = $this->m_shopping_cart->get_shopping_cart_data_for_customer($customer_id);

        // Pass data to the view
        $data['shopping_cart_data'] = $shopping_cart_data;
        $data['sub_total'] = $this->m_shopping_cart->get_sub_total($customer_id);
        $data['provinces'] = json_decode($this->rajaongkir->province(), true);
        $data['cities'] = json_decode($this->rajaongkir->city(), true);
        $this->load->view('webpage/shopping-cart', $data);
    }
        

    public function add_to_cart()
    
    {
        if ($this->session->login['role'] != 'customer') redirect();
        $kode_barang = $this->input->post('kode_barang');
        $quantity = $this->input->post('quantity');

        // Retrieve product details based on $kode_barang
        $barang = $this->m_barang->lihat_id($kode_barang);

        if ($quantity > $barang->stok) {
            // Handle error: Insufficient stock
            // $data['error_message'] = "Error: Insufficient stock.";
            // $this->session->set_flashdata('Error', 'Pembelian melebihi stok barang');
            redirect('allproduct/detail/' . $kode_barang); // Redirect back to the product detail page
        }
        $data = [
            'id_customer' => $this->session->login['id'],
            'kode_barang' => $this->input->post('kode_barang'),
            'harga_barang' => $this->input->post('harga_barang'),
            'quantity' => $this->input->post('quantity'),
            'total_harga' => $this->input->post('harga_barang') * $this->input->post('quantity')
		];

        if ($this->m_shopping_cart->tambah($data)) {
            
        $barang = $this->m_barang->lihat_id($kode_barang);
        $this->session->set_flashdata('success', 'Successfully add Item to shopping cart!');
        
        // Assuming $kode is the identifier for the detail page, replace it with the actual value
        $kode = $this->input->post('kode_barang');
        redirect('allproduct/detail/' . $kode);
           
        } else {
            $this->session->set_flashdata('error', 'Barang <strong>Gagal</strong> Ditambahkan!');
            redirect('barang');
        }

    }
    public function hapus($id_cart){
		
		if($this->m_shopping_cart->hapus($id_cart)){
			$this->session->set_flashdata('success', 'Item <strong>Berhasil</strong> Dihapus!');
			redirect('shopping_cart');
		} else {
			$this->session->set_flashdata('error', 'Pembelian melebihi stok');
			redirect('shopping_cart');
		}
	}
    public function get_cities_by_province($province_id) {
        $cityData = json_decode($this->rajaongkir->city($province_id), true);
        echo json_encode($cityData);
    }

    // Add a new method to calculate shipping costs
    public function calculate_shipping_cost() {
        $origin = $this->input->post('origin_city_id');
        $destination = $this->input->post('destination_city_id');
        $weight = $this->input->post('weight');
        $courier = $this->input->post('courier');

        $shippingCost = json_decode($this->rajaongkir->cost($origin, $destination, $weight, $courier), true);
        echo json_encode($shippingCost);
    }
}
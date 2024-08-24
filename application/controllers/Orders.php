<?php

use Dompdf\Dompdf;

class Orders extends CI_Controller  
{
   
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_customer', 'm_customer');
        $this->load->model('M_shopping_cart', 'm_shopping_cart'); // Use the correct property name 'm_shopping_cart'
        $this->load->model('M_orders', 'm_orders');
        $this->load->model('M_order_detail', 'm_order_detail');
        $this->load->model('M_order_confirmation', 'm_order_confirmation');
        $this->data['aktif'] = 'orders';
        $this->load->library('rajaongkir');
    }

    public function index() {
        if ($this->session->login['role'] != 'customer') redirect();
        // Load the view with data
        $customer_id = $this->session->login['id'];
        $this->data['customer_orders'] = $this->m_orders->lihat_orders_customer($customer_id);
        $this->load->view('webpage/myorders', $this->data);
    }

    public function lihat() {
        $this->data['all_orders'] = $this->m_orders->lihat();
		$this->data['title'] = 'Data Orders';
		$this->data['no'] = 1;

		$this->load->view('orders/lihat', $this->data);
    }

    public function checkout() {
        if ($this->session->login['role'] != 'customer') redirect();
        $total = $this->db->select_sum('total_harga')
                        ->where('id_customer', $this->session->login['id'])
                        ->get('shopping_cart')
                        ->row()
                        ->total_harga;
        
        $weightTotal = $this->db->select_sum('quantity')
                        ->where('id_customer', $this->session->login['id'])
                        ->get('shopping_cart')
                        ->row()
                        ->quantity;

        $city = (int) $this->input->post('city');
        $weight    = $weightTotal * 100;
        $courier = $this->input->post('courier');
        $originCityId = 23;

        $cost = json_decode($this->rajaongkir->cost($originCityId, $city, $weight, $courier), true);
        
        if($courier == "jne") {
            $courierName = "JNE";
            $costCourier = $cost['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
        } elseif ($courier == "tiki") {
            $courierName = "TIKI";
            $costCourier = $cost['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
        } else {
            $courierName = "POS Indonesia";
            $costCourier = $cost['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        }

        $province = json_decode($this->rajaongkir->province((int) $this->input->post('province')), true);
        $provinceName = $province['rajaongkir']['results']["province"];

        $cityState = json_decode($this->rajaongkir->city((int) $this->input->post('province'), (int) $this->input->post('city')), true);

        $totalIncludingCourier = $this->input->post('sub_total') + $costCourier;
        $discount = 0;
        if ($totalIncludingCourier > 200000) {
            // Apply a 20% discount
            $discount = 0.20 * $totalIncludingCourier;
        } elseif ($totalIncludingCourier > 500000) {
            // Apply a 20% discount
            $discount = 0.30 * $totalIncludingCourier;
        }
        $cityName = $cityState['rajaongkir']['results']["city_name"];
        $data = [
            'invoice'           => $this->session->login['id'].date('YmdHis'),
			'tgl_order'         => date('Y-m-d-H-i-s'),
            'id_customer'       => $this->session->login['id'],
			'total_checkout'    => $this->input->post('sub_total'),
			'address'           => $this->input->post('address'),
            'city'              => $cityName,
            'province'          => $provinceName,
            'courier'           => $courierName,
            'cost_courier'      => $costCourier,
            'discount'          => $discount,
            'total_bayar'       => $this->input->post('sub_total') + $costCourier - $discount,
            'status'            => 'Belum Dibayar'
		];
        if ($order = $this->m_orders->tambah($data)) {
            // Update stock after the order
            $order_id = $this->db->insert_id();
            $this->update_stock();

            // Fetch items from the shopping cart
            $cart = $this->db->where('id_customer', $this->session->login['id'])
                ->get('shopping_cart')->result_array();

            // Insert items into the order_detail table
            foreach ($cart as $row) {
                $row['order_id'] = $order_id;
                unset($row['id'], $row['id_customer'],$row['harga_barang']); 
                $this->db->insert('order_detail', $row);
            }
            // Delete shopping cart data for the user
            $this->db->where('id_customer', $this->session->login['id']);
            $this->db->delete('shopping_cart');
        
            $this->session->set_flashdata('success', 'Data Customer <strong>Berhasil</strong> Ditambahkan!');
            
            $this->data['content'] = (object)$data;
			$this->load->view('webpage/orders-payment', $this->data);

        } else {
            $this->session->set_flashdata('error', 'Data Customer <strong>Gagal</strong> Ditambahkan!');
            redirect('home');
        }
    }

    public function update_stock() {

        $customer_id = $this->session->login['id'];
        // Fetch the order products for the user
        $orderProducts = $this->m_shopping_cart->get_shopping_cart_data_for_customer($customer_id);
    
        foreach ($orderProducts as $product) {
            // Fetch the current stock for the product
            $current_stock = $this->db->get_where('barang', ['kode_barang' => $product['kode_barang']])->row()->stok;
    
            // Calculate the new stock after the order
            $new_stock = $current_stock - $product['quantity'];
    
            // Update the product stock in the database
            $this->db->where('kode_barang', $product['kode_barang']);
            $this->db->update('barang', ['stok' => $new_stock]);
        }
    }

    public function detail($order_id) {
        $this->data['title'] = 'Detail Orders';
        $this->data['orders'] = $this->m_orders->getOrderData($order_id);
        $this->data['order_confirmation'] = $this->m_order_confirmation->getOrderConfirmationData($order_id);
    
        // // Check if the order is canceled
        // if ($this->data['orders']->status === 'Batal') {
            // $this->load->view('orders/canceled_detail', $this->data);
        // } else {
            $this->load->view('orders/detail', $this->data);
        // }
    }

    public function update_status() {
        if ($this->input->post('order_id') && $this->input->post('status')) {
            $order_id = $this->input->post('order_id');
            $status = $this->input->post('status');


            // Call the model method to update the status
            $this->load->model('M_orders');
            $this->M_orders->updateOrderStatus($order_id, $status);

            // Redirect or show success message
            redirect('orders/detail/' . $order_id); // Redirect to the order detail page, adjust the URL as needed
        } else {
            // Invalid form submission, handle accordingly
            // You may want to redirect to an error page or show an error message
            echo 'Invalid form submission';
        }
    }
}
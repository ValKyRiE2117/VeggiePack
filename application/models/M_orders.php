<?php

class M_orders extends CI_Model {
	protected $_table = 'orders';

	public function lihat() {
		// Assuming that 'customer' is the table name for the customer data
		$this->db->select($this->_table . '.*, customer.nama');
		$this->db->from($this->_table);
		$this->db->join('customer', 'customer.id = ' . $this->_table . '.id_customer');
		
		$query = $this->db->get();
		
		return $query->result();
	}

	public function lihat_id($order_id){
		$this->db->select('orders.*, order_detail.*, order_confirmation.*');
		$this->db->from('orders');
		$this->db->join('order_detail', 'orders.order_id = order_detail.order_id', 'left');
		$this->db->join('order_confirmation', 'orders.order_id = order_confirmation.order_id', 'left');
		$this->db->where('orders.order_id', $order_id);
	
		$query = $this->db->get();
		return $query->row();
	}
	public function lihat_orders_customer($customer_id){
		$this->db->select('order_id, invoice, tgl_order, o.id_customer, total_checkout, o.address, city, province, courier, cost_courier,discount,total_bayar, o.status');
		$this->db->from('orders o');
		$this->db->join('customer c', 'c.id = o.id_customer');
		$this->db->where('id_customer', $customer_id);

		$query = $this->db->get();

		return $query->result_array();  
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

    public function tambah($data){
		if ($this->db->insert($this->_table, $data)) {
			// If successful, return the order information
			return $data;
		} else {
			// If unsuccessful, return false or an error indicator
			return false;
		}
	}
	public function updateOrderStatus($order_id, $status) {
        $data = array('status' => $status);
        $this->db->where('order_id', $order_id);
        $this->db->update('orders', $data);
    }

	public function getOrderData($order_id) {
		$this->db->select([
			'order_detail.id_order_detail',
			'order_detail.order_id',
			'order_detail.kode_barang',
			'order_detail.quantity',
			'order_detail.total_harga',
			'barang.nama_barang',
			'barang.harga_barang',
			'barang.gambar',
			'orders.address',
			'orders.courier',
			'orders.invoice',
			'orders.cost_courier',
			'orders.tgl_order',
			'orders.discount',
			'orders.status',
			'orders.total_bayar',
			'customer.nama' // Add this line for the customer name
		]);
	
		$this->db->from('order_detail');
		$this->db->join('barang', 'barang.kode_barang = order_detail.kode_barang');
		$this->db->join('orders', 'orders.order_id = order_detail.order_id');
		$this->db->join('customer', 'customer.id = orders.id_customer'); // Join with customer table
		$this->db->where('order_detail.order_id', $order_id);
	
		$query = $this->db->get();
		return $query->result();
	}
}
?>
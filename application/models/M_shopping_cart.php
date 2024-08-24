<?php

class M_shopping_cart extends CI_Model {
    protected $_table = 'shopping_cart';
    protected $customer_table = 'customer';
    protected $barang_table = 'barang';

    public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}
    public function get_shopping_cart_data_for_customer($customer_id) {
        $this->db->select('s.id as id_cart, b.id as id_barang, b.kode_barang, b.nama_barang,b.gambar,s.quantity, b.stok, s.total_harga, s.id_customer, c.nama');
        $this->db->from('barang b');
        $this->db->join('shopping_cart s', 'b.kode_barang = s.kode_barang');
        $this->db->join('customer c', 'c.id = s.id_customer');
        $this->db->where('s.id_customer', $customer_id);

        $query = $this->db->get();

        return $query->result_array(); // Use result_array() to get the entire result set
    }
    public function get_sub_total($customer_id) {
        $this->db->select_sum('total_harga');
        $this->db->from('shopping_cart');
        $this->db->join('customer', 'customer.id = shopping_cart.id_customer'); // Specify the fields for joining
        $this->db->where('customer.id', $customer_id);
        $this->db->group_by('customer.id'); // Add a group_by clause
    
        $query = $this->db->get();
        
        $result = $query->row();
    
        return ($result !== null) ? $result->total_harga : 0;
    }
    public function hapus($id_cart){
		return $this->db->delete($this->_table, ['id' => $id_cart]);
	}
}
?>
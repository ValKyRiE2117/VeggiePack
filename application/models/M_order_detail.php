<?php

class M_order_detail extends CI_Model {
	protected $_table = 'order_detail';

    public function getAllOrderDetailData() {
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
            'orders.total_bayar'
        ]);
        $this->db->from('order_detail');
        $this->db->join('barang', 'barang.kode_barang = order_detail.kode_barang');
        $this->db->join('orders', 'orders.order_id = order_detail.order_id'); // Join with orders table
        $query = $this->db->get();
        return $query->result();
    }

    public function getOrderDetailData($order_id) {
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
            'orders.total_bayar'
        ]);
        $this->db->from('order_detail');
        $this->db->join('barang', 'barang.kode_barang = order_detail.kode_barang');
        $this->db->join('orders', 'orders.order_id = order_detail.order_id'); // Join with orders table
        $this->db->where('order_detail.order_id', $order_id);
        $query = $this->db->get();
        return $query->result();
    }
}
?>
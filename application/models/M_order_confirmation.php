<?php

class M_order_confirmation extends CI_Model {
	protected $_table = 'order_confirmation';

    public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}
	
    public function getOrderConfirmationData($order_id){
		$query = $this->db->get_where($this->_table, ['order_id' => $order_id]);
		return $query->row();
	}	
}
?>
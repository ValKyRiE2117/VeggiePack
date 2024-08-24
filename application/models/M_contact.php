<?php

class M_contact extends CI_Model {
	protected $_table = 'contact';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}
    
    public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}
}
?>
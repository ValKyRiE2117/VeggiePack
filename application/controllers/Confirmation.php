<?php

use Dompdf\Dompdf;

class Confirmation extends CI_Controller  
{
   
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_customer', 'm_customer');
        $this->load->model('M_shopping_cart', 'm_shopping_cart'); // Use the correct property name 'm_shopping_cart'
        $this->load->model('M_orders', 'm_orders');
        $this->load->model('M_order_detail', 'm_order_detail');
        $this->load->library('rajaongkir');
    }

    public function index() {
        
    }

}
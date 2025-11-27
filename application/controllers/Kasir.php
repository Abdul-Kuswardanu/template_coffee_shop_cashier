<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kasir POS',
            'kasir_name' => 'Rina Marlina',
            'shift' => 'Pagi',
            'store' => 'Gerai #01',
            'shift_date' => '24 Februari 2025'
        ];

        $this->load->view('kasir/dashboard', $data);
    }
}
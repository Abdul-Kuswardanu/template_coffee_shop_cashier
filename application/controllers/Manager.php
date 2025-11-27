<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Manager',
            'active_menu' => 'dashboard'
        ];

        $this->load->view('manager/dashboard', $data);
    }

    public function users($role = 'customer')
    {
        $role = strtolower($role);
        $roleMap = ['customer', 'kasir'];
        if (!in_array($role, $roleMap)) {
            $role = 'customer';
        }

        $data = [
            'title' => 'Kelola User',
            'active_menu' => 'users',
            'user_role_filter' => $role
        ];

        $this->load->view('manager/users', $data);
    }

    public function laporan($jenis = 'penjualan')
    {
        $jenis = strtolower($jenis);
        $jenisMap = ['penjualan', 'pembelian'];
        if (!in_array($jenis, $jenisMap)) {
            $jenis = 'penjualan';
        }

        $data = [
            'title' => 'Laporan ' . ucfirst($jenis),
            'active_menu' => 'laporan',
            'laporan_tipe' => $jenis
        ];

        $this->load->view('manager/laporan', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'Profil Saya',
            'active_menu' => 'profil'
        ];

        $this->load->view('manager/profil', $data);
    }

    public function pengaturan()
    {
        $data = [
            'title' => 'Pengaturan Sistem',
            'active_menu' => 'pengaturan'
        ];

        $this->load->view('manager/pengaturan', $data);
    }
}


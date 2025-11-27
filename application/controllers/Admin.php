<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/dashboard');
    }

    public function pembelian()
    {
        $data = [
            'title' => 'Pembelian',
            'active_menu' => 'pembelian'
        ];
        $this->load->view('admin/pembelian', $data);
    }

    public function produk($kategori = 'original')
    {
        $kategori = strtolower($kategori);
        $kategoriMap = ['original', 'topping', 'extra', 'lainnya'];
        if (!in_array($kategori, $kategoriMap)) {
            $kategori = 'original';
        }

        $data = [
            'title' => 'Kelola Produk',
            'active_menu' => 'produk',
            'produk_category' => $kategori
        ];

        $this->load->view('admin/produk', $data);
    }

    public function users($role = 'semua')
    {
        $role = strtolower($role);
        $roleMap = ['admin', 'kasir', 'customer', 'semua'];
        if (!in_array($role, $roleMap)) {
            $role = 'semua';
        }

        $data = [
            'title' => 'Kelola User',
            'active_menu' => 'users',
            'user_role_filter' => $role
        ];

        $this->load->view('admin/users', $data);
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

        $this->load->view('admin/laporan', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'Profil Saya',
            'active_menu' => 'profil'
        ];
        $this->load->view('admin/profil', $data);
    }

    public function pengaturan()
    {
        $data = [
            'title' => 'Pengaturan Sistem',
            'active_menu' => 'pengaturan'
        ];
        $this->load->view('admin/pengaturan', $data);
    }
}


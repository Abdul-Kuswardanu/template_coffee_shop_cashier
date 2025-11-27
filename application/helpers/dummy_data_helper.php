<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Helper untuk data dummy
 * Digunakan untuk mode tampilan saja tanpa database
 */

if (!function_exists('get_dummy_users')) {
    function get_dummy_users() {
        return array(
            (object)array(
                'id' => 1,
                'username' => 'admin',
                'email' => 'admin@example.com',
                'first_name' => 'Admin',
                'last_name' => 'User',
                'phone' => '081234567890',
                'active' => 1,
                'level_users' => 'admin'
            ),
            (object)array(
                'id' => 2,
                'username' => 'kasir1',
                'email' => 'kasir1@example.com',
                'first_name' => 'Kasir',
                'last_name' => 'Satu',
                'phone' => '081234567891',
                'active' => 1,
                'level_users' => 'kasir'
            ),
            (object)array(
                'id' => 3,
                'username' => 'user1',
                'email' => 'user1@example.com',
                'first_name' => 'User',
                'last_name' => 'Satu',
                'phone' => '081234567892',
                'active' => 1,
                'level_users' => 'member'
            )
        );
    }
}

if (!function_exists('get_dummy_user')) {
    function get_dummy_user($id = 1) {
        return (object)array(
            'id' => $id,
            'username' => 'admin',
            'email' => 'admin@example.com',
            'first_name' => 'Admin',
            'last_name' => 'User',
            'phone' => '081234567890',
            'active' => 1,
            'level_users' => 'admin',
            'identity' => 'admin',
            'foto' => null
        );
    }
}


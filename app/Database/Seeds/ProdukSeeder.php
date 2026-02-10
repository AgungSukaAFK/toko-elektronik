<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'thumbnail' => 'iphone.jpg',
                'kategori'  => 'Iphone 13 Pro',
                'produk'    => 'Iphone',
                'harga'     => 12000000,
            ],
            [
                'thumbnail' => 'samsung.jpg',
                'kategori'  => 'Samsung X Flip',
                'produk'    => 'Samsung',
                'harga'     => 20000000,
            ],
            [
                'thumbnail' => 'xiaomi.jpg',
                'kategori'  => 'Xiaomi Redmi Note 11 Pro',
                'produk'    => 'Xiaomi',
                'harga'     => 3200000,
            ],
        ];

        $this->db->table('produk')->insertBatch($data);
    }
}

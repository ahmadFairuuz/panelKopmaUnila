<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Produk extends Entity
{
    protected $attributes = [
        'nama_produk'          => null,
        'harga_produk'       => null,
        'gambar_produk'     => null,
    ];
}

<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Digilib extends Entity
{
    protected $attributes = [
        'id'          => null,
        'judul'       => null,
        'penulis'     => null,
        'penerbit'    => null,
        'tahun'       => null,
        'kategori'    => null,
        'file'        => null,
        'created_at'  => null,
        'updated_at'  => null,
    ];
}

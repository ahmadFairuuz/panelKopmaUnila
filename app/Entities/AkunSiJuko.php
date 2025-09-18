<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class AkunSiJuko extends Entity
{
    protected $attributes = [
        'nomor_anggota'            => null,
        'username'      => null,
        'password'      => null,
    ];
}

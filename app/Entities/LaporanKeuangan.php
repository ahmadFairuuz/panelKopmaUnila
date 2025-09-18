<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class LaporanKeuangan extends Entity
{
    protected $attributes = [
        'judul'           => null,
        'file'      => null,
        'bulan'   => null,
        'tahun'        => null,   // contoh: pemasukan / pengeluaran

    ];
}

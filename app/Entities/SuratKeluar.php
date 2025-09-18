<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SuratKeluar extends Entity
{
    protected $attributes = [
        'id_surat'    => null,
        'no_surat'    => null,
        'asal_surat'  => null,
        'isi_surat'   => null,
        'perihal'     => null,
        'kode'        => null,
        'tgl_surat'   => null,
        'tgl_diterima'=> null,
        'file'        => null,
    ];
}

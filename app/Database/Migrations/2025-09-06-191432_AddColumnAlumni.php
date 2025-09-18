<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnAlumni extends Migration
{
    public function up()
    {
        $fields = [
            'nomor_anggota' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
                'after'      => 'nama_alumni', // opsional: posisi kolom
            ],
            'npm' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
                'after'      => 'nomor_anggota',
            ],
            'jurusan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'npm',
            ],
            'fakultas' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'jurusan',
            ],
            'jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'fakultas',
            ],
        ];

        $this->forge->addColumn('alumni', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('alumni', [
            'nomor_anggota',
            'npm',
            'jurusan',
            'fakultas',
            'jabatan'
        ]);
    }
}

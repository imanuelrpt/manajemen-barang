<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori'; // pastikan sesuai dengan nama tabel kamu
    protected $primaryKey = 'id'; // pastikan sesuai dengan primary key tabel kamu

    protected $allowedFields = ['nama_kategori']; // ← ini WAJIB ADA
}

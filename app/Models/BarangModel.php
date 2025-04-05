<?php

// app/Models/BarangModel.php
namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'kategori_id', 'stok', 'harga', 'deskripsi'];

    public function getAllWithKategori()
    {
        return $this->select('barang.*, kategori.nama_kategori as kategori_nama')
                    ->join('kategori', 'kategori.id = barang.kategori_id')
                    ->findAll();
    }
}

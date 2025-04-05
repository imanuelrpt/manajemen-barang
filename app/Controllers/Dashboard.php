<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $barangModel = new BarangModel();
        $kategoriModel = new KategoriModel();
        $transaksiModel = new TransaksiModel();

        $data = [
            'total_barang' => $barangModel->countAll(),
            'total_kategori' => $kategoriModel->countAll(),
            'total_transaksi' => $transaksiModel->countAll()
        ];

        return view('dashboard', $data);
    }
}

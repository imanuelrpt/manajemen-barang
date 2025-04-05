<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use CodeIgniter\Controller;

class Barang extends Controller
{
    protected $barangModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->kategoriModel = new KategoriModel();
    }

// app/Controllers/Barang.php
public function index()
{
    $data['barang'] = $this->barangModel->getAllWithKategori();
    return view('barang/index', $data);
}


    public function create()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('barang/create', $data);
    }

    public function store()
    {
        $this->barangModel->save([
            'nama' => $this->request->getPost('nama'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'stok' => $this->request->getPost('stok'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);
        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $data['barang'] = $this->barangModel->find($id);
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('barang/edit', $data);
    }

    public function update($id)
    {
        $this->barangModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'stok' => $this->request->getPost('stok'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);
        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $this->barangModel->delete($id);
        return redirect()->to('/barang');
    }
}

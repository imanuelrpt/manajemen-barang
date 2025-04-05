<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('kategori/index', $data);
    }

    public function create()
    {
        return view('kategori/create');
    }

    public function store()
{
    $validation = $this->validate([
        'nama_kategori' => 'required|min_length[3]|is_unique[kategori.nama_kategori]',
    ]);

    if (!$validation) {
        return redirect()->back()->withInput()->with('error', 'Nama kategori harus unik dan minimal 3 karakter!');
    }

    // Simpan ke database
    $this->kategoriModel->save([
        'nama_kategori' => $this->request->getPost('nama_kategori')
    ]);

    return redirect()->to('/kategori')->with('success', 'Kategori berhasil ditambahkan!');
}


    public function edit($id)
    {
        $data['kategori'] = $this->kategoriModel->find($id);

        if (!$data['kategori']) {
            return redirect()->to('/kategori')->with('error', 'Kategori tidak ditemukan!');
        }

        return view('kategori/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'nama_kategori' => 'required|min_length[3]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', 'Nama kategori minimal 3 karakter!');
        }

        // Update data
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to('/kategori')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function delete($id)
    {
        $kategori = $this->kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to('/kategori')->with('error', 'Kategori tidak ditemukan!');
        }

        $this->kategoriModel->delete($id);
        return redirect()->to('/kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}

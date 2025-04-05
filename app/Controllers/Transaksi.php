<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\BarangModel;
use CodeIgniter\Controller;

class Transaksi extends Controller
{
    protected $transaksiModel;
    protected $barangModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->select('transaksi.*, barang.nama as nama_barang');
        $builder->join('barang', 'barang.id = transaksi.barang_id');
        $query = $builder->get();
    
        $data['transaksi'] = $query->getResultArray();
        return view('transaksi/index', $data);
    }
    

    public function create()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('transaksi/create', $data);
    }

    public function store()
    {
        $this->transaksiModel->save([
            'barang_id' => $this->request->getPost('barang_id'),
            'jenis' => $this->request->getPost('jenis'), // masuk atau keluar
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal')
        ]);

        // Update stok barang
        $barang = $this->barangModel->find($this->request->getPost('barang_id'));
        if ($this->request->getPost('jenis') == 'masuk') {
            $barang['stok'] += $this->request->getPost('jumlah');
        } else {
            $barang['stok'] -= $this->request->getPost('jumlah');
        }
        $this->barangModel->update($this->request->getPost('barang_id'), ['stok' => $barang['stok']]);

        return redirect()->to('/transaksi');

        // Dalam Transaksi::create()
        $barangModel = new \App\Models\BarangModel();
        $data['barang'] = $barangModel->findAll();
        return view('transaksi/create', $data);

    }

    public function delete($id)
    {
        $this->transaksiModel->delete($id);
        return redirect()->to('/transaksi');
    }
}

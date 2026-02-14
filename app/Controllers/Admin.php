<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Admin extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    
    public function index()
    {
        $produk = $this->produkModel->orderBy('id', 'ASC')->findAll();

        $produkLabels = array_map(static fn($item) => $item['produk'], $produk);
        $produkHarga = array_map(static fn($item) => (int) $item['harga'], $produk);

        $totalProduk = count($produk);
        $totalNilaiProduk = array_sum($produkHarga);
        $rataRataHarga = $totalProduk > 0 ? (int) round($totalNilaiProduk / $totalProduk) : 0;
        $hargaTertinggi = $totalProduk > 0 ? max($produkHarga) : 0;

        $data = [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'produkLabels' => $produkLabels,
            'produkHarga' => $produkHarga,
            'totalProduk' => $totalProduk,
            'totalNilaiProduk' => $totalNilaiProduk,
            'rataRataHarga' => $rataRataHarga,
            'hargaTertinggi' => $hargaTertinggi,
        ];
        return view('admin/dashboard', $data);
    }

    
    public function produk()
    {
        $data = [
            'title' => 'Data Produk',
            'produk' => $this->produkModel->findAll(),
            'active' => 'produk'
        ];
        return view('admin/produk_index', $data);
    }

    
    public function create()
    {
        
        if (!$this->validate([
            'thumbnail' => 'uploaded[thumbnail]|is_image[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/png]',
            'produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric'
        ])) {
             
            return redirect()->back()->withInput();
        }

        
        $fileGambar = $this->request->getFile('thumbnail');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaGambar); 

        $this->produkModel->save([
            'thumbnail' => $namaGambar,
            'kategori' => $this->request->getVar('kategori'),
            'produk' => $this->request->getVar('produk'),
            'harga' => $this->request->getVar('harga')
        ]);

        return redirect()->to('/admin/produk');
    }

    
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Produk',
            'produk' => $this->produkModel->find($id),
            'active' => 'produk'
        ];
        return view('admin/produk_edit', $data);
    }

    
    public function update($id)
    {
        $fileGambar = $this->request->getFile('thumbnail');
        
        
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads', $namaGambar);
            
        }

        $this->produkModel->save([
            'id' => $id,
            'thumbnail' => $namaGambar,
            'kategori' => $this->request->getVar('kategori'),
            'produk' => $this->request->getVar('produk'),
            'harga' => $this->request->getVar('harga')
        ]);

        return redirect()->to('/admin/produk');
    }

    
    public function delete($id)
    {
        $this->produkModel->delete($id);
        return redirect()->to('/admin/produk');
    }
}

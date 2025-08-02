<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\Controller;

class Buku extends Controller
{
    protected $buku;

    public function __construct()
    {
        $this->buku = new BukuModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');

        if ($keyword) {
            $data['buku'] = $this->buku
                ->like('judul', $keyword)
                ->orLike('kode_buku', $keyword)
                ->findAll();
        } else {
            $data['buku'] = $this->buku->findAll();
        }

        // Hitung statistik buku
        $buku = $data['buku'];
        $data['total_buku'] = count($buku);
        $data['buku_tersedia'] = count(array_filter($buku, fn($b) => $b['ketersediaan'] == 1));
        $data['buku_tidak_tersedia'] = $data['total_buku'] - $data['buku_tersedia'];

        $data['keyword'] = $keyword;

        return view('buku/index', $data);
    }



    public function create()
    {
        return view('buku/create');
    }

    public function store()
    {
        $currentYear = date('Y');

        if (!$this->validate([
            'kode_buku' => "required|min_length[4]|is_unique[buku.kode_buku]",
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => "required|numeric|less_than_equal_to[$currentYear]",
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->buku->save([
            'kode_buku' => $this->request->getPost('kode_buku'),
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'ketersediaan' => $this->request->getPost('ketersediaan'),
        ]);

        session()->setFlashdata('success', 'Buku berhasil ditambahkan.');
        return redirect()->to('/buku');
    }


    public function edit($id)
    {
        $data['buku'] = $this->buku->find($id);
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $currentYear = date('Y');

        if (!$this->validate([
            'kode_buku' => "required|min_length[4]|is_unique[buku.kode_buku,id,$id]",
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => "required|numeric|less_than_equal_to[$currentYear]",
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->buku->update($id, [
            'kode_buku' => $this->request->getPost('kode_buku'),
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'ketersediaan' => $this->request->getPost('ketersediaan'),
        ]);

        session()->setFlashdata('success', 'Buku berhasil diupdate.');
        return redirect()->to('/buku');
    }


    public function delete($id)
    {
        $this->buku->delete($id);
        return redirect()->to('/buku');
    }
}
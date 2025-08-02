<?php
// File: app/Controllers/Crud.php
namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class Crud extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function tambah()
    {
        return view('crud/aploud');
    }

    public function simpan()
    {
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
            'universitas' => $this->request->getPost('universitas'),
            'no_hp' => $this->request->getPost('no_hp'),
        ];

        $this->mahasiswaModel->insert($data);
        return redirect()->to('/crud/view');
    }

    public function view()
    {
        $data['mahasiswa'] = $this->mahasiswaModel->findAll();
        return view('crud/view', $data);
    }

    public function edit($id)
    {
        $data['mhs'] = $this->mahasiswaModel->find($id);
        return view('crud/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
            'universitas' => $this->request->getPost('universitas'),
            'no_hp' => $this->request->getPost('no_hp'),
        ];

        $this->mahasiswaModel->update($id, $data);
        return redirect()->to('/crud/view');
    }
}

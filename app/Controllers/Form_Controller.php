<?php

namespace App\Controllers;

class FormController extends BaseController
{
    public function form()
    {
        echo '
        <form method="post" action="/kirim">
            Nama: <input type="text" name="nama"><br>
            NIM: <input type="text" name="nim"><br>
            Kelas: <input type="text" name="kelas"><br>
            Mata Kuliah: <input type="text" name="matakuliah"><br>
            Dosen Pengampu: <input type="text" name="dosen"><br>
            Asisten Praktikum: <input type="text" name="asisten"><br>
            <button type="submit">Kirim</button>
        </form>';
    }

    public function kirim()
    {
        echo "Nama: " . $this->request->getPost('nama') . "<br>";
        echo "NIM: " . $this->request->getPost('nim') . "<br>";
        echo "Kelas: " . $this->request->getPost('kelas') . "<br>";
        echo "Mata Kuliah: " . $this->request->getPost('matakuliah') . "<br>";
        echo "Dosen Pengampu: " . $this->request->getPost('dosen') . "<br>";
        echo "Asisten Praktikum: " . $this->request->getPost('asisten') . "<br>";
    }
}

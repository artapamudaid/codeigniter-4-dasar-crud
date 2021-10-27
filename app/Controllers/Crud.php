<?php

namespace App\Controllers;

use CodeIgniter\Controller;

// memanggil Crud_model
use App\Models\Crud_model;

class Crud extends Controller
{
    public function index()
    {
        // mendefinisikan Crud_model() kedalam variabel $model
        $model = new Crud_model();
        // memenggunakan variabel $model dan memanggil fungsi getBarang dari Crud_model() yang sudah dimasukkan kedalam variabel $model
        $data['barang'] = $model->getBarang();
        //menampilkan view barang_view dan mengirim data $data
        echo view('barang_view', $data);
    }

    public function tambah()
    {
        //menampilkan view add_barang_view
        echo view('add_barang_view');
    }

    public function simpan()
    {
        // mendefinisikan Crud_model() kedalam variabel $model
        $model = new Crud_model();
        // mendefinisikan data yang akan dimasukkan dan menyimpannya ke dalam varibel $data dalam bentuk array. barang_name untuk kolom barang_name dan barang_price untuk kolom barang_price
        $data = array(
            'barang_name' => $this->request->getVar('barang_name'),
            'barang_price' => $this->request->getVar('barang_price'),
        );
        // memenggunakan variabel $model dan memanggil fungsi saveBarang dari Crud_model() yang sudah dimasukkan kedalam variabel $model dengan membawa parameter $data
        $model->saveBarang($data);
        // meneruskan ke controller Crud fungsi index
        return redirect()->to('/crud');
    }

    public function edit($id)
    {
        // mendefinisikan Crud_model() kedalam variabel $model
        $model = new Crud_model();
        // menggunakan variabel $model dan memanggil fungsi getBarang dari Crud_model() yang sudah dimasukkan kedalam variabel $model dengan membawa parameter $id dan ditampilkan dalam bentuk baris
        $data['barang'] = $model->getBarang($id)->getRow();
        //menampilkan view edit_barang_view
        echo view('edit_barang_view', $data);
    }

    public function update()
    {
        // mendefinisikan Crud_model() kedalam variabel $model
        $model = new Crud_model();
        //memasukkan data dari barang_id yang diterima dari  edit_barang_view ke dalam variabel $id
        $id = $this->request->getVar('barang_id');
        // mendefinisikan data yang akan dimasukkan dan menyimpannya ke dalam varibel $data dalam bentuk array. barang_name untuk kolom barang_name dan barang_price untuk kolom barang_price
        $data = array(
            'barang_name' => $this->request->getVar('barang_name'),
            'barang_price' => $this->request->getVar('barang_price'),
        );
        // memenggunakan variabel $model dan memanggil fungsi updateBarang dari Crud_model() yang sudah dimasukkan kedalam variabel $model dengan membawa parameter $data dan $id
        $model->updateBarang($data, $id);
        // meneruskan ke controller Crud fungsi index
        return redirect()->to('/crud');
    }

    public function hapus($id)
    {
        // mendefinisikan Crud_model() kedalam variabel $model
        $model = new Crud_model();
        // menggunakan variabel $model dan memanggil fungsi deleteBarang dari Crud_model() yang sudah dimasukkan kedalam variabel $model dengan membawa parameter $id yang diterima dari barang_view
        $model->deleteBarang($id);
        return redirect()->to('/crud');
    }
}

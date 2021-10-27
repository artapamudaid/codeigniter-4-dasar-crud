<?php

namespace App\Models;

use CodeIgniter\Model;

class Crud_model extends Model
{
    //mendefinisikan nama tabel yang digunakan
    protected $table = 'barang';

    //membuat fungsi getBarang dengan variabel $id defaultnya false/kosong
    public function getBarang($id = false)
    {

        if ($id == false) {
            //jika variabel $id false/kosong maka tampilkan semua data
            return $this->findAll();
        } else {
            //jika variabel $id terisi maka tampilkan data yang dimaksud sesusai $id
            return $this->getWhere(['barang_id' => $id]);
        }
    }

    //membuat fungsi saveBarang dengan variabel $data untuk menerima data dari Controller
    public function saveBarang($data)
    {
        //buat variabel $query berisi script untuk insert data ke dalam variabel $tabel di atas
        $query = $this->db->table($this->table)->insert($data);
        //eksekusi variabel $query
        return $query;
    }

    //membuat fungsi updateBarang dengan variabel $data dan $id untuk menerima data dari Controller
    public function updateBarang($data, $id)
    {
        //buat variabel $query berisi script untuk edit data di tabel variabel $tabel di atas dimana record/fill kolom barang_id sesuai dengan variabel $id yang dikirim dari Controller ebagai acuan data mana yang akan diedit
        $query = $this->db->table($this->table)->update($data, array('barang_id' => $id));
        //eksekusi variabel $query
        return $query;
    }

    //membuat fungsi deleteBarang dengan variabel $id untuk menerima data dari Controller
    public function deleteBarang($id)
    {
        //buat variabel $query berisi script untuk hapus data di tabel variabel $tabel di atas dimana variabel $id yang dikirim dari Controller sebagai acuan data mana yang akan dihapus
        $query = $this->db->table($this->table)->delete(array('barang_id' => $id));
        //eksekusi variabel $query
        return $query;
    }
}

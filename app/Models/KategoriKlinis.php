<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKlinis extends Model
{
    // Menggunakan 'kategori_klinis' sebagai nama tabel
    protected $table = 'kategori_klinis'; 
    protected $primaryKey = 'idkategori_klinis';
    protected $fillable = ['nama_kategori_klinis'];
    public $timestamps = false;
}
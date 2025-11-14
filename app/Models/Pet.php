<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pet';
    protected $primaryKey = 'idpet';
    protected $fillable = [
        'nama', 
        'tanggal_lahir', 
        'warna_tanda', 
        'jenis_kelamin', 
        'idpemilik', 
        'idras_hewan'
    ];
    public $timestamps = false;

    /**
     * Relasi ke tabel Pemilik
     */
    public function pemilik()
    {
        // 'idpemilik' adalah foreign key di tabel 'pet'
        // 'idpemilik' adalah primary key di tabel 'pemilik'
        return $this->belongsTo(Pemilik::class, 'idpemilik', 'idpemilik');
    }

    /**
     * Relasi ke tabel RasHewan
     */
    public function rasHewan()
    {
        // 'idras_hewan' adalah foreign key di tabel 'pet'
        // 'idras_hewan' adalah primary key di tabel 'ras_hewan'
        return $this->belongsTo(RasHewan::class, 'idras_hewan', 'idras_hewan');
    }
}
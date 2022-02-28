<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $fillable = [
        'nama',
        'nit',
        'jenis_kelamin',
        'tgl_lahir',
        'no_telp',
        'alamat',
        'id_spesialis',

    ];
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = [
        'waktu',
        'hari',
        'id_dokter',
     
    ];

}

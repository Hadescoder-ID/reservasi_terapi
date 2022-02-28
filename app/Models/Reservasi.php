<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';
    protected $primaryKey = 'id_reservasi';
    protected $fillable = [
        'tanggal', 
        'id_user',
        'id_dokter'
    ];
    public function getUser(){
        return $this->hasMany('App\User','users','id_user');
    }

}

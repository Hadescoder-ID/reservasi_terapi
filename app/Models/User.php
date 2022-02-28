<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'jenis_kelamin',
        'no_telp',
        'tgl_lahir',
        'alamat',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // public function getUser(){
    //     return $this->belongsTo('App\User','users','id_user');
    // }
    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function reservasi(){
        public function getReservasi(){
            return $this->hasMany('App\transaksi','reservasi','id_user');
        }
    
}

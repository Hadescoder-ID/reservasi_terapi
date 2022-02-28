<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'spesialis';

    protected $primaryKey = 'id_spesialis';
    protected $fillable = [
        'spesialis',


    ];
}

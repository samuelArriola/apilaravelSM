<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inex_usuarios extends Model
{
    use HasFactory;
    protected $table = "inex_usuarios";
    public $timestamps = false; 
    protected $fillable = [
        'iden_usua', 
        'nomb_usua',
        'apel_usua',
        'correo',
        'role_usua',
        'item_dep',
        'estado', 
    ];

    
}

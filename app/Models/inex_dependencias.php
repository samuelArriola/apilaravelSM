<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inex_dependencias extends Model
{
    use HasFactory;
    protected $table = 'inex_dependencias';
    protected $primaryKey = 'item_dep';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'item_dep', 
        'nombre_dep' 
    ];
}

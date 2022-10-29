<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //Para prevenir el Mass Assignment Excpetion, tenemos que agregar $fillable array al modelo Product.php
    protected $fillable = ['nombre', 'descripcion','existencia', 'fotografia'];
}

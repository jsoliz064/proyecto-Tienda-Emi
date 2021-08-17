<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReciboPago extends Model
{
    use HasFactory;
    protected $table="recibo_pagos";
    //protected $fillable=['nombre',];
    protected $guarded=['id','created_at','updated_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compatibilidad extends Model
{
    use HasFactory;
    protected $table="compatibilidads";
    protected $guarded=['id','created_at','updated_at'];
}

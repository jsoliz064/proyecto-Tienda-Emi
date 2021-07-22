<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Personal extends Model
{
    use HasFactory;
    protected $table="personals";
    protected $guarded=['id','created_at','updated_at'];

    //relacion uno a uno
    public function user(){
        //$user = User::where('idPersonal', $this->id)->first();      
        //return $this->hasOne(User::class);
        return $this->hasOne('App\Models\User', 'idPersonal');
        
    }
}

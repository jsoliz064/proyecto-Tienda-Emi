<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    use HasRoles;
  /*   use LogsActivity; */

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'idPersonal',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
  /*   protected static $logName = 'user';
    protected static $ignoreChangedAttributes = ['password'];
    protected static $logAttributes = ['name'];
    protected static $logOnlyDirty = true; */

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'text']);
        // Chain fluent methods for configuration options
    }
    
    //realacion uno a uno
    public function personal(){
        /*$personal = Personal::find($this->idPersonal);
        return $personal*/

        return $this->belongsTo('App\Models\Personal', 'idPersonal');
    }
        //->useLogName('Usuario') 
  
}

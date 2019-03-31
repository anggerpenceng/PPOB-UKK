<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','nomor_kwh' , 
        'alamat' , 'id_role' , 'id_tarif'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){

        return $this->belongsTo('App\Model\Roles' , 'id_role');

    }

    public function tarif(){

        return $this->belongsTo('App\Model\Tarif' , 'id_tarif');

    }

    public function penggunaan(){
        return $this->hasMany('App\Model\Penggunaan' , 'id_pelanggan');
    }

}

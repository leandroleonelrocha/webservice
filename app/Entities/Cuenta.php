<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Hash;

namespace App\Entities;


class Cuenta extends Entity{

    protected $table = 'cuenta';
    protected $fillable = ['password','rol_id', 'entidad_id', 'habilitado'];
    

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

   
    public function Rol()
    {
         return $this->belongsTo(Rol::getClass());
    }


}
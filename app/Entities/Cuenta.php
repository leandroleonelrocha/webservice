<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Hash;

namespace App\Entities;


class Cuenta extends Entity{

    protected $table = 'cuenta';
    protected $fillable = ['contrasena', 'habilitado', 'rol_id'];

   
    //relaciones
    public function Rol()
    {
        return $this->belongsTo(Rol::getClass());
    }

   
}
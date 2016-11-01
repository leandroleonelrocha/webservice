<?php
/**
 * Created by PhpStorm.
 * User: llrocha
 * Date: 19/04/2016
 * Time: 11:33
 */

namespace App\Http\Repositories;
use App\Entities\Cuenta;
use Hash;
use Response;
use Illuminate\Http\Request;

class CuentaRepo extends BaseRepo
{

    public function getModel()
    {
        return new Cuenta();
    }

    public function findUser($user){
    	return $this->model->where('usuario',$user)->first();
    }

    public function allCuentas(){
    	return Cuenta::where('rol_id','!=',1)->get();
    }

	function generarCodigo(){
		$patron = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$codigo = '';
		for($i=0;$i<12;$i++) {
			// Devuelve parte de una cadena
			$codigo .= substr($patron,rand(1,62),1);
		}
		return $codigo;
	}

}
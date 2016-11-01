<?php
/**
 * Created by PhpStorm.
 * User: llrocha
 * Date: 19/04/2016
 * Time: 11:33
 */

namespace App\Http\Repositories;
use App\Entities\Cuenta;



class CuentaRepo extends BaseRepo
{

    public function getModel()
    {
        return new Cuenta();
    }

    public function findUser($user,$password){
    	return Cuenta::where('id',$user)->where('password',$password)->get();
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
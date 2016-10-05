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

}
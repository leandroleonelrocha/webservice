<?php



namespace App\Http\Controllers;

use App\Http\Repositories\CuentaRepo;
use Response;


class CuentaController extends Controller
{

    protected $cuentaRepo;

    public function __construct(CuentaRepo $cuentaRepo){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->cuentaRepo = $cuentaRepo;
    }

    public function allCuenta()
    {
        return Response::json($this->cuentaRepo->all(),200);
        

    }
    public function getCuenta($id)
    {

    	$cuenta = $this->cuentaRepo->find($id);
        if(is_null($cuenta)){
            return false;
        }
        
        return $cuenta;

    }

    public function saveCuenta()
    {
    	
      
    }
    public function updateCuenta($id)
    {
    
    }
    public function deleteCuenta($id)
    {
    
    	
    }
}

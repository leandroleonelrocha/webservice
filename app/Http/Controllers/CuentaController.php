<?php



namespace App\Http\Controllers;

use App\Http\Repositories\CuentaRepo;
use Response;
use Illuminate\Http\Request;


class CuentaController extends Controller
{

    protected $cuentaRepo;

    public function __construct(CuentaRepo $cuentaRepo){
       header('Access-Control-Allow-Origin: *');
       header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
       $this->cuentaRepo = $cuentaRepo;
    }

    public function allCuenta()
    {
        $cuentas = $this->cuentaRepo->all();
        
        return Response::json($cuentas,200);
          

    }


    public function getCuenta($id)
    {

    	$cuenta = $this->cuentaRepo->find($id);
        $resultado['results'] = [];
        if(is_null($cuenta)){
            return false;
        }
        $resultado['results'] = $cuenta;
        $resultado['results']['rol'] = $cuenta->Rol;
        return response()->json($resultado, 200);
        
    


    }

    public function saveCuenta()
    {
    	$cuenta = $this->cuentaRepo->find($id);
        if(is_null($cuenta))
        {
            return Response::json(['response'=>"Cuenta no encontrada!"], 400);
        }
            return Response::json($cuenta,200);
    }


  
    public function updateCuenta(Request $request, $id)
    {
        $cuenta = $this->cuentaRepo->find($id);
        $datos = $request->all();    
        if(is_null($cuenta)){
            return Response::json(['response'=>"La Cuenta no pudo ser actualizada!"], 400);
        }
        $cuenta->edit($cuenta, $datos);
        return Response::json(['response'=>"Cuenta actualizada!"], 200);
    }

    public function deleteCuenta($id)
    {
        $cuenta = $this->cuentaRepo->find($id);
        $cuenta->delete();
        return Response::json(['response'=>"Cuenta borrada!"], 200);
    	
    }
}

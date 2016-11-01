<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CuentaRepo;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CuentaController extends Controller
{

    protected $cuentaRepo;

    public function __construct(CuentaRepo $cuentaRepo){
       header('Access-Control-Allow-Origin: *');
       header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
       $this->cuentaRepo = $cuentaRepo;
    }

    public function postLogin(Request $request){
        return redirect()->route('administracion.cuentas_lista');
    }

    public function cuentas_lista(){
        $cuentas = $this->cuentaRepo->allCuentas();
        return view('administracion.cuentas.lista', compact('cuentas'));
    }

    public function habilitar($id){
        $cuenta = $this->cuentaRepo->find($id);
        if($cuenta->habilitado == 1){
            $cuenta->habilitado = 0;
            $resultado = '<i class="btn btn-red fa fa-thumbs-o-down" title="Inhabilitado"></i>';
        }
        else
        {
            $cuenta->habilitado = 1;
            $resultado = '<i class="btn btn-green fa fa-thumbs-o-up" title="Habilitado"></i>';
        }

        if ($cuenta->save())
            return Response::json($resultado,200);
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

    public function getCuentaLogin($usuario, $password){

        $cuenta = $this->cuentaRepo->findUser($usuario);
        $estado   = Hash::check($password, $cuenta->password);

        if ($estado == TRUE) {
            return response()->json($cuenta, 200);
        }
    }

    public function createCuenta($usuario,$entidad,$rol){
        $password = $this->cuentaRepo->generarCodigo();
        $cuenta = array('usuario' => $usuario, 'password' => $password, 'rol_id' => $rol, 'entidad_id' => $entidad);
        $this->cuentaRepo->create($cuenta);
        return response()->json($password, 400);
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
  
    public function actualizar($mail, $password,$passwordActual)
    {
        $cuenta                 = $this->cuentaRepo->findUser($mail);
        $estado   = Hash::check($passwordActual,$cuenta->password);


        if ($estado == true) {

            $cuenta->password   = $password;
            $cuenta->save();
            return response()->json($cuenta, 200);
          
        }

        // if ($cuenta == NULL) {
            // return Response::json(['response'=>"La contraseña no ha podido ser modificada"], 200);
        // }
        // else{


            // return Response::json(['response'=>"La contraseña a sido modificada con éxito"], 200);
        // }
    }
    public function restaurar($mail)
    {
        $cuenta = $this->cuentaRepo->findUser($mail);

        if ($cuenta){

            $password = $this->cuentaRepo->generarCodigo();
            $cuenta->password   = $password;
            $cuenta->save(); 
            return response()->json($password, 400);
        }
        else{
            $password=NULL;
    }

    public function actualizar($mail, $password)
    {
        $cuenta                 = $this->cuentaRepo->findUser($mail);
        if ($cuenta == NULL) {
            return false;
        }
        else{
            $pass               = Hash::make($password);
            $cuenta->password   = $pass;
            $cuenta->save();
            return true;

        }

        // $cuenta = $this->cuentaRepo->find($id);
        // $datos = $request->all();    
        // if(is_null($cuenta)){
        //     return Response::json(['response'=>"La Cuenta no pudo ser actualizada!"], 400);
        // }
        // $cuenta->edit($cuenta, $datos);
        // return Response::json(['response'=>"Cuenta actualizada!"], 200);
    }

    public function deleteCuenta($id)
    {
        $cuenta = $this->cuentaRepo->find($id);
        $cuenta->delete();
        return Response::json(['response'=>"Cuenta borrada!"], 200);
    	
    }
}

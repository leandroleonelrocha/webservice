<?php

namespace App\Http\Controllers;


class PrincipalController extends Controller
{
    public function __construct(){
    	$this->middleware('guest');
    }
    
    public function index(){
    	$dados = "Dados de un Array";
    	return view('welcome')->with('dados',$dados);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Administrador;
use App\Http\Requests;

class AdministradorController extends Controller
{
       public function __construct(Administrador $administrador){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->administrador = $administrador;
    }
    public function allAdministradores()
    {
    	return Response::json($this->administrador->allAdministradores(),200);
    }
    public function getAdministrador($id)
    {
    	$administrador = $this->administrador->getAdministrador($id);
    	if(!$administrador){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($administrador,200);
    }
    public function saveAdministrador()
    {    	
        $administrador = $this->administrador->saveAdministrador();
    	if(!$administrador){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }
    public function updateAdministrador($id)
    {
    	$administrador = $this->administrador->updateAdministrador($id);
    	if(!$administrador){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($administrador,200);
    }
    public function deleteAdministrador($id)
    {
    	if($this->administrador->deleteAdministrador($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}

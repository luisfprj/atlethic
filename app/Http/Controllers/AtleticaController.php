<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use App\Atletica;

class AtleticaController extends Controller
{
   public function __construct(Atletica $atletica){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->atletica = $atletica;
    }
    public function allAtleticas()
    {
    	return Response::json($this->atletica->allAtleticas(),200);
    }
    public function getAtletica($id)
    {
    	$atletica = $this->atletica->getAtletica($id);
    	if(!$atletica){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($atletica,200);
    }
    public function saveAtletica()
    {    	
        $atletica = $this->atletica->saveAtletica();
    	if(!$atletica){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }
    public function updateAtletica($id)
    {
    	$atletica = $this->atletica->updateAtletica($id);
    	if(!$atletica){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($atletica,200);
    }
    public function deleteAtletica($id)
    {
    	if($this->atletica->deleteAtletica($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}

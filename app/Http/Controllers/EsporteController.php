<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use App\Esporte;

class EsporteController extends Controller
{
   public function __construct(Esporte $esporte){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->esporte = $esporte;
    }
    public function allEsportes()
    {
    	return Response::json($this->esporte->allEsportes(),200);
    }
    public function getEsporte($id)
    {
    	$esporte = $this->esporte->getEsporte($id);
    	if(!$esporte){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($esporte,200);
    }
    public function saveEsporte()
    {    	
        $esporte = $this->esporte->saveEsporte();
    	if(!$esporte){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }
    public function updateEsporte($id)
    {
    	$esporte = $this->esporte->updateEsporte($id);
    	if(!$esporte){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($esporte,200);
    }
    public function deleteEsporte($id)
    {
    	if($this->esporte->deleteEsporte($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}

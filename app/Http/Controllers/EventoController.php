<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Evento;
class EventoController extends Controller
{
    public function __construct(Evento $evento){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->evento = $evento;
    }
    public function allEventos()
    {
    	return Response::json($this->evento->allEventos(),200);
    }
    public function getEvento($id)
    {
    	$evento = $this->evento->getEvento($id);
    	if(!$evento){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($evento,200);
    }
    public function saveEvento()
    {    	
        $evento = $this->evento->saveEvento();
    	if(!$evento){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }

    public function updateEvento($id)
    {
    	$evento = $this->evento->updateEvento($id);
    	if(!$evento){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($evento,200);
    }
    public function deleteEvento($id)
    {
    	if($this->evento->deleteEvento($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}

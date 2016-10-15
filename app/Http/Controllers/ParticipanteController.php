<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Participante;

class ParticipanteController extends Controller
{
    public function __construct(Participante $participante){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->participante = $participante;
    }
    public function allParticipantes()
    {
    	return Response::json($this->participante->allParticipantes(),200);
    }
    public function getParticipante($id)
    {
    	$participante = $this->participante->getParticipante($id);
    	if(!$participante){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($participante,200);
    }
    public function saveParticipante()
    {    	
        $participante = $this->participante->saveParticipante();
    	if(!$participante){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }

    public function updateParticipante($id)
    {
    	$participante = $this->participante->updateParticipante($id);
    	if(!$participante){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($participante,200);
    }
    public function deleteParticipante($id)
    {
    	if($this->participante->deleteParticipante($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use App\Time;
use App\Jogador;

class TimeController extends Controller
{
	public function __construct(Time $time){
	        header('Access-Control-Allow-Origin: *'); 
	        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	    	$this->time = $time;
	    }
	    
	    public function allTimes()
	    {
	    	return Response::json($this->time->allTimes(),200);
	    }

	    public function getTime($id)
	    {
	    	$time = $this->time->getTime($id);
	    	if(!$time){
	    		return Response::json(['response'=>"Registro não encontrado!"], 400);
	    	}
	    	//$jogadores = allJogadores();
	    	
	    
	    return Response::json($time,200);
		}
	    public function saveTime()
	    {    	
	        $time = $this->time->saveTime();
	    	if(!$time){
	    		return Response::json(['response'=>"Registro não adicionado!"], 400);
	    	}
	    	return Response::json(['response'=>"Registro adicionado!"],200);
	    }

	    public function updateTime($id)
	    {
	    	$time = $this->time->updateTime($id);
	    	if(!$time){
	    		return Response::json(['response'=>"Registro não encontrado!"], 400);
	    	}
	    	return Response::json($time,200);
	    }

	    public function deleteTime($id)
	    {
	    	if($this->time->deleteTime($id)){
	    		return Response::json("Registro deletado com sucesso!",200);
	    	}
	    	return Response::json("Erro ao deletar registro!",400);
	    	
	    }
}

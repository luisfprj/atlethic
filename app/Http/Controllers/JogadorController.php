<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use App\Jogador;
use App\Aluno;
use App\Time;


class JogadorController extends Controller
{
   public function __construct(Jogador $jogador){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->jogador = $jogador;
    }
    public function allJogadores()
    {
    	$jogadores = $this->jogador->allJogadores();
        $aluno = new Aluno();
        $time = new Time();
        for($i = 0; $i < count($jogadores); $i++){
            $jogadores[$i]->aluno = $aluno->getAluno($jogadores[$i]->alunoId);
            $jogadores[$i]->time = $time->getTime($jogadores[$i]->timeId);
        }

        return Response::json($jogadores,200);
    }
    public function getJogador($id)
    {
    	$jogador = $this->jogador->getJogador($id);
    	if(!$jogador){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
        $aluno = new Aluno();
        $time = new Time();
        $jogador->aluno = $aluno->getAluno($jogador->alunoId);
        $jogador->time = $time->getTime($jogador->timeId);
    	return Response::json($jogador,200);
    }
    public function getTimeJogador($id)
    {
        $jogadores = $this->jogador->allJogadoresDoTime($id);
        $aluno = new Aluno();
        $time = new Time();
        for($i = 0; $i < count($jogadores); $i++){
            $jogadores[$i]->aluno = $aluno->getAluno($jogadores[$i]->alunoId);
            $jogadores[$i]->time = $time->getTime($jogadores[$i]->timeId);
        }

        return Response::json($jogadores,200);


    }
    public function saveJogador()
    {    	
        $jogador = $this->jogador->saveJogador();
    	if(!$jogador){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }

    public function updateJogador($id)
    {
    	$jogador = $this->jogador->updateJogador($id);
    	if(!$jogador){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($jogador,200);
    }
    public function deleteJogador($id)
    {
    	if($this->jogador->deleteJogador($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}

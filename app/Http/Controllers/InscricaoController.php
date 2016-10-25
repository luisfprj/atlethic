<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Inscricao;
use App\Aluno;
use App\Time;
use App\Curso;
class InscricaoController extends Controller
{
    public function __construct(Inscricao $inscricao){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->inscricao = $inscricao;
    }
    public function allInscricoes()
    {
        $inscricoes = $this->inscricao->allInscricoes();
        $aluno = new Aluno();
        $time = new Time();
        $curso = new Curso();
        for($i = 0; $i < count($inscricoes); $i++){
            $inscricoes[$i]->aluno = $aluno->getAluno($inscricoes[$i]->alunoId);            
            $inscricoes[$i]->time = $time->getTime($inscricoes[$i]->timeId)->name;
            $inscricoes[$i]->curso = $curso->getCurso($inscricoes[$i]->aluno->cursoId)->name;
        }

    	return Response::json($inscricoes,200);
    }
    public function getInscricao($id)
    {
    	$inscricao = $this->inscricao->getInscricao($id);
    	if(!$inscricao){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($inscricao,200);
    }
    public function saveInscricao()
    {    	
        $inscricao = $this->inscricao->saveInscricao();
    	if(!$inscricao){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }

    public function updateInscricao($id)
    {
    	$inscricao = $this->inscricao->updateInscricao($id);
    	if(!$inscricao){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($inscricao,200);
    }
    public function deleteInscricao($id)
    {
    	if($this->inscricao->deleteInscricao($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}

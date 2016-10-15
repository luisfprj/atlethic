<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use App\Aluno;

class AlunoController extends Controller
{
     public function __construct(Aluno $aluno){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->aluno = $aluno;
    }
    public function allAlunos()
    {
    	return Response::json($this->aluno->allAlunos(),200);
    }
    public function getAluno($id)
    {
    	$aluno = $this->aluno->getAluno($id);
    	if(!$aluno){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($aluno,200);
    }
    public function saveAluno()
    {    	
        $aluno = $this->aluno->saveAluno();
    	if(!$aluno){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }
    public function updateAluno($id)
    {
    	$aluno = $this->aluno->updateAluno($id);
    	if(!$aluno){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($aluno,200);
    }
    public function deleteAluno($id)
    {
    	if($this->aluno->deleteAluno($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}

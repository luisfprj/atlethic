<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use App\Curso;

class CursoController extends Controller
{
   public function __construct(Curso $curso){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->curso = $curso;
    }
    public function allCursos()
    {
    	return Response::json($this->curso->allCursos(),200);
    }
    public function getCurso($id)
    {
    	$curso = $this->curso->getCurso($id);
    	if(!$curso){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($curso,200);
    }
    public function saveCurso()
    {    	
        $curso = $this->curso->saveCurso();
    	if(!$curso){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }
    public function updateCurso($id)
    {
    	$curso = $this->curso->updateCurso($id);
    	if(!$curso){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($curso,200);
    }
    public function deleteCurso($id)
    {
    	if($this->curso->deleteCurso($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}

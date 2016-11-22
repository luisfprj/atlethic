<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Capitao;
use App\Aluno;
use App\Administrador;

class CapitaoController extends Controller
{
    
   public function __construct(Capitao $capitao){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->capitao = $capitao;
    }
    public function allCapitoes()
    {
    	return Response::json($this->capitao->allCapitoes(),200);
    }
    public function getCapitao($id)
    {
    	$capitao = $this->capitao->getCapitao($id);
    	if(!$capitao){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($capitao,200);
    }
    public function getCapitaoEsporte($id)
    {
        $capitoes = $this->capitao->allcapitoesDoEsporte($id);
        $aluno = new Aluno();
        $administrador = new Administrador();
        
        for($i = 0; $i < count($capitoes); $i++){
            $capitoes[$i]->administrador = $administrador->getAdministrador($capitoes[$i]->administradorId);
            $capitoes[$i]->aluno = $aluno->getAluno($capitoes[$i]->administrador->alunoId);
            }
           

        return Response::json($capitoes,200);

    }
    public function saveCapitao()
    {    	
        $capitao = $this->capitao->saveCapitao();
    	if(!$capitao){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }
    public function updateCapitao($id)
    {
    	$capitao = $this->capitao->updateCapitao($id);
    	if(!$capitao){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($capitao,200);
    }
    public function deleteCapitao($id)
    {
    	if($this->capitao->deleteCapitao($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}

@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Painel de administradores</div>
                <div class="panel-body">
                    <div class="row">
                      <div  class="col-md-5 ">
                        <center><label>Alunos</label></center>
                          <select size="5" multiple class="form-control" style="font-size: 18px;">
                            <option id="box">Ciencia da computação</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                      </div>
                      <div class="col-md-2 " >
                        <button type="" style="margin-top:30px;" class="btn btn-success">Adicionar --></button>
                        <button type=""  class="btn btn-default"><-- Remover</button> 
                      </div>
                      <div class="col-md-5 ">
                          <center><label>Administradores</label></center>
                          <select size="5" multiple class="form-control" style="font-size: 18px;">
                            <option id="box">Ciencia da computação</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

    

@endsection
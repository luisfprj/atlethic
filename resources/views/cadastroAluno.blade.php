@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Aluno novo ou nome do aluno</div>
                <div class="panel-body">                    
                    <div class="container">
                      <div class="col-md-11 col-sm-11">                        
                        <form role="form" method="get" action="#">                          
                          <div class="row">
                            <div class="col-md-6 col-sm-8">
                              <div class="form-group">
                                <label for="fullName">Nome completo</label>
                                <input type="email" class="form-control" id="fullName" placeholder="Nome completo" />
                              </div>
                            </div>        
                            <div class="col-md-4 col-sm-4">
                              <div class="form-group">
                                <label for="matricula">Matrícula</label>
                                <input type="double" class="form-control" id="matricula" placeholder="Matrícula" />
                              </div>                        
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-5 col-sm-5">
                              <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" />
                              </div>
                            </div>
                              <div class="col-md-2 col-sm-3">
                                <div class="form-group">
                                  <label for="turno">Turno</label>
                                  <br>
                                  <select class="form-control">
                                  <option>Manhã</option>
                                  <option>Tarde</option>
                                  <option>Noite</option>
                                </select>
                                </div>
                              </div>                
                            <div class="col-md-3 col-sm-4">
                              <div class="form-group">
                                <label for="curso">Curso</label>
                                <select class="form-control">
                                <option>Ciência Computação</option>
                                <option>Engenharia</option>
                                <option>Medicina</option>
                                </select>
                              </div>
                            </div>
                          </div>  
                          <div class="row">          
                            <div class="col-md-2 col-sm-2 col-xs-3">
                              <button href="/blog/public/cadastroaluno" class="btn btn-default">Cancelar</button>
                            </div>   
                            <div class="col-md-2 col-sm-2 col-xs-3">
                              <button type="submit" class="btn btn-success">Enviar</button>            
                            </div>
                          </div>
                        </form>
                        </div>                        
                      </div>       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    

@endsection
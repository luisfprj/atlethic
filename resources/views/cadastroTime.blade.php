
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nome do Time</div>
                  <div class="panel-body"> 
                    
                    <table class="table table-bordered table-hover" id="tab_logic">
                        <thead>
                          <tr >
                            <th class="text-center">
                              #
                            </th>
                            <th class="text-center">
                              Nome
                            </th>
                            <th class="text-center">
                              Curso
                            </th>
                            <th class="text-center">
                              Status
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id='addr0'>
                            <td>
                            1
                            </td>
                            <td>
                            <input type="text" name='name0'  placeholder='Nome' class="form-control"/>
                            </td>
                            <td>
                            <input type="text" name='curso0' placeholder='Curso' class="form-control"/>
                            </td>
                            <td>
                            <input type="text" disabled name='status0' placeholder='Status' class="form-control"/>
                            </td>
                          </tr>
                            <tr id='addr1'></tr>
                        </tbody>
                  </table>  
                  <button type="submit" class="btn btn-success">Inscrever-se</button>   
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
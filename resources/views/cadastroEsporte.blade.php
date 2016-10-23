@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Esporte</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="PUT" action="{{ url('api/esporte') }}">
                            {{ csrf_field() }}

                            <div  class="form-group">
                            <label for="esporte" class="col-md-4 control-label">Esporte</label>
                                <div class="col-md-6">
                                <select size="5" multiple class="form-control" id="listaEsporte" style="font-size: 18px;">                      
                                </select>
                                <hr>
                                </div>
                            </div>
                                
                            <div  class="form-group">
                                <label for="name" class="col-md-4 control-label">Nome do esporte</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"> 
                                </div>                                                    
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" id="btnCreate">
                                        <i class="fa fa-btn fa-user"></i> Criar
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-edit" id="btnUpdate" style="display:none">
                                        <i class="fa fa-btn fa-user"></i> Salvar
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-edit" id="btnRemove" style="display:none">
                                        <i class="fa fa-btn fa-user"></i> Deletar
                                    </button>
                                </div>
                            </div>
                        </form>

                    <HR>
                    <HR>
                    <div class="row" style="margin-top:10%;">
                      <div  class="col-md-5 ">
                        <center><label>Administrador</label></center>
                          <select multiple class="form-control" style="font-size: 18px;">
                            
                          </select>
                      </div>
                      <div class="col-md-2 " >
                        <button type="" style="margin-top:30px;" class="btn btn-success">Adicionar Cap</button>
                        <button type=""  class="btn btn-default">Remover Cap</button> 
                      </div>
                      <div class="col-md-5 ">
                          <center><label>Capitão</label></center>
                          <select multiple class="form-control" style="font-size: 18px;">
                            
                          </select>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<script>
$( document ).ready(function(){
    var actionUrl = $("form").attr('action');
    var getNewData = function(){
        $("#listaEsporte").children().remove();
        $.get('http://localhost:7090/blog/public/api/esporte', function(data){
            var listaEsporte = $("#listaEsporte");
            data.forEach(esporte => {
                var option = "<option value='"+ esporte.id +"'>" + esporte.name + "</option>";
                listaEsporte.append(option);
            })
        });
    };
    getNewData();
    $("#listaEsporte").change(function(ev){
        var selected = $(ev.target).find("option:selected");
        $("#name").attr('value', selected.text());
        $("form").attr('action', actionUrl + "/" + selected.val());
        $("button").css("display", "");
    });

    $("#btnCreate").click(function(e){
        e.preventDefault();
        $.ajax({
            url: actionUrl,
            type:'post',
            data:$('form').serialize(),
            success:function(){
               // getNewData();
                location.reload();
            }
        });
    });

    $("#btnUpdate").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $("form").attr('action'),
            type:'put',
            data:$('form').serialize(),
            success:function(){
                //getNewData();
                location.reload();
            }
        });
    });

    $("#btnRemove").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $("form").attr('action'),
            type:'delete',
            success:function(){
                $("#name").attr('value', "");
                getNewData();
            }
        });
    });


    var getAdminNewData = function(){
        $("#listaAdministrador").children().remove();
        $.get('http://localhost:7090/blog/public/api/administrador', function(data){
            var listaAdministrador = $("#listaAdministrador");
            administradores = data;
            data.forEach(administrador => {
                var option = "<option value='"+ administrador.id +"'>" + administrador.aluno.fullName + "</option>";
                listaAdministrador.append(option);
            })
        });
    };
}); 
</script>
@endsection
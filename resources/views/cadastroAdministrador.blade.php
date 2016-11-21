@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Painel de administradores</div>
                <div class="panel-body">
                    <div class="row">
                    <form class="form-horizontal" role="form" method="PUT" action="{{ url('api/administrador') }}">
                      <div  class="col-md-5 ">
                        <center><label>Alunos</label></center>

                          <select size="5" multiple id="listaAlunos" class="form-control" name="alunoId" style="font-size: 18px;">
                            
                          </select>
                      </div>
                      <div class="col-md-2 " >
                        <button type="" style="margin-top:30px;" id='addAdmin'class="btn btn-success">Adicionar --></button>
                        <button type="" id='removeAdmin' class="btn btn-default"><-- Remover</button> 
                      </div>
                      <div class="col-md-5 ">
                          <center><label>Administradores</label></center>
                          <select size="5" multiple name="administradorId" id="listaAdministrador" class="form-control" style="font-size: 18px;">
                            
                          </select>
                      </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
<script>
$( document ).ready(function(){
    var administradores;
    var alunos;
    var actionUrl = $("form").attr('action');
    var getStudentNewData = function(){
        $("#listaAlunos").children().remove();
        $.get('http://localhost:7090/blog/public/api/aluno', function(data){
            alunos = data;
            var listaAlunos = $("#listaAlunos");
            data.forEach(aluno => {
                var option = "<option value='"+ aluno.id +"'>" + aluno.fullName + "</option>";
                listaAlunos.append(option);
            })
        });
    };
    getStudentNewData();

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
    getAdminNewData();
    $("#listaCurso").change(function(ev){
        var selected = $(ev.target).find("option:selected");
        $("#name").attr('value', selected.text());
        $("form").attr('action', actionUrl + "/" + selected.val());

        $("button").css("display", "");
    });

    $("#addAdmin").click(function(e){
        e.preventDefault(); 
        $.ajax({
            url: actionUrl,
            type:'post',
            data: $('form').serialize(),
            success:function(){
                getAdminNewData();
            },
        });
    });

    $("#btnUpdate").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $("form").attr('action'),
            type:'put',
            data:$('form').serialize(),
            success:function(){
                getNewData();
            }
        });
    });

    $("#removeAdmin").click(function(e){
        e.preventDefault();
        var selectedAdmin = $("#listaAdministrador").find("option:selected");
        if(selectedAdmin.length != 0){
        $.ajax({
            url: $("form").attr('action') + "/" + selectedAdmin[0].value,
            type:'delete',
            success:function(){
                getAdminNewData();
            }
        });
        }
    });
}); 
</script>
    

@endsection
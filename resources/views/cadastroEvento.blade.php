@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Evento</div>
                <div class="panel-body">
                   <div  class="form-group">
                            <label for="evento" class="col-md-4 control-label">Evento</label>
                                <div class="col-md-6">
                                <select size="5" multiple class="form-control" id="listaEvento" style="font-size: 18px;"> 
                                                    
                                </select>
                                <hr>
                                </div>
                            </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/api/evento') }}">
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="data" class="col-md-4 control-label">Data</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" id="data">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="duracao" class="col-md-4 control-label">Duração</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" id="duracao" placeholder="Minutos">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="local" class="col-md-4 control-label">Local</label>

                            <div class="col-md-6">
                                <input id="local" type="text" class="form-control" name="local">
                            </div>
                            
                                <input TYPE="hidden" id="administradorId" type="text" class="form-control" >
                            
                             
                                <input TYPE="hidden" id="atleticaId" value="1" type="text" class="form-control" >
                            
                        </div>                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Informações</label>
                            <div class="col-md-6">
                                <textarea id="informacoes" type="text" class="form-control"></textarea>
                         </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" id="btnCreate">
                                        <i class="fa fa-btn "></i> Criar
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-edit" id="btnUpdate" style="display:none">
                                        <i class="fa fa-btn "></i> Salvar
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-edit" id="btnRemove" style="display:none">
                                        <i class="fa fa-btn "></i> Deletar
                                    </button>
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
    var actionUrl = $("form").attr('action');
    var getNewData = function(){
        $.get('http://localhost:7090/blog/public/api/evento', function(data){
            var listaEvento = $("#listaEvento");
            data.forEach(evento => {
                var option = "<option value='"+ evento.id +"' administradorId='"+ evento.administradorId +"' atleticaId='1'  eventoData='"+ evento.data +"' eventoDuracao ='"+ evento.duracao +"' eventoLocal='"+ evento.local +"'  eventoInformacoes ='"+ evento.informacoes +"'  >" + evento.name + "</option>";
                listaEvento.append(option);
            })
        });
        
    };

    

    getNewData();
    $("#listaEvento").change(function(ev){
        var selected = $(ev.target).find("option:selected");
        $("#name").attr('value', selected.text());
        $("#data").attr('value', selected.attr("eventoData"));
        $("#data").attr('value', $("#data").attr('value'));
        $("#duracao").attr('value', selected.attr("eventoDuracao"));
        $("#local").attr('value', selected.attr("eventoLocal"));
        $("#administradorId").attr('value', selected.attr("administradorId"));
        $("#informacoes").text(selected.attr("eventoInformacoes"));
        
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
                getNewData();
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
    var novaData = function(date){
        var d=new Date(date.split("/").reverse().join("-"));
        var dd=d.getDate();
        var mm= d.getMonth();
        var yy=d.getFullYear();
        var str = mm + 1;
        var pad = "000";
        if(str<10){
        var ans = pad.substring(1, pad.length - str.length) + str;
            }
        else{
            var ans = pad.substring(0, pad.length - str.length) + str;
        }    
        var newdate=yy+"-"+ans+"-"+dd;
        return newdate;
    };

}); 
</script>                                        

@endsection

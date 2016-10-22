@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cursos</div>
                <div class="panel-body">
                    <div class="row">
                    <div  class="col-md-6 ">
                    <select multiple class="form-control" id="listaCurso" style="font-size: 18px;">
                      
                    </select>
                    </div>
                    <div class="col-md-12 ">
                    <form class="form-horizontal" role="form" method="PUT" action="{{ url('api/curso') }}">
                        {{ csrf_field() }}

                        <div  class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-12 control-label">Nome do curso</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
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
        $("#listaCurso").children().remove();
        $.get('http://localhost:7090/blog/public/api/curso', function(data){
            var listaCurso = $("#listaCurso");
            data.forEach(curso => {
                var option = "<option value='"+ curso.id +"'>" + curso.name + "</option>";
                listaCurso.append(option);
            })
        });
    };
    getNewData();
    $("#listaCurso").change(function(ev){
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
                getNewData();
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
}); 
</script>
@endsection
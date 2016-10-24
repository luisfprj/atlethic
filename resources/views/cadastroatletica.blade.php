@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nome da atlética</div>
                <div class="panel-body">                    
                    
                      <form class="form-horizontal" role="form" method="POST" action="{{url('/atletica')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="imagem" class="col-md-4 control-label">Imagem</label>
                            <div class="col-md-6">
                                <img src="" id="imagem" width="150px" class="img-rounded"> </img>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="logo" class="col-md-4 control-label">Alterar Imagem</label>

                            <div class="col-md-6">
                                <input type="file" id="logo" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descricao" class="col-md-4 control-label">Descricao</label>

                            <div class="col-md-6">
                                <textarea rows="7" type="text" class="form-control" id="descricao" form="usrform"></textarea>  
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="administrador" class="col-md-4 control-label">Presidente</label>

                            <div class="col-md-6">
                                <input id="administrador" type="text" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn"></i> Salvar
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
    var getNewData = function(){
        $.get('http://localhost:7090/blog/public/api/atletica', function(data){                      
            data.forEach(atletica => {                
                $("#name").val(atletica.name);
                //$("#imagem").val(atletica.logo);
                //var image = document.createElement('image');
               $("#imagem").attr({src:"data:image/jpeg;base64,"+atletica.logo});
               //document.body.appendChild(image);
                $("#descricao").val(atletica.descricao);
                $("#administrador").val(atletica.aluno.fullName);
            })          
        });
    };
    getNewData();
});
</script>
@endsection
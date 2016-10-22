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
                                <input id="name" type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="logo" class="col-md-4 control-label">Imagem</label>

                            <div class="col-md-6">
                                <input type="file" id="logo" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descricao" class="col-md-4 control-label">Descricao</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="descricao" form="usrform"></textarea>  
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
                                    <i class="fa fa-btn"></i> Enviar
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
$.get('http://localhost:7090/blog/public/api/curso', function(data){
    console.log(data);
});
</script>
@endsection
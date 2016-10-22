@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nome da atlética</div>
                <div class="panel-body">                    
                    
                      <form class="form-horizontal" role="form" method="PUT" action="{{ url('/atletica') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

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
                            <label for="logo" class="col-md-4 control-label">Imagem</label>

                            <div class="col-md-6">
                                <input type="file" id="logo" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="informacoes" class="col-md-4 control-label">Informações</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="informacoes" form="usrform"></textarea>  
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
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Novo Evento / Nome Evento</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
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
                            <label for="datepicker" class="col-md-4 control-label">Data</label>

                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" id="datepicker">

                                @if ($errors->has('datepicker'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datepicker') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="duracao" class="col-md-4 control-label">Duração</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" id="datepicker" placeholder="Minutos">

                                @if ($errors->has('datepicker'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datepicker') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('local') ? ' has-error' : '' }}">
                            <label for="local" class="col-md-4 control-label">Local</label>

                            <div class="col-md-6">
                                <input id="local" type="text" class="form-control" name="local">

                                @if ($errors->has('local'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('local') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('informacoes_confirmation') ? ' has-error' : '' }}">
                            <label for="informacoes-confirm" class="col-md-4 control-label">Informações</label>

                            <div class="col-md-6">
                                <textarea id="informacoes-confirm" type="text" class="form-control" name="informacoes_confirmation"></textarea>

                                @if ($errors->has('informacoes_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('informacoes_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn"></i> Criar Evento
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

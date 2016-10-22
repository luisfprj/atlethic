@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Esporte</div>
                <div class="panel-body">
                    <div class="row">
                    <div  class="col-md-6 ">
                    <center><label>Esporte</label></center>
                    <select multiple class="form-control" size="6" style="font-size: 18px;">                      
                      <option id="box">Futsal</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                    </div>
                    <div class="col-md-6 " style="margin-top:30px;">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('api/curso') }}">
                        {{ csrf_field() }}

                        <div  class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
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
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn"></i> Editar
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                    <HR>
                    <div class="row" style="margin-top:10%;">
                      <div  class="col-md-5 ">
                        <center><label>Administrador</label></center>
                          <select multiple class="form-control" style="font-size: 18px;">
                            <option id="box">Luis Felipe</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                      </div>
                      <div class="col-md-2 " >
                        <button type="" style="margin-top:30px;" class="btn btn-success">Adicionar --></button>
                        <button type=""  class="btn btn-default"><-- Remover</button> 
                      </div>
                      <div class="col-md-5 ">
                          <center><label>Capitão</label></center>
                          <select multiple class="form-control" style="font-size: 18px;">
                            <option id="box">Victor</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
            <script> 


  // Estrutura de resultado.
            $.getJSON('api/curso', function(data){
            this.qtd = data.length;
            this.retorno = '';
 
            for (i = 0; i < this.qtd; i++){
                this.retorno += 'id: ' + data.usuarios[i].id + '<br />';
                this.retorno += 'name: ' + data.usuarios[i].name + ' - ';
                
            }
 
            alert(this.retorno);
            });





              /*$.getJSON( "api/curso", function( data ) {
                var items = [];
                alert (JSON.stringify(items));
               $.each( data, function( id, name, created_at, updated_at  ) {
                 items.push( "<li id='" + id + "'>" + name + "</li>" );
               });

                $( "<ul/>", {
                  "class": "my-new-list",
                  html: items.join( "" )
                }).appendTo( "body" );
              });*/
            </script>
@endsection
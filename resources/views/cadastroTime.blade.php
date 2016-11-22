
@extends('layouts.app')

@section('content')
<?php $timeId = $_GET['timeId'];?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="timeId" timeId="<?php echo($timeId);?>">
                  <label id="nameTopo"></label>
                </div>
                  <div class="panel-body"> 
                    
                    <table class="table table-bordered table-hover text-center" id="listaJogadores">
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
                        </tbody>
                  </table>
                    @if (Auth::check())
                      <div class="form-group">
                         <button type="submit" class="btn btn-primary" id="btnInscrever">
                              <i class="fa fa-btn "></i> Inscrever-se
                          </button>
                        </div>
                    @else
                        <div class="form-group">
                        <a href="{{ url('/login') }}" class="button">
                         <button type="submit" class="btn btn-primary" id="btnLogin">
                              <i class="fa fa-btn "></i> inscrever-se2
                          </button>
                          </a>
                        </div>
                    @endif
                 <hr>
                 @if (Auth::id() == '1') 
                  <form class="form-horizontal" role="form" method="POST" action="#">
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
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <img src="" id="imagem" width="150px" class="img-rounded"> </img>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="logo" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input type="file" id="logo" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status</label>
                              <div class="col-md-6">                                
                                  <select id="status">
                                    
                                  </select>                              
                              </div>
                        </div>
                            
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" id="btnUpdate" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                   @endif
                   <div style="visibility:hidden" value='{{Auth::id()}}' id="idd" ></div>
            </div>
          </div>
        </div>
      </div>
    </div>
<script>
    $( document ).ready(function(){
    var userId = $("#idd").attr("value");
    var jogadores;
    var data;
    var binaryString;
    var timeId;
    var getStudentNewData = function(){
        $("#listaJogadores").children().children().children().remove();
        timeId = $("#timeId").attr("timeid");
        $.get('http://localhost:7090/blog/public/api/time/'+timeId, function(data){            
            var cont = 1;
            var listaJogador = $("#listaJogadores tr:last");
            data[0].time.name
            $("#name").val(data[0].time.name);
            $("#nameTopo").text(data[0].time.name);
            $("#imagem").attr({src:"data:image/jpeg;base64,"+data[0].time.logo});
            if(data[0].time.ativo){
            var option2 = "<option value='1'> Ativo </option> <option value='0'> Desativo </option>";
            }else{
                option2 = "<option value='0'> Desativo </option> <option value='1'> Ativo </option>";
            }
            $("#status").append(option2);
            binaryString =  atob(data[0].time.logo);

            data.forEach(jogador => { 
                var jogando = 'Jogando';
                if(jogador.jogando){}else{jogando='Reserva'};               
                var option = "'<tr>  <td>"+ cont +"</td> <td>"+ jogador.aluno.fullName +"</td> <td>" + jogador.aluno.turno + "</td> <td> " + jogando +"</td>  </tr>'";
                listaJogador.after(option);
                cont++;
            })
        });
    };

    $("#btnInscrever").click(function(e){        
        e.preventDefault();        
        $.ajax({
            url: 'http://localhost:7090/blog/public/api/inscricao',
            type:'POST',
            data:{alunoId: userId.toString(), timeId: timeId.toString()},
            success:function(){
                 alert("inscrição enviada");
            }
        });

    });


    getStudentNewData();    
    
    var handleFileSelect = function(evt) {
    var files = evt.target.files;
    var file = files[0];

    if (files && file) {
        var reader = new FileReader();
        reader.onload = function(readerEvt) {
            binaryString = readerEvt.target.result;
        };
            reader.readAsBinaryString(file);
        }
    };
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        document.getElementById('logo').addEventListener('change', handleFileSelect, false);
    } else {
        alert('The File APIs are not fully supported in this browser.');
    }   
    $("#btnUpdate").click(function(e){
        e.preventDefault();
        $.ajax({
            url: 'http://localhost:7090/blog/public/api/time/'+timeId,
            type:'put',
            data:{name: $("#name").val(), logo: btoa(binaryString), ativo: $("#status").val()},
            success:function(){
                 getStudentNewData();
            }
        });

    });



    


}); 
</script>

  @endsection
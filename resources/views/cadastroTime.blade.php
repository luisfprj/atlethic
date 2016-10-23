
@extends('layouts.app')

@section('content')
<?php $timeId = $_GET['timeId']; ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="timeId" timeId="<?php echo($timeId);  ?>">Nome do Time</div>
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
                  <button type="submit" class="btn btn-success">Inscrever-se</button>   
            </div>
          </div>
        </div>
      </div>
    </div>

<script>
    $( document ).ready(function(){
    var jogadores;
    var getStudentNewData = function(){
        var timeId = $("#timeId").attr("timeid");
        $.get('http://localhost:7090/blog/public/api/time/'+ timeId, function(data){
            jogadores = data;            
            var cont = 1;
            var listaJogador = $("#listaJogadores tr:last");
            data.forEach(jogador => {                
                var option = "'<tr>  <td>"+ cont +"</td> <td>"+ jogador.aluno.fullName +"</td> <td>" + jogador.aluno.turno + "</td> <td> " + jogador.jogando +"</td>  </tr>'";
                listaJogador.after(option);
                cont++;
            })
        });
    };
    getStudentNewData();    
}); 
</script>

  @endsection
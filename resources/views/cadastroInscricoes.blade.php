@extends('layouts.app')

@section('content')
<div class="row" style="width:100%">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Atlética</div>
                <div class="panel-body"> 

					  <table  id="listaInscricoes" class="table table-striped">
					    <thead>
					      <tr>
					        <th></th>
					        <th>Nome</th>
					        <th>Time</th>
					        <th>Email</th>
					        <th>Curso</th>
					        <th>Matrícula</th>
					        <th>Status</th>
					        <th width="5%"></th>
					        <th width="5%"></th>
					      </tr>
					    </thead>
					    <tbody>

					    </tbody>
					  </table>
					</div>
				</div>
			</div>
		</div>
	

	<script>


$( document ).ready(function(){
    var actionUrl = 'http://localhost:7090/blog/public/api/inscricao';
    var getNewData = function(){
        $("#listaInscricoes").children().children().children().remove();
            $.get(actionUrl, function(data){
        	var cont = 1;
            var listaJogador = $("#listaInscricoes tr:last");
            data.forEach(inscricao => {
                if(inscricao.status=="Aguardando"){
                var option = "'<tr>  <td>"+ cont +"</td> <td>"+ inscricao.aluno.fullName +"</td> <td> <a href='cadastrotime?timeId="+inscricao.timeId+"'/a>"+ inscricao.time+ "</td> <td> " + inscricao.aluno.email +"</td> <td> " + inscricao.curso +"</td> <td> " + inscricao.aluno.matricula +"</td> <td> " + inscricao.status +"</td> <td><button type='submit' class='btn btn-success' inscricaoId="+inscricao.id+" alunoId="+inscricao.alunoId+" timeId="+inscricao.timeId+" id='btnAceita'> Aprovar </button></td><td> <button type='submit'  class='btn' inscricaoId="+inscricao.id+" id='btnReprova'> Recusar </button></td> </tr>'";
                listaJogador.after(option);
                cont++;
            };
            })
        });
    };
    getNewData();

    $("#listaInscricoes").on("click", "#btnAceita", function(){ 
        if (confirm('Você tem certeza que deseja Aprovar?')){
        var idInscricao = $(this).attr("inscricaoId");
        var idTime = $(this).attr("timeId");
        var idAluno = $(this).attr("alunoId");
        $.ajax({
            url: 'http://localhost:7090/blog/public/api/jogador',
            type:'post',
            data:{timeId: idTime, alunoId: idAluno, jogando: 1},
            success:function(){
                $.ajax({
                url: 'http://localhost:7090/blog/public/api/inscricao/'+idInscricao,
                type:'put',
                data:{status:'Aprovado'},
                success:function(){
                getNewData();
            }
        });
            }
        });
        
        };
    });


  $("#listaInscricoes").on("click", "#btnReprova", function(){        
        if (confirm('Você tem certeza que deseja Reprovar?')){
        var idInscricao = $(this).attr("inscricaoId");
        $.ajax({
            url: 'http://localhost:7090/blog/public/api/inscricao/'+idInscricao,
            type:'put',
            data:{status:'Negado'},
            success:function(){
                getNewData();
                }
            });
        };
    }); 
});
</script>

@endsection
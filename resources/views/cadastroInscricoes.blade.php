@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nome da atlética</div>
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
	</div>

	<script>


$( document ).ready(function(){
    var actionUrl = 'http://localhost:7090/blog/public/api/inscricao';
    var getNewData = function(){
        //$("#listaInscricoes").children().remove();
            $.get(actionUrl, function(data){
        	var cont = 1;
            var listaJogador = $("#listaInscricoes tr:last");
            data.forEach(inscricao => {
                var option = "'<tr nome='hugo'>  <td>"+ cont +"</td> <td>"+ inscricao.aluno.fullName +"</td> <td> <a href='cadastrotime?timeId="+inscricao.timeId+"'/a>"+ inscricao.time+ "</td> <td> " + inscricao.aluno.email +"</td> <td> " + inscricao.curso +"</td> <td> " + inscricao.aluno.matricula +"</td> <td> " + inscricao.status +"</td> <td><button type='submit' onclick ='alert()' class='btn btn-success' inscricaoId="+inscricao.id+" alunoId="+inscricao.alunoId+" timeId="+inscricao.timeId+" id='btnAceita'><i class='fa fa-btn'></i> Aceitar </button></td><td> <button type='submit'  class='btn btn-danger' inscricaoId="+inscricao.id+" id='btnReprova'><i class='fa fa-btn'></i> Recusar </button></td> </tr>'";
                listaJogador.after(option);
                cont++;
            })
        });
    };
    getNewData();

    $("#btnAceita").click(function(e){
        e.preventDefault();
        var idInscricao = $this.attr("inscricaoId");
        var idTime = $this.attr("timeId");
        var idAluno = $this.attr("alunoId");
        $.ajax({
            url: 'http://localhost:7090/blog/public/api/jogador',
            type:'post',
            data:{timeId: idTime, alunoId: idAluno},
            success:function(){
                getNewData();
            }
        });
        $.ajax({
        	url: 'http://localhost:7090/blog/public/api/inscricao/'+idInscricao,
            type:'put',
            data:{status:'Aprovado'},
                success:function(){
                getNewData();
            }
        });
    });
  $("#btnReprova").click(function(e){
        e.preventDefault();
        var idInscricao = $("#btnReprova").attr("inscricaoId");
        alert("aaa");
        $.ajax({
            url: 'http://localhost:7090/blog/public/api/inscricao/'+idInscricao,
            type:'put',
            data:{status:'Aprovado'},
            success:function(){
                //$("#name").attr('value', "");
                //getNewData();
                location.reload();
            }
        });
    });
});
</script>

@endsection
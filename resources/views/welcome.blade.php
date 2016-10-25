@extends('layouts.app')

@section('content')
    <div class="jumbotron">
          <div class="container">
            <div class="row">
                <div class="col-md-2" style="padding:20px">
                  <img id="atleticaLogo"  alt="200px" class="img-thumbnail">
                </div>
               
                <div class="col-md-10">
                    <h1>Bem vindo!</h1>
                    <p><b>Participe dos eventos junto com a Associação Atlética da Computação UVA Tijuca. Cadastre-se num time para jogar e divertir-se conosco. Venha!</b>  </p> 
                    <div class="row">
                
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

     <div class="row">
        <div class="col-md-4">


        <div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="thumbnail">
      <img id="time1"   alt="200px">
      <div class="caption">
        <label id="nameTopo1">Futsal Dextemidos</label>
        <p style="text-align:justify;">Você que é amante de futebol, curte jogar e representar o seu curso em campeonatos internos e externos, não perca seu tempo, venha fazer parte do nosso time de futsal, as vagas estão abertas! 
No momento, só temos time masculino, porém as meninas que quiserem participar inscreva-se no time!</p>
        <p><a href="cadastrotime?timeId=1" class="btn btn-primary" role="button">Inscrever-se</a></p>
      </div>
    </div>
  </div>
</div>
          
        </div>
             <div class="col-md-4">


        <div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="thumbnail">
      <img id="time2" alt="200px">
      <div class="caption">
        <label id="nameTopo2"></label>
        <p style="text-align:justify;">Você que é amante de futebol, curte jogar e representar o seu curso em campeonatos internos e externos, não perca seu tempo, venha fazer parte do nosso time de futsal, as vagas estão abertas! 
No momento, só temos time masculino, porém as meninas que quiserem participar inscreva-se no time!</p>
        <p><a href="cadastrotime?timeId=2" class="btn btn-primary" role="button">Inscrever-se</a></p>
      </div>
    </div>
  </div>
</div>
          
        </div>
             <div class="col-md-4">


        <div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="thumbnail">
      <img id="time3" alt="200px">
      <div class="caption">
        <label id="nameTopo3"></label>
        <p style="text-align:justify;">Você que é amante de futebol, curte jogar e representar o seu curso em campeonatos internos e externos, não perca seu tempo, venha fazer parte do nosso time de futsal, as vagas estão abertas! 
No momento, só temos time masculino, porém as meninas que quiserem participar inscreva-se no time!</p>
        <p><a href="cadastrotime?timeId=3" class="btn btn-primary" role="button">Inscrever-se</a></p>
      </div>
    </div>
  </div>
</div>
          
        </div>
      </div>
    
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">


        <div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="thumbnail">
      <img alt="200px">
      <div class="caption">
        <label id="nameTopo4">Futsal Dextemidos</label>
        <p style="text-align:justify;">Você que é amante de futebol, curte jogar e representar o seu curso em campeonatos internos e externos, não perca seu tempo, venha fazer parte do nosso time de futsal, as vagas estão abertas! 
No momento, só temos time masculino, porém as meninas que quiserem participar inscreva-se no time!</p>
        <p><a href="#" class="btn btn-primary" role="button">Cadastre-se</a></p>
      </div>
    </div>
  </div>
</div>
          
        </div>
             <div class="col-md-4">


        <div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="thumbnail">
      <img src="">
      <div class="caption">
        <h3>Futsal Dextemidos</h3>
        <p style="text-align:justify;">Você que é amante de futebol, curte jogar e representar o seu curso em campeonatos internos e externos, não perca seu tempo, venha fazer parte do nosso time de futsal, as vagas estão abertas! 
No momento, só temos time masculino, porém as meninas que quiserem participar inscreva-se no time!</p>
        <p><a href="#" class="btn btn-primary" role="button">Cadastre-se</a></p>
      </div>
    </div>
  </div>
</div>
          
        </div>
             <div class="col-md-4">


        <div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="thumbnail">
      <img src="">
      <div class="caption">
        <h3>Futsal Dextemidos</h3>
        <p style="text-align:justify;">Você que é amante de futebol, curte jogar e representar o seu curso em campeonatos internos e externos, não perca seu tempo, venha fazer parte do nosso time de futsal, as vagas estão abertas! 
No momento, só temos time masculino, porém as meninas que quiserem participar inscreva-se no time!</p>
        <p><a href="#" class="btn btn-primary" role="button">Cadastre-se</a></p>
      </div>
    </div>
  </div>
</div>
  </div>
    </div>

      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div>
</div>

<script>
$( document ).ready(function(){
    var data;
    var data2;
    var cont=1;
    var getNewData = function(){
        $.get('http://localhost:7090/blog/public/api/time', function(data){                      
            data.forEach(time => {                
                $("#time"+cont).attr({src:"data:image/jpeg;base64,"+time.logo});                 
                $("#nameTopo"+cont).text(time.name);
                cont++;
            })          
        });
        $.get('http://localhost:7090/blog/public/api/atletica', function(data2){                      
            data2.forEach(atletica => {                
                $("#atleticaLogo").attr({src:"data:image/jpeg;base64,"+atletica.logo});                 
                $("#nameAtletica").text(atletica.name);
            })          
        });
    };
    getNewData();
     });
</script>
@endsection

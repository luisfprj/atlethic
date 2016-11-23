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
  
    
      <!-- Example row of columns -->
  <div class="row" id="divPrincipal">
        
  </div>

 <hr>
  <center>
    <footer>
      <p>&copy; 2016 Company, Inc.</p>
    </footer>
  </center>


<script>
$( document ).ready(function(){
    var data;
    var data2;
    var getNewData = function(){
        $.get('http://localhost:7090/blog/public/api/time', function(data){                      
            data.forEach(time => {
              if(time.ativo){                    
                var timeOption ="<div class='col-md-4'> <div class='row'><div class='col-sm-12 col-md-12'><div class='thumbnail'> <img alt='200px' src='data:image/jpeg;base64,"+time.logo+"'> <div class='caption'> <label>"+time.name+"</label><p style='text-align:justify;'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies, sapien non aliquam gravida, justo libero tristique orci, quis lobortis urna libero vitae orci. Duis egestas, felis ut fermentum tincidunt, magna lacus lacinia eros, ut faucibus nisi mi nec lectus.</p> <p><a href='cadastrotime?timeId="+time.id+"' class='btn btn-primary' role='button'>Visualizar</a></p></div></div></div></div></div>"
              }
                $("#divPrincipal").append(timeOption);         
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

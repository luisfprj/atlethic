<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../vendor/twbs/bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../vendor/twbs/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/blog/public/">Computação</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Aluno</h1>
         <div class="col-md-3">      
        <p><a class="btn btn-primary btn-lg" href="/blog/public/cadastroaluno" role="button">Cadastro Aluno &raquo;</a></p>
        </div>
        <div class="col-md-3">  
        <p><a class="btn btn-primary btn-lg" href="/blog/public/cadastroatletica" role="button">Cadastro Atletica &raquo;</a></p>
        </div>
        <div class="col-md-3">  
        <p><a class="btn btn-primary btn-lg" href="/blog/public/cadastrocurso" role="button">Cadastro Curso &raquo;</a></p>     
        </div>   
        <div class="col-md-3">  
        <p><a class="btn btn-primary btn-lg" href="/blog/public/cadastrojogador" role="button">Cadastro Jogador &raquo;</a></p>     
        </div> 
      </div>
    </div>  

    <div class="container">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8"><form role="form" method="get" action="#">
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-8">
            <div class="form-group">
              <label for="fullName">Nome completo</label>
              <input type="email" class="form-control" id="fullName" placeholder="Nome completo" />
            </div>
          </div>        
          <div class="col-md-4 col-sm-4">
            <div class="form-group">
              <label for="matricula">Matrícula</label>
              <input type="double" class="form-control" id="matricula" placeholder="Matrícula" />
            </div>                        
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 col-sm-5">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" />
            </div>
          </div>
            <div class="col-md-2 col-sm-3">
              <div class="form-group">
                <label for="turno">Turno</label>
                <br>
                <select class="form-control">
                <option>Manhã</option>
                <option>Tarde</option>
                <option>Noite</option>
              </select>
              </div>
            </div>                
          <div class="col-md-3 col-sm-4">
            <div class="form-group">
              <label for="curso">Curso</label>
              <select class="form-control">
              <option>Ciência Computação</option>
              <option>Engenharia</option>
              <option>Medicina</option>
              </select>
            </div>
          </div>
        </div>  
        <div class="row">          
          <div class="col-md-2 col-sm-2 col-xs-3">
            <button href="/blog/public/cadastroaluno" class="btn btn-default">Cancelar</button>
          </div>   
          <div class="col-md-2 col-sm-2 col-xs-3">
            <button type="submit" class="btn btn-success">Enviar</button>            
          </div>
        </div>
      </form>
      </div>
      <div class="col-md-2"></div>
      </div>
      
    </div>    



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../vendor/twbs/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


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
        <h1>Curso</h1>
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
      <form role="form" method="get" action="#">
        <div class="form-group">
          <label for="Name">Nome</label>
          <input type="string" class="form-control" id="Name" placeholder="Nome do curso" />
          </div>       
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>    
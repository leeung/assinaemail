<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="view/css/bootstrap.min.css" rel="stylesheet">
      <link href="view/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
     <?php 
     	if (isset($_SESSION['MSG'])) var_dump($_SESSION['MSG']);
     	$mensagem = $_SESSION['MSG'];
     ?>

  </head>
  <body>
  	<div class="container-fluid">
  		<div class="row">
  			<h3 class='col-xs-12 text-center bg-<?=$mensagem['TIPO']?>'></h3>
  		</div>
        <div class="row">
            <div >
                <img class="col-md-2 col-md-offset-5" src="view/img/logocf2.png">
            </div>
            <div class="col-md-2 col-md-offset-5">
                <form class="form" method="POST" action="index.php?entidade=usuario&acao=logar">
                    <div class="form-group">
                        <label class="sr-only" for="usuario">Usuário</label>
                        <input class="form-control" type="text" name="usuario" placeholder="Usuário">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="usuario">Senha</label>
                        <input class="form-control" type="password" name="senha" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="submit" value="Entrar" placeholder="Usuário">
                    </div>

                </form>
            </div>
          </div>
      
      </div>
      
      
          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="view/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="view/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="view/js/js.js"></script>
		
  </body>
</html>

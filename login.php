<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Atalos Corporation">
    <link rel="icon" href="imagens/logotop.jpg">

    <title>Top Entregas</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/navbarsResponsives/navbarResponsiveINDEX.css" rel="stylesheet">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->


    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
<script>
      function hover(element) {
  element.setAttribute('src', 'imagens/entrar.png');
}

function unhover(element) {
  element.setAttribute('src', 'imagens/entrar2.png');
}
</script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="background" >


	  <!--PRIMEIRA FORMA DE LOGIN \/- -->
    <div class="container">

      <form class="form-signin" method="POST" action="valida.php">
        <h2 style="font-family:segoe print;font-size:40px;" class="titulo">Top Entregas</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
<button type="submit" style="width:100%;" class="btn hover-style-2 ">Acessar</button>

<!-- <button type="submit" style="width:100%;margin-top:3%" class="btn hover-style-2">Relatórios</button> -->


      </form>

	  <!--SEGUNDA FORMA DE LOGIN \/-
		  <form class="form-signin" method="POST" action="valida.php">
			<div class="group">
			  <span class="highlight"></span>
				  <span class="bar"></span>
			    <input type="text" type="email" name="email" id="inputEmail"  required>
			  <label for="inputEmail" >Email</label>
			</div>

			<div class="group">
			  <span class="highlight"></span>
			  <span class="bar"></span>
			   <input type="password" name="senha" id="inputPassword"  required>
			  <label for="inputPassword">Senha</label>
			</div>
			  <button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
		  </form>
		</div>

<! -->

    <p class="text-center text-danger">
      <div class="text-center" style="background-color:white;width:100%;">
      <b style="font-size:20px; color:red;">
      <?php if(isset($_SESSION['loginErro3'])){
        echo $_SESSION['loginErro3'];
        unset($_SESSION['loginErro3']);
      }?>
    </b>
       </div>
    </p>

	  <p class="text-center text-danger">
      <div class="text-center" style="background-color:white;width:100%;">
      <b style="font-size:20px; color:red;">
			<?php if(isset($_SESSION['loginErro2'])){
				echo $_SESSION['loginErro2'];
				unset($_SESSION['loginErro2']);
			}?>
    </b>
       </div>
		</p>

        <p class="text-center text-danger">

      <?php if(isset($_SESSION['loginErro'])){
        echo $_SESSION['loginErro'];
        unset($_SESSION['loginErro']);
      }?>

    </p>

		<p class="text-center text-success">
			<?php 
			if(isset($_SESSION['logindeslogado'])){
				echo $_SESSION['logindeslogado'];
				unset($_SESSION['logindeslogado']);
			}
			?>
		</p>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

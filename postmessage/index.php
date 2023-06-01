<?php
 session_start();
    if  ($_SESSION['usuarioNiveisAcessoId'] == "3") {
        goto A;
}
if  ($_SESSION['usuarioNiveisAcessoId'] != "2") {
        header("Location: sair.php");
}
A:
    include_once("../conexao.php");
    $filterEmp = $_SESSION['usuarioEmpresa'];
?>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edege">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--  necessarios esses 2 pro drop funcionar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.2/b-print-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.js"></script>
<!-- -->
<!-- Begin emoji-picker Stylesheets -->
    <link href="css/emoji.css" rel="stylesheet">
        <title>Top Entregas</title>
<!-- DATABLE NOVA -->
</head>
<link href="../css/bootstrap.css" rel="stylesheet">
       <link href="../css/navbarsResponsives/navbarResponsivePEDIDOS.css" rel="stylesheet">
       <link href="../css/navbarsResponsives/navbarResponsive.css" rel="stylesheet">
<nav id = "navheight" class="navbar navbar-default navbar-fixed-top">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php    $filterEmp = $_SESSION['usuarioEmpresa']; ?>
        <a > <img
           <?php if ($filterEmp == 1) { ?> class="logoresponsive" src="../imagens/icon.jpg" <?php } ?>
              <?php if ($filterEmp == 2) { ?> class="logoresponsive2"  style="margin:3px;" src="../imagens/turbodog.png" <?php } ?>
             <?php if ($filterEmp == 5) { ?>  class="logoresponsive2" src="../imagens/logo.png" <?php } ?>></a>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
      <div align="center">
        <ul class="nav navbar-nav">
       <li><a class="txtresponsive" href="../home.php">Novidades <img  class="imgresponsive" src="../imagens/news.png" alt=""></a></li>
      <li><a class="txtresponsive" href="../pedidos.php">Pedidos <img class="imgresponsive" src="../imagens/pedido.png" alt=""></a></li>
                  <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle txtresponsive" href="#">Produtos <img class="imgresponsive" src="../imagens/produtos.png" alt=""> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                                       <li><a href="../produto.php">Lista de produtos</a></li>
                    <li><a href="../adicionais.php">Adicionais</a></li>
                </ul>
            </li>
      <li><a class="txtresponsive" href="../categorias.php">Categorias <img class="imgresponsive" src="../imagens/categoria.png" alt=""></a></li>
      <li><a class="txtresponsive" href="../precos.php">Fretes <img class="imgresponsive" src="../imagens/preco.png" alt=""></a></li>
  <!-- <li><a href="perfil.php">Perfil <img  src="imagens/admin.png" alt=""> </a> </li> -->
     <li><a class="txtresponsive" href="../ajuda.php">Suporte <img class="imgresponsive" src="../imagens/support.png" alt=""></a></li>
           <li class="dropdown">
       <li><a data-toggle="dropdown"  class="dropdown-toggle txtresponsive" href="../painel.php">Painel <img class="imgresponsive" src="../imagens/settings.png" alt=""> <b class="caret"></b></a>
        <ul class="dropdown-menu">
                <li><a  href="../painel.php">Configurações</a></li>
               <li><a href="../postmessage/index.php">Envio de Notificações</a></li>
          </ul>
              </li>
            </li>
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle txtresponsive" href="#">Relatórios <img class="imgresponsive" src="../imagens/dashboard.png" alt=""> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                                        <li><a href="../dashboard.php">Relatório Geral</a></li>
                    <li><a href="../dashboardCategoria.php">Relatório por Categoria</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li  class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle txtresponsive" href="#">Deslogar <b class="caret"></b></a>
  <ul class="dropdown-menu">
      <div align="center">Tem Certeza?
       <li><a href="../sair.php">Deslogar <img  class="imgresponsive" src="../imagens/logout.png" alt=""></a></li>
       </div>
                 <div align="center">Logado como:
                 <li><b><?php echo $_SESSION['usuarioNome'] ?> </b></li>
               </div>
              </ul>
                </li>
        </ul>
    </div>
     </div>
</nav>
 <body  >
  <!-- Kakakakakaka --> <!--  -->
 <div id="main" align="center" class="container-fluid" style="margin-top:50px;display:inline-block;">
    <div id="top" class="row" align="center">
        <div class="col-sm-3" align="center">

        </div>
      </div>
    </div>


 <div class="container" style="margin-top:90px;">

      <div class="row">

         <div class="col-md-12">
              <b style="font-size:17px;">  Nesta seção pode enviar uma notificação para todos os usuarios do seu aplicativo, atingindo ambas as plataformas (APPLE, ANDROID). </b> <p></p>
            <form action="api/send.php" method="POST">
 <label for="textMessage" style="font-size:17px;">Digite a notificação que deseja enviar: </label>

               <div class="form-group " style="margin-top:1%;">
                   <p class="lead emoji-picker-container">
              <textarea name="textMessage2" class="form-control textarea-control" rows="1" placeholder="Digite aqui o titulo da notificação. (OPCIONAL)" data-emojiable="true"></textarea>
            </p>
                             <p class="lead emoji-picker-container">
              <textarea name="textMessage" class="form-control textarea-control" rows="3" placeholder="Digite aqui a notificação, se quiser também utilize os emoticons, tenho certeza que irão adorar..." data-emojiable="true"></textarea>
            </p>
                  <br>
                  <div align="center">
                  <button class="btne2 hover-style-2 " style="font-weight:0px;font-size:19px;width:250px;"  onclick="return confirm('Tem certeza? esta ação é irreversivel.');" type="submit">Enviar</button>
                </div>
               </div>

            </form>
         </div>

      </div>

   </div>

   <!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->

    <!-- Begin emoji-picker JavaScript -->
    <script src="js/config.js"></script>
    <script src="js/util.js"></script>
    <script src="js/jquery.emojiarea.js"></script>
    <script src="js/emoji-picker.js"></script>
    <!-- End emoji-picker JavaScript -->

    <script>
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: 'img/',
          popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      });
    </script>
    <script>
      // Google Analytics
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-49610253-3', 'auto');
      ga('send', 'pageview');
    </script>

</body>
</html>




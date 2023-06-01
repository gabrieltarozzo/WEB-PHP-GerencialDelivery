<?php

    session_start();
    if  ($_SESSION['usuarioNiveisAcessoId'] == "3") {
        goto A;
}
if  ($_SESSION['usuarioNiveisAcessoId'] != "2") {
        header("Location: sair.php");
}

A:

    include_once("conexao.php");
    //Verificar se está sendo passado na URL a página atual, se não é atribuido à página 1.
   // $pagina = (isset ($_GET['pagina']))? $_GET['pagina'] : 1;
    //Selecionar todos os categorias da tabela
    $filterEmp = $_SESSION['usuarioEmpresa'];
   // $result_pedidos = "SELECT * FROM pedidos where empresa = '$filterEmp' AND DATE(created) = CURDATE()  order by id desc";
    //$resultado_pedidos = mysqli_query($conn, $result_pedidos);
    //Contar o total de categorias
   // $total_pedidos = mysqli_num_rows($resultado_pedidos);
    //Seta a quantidade de categorias por página
   // $quantidade_pg = 9999999;
    //Calcular o nº de paginas necessárias para apresentar os categorias
   // $num_pagina = ceil($total_pedidos/$quantidade_pg);
    //Calcular o inicio da visualização
   // $inicio = ($quantidade_pg * $pagina) - $quantidade_pg;
    //Selecionar os categorias a serem apresentados na página
    $result_pedidos = "SELECT * FROM pedidos where empresa = '$filterEmp' AND DATE(created) = CURDATE()  order by id desc";
    $resultado_pedidos = mysqli_query($conn, $result_pedidos);
    $total_pedidos = mysqli_num_rows($resultado_pedidos);

if ($filterEmp == 2) {
  $result_c = "SELECT * FROM horarios where empresa = $filterEmp";
  $resultado_c = mysqli_query($conn, $result_c);
  $total_c = mysqli_num_rows($resultado_c);

  $rows_c = mysqli_fetch_assoc($resultado_c);

  $ini = $rows_c['HorInicio']; //dar um jeito de vir em 08:00 por exemplo
  $fim = $rows_c['HorFim']; //dar um jeito de vir em 08:00 por exemplo

    $controle = $rows_c['controle']; //se for 0 online, 1 offline


date_default_timezone_set('America/Sao_Paulo');
$date = date('w Y-m-d H:i');

     if(date('H:i') >= $ini AND date('H:i') <= $fim){
      $modif = "UPDATE categoria_produtos SET situacao_id = 1 where id = 125";
      $modif = mysqli_query($conn, $modif);
  echo true;
  }

  else {
          $modif = "UPDATE categoria_produtos SET situacao_id = 2 where id = 125";
      $modif = mysqli_query($conn, $modif);
  echo 0;
}
}

?>
<br>

<!DOCTYPE html>
<html lang="pt-br" id="links" >

<!-- TENTATIVA DE LOADING

<script type="text/javascript">
    var i = setInterval(function () {
    clearInterval(i);
    // O código desejado é apenas isto:
    document.getElementById("loading").style.display = "none";
    document.getElementById("conteudo").style.display = "inline";

}, 4000);
</script>
<div id="loading" style="display: block">
    <img src="http://media.giphy.com/media/FwviSlrsfa4aA/giphy.gif" style="width:150px;height:150px;" />
</div>
 -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.png">


        <title>Top Entregas</title>
       <link href="css/bootstrap.css" rel="stylesheet">

       <link href="css/navbarsResponsives/navbarResponsivePEDIDOS.css" rel="stylesheet">
       <link href="css/navbarsResponsives/navbarResponsive.css" rel="stylesheet">
<!-- DATABLE NOVA -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.2/b-print-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.2/b-print-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.js"></script>
 

        <script src="js/printThis.js"></script>
     <link rel="stylesheet" type="text/css" href="css/print.css" media="printablen" />
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

                                               <?php 
$filterEmp = $_SESSION['usuarioEmpresa'];

      if ($filterEmp == 1) { $nome = 'Top Entregas'; }
      if ($filterEmp == 2) { $nome = 'Turbo Dog'; }
      if ($filterEmp == 3) { $nome = 'Ale Lanches'; }
       if ($filterEmp == 4) { $nome = 'Hortifruti Pivotto'; }
        if ($filterEmp == 5) { $nome = 'Delicias de Sabor'; }
         if ($filterEmp == 6) { $nome = 'Haris'; }
          if ($filterEmp == 7) { $nome = 'Pouso e Decolagem'; }
            if ($filterEmp == 7) { $nome = 'Gêmeos Açai'; }

      ?>


<script>
    $(document).ready(function()
                     {
        $("#test1").on('change',function()
                         {
            //var keyword = $(this).val();
            var keyword = $(test1).val();


            $.ajax(
            {
                url:'fetchPedidos.php',
                type:'POST',
                //data:'request='+keyword,
        data: {'request': keyword},

                beforeSend:function()
                {
                    $("#table-container").html('<div align="center">Filtrando todos os resultados...</div>');
                },
                success:function(data)
                {
                    $("#table-container").html(data);
                },
            });
        });
    });
</script>
                <!-- teste -->
<!-- jquerys -->
                <!-- teste -->
<SCRIPT language=JavaScript>
// Verificando suporte a tecnologia
// de 30 a 0 //
//abre uma popup \/
//function startCountdown556(){
 //var width = 150;
  //var height = 250;
  //var left = 99;
  //var top = 99;
//'_self' redireciona para uma pagina
 // var thatWindow = window.open('http://localhost/gerencialdelivery/painel.php','_blank', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=yes, toolbar=yes, location=yes, directories=yes, menubar=yes, resizable=no, fullscreen=no');
//thatWindow.focus();
//}
// isso aqui aciona uma mensagem
//var notification = new Notification("I am Desktop Notification");


   <?php if ($filterEmp == 3) { ?> 
var bell = new Audio('audio/SomAlto.mp3');
<?php } ?>

   <?php if ($filterEmp == 3) { ?> 
var bell = new Audio('audio/SomAlto.mp3');
<?php } ?>

   <?php if ($filterEmp != 3) { ?> 
var bell = new Audio('audio/export.mp3');
    <?php } ?>

function loadAudio() {


            bell.play();


}

var intervalId = $interval(loadAudio, 1000)




loadeAudio();

function notifyMe() {

 //var audio = new Audio('audio/export.mp3');

   //  audio.play();
jQuery(document).ready(loadAudio);
loadAudio();

  if (!("Notification" in window)) {
    alert("Este navegador não suporta as notificações, experimente o Google Chrome.");
  }
  else if (Notification.permission === "granted") {
        var options = {
                body: "Serão notificados os pedidos aguardando!",
                <?php if ($filterEmp == 2) { ?>
              icon: "imagens/TURBODOG/turboBan.png",
               <?php } ?>
             <?php if ($filterEmp == 3) { ?>
              icon: "imagens/ALELANCHES/alelanches.jpg",
               <?php } ?>
              <?php if ($filterEmp == 1) { ?>
              icon: "imagens/icon.jpg",
               <?php } ?>
                dir : "ltr",
                tag: "group1",
                requireInteraction: true
             };
             //AutoClose
//se quiser fexar antes -> setTimeout(function(){ notification.close(); },999 * 500);
          var notification = new Notification("Notificações Ativadas !",options);
         // setTimeout(notification.close.bind(notification), 59000);
  }
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      if (!('permission' in Notification)) {
        Notification.permission = permission;
      }

      if (permission === "granted") {
        var options = {
              body: "Serão notificados os pedidos aguardando!",
                 <?php if ($filterEmp == 2) { ?>
              icon: "imagens/TURBODOG/turboBan.png",
               <?php } ?>
             <?php if ($filterEmp == 3) { ?>
              icon: "imagens/ALELANCHES/alelanches.jpg",
               <?php } ?>
              <?php if ($filterEmp == 1) { ?>
              icon: "imagens/icon.jpg",
               <?php } ?>
              dir : "ltr",
              tag: "group1",
              requireInteraction: true
          };
        var notification = new Notification("Notificações Ativadas !",options);
       // setTimeout(notification.close.bind(notification), 59000);
      }
    });
  }
}

//     setTimeout(notification.close.bind(notification), 60000);

var timer = null;



var g_iCount = new Number();

function startCountdown(){
var timer
<?php if($filterEmp == 3) {  ?>
var g_iCount = 31;
<?php } else { ?> g_iCount = 61; <?php } ?>
timerr = setInterval(function() {
       if((g_iCount - 1) >= 0){
               g_iCount = g_iCount - 1;
               numberCountdown.innerText = '00:' + g_iCount ;
       }
     }, 1000)

<?php if($filterEmp == 3) {  ?>
var seconds = 30; // how often should we refresh the DIV?
<?php } else { ?> var seconds = 60; <?php } ?>
    timerrr = setInterval(function() {
        window.location.href = window.location;
    }, seconds*1000)
}
</SCRIPT>

<script language="javascript" type="text/javascript">

$(function() {

 
});

function cancelActivityRefresh() {
    clearInterval(timerr);
    clearInterval(timerrr);
    //startActivityRefresh();
    startCountdown();
}

</script>

    </head>

<style>
@media print{
   #noprint{
       display:none;
   }
}

@page{
  size: auto;
  margin: 0mm;
}
</style>


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
             <?php if ($filterEmp == 1) { ?> class="logoresponsive" src="imagens/icon.jpg" <?php } ?>
              <?php if ($filterEmp == 2) { ?> class="logoresponsive2"  style="margin:3px;" src="imagens/turbodog.png" <?php } ?>

             <?php if ($filterEmp == 0) { ?>  class="logoresponsive2" src="imagens/logo.png" <?php } ?>></a>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
      <div align="center">
        <ul class="nav navbar-nav">
       <li><a class="txtresponsive" href="home.php">Novidades <img  class="imgresponsive" src="imagens/news.png" alt=""></a></li>
      <li><a class="txtresponsive" href="pedidos.php">Pedidos <img class="imgresponsive" src="imagens/pedido.png" alt=""></a></li>
                  <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle txtresponsive" href="#">Produtos <img class="imgresponsive" src="imagens/produtos.png" alt=""> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                     <li><a href="produto.php">Lista de produtos</a></li>
                    <li><a href="adicionais.php">Adicionais</a></li>
                </ul>
            </li>
      <li><a class="txtresponsive" href="categorias.php">Categorias <img class="imgresponsive" src="imagens/categoria.png" alt=""></a></li>
      <li><a class="txtresponsive" href="precos.php">Fretes <img class="imgresponsive" src="imagens/preco.png" alt=""></a></li>
  <!-- <li><a href="perfil.php">Perfil <img  src="imagens/admin.png" alt=""> </a> </li> -->
     <li><a class="txtresponsive" href="ajuda.php">Suporte <img class="imgresponsive" src="imagens/support.png" alt=""></a></li>
           <li class="dropdown">
       <li><a data-toggle="dropdown"  class="dropdown-toggle txtresponsive" href="../painel.php">Painel <img class="imgresponsive" src="imagens/settings.png" alt=""> <b class="caret"></b></a>
        <ul class="dropdown-menu">
                <li><a  href="painel.php">Configurações</a></li>
               <li><a href="postmessage/index.php">Envio de Notificações</a></li>
          </ul>
              </li>
            </li>
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle txtresponsive" href="#">Relatórios <img class="imgresponsive" src="imagens/dashboard.png" alt=""> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                                        <li><a href="dashboard.php">Relatório Geral</a></li>
                    <li><a href="dashboardCategoria.php">Relatório por Categoria</a></li>
                    <li><a href="dashboardformapagamento.php">Relatório por Forma de Pagamento</a></li>
                </ul>
            </li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
            <li  class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle txtresponsive" href="#">Deslogar <b class="caret"></b></a>
  <ul class="dropdown-menu">
      <div align="center">Tem Certeza?
       <li><a href="sair.php">Deslogar <img  class="imgresponsive" src="imagens/logout.png" alt=""></a></li>
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
 <body role="document" onload="startCountdown()">
  <!-- Kakakakakaka --> <!--  -->


 <div id="main" class="container-fluid" style="margin-top:3%;">
    <div id="top" class="row">
        <div class="col-sm-3 loli">
            <h2>Pedidos</h2>
              <button class="btne2 hover-style-2 " style="font-weight:0px;font-size:10px;" onclick="notifyMe()">Notifique-me !</button>
        </div>
<div class="col-sm-6">

            </div>

        <!-- Fixed navbar -->

<FONT size=5 ><B class="be spane">
  <style>
  .bode{}
.dive{cursor:pointer;width:80px;height:97px;position:absolute;margin:-23px 0 0 -58px;top:43%;left:97%;border:0px solid #202020; 
  background: -webkit-linear-gradient(bottom, #FFDEAD, #FFDEAD);
  background: -o-linear-gradient(top, #FFDEAD, #FFDEAD);
  background: linear-gradient(to bottom, white,   #E6E6FA); /* era ff00000 e ff4500 !important; /* W3C */}
.be,.spane{font:5px bold 'digital_dreamregular';color:gray;text-shadow:0 0 0px #606060;}</style>
<script>
function Refresh(){
  window.location.reload();
}
</script>
<br>
<div align="center">
  <DIV onclick="cancelActivityRefresh();" class="diveQ" id=numberCountdown style="width:50%;" align="center">Reset </DIV>
<div  onclick="Refresh()" style="width:50%;margin-top:1%;" align="center">   <button style="width:120px;overflow: hidden !important;" class="btne2 hover-style-2 ">Atualizar</button> </div>
</FONT> </B>

</div>

<?php
    $cmd = "SELECT * FROM pedidos  where empresa = '$filterEmp' " ;
    $resultado_pedidosE = mysqli_query($conn, $cmd);
    $total_pedidosE = mysqli_num_rows($resultado_pedidosE);

        $cmdX = "SELECT * FROM pedidos  where empresa = '$filterEmp' and status = 'Confirmado' " ;
    $resultado_pedidosEX = mysqli_query($conn, $cmdX);
    $total_pedidosEX = mysqli_num_rows($resultado_pedidosEX);


        $cmdXZ = "SELECT * FROM pedidos  where empresa = '$filterEmp' and status = 'Cancelado'  " ;
    $resultado_pedidosEXZ = mysqli_query($conn, $cmdXZ);
    $total_pedidosEXZ = mysqli_num_rows($resultado_pedidosEXZ);


        $cmdXZC = "SELECT * FROM pedidos  where empresa = '$filterEmp' and status = 'Aguardando'  " ;
    $resultado_pedidosEXZC = mysqli_query($conn, $cmdXZC);
    $total_pedidosEXZC = mysqli_num_rows($resultado_pedidosEXZC);

            $cmdXZCL = "SELECT * FROM pedidos  where empresa = '$filterEmp' and status = 'Em Entrega'  " ;
    $resultado_pedidosEXZCL = mysqli_query($conn, $cmdXZCL);
    $total_pedidosEXZCL = mysqli_num_rows($resultado_pedidosEXZCL);
?>
<script>
     $(document).ready(function () {
      //verifica se é dispositivo mobile
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
$(".info1").css("display", "none");
} else {
  //$(".info1").css("display", "none");
}
})
      //  $(document).ready(function () {
                //   $(".info1").css("display", "none");
</script>

   <?php if ($filterEmp == 6) { ?> 
   <div style="width:30%;position:absolute;left:160px;top:10%;border:solid;border-width:1px;border-color:black;padding:7px;text-align:justify;">
<b> <b style="color:red;">ATENÇÃO: </b> Conforme previsto no contrato de nº 19358GEM, o não pagamento das mensalidades em suas datas próprias acarretará no bloqueio/suspensão da plataforma. Pedimos que regularize a quitação das mensalidades pendentes para continuidade do sistema. <p><b style="color:red;"> PRAZO DE REGULARIZAÇÃO </b> de 3 dias úteis <b style="color:red;">(24/01/2020). </b> <p> Em caso de dúvidas contate-nos (17) 3227-1269. </b>
</div>
<?php } ?>

<div id="info1" class="info1" style="position:absolute;margin-left:80%;margin-top:-100px;padding:10px;width:150px !important;border-style:solid;border-width:1px;">

            <h4 style="font-size:10px;"> Total de pedidos: <b><?php echo $total_pedidosE; ?></b> </h4>
            <h4 style="font-size:10px;"> Pedidos Confirmados: <b><?php echo  $total_pedidosEX;  ?></b> </h4>
            <h4 style="font-size:10px;"> Pedidos Aguardando: <b> <?php echo  $total_pedidosEXZC;  ?> </b> </h4>
             <h4 style="font-size:10px;"> Pedidos em Entrega : <b> <?php echo  $total_pedidosEXZCL;  ?> </b> </h4>
             <h4 style="font-size:10px;"> Pedidos Cancelados: <b> <?php echo  $total_pedidosEXZ;  ?> </b> </h4>

</div>
<div align="center" style="margin-top:2%;margin-bottom:2%;">
<select onclick="cancelActivityRefresh();" class="form-control " style="width:200px;" id="test1" name="test1">
          <option  > Mostrar Hoje</option>
          <option value = "2"> Ultima Semana</option>
         <!-- <option value = "1"> Mostrar Tudo</option> -->
</select>
      </div>
<script>
$(document).ready(function() {
    $('#example').DataTable( {

       language: {
    sEmptyTable: "Nenhum registro encontrado",
    sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
    sInfoFiltered: "(Filtrados de _MAX_ registros)",
    sInfoPostFix: "",
    sInfoThousands: ".",
    sLengthMenu: "Mostrando até _MENU_ resultados por página",
    sLoadingRecords: "Carregando...",
    sProcessing: "Processando...",
    sZeroRecords: "Nenhum registro encontrado",
    sSearch: "Pesquisar",
    oPaginate: {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último",
    },
    oAria: {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente",
    },
 },
sDom: 't',
lengthChange: false,
paging: false,
order: [[ 0, "desc" ]],

        responsive: true,
        fixedHeader: true,

            fixedHeader: {
        headerOffset: $('#navheight').outerHeight(),

    },

    } );
} );

</script>

 <div id="table-container">
  <table id="example" class="table table-striped table-hover table loli" align="center" style="width:95%;border-style:double;" cellspacing="0" cellpadding="0">
    <thead  style="">
                    <tr >
                        <th ><i style="font-size:20px;" class="fas fa-barcode"></i></th>
                        <th ><i style="font-size:20px;" class="far fa-user"></i> Nome do cliente</th>
                         <th ><i style="font-size:20px;" class="fas fa-clipboard-list"></i> Status</th>
                         <th ><i style="font-size:20px;" class="fas fa-clipboard-list"></i> Entrega/Retirada</th>
                        <th ><i style="font-size:20px;" class="fas fa-phone"></i> Telefone do Cliente</th>
                        <th > <i style="font-size:20px;" class="far fa-calendar-alt"></i> Data e hora</th>
                        <th ><b>  </b> </th>
                    </tr>
                </thead>
<tbody>
<!-- white-space:nowrap !important;text-overflow:ellipsis !important; deve ser isso.. -->
<?php  while($rows_pedidos = mysqli_fetch_assoc($resultado_pedidos)){ ?>
              <tr <?php if($rows_pedidos['status'] == "Retirada"){?> class="gonden" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Confirmado"){?> class="greeen" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Aguardando"){?> class="yelloww" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Em Entrega"){?> class="emEntrega" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Finalizado"){?> class="bluee" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Cancelado"){?> class="reed" <?php } ?>>

                <td ><?php echo $rows_pedidos['id']; ?></td>
                <td > <?php echo $rows_pedidos['nomeCliente']; ?></td>
                <td > <?php if($rows_pedidos['status'] == "Em Entrega"){?>  <i class="fas fa-motorcycle" style="font-size:14px;"></i>

                  <?php } ?> <?php if($rows_pedidos['status'] == "Retirada"){?>  <i class="fas fa-hand-holding-usd" style="font-size:14px;"></i>

                  <?php } ?> <?php if($rows_pedidos['status'] == "Finalizado"){?>  <i class="fas fa-check-double" style="font-size:14px;"></i>

                  <?php } ?> <?php if($rows_pedidos['status'] == "Aguardando"){?> <i class="fas fa-exclamation" style="font-size:14px;width:14px;"></i>

                   <?php } ?> <?php if($rows_pedidos['status'] == "Cancelado"){?> <i class="fas fa-times-circle" style="font-size:14px;"></i>

                   <?php } ?> <?php if($rows_pedidos['status'] == "Confirmado"){?> <i class="fas fa-check-circle" style="font-size:14px;"></i>

                   <?php } ?> <b ><?php echo $rows_pedidos['status']; ?> </b></td>
                <td  ><?php if($rows_pedidos['id_entrega'] == "0"){ ?> Entrega <?php  } ?> <?php if($rows_pedidos['id_entrega'] == "1"){ ?>  Retirada <?php  } ?> </td>
                 <td  ><?php echo $rows_pedidos['telefoneCliente']; ?> </td>
          <td > <?php $date = new DateTime($rows_pedidos['created']);echo $date->format('d/m/Y - H:i'); ?> </td>
                <td >
       <!-- antigo <button onclick="cancelActivityRefresh();" name="confirmar" data-toggle="modal" data-target="#open-modal" data-whatever="<?php echo $rows_pedidos['id']; ?>" type="button" <?php if($rows_pedidos['status'] == "Aguardando" || $rows_pedidos['status'] == "Retirada"){?> style="display: all;" <?php }else{ ?> style="display: none" <?php } ?>  class="btn btn-xs btn-success" ><H5><b>CONFIRMAR</b></H5></button> -->
       <div>
       <button style="width:80px;"  onclick="cancelActivityRefresh();" type="button" data-toggle="modal" data-target="#myModal<?php echo $rows_pedidos['id'];?>" class="btn btn-xs btn-warning" data-whatever="<?php echo $rows_pedidos['id']; ?>"><b>DETALHAR </b></button>

        <button style="width:80px;" onclick="cancelActivityRefresh();" data-toggle="modal" data-target="#status-modal<?php echo $rows_pedidos['id'];?>" data-whatever="<?php echo $rows_pedidos['id']; ?>" type="button" class="btn btn-xs btn-danger" ><b>STATUS</b></button>
      </div>
    </td>
    </tr>
    <!-- adicionei duas divs -->
  </div>


     <script type="text/javascript">

            $(document).ready(function () {

                $("#btnPrintn<?php echo $rows_pedidos['id']; ?>").click(function () {
                    //get the modal box content and load it into the printable div
   $(".printablen").html($("#myModal<?php echo $rows_pedidos['id']; ?>").html());
                   $(".printablen #foraDIV<?php echo $rows_pedidos['id']; ?>").css("display", "block");

                   $(".printablen #este<?php echo $rows_pedidos['id']; ?>").css("max-height", "100%"); // muda o estilo para height 100% na impressao.
                    //$(".printablen #formaPagamento<?php echo $rows_pedidos['id']; ?>").css("white-space", "nowrap");
                      $(".printablen #formaPagamento<?php echo $rows_pedidos['id']; ?>").css("width", "100%");
                   $(".printablen #este<?php echo $rows_pedidos['id']; ?>").css("font-size", "18px");
                   $(".printablen #bodi<?php echo $rows_pedidos['id']; ?>").css("font-family", "arial"); // courier new
                   $(".printablen #bodi<?php echo $rows_pedidos['id']; ?>").css("font-size", "18px");
                                   <?php if ($filterEmp == 2) { ?>
                    $(".printablen #bodi<?php echo $rows_pedidos['id']; ?>").css("width", "100%");
                      <?php } else { ?>
                        $(".printablen #bodi<?php echo $rows_pedidos['id']; ?>").css("width", "298px");
                        <?php } ?>

                   $(".printablen #feud<?php echo $rows_pedidos['id']; ?>").css("font-family", "arial"); // courier new
                   $(".printablen #feud<?php echo $rows_pedidos['id']; ?>").css("font-size", "18px");
                                   <?php if ($filterEmp == 2) { ?>
                  $(".printablen #feud<?php echo $rows_pedidos['id']; ?>").css("width", "250px");
                      <?php } else { ?>
                        $(".printablen #feud<?php echo $rows_pedidos['id']; ?>").css("width", "280px");
                        <?php } ?>

                   $(".printablen #feud<?php echo $rows_pedidos['id']; ?>").css("border-style", "dashed");

                   $(".printablen #feud<?php echo $rows_pedidos['id']; ?>").css("border-width", "2px");

  //  $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-style", "dashed");
     //   $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-width", "2px");
      //     $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-style", "none");
      //  $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-width", "none");
       //  $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-left", "none");
        //  $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-right", "none");
       //    $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-bottom", "none");
          //  $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("height", "200px");

                    $(".printablen #complo<?php echo $rows_pedidos['id']; ?>").css("text-transform", "uppercase");
                    $(".printablen #bodi<?php echo $rows_pedidos['id']; ?>").css("font-weight", "bold");
                                           <?php if ($filterEmp == 2) { ?>
                  $(".printablen #este<?php echo $rows_pedidos['id']; ?>").css("width", "100%");
                  <?php } else { ?>
                     $(".printablen #este<?php echo $rows_pedidos['id']; ?>").css("width", "298px");
                     <?php } ?>
                    $(".printablen #este<?php echo $rows_pedidos['id']; ?>").css("font-weight", "bold");
                    $(".printablen #foraM<?php echo $rows_pedidos['id']; ?>").css("margin-left", "0");
                    $(".printablen #bodi<?php echo $rows_pedidos['id']; ?>").css("text-align", "left");
                          // $(".printable #bodiaw<?php echo $rows_pedidos['id']; ?>").css("text-align", "center");
                    $(".printablen #myModal<?php echo $rows_pedidos['id']; ?>").css("font-size", "18px");
                    $(".printablen #este<?php echo $rows_pedidos['id']; ?>").css("font-family", "arial"); // courier new
                   // $(".printable #este<?php echo $rows_pedidos['id']; ?>").style.height = 100%;
                  // document.getElementById(".printable #este<?php echo $rows_pedidos['id']; ?>").classList.add('din');
                    $(".printablen #btnPrintn<?php echo $rows_pedidos['id']; ?>").remove();
                    $(".printablen #fora<?php echo $rows_pedidos['id']; ?>").remove();
                    $(".printablen #fechar<?php echo $rows_pedidos['id']; ?>").remove();
                    $(".printablen").printThis({
    importCSS: false,
    loadCSS: "css/print.css",
});
//<a href="javascript:window.location.reload(true);" >
                });
            });
        </script>

 <div class="modal fade" id="status-modal<?php echo $rows_pedidos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
              <form id="statusdo" name="statusdo" method="POST" action="processopedidos/processa.php" enctype="multipart/form-data">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" id="modalLabel"><b> Status: </b> <b <?php if($rows_pedidos['status'] == "Retirada"){?> class="gonden" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Confirmado"){?> class="greeen" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Aguardando"){?> class="yelloww" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Em Entrega"){?> class="emEntrega" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Finalizado"){?> class="bluee" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Cancelado"){?> class="reed" <?php } ?> > <?php echo $rows_pedidos['status']; ?> </b> </h3>

            </div>
            <div class="modal-body">

            <div align="center">
    <b> Código do pedido: <?php echo $rows_pedidos['id'] ?> / Cliente: <?php echo $rows_pedidos['nomeCliente'] ?></b>
    <input style="display:none;" id="confirmar<?php echo $rows_pedidos['id_usuarios']; ?>" name="id_usuarios" value="<?php echo $rows_pedidos['id_usuarios']; ?>" > </input>
            <h3 id="stpara<?php echo $rows_pedidos['id']; ?>"><b>Altere o status para:</b></h3>
          </div>
            </div>
              <input class="hidden" name="id" id="id_pedidos" value="<?php echo $rows_pedidos['id']; ?>">
              <input  class="hidden" name="id_entrega"  id="id_entrega">
              <input class="hidden" value="Aguardando" name="status" id="recipient-status">

            <div class="modal-footer ">
        <?php if($rows_pedidos['id_entrega'] == 1){
                ?>  <script>
                      $(document).ready(function () {
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4"); // muda o estilo para height 100% na impressao.
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").css("display", "none");
    //.attr("disabled", true)
});
  </script>  <?php
                } ?>
                <!-- confirmado ou cancelado -->
                 <?php if($rows_pedidos['status'] == 'Aguardando'){
                ?>  <script>
                      $(document).ready(function () {
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");

  $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").css("display", "none");
  $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").css("display", "none");
  // muda o estilo para height 100% na impressao.
});
  </script>  <?php
                } ?>
                <?php if($rows_pedidos['status'] == 'Confirmado' && $rows_pedidos['id_entrega'] == 1){
                ?>  <script>
                      $(document).ready(function () {
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").css("display", "none");
     $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("display", "");
});
  </script>  <?php
                } ?>
               <?php if($rows_pedidos['status'] == 'Confirmado' && $rows_pedidos['id_entrega'] == 0){
                ?>  <script>
                      $(document).ready(function () {
  // $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");

 // $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").attr("disabled", true)
  $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").css("display", "none");
        $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancel<?php echo $rows_pedidos['id']; ?>").css("display", "");
     $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("display", "");
  // muda o estilo para height 100% na impressao.
});
  </script>  <?php
                } ?>
         <?php if($rows_pedidos['status'] == 'Em Entrega'){
                ?>  <script>
                      $(document).ready(function () {
  //  $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");

 // $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").attr("disabled", true)
  $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").css("display", "none");
        $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancel<?php echo $rows_pedidos['id']; ?>").css("display", "");
     $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("display", "");
  // muda o estilo para height 100% na impressao.
});
  </script>  <?php
                } ?>
                         <?php if($rows_pedidos['status'] == 'Finalizado'){
                ?>  <script>
                      $(document).ready(function () {

    $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancel<?php echo $rows_pedidos['id']; ?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #stpara<?php echo $rows_pedidos['id']; ?>").css("display", "none");


});
  </script>  <?php
                } ?>
       <?php if($rows_pedidos['status'] == 'Cancelado'){
                ?>  <script>
                      $(document).ready(function () {

    $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");

  $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").css("display", "none");
      $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("display", "none");
        $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancel<?php echo $rows_pedidos['id']; ?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #stpara<?php echo $rows_pedidos['id']; ?>").css("display", "none");



});
  </script>  <?php
                } ?>

                                <?php if($rows_pedidos['troco'] == NULL || $rows_pedidos['troco'] == '' || $rows_pedidos['troco'] == '0'){
                ?>  <script>
                      $(document).ready(function () {
  $("#myModal<?php echo $rows_pedidos['id']; ?> #troco<?php echo $rows_pedidos['id']; ?>").css("display", "none"); // muda o estilo para height 100% na impressao.
});
  </script>  <?php
                } ?>
                                <?php if($rows_pedidos['formaPagamento'] != 'Dinheiro'){
                ?>  <script>
                      $(document).ready(function () {
  $("#myModal<?php echo $rows_pedidos['id']; ?> #troco<?php echo $rows_pedidos['id']; ?>").css("display", "none"); // muda o estilo para height 100% na impressao.
});
  </script>  <?php
                } ?>
                <?php $levetroco = $rows_pedidos['troco'] - $rows_pedidos['valor'] ?>


  <div align="center">
                <style>
                .hide{
  display:none !important;
}
.show{
  display:block;
}

              </style>


<script>

function onButtonClick(id){
  document.getElementById('textInput' + id).className="show";

  document.getElementById('textInpute' + id).className="show";
}
function onButtonClickE(id){
  document.getElementById('textInput' + id).className="hide";

  document.getElementById('textInpute' + id).className="hide";
}
</script>
             <button id="confirmar<?php echo $rows_pedidos['id']; ?>" onclick="return confirm('Tem certeza? esta ação é irreversivel.');" name="confirmar"   type="submit" class="btn btn-xs btn-success" ><H5><b>CONFIRMAR</b></H5></button>
            <button  id="ementrega<?php echo $rows_pedidos['id']; ?>" onclick="return confirm('Tem certeza? esta ação é irreversivel.');" name="ementrega" class="btn btn-xs btn-info"><H5><b>EM ENTREGA</b></H5></button>
             <button id="final<?php echo $rows_pedidos['id']; ?>" onclick="return confirm('Tem certeza? esta ação é irreversivel.');" name="entregue" class="btn btn-xs btn-primary"><H5><b>FINALIZADO</b></H5></button>
          <!-- <button id="" onclick="onButtonClick()" name="cancelado" type="submit"  class="btn btn-xs btn-danger "><H5><b>Cancelar!</b></H5></button> -->

          <input id="cancel<?php echo $rows_pedidos['id']; ?>" class="btn btn-xs btn-danger" style="padding:8px;font-weight: 800;font-family:calibri;font-size:15px;" type="button" name="answer" value="CANCELAR" onclick="onButtonClick(<?php echo $rows_pedidos['id']; ?>)" />
<div id="textInput<?php echo $rows_pedidos['id']; ?>" class="hide">
     <input name="cancelado2"  rows="3" id="cancelado<?php echo $rows_pedidos['id']; ?>" class="form-control textarea-control" STYLE="margin-top:20px;" rows="1" placeholder="Digite aqui o motivo do cancelamento." ></input>
</div>
<div id="textInpute<?php echo $rows_pedidos['id']; ?>"  class="hide" STYLE="margin-top:20px;">
     <button id="cancelado<?php echo $rows_pedidos['id']; ?>" onclick="return confirm('Tem certeza? esta ação é irreversivel.');" name="cancelado" type="submit"  class="btn btn-xs btn-danger "><H5><b>Enviar motivo!</b></H5></button>
     <button id="janela<?php echo $rows_pedidos['id']; ?>"   style="width:45px;" onclick="onButtonClickE(<?php echo $rows_pedidos['id']; ?>)" name="janela" type="button" class="btn btn-xs btn-primary "><H5><b style="font-size:14px;">X</b></H5></button>
</div>
         <!-- antigo <button type="button" class="btn btn-warning" data-dismiss="modal"><h4>Voltar</h4></button> -->
        </div>

            </div>

          </div>

          </div>

          </form>

        </div>
                                               <!-- Fim Modal -->
        <!--  -->
 <div class="modal fade " id="myModal<?php echo $rows_pedidos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >

                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div  class="modal-header" >
                               <button id="fechar<?php echo $rows_pedidos['id']; ?>" type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                              <h3  id="bodi<?php echo $rows_pedidos['id']; ?>" class="modal-title text-center" id="myModalLabel"></h3>
                            </div>
                            <div class="modal-body"  id="bodi<?php echo $rows_pedidos['id']; ?>">


                       <!--  <div  align="left" >  <b class="melde"> Info. do pedido: </b></div> <p> </p> -->
                        <div class="row" >

                   <?php if($rows_pedidos['frete'] == NULL || $rows_pedidos['frete'] == 'undefined' || $rows_pedidos['frete'] == '0'){
                      ?>  <script>
                            $(document).ready(function () {
        $("#myModal<?php echo $rows_pedidos['id']; ?> #freteAqui<?php echo $rows_pedidos['id']; ?>").css("display", "none"); // muda o estilo para height 100% na impressao.
      });
        </script>  <?php 
                      } ?>
                            <div style="margin-left:25px;" id="foraM<?php echo $rows_pedidos['id']; ?>">

                              <?php 


$meuuser = $rows_pedidos['id_usuarios'];
            $EM = "SELECT * FROM pedidos  where empresa = '$filterEmp' and id_usuarios='$meuuser' " ;
    $result_EM = mysqli_query($conn, $EM);
    $total_EM = mysqli_num_rows($result_EM);


                              ?>
                      <div> <b class="meldin"> Data: </b> <a class="meld"> <?php $date = new DateTime($rows_pedidos['created']);echo $date->format('d/m/Y - H:i'); ?>  </a> </div>
<?php

if ($filterEmp == 9){


include("TEMPOPEDIDO/fratter.php");

$date = new DateTime($rows_pedidos['created']);
$dateTime = $date->format('H:i'); 
 if ($rows_pedidos['id_entrega'] == '0') { 
$minutos = $preco;
}
else { $minutos = $rows_eme['ApxRetirada']; }

   $times = array();

$times[] = "$dateTime";
$times[] = "0:$minutos";


}else{
            $EMe = "SELECT * FROM EMPRESAS  where id_empresa = '$filterEmp' " ;
    $result_EMe = mysqli_query($conn, $EMe);
         $rows_eme = mysqli_fetch_array($result_EMe);


$date = new DateTime($rows_pedidos['created']);
$dateTime = $date->format('H:i'); 
 if ($rows_pedidos['id_entrega'] == '0') { 
$minutos = $rows_eme['ApxEntrega']; 
}
else { $minutos = $rows_eme['ApxRetirada']; }

   $times = array();

$times[] = "$dateTime";
$times[] = "0:$minutos";


}
// pass the array to the function


?>
<?php if ($rows_pedidos['id_entrega'] == '0') { ?>
                          <div> <b class="meldin"> Entrega prevista: </b> <a class="meld"> <?php echo AddPlayTime($times); ?>  </a> </div>
                          <?php } else { ?>
                          <div> <b class="meldin"> Retirada prevista: </b> <a class="meld"> <?php echo AddPlayTime($times); ?>  </a> </div> <?php } ?>

                  <div  ><b class="meldin"> Pedido: </b> <a class="meld"> #<?php echo $rows_pedidos['id']; ?> </a> </div><?php $valorsemFrete = $rows_pedidos['valor'] - $rows_pedidos['frete']; ?>
                               <div id="idEntrega<?php echo $rows_pedidos['id']; ?>" > <b class="meldin"> Tipo de pedido: </b> <a class="meld"> <?php if ($rows_pedidos['id_entrega'] == '1'){?> Retirada <?php } else { ?> Entrega <?php  } ?></a></div>
                    <p> </p>
                  </div>
                   <hr id="fora<?php echo $rows_pedidos['id']; ?>">
              <div  align="left"> <div style="margin-left:15px;" id="foraM<?php echo $rows_pedidos['id']; ?>">  <b class="melde"> Dados do cliente </b></div> </div><p> </p>

                <hr id="fora<?php echo $rows_pedidos['id']; ?>">

                <div style="margin-left:25px;" id="foraM<?php echo $rows_pedidos['id']; ?>">
                  <div ><b class="meldin"> Cliente: </b> <a id="complo<?php echo $rows_pedidos['id']; ?>" class="meld"> <?php echo $rows_pedidos['nomeCliente']; ?></a> </div>
                    <div ><b class="meldin"> Nº de Pedidos: </b> <a id="complo<?php echo $rows_pedidos['id']; ?>" class="meld"> <?php if($total_EM == "1") { ?> Cliente Novo! <?php } ?>       <?php if($total_EM != "1") { echo $total_EM; }?></a> </div>
                    <div >  <b class="meldin"> Telefone: </b> <a id="complo<?php echo $rows_pedidos['id']; ?>" class="meld"> <?php echo $rows_pedidos['telefoneCliente'] ?> </a></div> 
                              <div > <b class="meldin"> Endereço:</b> <a id="complo<?php echo $rows_pedidos['id']; ?>" class="meld"><?php echo $rows_pedidos['ruaCliente']; ?> <b class="meldin"> Nº: </b> <?php echo $rows_pedidos['numeroCasaCliente']; ?> </a>  </div>
                                        <div > <b class="meldin"> Bairro: </b> <a id="complo<?php echo $rows_pedidos['id']; ?>" class="meld"> <?php echo $rows_pedidos['bairroCliente']; ?></a></div>
                <div ><b class="meldin"> Cidade: </b> <a id="complo<?php echo $rows_pedidos['id']; ?>" class="meld"> <?php echo $rows_pedidos['cidadeCliente']; ?></a></div>
             <?php if ($rows_pedidos['cepCliente'] != "") { ?> <div ><b class="meldin"> Cep: </b> <a class="meld"> <?php echo $rows_pedidos['cepCliente']; ?></a></div> <?php } ?>


                 <?php $comple = $rows_pedidos['complemento']; if($comple == '' || $comple == null || $comple == '0' || $comple == 'undefined' ){
                      ?>  <script>
                            $(document).ready(function () {
        $("#myModal<?php echo $rows_pedidos['id']; ?> #comple<?php echo $rows_pedidos['id']; ?>").css("display", "none"); // muda o estilo para height 100% na impressao.
      });
        </script>  <?php
                      } ?>
                          <div id="comple<?php echo $rows_pedidos['id']; ?>"> <b class="meldin"> Complemento: </b> <a id="complo<?php echo $rows_pedidos['id']; ?>" class="meld"> <?php echo $rows_pedidos['complemento']; ?></a></div>
                             </div>

                           </div>

      <hr id="fora<?php echo $rows_pedidos['id']; ?>">
      <!-- estilo da tabela que vem no nomeProduto -->
      <style type="text/css">
    .table   { display: table; border-collapse: collapse; border: 1px solid #000; width:180px;}
    .tablerow  { display: table-row; border: 1px solid #000;width:180px}
    .tablecell { display: table-cell; border: 1px solid #000;width:180px}
     .tablecelle {border: 2px dashed;border-left:none; border-right:none; border-bottom:none;width:180px}
     </style>
                 <div  id="este<?php echo $rows_pedidos['id']; ?>" style="max-height:150px; overflow-y:auto;" >  <div  align="left" >  <h4> <b class="melde"> Itens do pedido </b></div><p> </p><hr id="fora<?php echo $rows_pedidos['id']; ?>">  <h4 class="meld"><?php echo $rows_pedidos['nomeProduto'];?> </h4></h4> 
               </div>

                              <br id="fora<?php echo $rows_pedidos['id']; ?>"> <div id="feud<?php echo $rows_pedidos['id']; ?>" style=" border-style: dashed; border-width: 2px;">
                                <div style="margin:7px;">
                                  <div style="margin:4px;">
       <b class="meldin"> Sub Total: </b>  <a class="meld"> R$<?php echo number_format($valorsemFrete,2,",","");  ?></a> <br>
      <b class="meldin"> Taxa de entrega: </b> <a class="meld"> R$<?php echo number_format($rows_pedidos['frete'],2,",","");  ?></a> <br>

                                         <?php if($rows_pedidos['formaPagamento'] == NULL || $rows_pedidos['formaPagamento'] == 'undefined'){
                      ?>  <script>
                            $(document).ready(function () {
        $("#myModal<?php echo $rows_pedidos['id']; ?> #formaPagamento<?php echo $rows_pedidos['id']; ?>").css("display", "none"); // muda o estilo para height 100% na impressao.
      });
        </script>  <?php
                      } ?>

      <div id="feude<?php echo $rows_pedidos['id']; ?>"  style="border-style: dashed; border-width:2px; border-left:none; border-right:none; border-bottom:none;" >

        <div style="margin:4px;">
             <b class="meldin"> Cobrar do cliente: </b> <a class="meld"> R$<?php echo number_format($rows_pedidos['valor'],2,",","");  ?></a>

             <!-- <a style="color:black;" id="freteAqui<?php // echo $rows_pedidos['id']; ?>"> (R$<?php // echo number_format($valorsemFrete,2,",",""); ?> + Frete: R$<?php // echo number_format($rows_pedidos['frete'],2,",","");?>)</a> -->
      </div>
      </div>
      </div>
      </div>
             </div>
             <br>
             <div id="formaPagamento<?php echo $rows_pedidos['id']; ?>" <?php if($rows_pedidos['formaPagamento'] == 'null'){?> style="display:none;" <?php } ?> ><b class="meldin" > Forma de Pagamento: </b> <br id="foraDIV<?php echo $rows_pedidos['id']; ?>" style="display:none;"> <a class="meld" style="text-transform: uppercase"> <?php echo $rows_pedidos['formaPagamento']; ?> </a> </div>

 <div  id="troco<?php echo $rows_pedidos['id']; ?>" ><h4> <b class="meldin"> Troco para: </b> <a class="meld"> R$<?php echo $rows_pedidos['troco']; ?></a>  <b class="meldin">- Precisa levar </b> <a class="meld">R$<?php echo number_format($levetroco,2,",",""); ?></a>  <b class="meldin">de troco.</b></h4></div>

                    <hr id="fora<?php echo $rows_pedidos['id']; ?>">

   <div  align="center"> <button  type="button" class="btn btn-xs btn-danger" id="btnPrintn<?php echo $rows_pedidos['id']; ?>" ><H5><b>Imprimir</b></H5></button>   </div>

     <?php } ?>

</div>
</div>
</div>
</div>
 <div class="printablen"></div>


  </table>
    <?php
$aguar = 'Aguardando';
    $result_pedidost = "SELECT * FROM pedidos where empresa = '$filterEmp' and status = '$aguar' AND DATE(created) = CURDATE()  order by id desc";
    $resultado_pedidost = mysqli_query($conn, $result_pedidost);
        $total_pedidost = mysqli_num_rows($resultado_pedidost);
//nao tem pedidos
 $result_pedidostt = "SELECT * FROM EMPRESAS where ID_EMPRESA = '$filterEmp' ";
    $resultado_pedidostt = mysqli_query($conn, $result_pedidostt);
        $rows_pedidostt = mysqli_fetch_array($resultado_pedidostt);
        $test =  $rows_pedidostt['ImpressNoti'];

    //começa com o numero 1 na notification no banco
        //$NumberNotification

if($total_pedidost == 0 && $test == 0) {
//inserir numero 1 para notification no banco

  $num = 1;
  $guest = "UPDATE EMPRESAS SET ImpressNoti ='$num' WHERE ID_EMPRESA = '$filterEmp'";
  $bn = mysqli_query($conn, $guest);


}

if($total_pedidost != 0 ) {
?>
 <script onload="loadAudio()">
    //var audio = new Audio('audio/export.mp3');
   //  audio.play();
// var request = new XMLHttpRequest();
//request.open("GET", "audio/export.mp3", true);
//request.responseType = "blob";
//request.onload = function() {
//  if (this.status == 200) {
//    var audio = new Audio(URL.createObjectURL(this.response));
 //   audio.load();
 //   audio.play();
 // }
//}
//request.send();

loadAudio();
 </script>
 <?php

  if($test == 1 ) {
   $numer = 0;
  $guestt = "UPDATE EMPRESAS SET ImpressNoti ='$numer' WHERE ID_EMPRESA = '$filterEmp'";
  $bnm = mysqli_query($conn, $guestt);
//inserior numero 0 para notification no banco

 ?> <script>
 //audio.play();
// var request = new XMLHttpRequest();
//request.open("GET", "audio/export.mp3", true);
//request.responseType = "blob";
//request.onload = function() {
//  if (this.status == 200) {
//    var audio = new Audio(URL.createObjectURL(this.response));
 //   audio.load();
 //   audio.play();
 // }
//}
//request.send();


loadAudio();
    // $(".myModalo").css("max-height", "100%"); //
  //   $(".myModalo").printThis({
   // importCSS: false,
   // loadCSS: "css/print.css",
   //  header: "<b style='font-size:14;font-family:Courier New;'>Existem pedidos aguardando no gerencial!</b>"
    //header: "<h1>Look at all of my kitties!</h1>"
//});
</script>

<?php } ?>

<script>

 //audio.play();
loadAudio();
  var options = {
                body: "Existem pedidos aguardando no gerencial do Top Entregas !",
             <?php if ($filterEmp == 2) { ?> 
              icon: "imagens/TURBODOG/turboBan.png",
               <?php } ?>
             <?php if ($filterEmp == 3) { ?> 
              icon: "imagens/ALELANCHES/alelanches.jpg",
               <?php } ?>
              <?php if ($filterEmp == 1) { ?> 
              icon: "imagens/icon.jpg",
               <?php } ?>
                dir : "ltr",
                requireInteraction: true,
                tag: "group1"
             };

             //AutoClose

//var notification = new Notification("WARNING BLA",options);
//se quiser fexar antes -> setTimeout(function(){ notification.close(); },999 * 500);

          var notification = new Notification("Notificação Top Entregas!",options);

          // setTimeout(notification.close.bind(notification), 59000); </script><?php

}
?>
</body>
<?php
function AddPlayTime($times) {
    $minutes = 0; //declare minutes either it gives Notice: Undefined variable
    // loop throught all the times
    foreach ($times as $time) {
        list($hour, $minute) = explode(':', $time);
        $minutes += $hour * 60;
        $minutes += $minute;
    }

    $hours = floor($minutes / 60);
    $minutes -= $hours * 60;

    // returns the time already formatted
    return sprintf('%02d:%02d', $hours, $minutes);
}
?>
?>
</html>

<div class="modal fade" id="open-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
              <form method="POST" id="confirmado" action="processopedidos/processa.php" enctype="multipart/form-data">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" id="modalLabel">Mudar Item</h3>
            </div>
            <div class="modal-body">
            <p><?php echo $rows_pedidos['id']; ?></p>
            <h3>Deseja alterar o status para confirmado?</h3>
            </div>
              <input class="hidden" name="id"<?php echo $rows_pedidos['id']; ?>  id="id_pedidos">
              <input class="hidden" name="status"<?php echo $rows_pedidos['status']; ?>  id="recipient-status">
            <div class="modal-footer">
              <div align="center">
             <button  name="confirmar" type="submit"  class="btn btn-success"><h4>Sim</h4></button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><h4>Não</h4></button>
        </div>
            </div>
          </div>
          </div>

            <script language= 'javascript'>
$('#confirmado').submit(function() {
    if(confirm (' Tem certeza? '))
{
document.forms['confirmado'].onsubmit = function(){return true;}
}
else
{
  event.preventDefault();
document.forms['confirmado'].onsubmit = function(){return false;}
}
});
</script>

          </form>
        </div>




   <script src="js/bootstrap.min.js"></script> <!-- necessario para as modais -->

<script type="text/javascript">
      $('#status-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientstatus = button.data('whateverstatus')
         var recipiententrega = button.data('whateverentrega')
        //var recipientcreated = button.data('whatevercreated')
        var recipientvalor = button.data('whatevervalor')
        var recipientpromo_valor = button.data('whateverpromo_valor')
        var recipientdescricao = button.data('whateverdescricao')
        var recipientcategoria_produtos_id = button.data('whatevercategoria_produtos_id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID do Pedido: ' + recipient)
        modal.find('#id_pedidos').val(recipient)
        modal.find('#id_entrega').val(recipiententrega)
        modal.find('#recipient-status').val(recipientstatus)
        //modal.find('#recipient-created').val(recipientcreated)
        modal.find('#recipient-valor').val(recipientvalor)
        modal.find('#recipient-promo_valor').val(recipientpromo_valor)
        modal.find('#descricao-text').val(recipientdescricao)
        modal.find('#recipient-categoria_produtos_id').val(recipientcategoria_produtos_id)
      })
    </script>

<script type="text/javascript">
      $('#open-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientstatus = button.data('whateverstatus')
        //var recipientcreated = button.data('whatevercreated')
        var recipientvalor = button.data('whatevervalor')
        var recipientpromo_valor = button.data('whateverpromo_valor')
        var recipientdescricao = button.data('whateverdescricao')
        var recipientcategoria_produtos_id = button.data('whatevercategoria_produtos_id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID do Produto: ' + recipient)
        modal.find('#id_pedidos').val(recipient)
        modal.find('#recipient-status').val(recipientstatus)
        //modal.find('#recipient-created').val(recipientcreated)
        modal.find('#recipient-valor').val(recipientvalor)
        modal.find('#recipient-promo_valor').val(recipientpromo_valor)
        modal.find('#descricao-text').val(recipientdescricao)
        modal.find('#recipient-categoria_produtos_id').val(recipientcategoria_produtos_id)
      })
    </script>
<!-- <script src="js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script type="text/javascript">
      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientcidadeCliente = button.data('whatevercidadeCliente')
        //var recipientcreated = button.data('whatevercreated')
        var recipientnomeCliente = button.data('whatevernomeCliente')
        var recipientpromo_valor = button.data('whateverpromo_valor')
        var recipientimagens = button.data('whateverimagens')
        var recipientcodigo = button.data('whatevercodigo')
        var recipientdescricao = button.data('whateverdescricao')
        var recipientsituacao_id = button.data('whateversituacao_id')
        var recipientcategoria_produtos_id = button.data('whatevercategoria_produtos_id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID do Produto: ' + recipient)
        modal.find('#id_pedido').val(recipient)
        modal.find('#recipient-cidadeCliente').val(recipientcidadeCliente)
        //modal.find('#recipient-created').val(recipientcreated)
        modal.find('.modal-valor').text('Valor do produto: R$' + recipientvalor)
        modal.find('#recipient-nomeCliente').val(recipientnomeCliente)
        modal.find('#recipient-promo_valor').val(recipientpromo_valor)
        modal.find('#recipient-imagens').val(recipientimagens)
        modal.find('#recipient-codigo').val(recipientcodigo)
        modal.find('#descricao-text').val(recipientdescricao)
        modal.find('#recipient-situacao_id').val(recipientsituacao_id)
        modal.find('#recipient-categoria_produtos_id').val(recipientcategoria_produtos_id)
      })
    </script>



    <?php $conn->close(); ?>
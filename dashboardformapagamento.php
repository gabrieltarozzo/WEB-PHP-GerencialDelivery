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

?>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.png">

      <!--  <script src="js/bootstrap.min.js"></script>-->
        <script src="js/jquery.min.js"></script>

        <title>Top Entregas</title>
        <link href="css/navbarsResponsives/navbarResponsive.css" rel="stylesheet">
       <link href="css/bootstrap.css" rel="stylesheet">
<!-- DATABLE NOVA -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
 <!-- -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.js"></script>

<!-- FIM DATATABLE NOVA -->

<!-- data filter -->


<!-- fim data filter
       <link href="css/dataTable/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"></script>
 <script type="text/javascript" charset="utf8" src="js/dataTable.min.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>
-->
    </head>
    <body class="">


<!-- brand --> <!-- class="navbar-brand" style="margin:0px !important; top:0px !important;" -->
<nav id = "navheight" class="navbar navbar-default navbar-fixed-top"">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php    $filterEmp = $_SESSION['usuarioEmpresa']; ?>
        <a href="#" > <img
            <?php if ($filterEmp == 1) { ?> class="logoresponsive" src="imagens/icon.jpg" <?php } ?>
              <?php if ($filterEmp == 2) { ?> class="logoresponsive2"  style="margin:3px;" src="imagens/turbodog.png" <?php } ?>
             <?php if ($filterEmp == 5) { ?>  class="logoresponsive2" src="imagens/logo.png" <?php } ?>></a>
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
                    <li><a href="dashboardClientes.php">Relatório de Clientes</a></li>
                    <li><a href="dashboardformapagamento.php">Relatório Forma de pagamento</a></li>
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

</div>
<!-- primeira tabela de numero de itens -->
<div  style="margin-top: 90px;">
<div class="container-fluid">

<script>
$(document).ready(function() {
    $('#example').DataTable( {
//aoColumns: [
 //       { "sType": "date-uk" },
  //          null,
  //          null,
  //          null,
   //         null,
   //         null
   //     ],
 //  dom: 'Bfrtip',
 // melhor usar o imprimir do Pedidos...
     //  buttons: ['pdf', 'pageLength'],
       language: {
    sEmptyTable: "Nenhum registro encontrado",
    sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
    sInfoFiltered: "<p>(Filtrados de _MAX_ registros)",
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
dom: 'Bflrtip',
//dom: 'lftBp',
 buttons: [
          { extend: 'pdf', footer: true },
            {
                extend: 'print',
                messageTop: ' <h4> Relatório de Categorias - Todos os registros. </h4>',
                footer: true,
                autoPrint: true,
                text: 'Imprimir',
                exportOptions: {
                  rows: function ( idx, data, node ) {
                    var dt = new $.fn.dataTable.Api( '#example2' );
                    var selected = dt.rows( { selected: true } ).indexes().toArray();

                    if( selected.length === 0 || $.inArray(idx, selected) !== -1)
                      return true;
                    return false;
                }
              }
            }

        ],
        select: true,
         initComplete:function(){

            $(".bottombuttons").append( $(".topbuttons").clone(true));
         },

order: [[ 0, "asc" ]],
lengthMenu: [[10, 25, 50, 100, 250, 500, 1000, -1], [10, 25, 50, 100, 250, 500, 1000, "Tudo"]],
        fixedHeader: true,

        responsive: true,

            fixedHeader: {
        headerOffset: $('#navheight').outerHeight(),
        footer: true
    },


    } );
} );


</script>

<?php


?>
<!--
<p id="date_filter">
    <span id="date-label-from" class="date-label">From: </span><input class="date_range_filter date" type="text" id="datepicker_from" />
    <span id="date-label-to" class="date-label">To:<input class="date_range_filter date" type="text" id="datepicker_to" />
</p> -->

<script>
    $(document).ready(function()
                     {
        $("#start").on('change',function()
                         {
            var keyword = $(this).val();
            var keyword2 = $(end).val();

            $.ajax(
            {
                url:'fetchDashForma.php',
                type:'POST',
                //data:'request='+keyword,
        data: {'request': keyword, 'request2': keyword2},

                beforeSend:function()
                {
                    $("#table-container").html('Filtrando todos os resultados...');

                },
                success:function(data)
                {
                    $("#table-container").html(data);
                },
            });
        });
    });

    $(document).ready(function()
                     {
        $("#end").on('change',function()
                         {
             var keyword = $(start).val();
            var keyword2 = $(this).val();

            $.ajax(
            {
                url:'fetchDashForma.php',
                type:'POST',
                //data:'request='+keyword,
        data: {'request': keyword, 'request2': keyword2},

                beforeSend:function()
                {
                    $("#table-container").html('Filtrando todos os resultados...');

                },
                success:function(data)
                {
                    $("#table-container").html(data);
                },
            });

        });
    });

</script>

<link href="js/calendar/bootstrap-datepicker.css" rel="stylesheet"/>
    <script src="js/calendar/bootstrap-datepicker.min.js"></script> 
    <script src="js/calendar/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>

  </head>
  <body>


    <div  align="center" class="container">


      <h3>Filtre por data</h3>
<br>
      <form class="form-horizontal">
         <div class="form-group">
          <label class="col-sm-5 control-label">Data Inicial</label>
          <div class="col-md-3 col-sm-3 col-lg-2 col-xs-12">
            <div class="input-group date">
              <input type="text" class="form-control" id="start" >
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th" ></span>
              </div>
            </div>

          </div>
          </div>
          <div class="form-group">
          <label class="col-sm-5 control-label">Data Final</label>
          <div class="col-md-3 col-sm-3 col-lg-2 col-xs-12">
            <div class="input-group date">
              <input type="text" class="form-control" id="end" >
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>

          </div>
          </div>

      </form>
    </div>

    <script type="text/javascript">
      $('#start').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR",
        autoclose: true,
        //startDate: '+0d',
      });

            $('#end').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR",
        autoclose: true,
        //startDate: '+0d',
      });

    </script>

  <?php 
  $nota_fiscal_0_n = "SELECT * FROM pedidos where empresa = '$filterEmp' and id_entrega = 0  ";
  $query_fiscal_0_n = mysqli_query($conn, $nota_fiscal_0_n);
  $fetch_fiscal_0_n = mysqli_fetch_assoc($query_fiscal_0_n);
  $total_fiscal_0_n = mysqli_num_rows($query_fiscal_0_n);

    $nota_fiscal_1_n = "SELECT * FROM pedidos where empresa = '$filterEmp' and id_entrega = 1  ";
  $query_fiscal_1_n = mysqli_query($conn, $nota_fiscal_1_n);
  $fetch_fiscal_1_n = mysqli_fetch_assoc($query_fiscal_1_n);
  $total_fiscal_1_n = mysqli_num_rows($query_fiscal_1_n);

  $nota_fiscal_0 = "SELECT *, sum(valorTotalDesconto) as value, sum(valorCd) as value1, sum(valorAd) as value2, sum(valorMax2) as value3 FROM nota_fiscal where empresa = '$filterEmp' and entrega = '0'  ";
  $query_fiscal_0 = mysqli_query($conn, $nota_fiscal_0);
  $fetch_fiscal_0 = mysqli_fetch_assoc($query_fiscal_0);
  $total_fiscal_0 = mysqli_num_rows($query_fiscal_0);

//quando entrega for 1 é retirada
  $nota_fiscal_1 = "SELECT *, sum(valorTotalDesconto) as value, sum(valorCd) as value1, sum(valorAd) as value2, sum(valorMax2) as value3 FROM nota_fiscal where empresa = '$filterEmp' and entrega = '1'  ";
  $query_fiscal_1 = mysqli_query($conn, $nota_fiscal_1);
  $fetch_fiscal_1 = mysqli_fetch_assoc($query_fiscal_1);
  $total_fiscal_1 = mysqli_num_rows($query_fiscal_1);


$vralue0 = $fetch_fiscal_0['value']; 
$vralue1 = $fetch_fiscal_0['value1'];
$vralue2 = $fetch_fiscal_0['value2'];
$vralue3 = $fetch_fiscal_0['value3'];
$vralueFinal = $vralue0 + $vralue1 + $vralue2 + $vralue3;

$vralue10 = $fetch_fiscal_1['value']; 
$vralue20 = $fetch_fiscal_1['value1']; 
$vralue30 = $fetch_fiscal_1['value2']; 
$vralue40 = $fetch_fiscal_1['value3']; 
$vralueFinal2 = $vralue10 + $vralue20 + $vralue30 + $vralue40;


//TICKET MEDIO ENTREGA
if ($total_fiscal_0_n != 0){ 
$TICKETMEDIO1 = ($vralueFinal / $total_fiscal_0_n);
}else { $TICKETMEDIO1 = 0; }
//TICKET MEDIO RETIRADA
if ($total_fiscal_1_n != 0){ 
$TICKETMEDIO2 = ($vralueFinal2 / $total_fiscal_1_n);
}else { $TICKETMEDIO2 = 0; }


//total valores
$retotal = $vralueFinal2 + $vralueFinal;

//total quantidade
$quantotal =  $total_fiscal_1_n + $total_fiscal_0_n;

if( $retotal != 0 ) {
//porcentagem entrega
  $porcet1 = ($vralueFinal / $retotal) * 100;

  //porcentagem retirada
  $porcet2 = ($vralueFinal2 / $retotal) * 100;

    //TOTAL TICKET MEDIO
$totalTicket = ($retotal / $quantotal);

} else{ $porcet1 = 0; $porcet2 = 0; $totalTicket = 0; }
  //porcentagem total
  $porcetotal = $porcet1 + $porcet2;




  ?>

<div id="table-container">
<table id="example" class="mdl-data-table table table-bordered table-striped" style="width:100%;">

        <thead>
            <tr>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Ticket Médio</th>
                <th>% Vendas</th>
            </tr>
        </thead>

        <tbody>

          <tr>
                  <td> ENTREGA </td>
                 <td> R$ <?php echo number_format($vralueFinal,2,",","");   ?> </td>
                    <td>  <?php echo $total_fiscal_0_n; ?></td>
                    <td> R$ <?php echo number_format($TICKETMEDIO1,2,",","");  ?> </td>
                      <td> <?php echo number_format($porcet1,2,",",""); ?> % </td>
               </tr>

          <tr>

                  <td> RETIRADA </td>
                  <td> R$ <?php echo number_format($vralueFinal2,2,",","");   ?> </td>
                    <td>  <?php echo $total_fiscal_1_n; ?></td>
                    <td> R$ <?php echo number_format($TICKETMEDIO2,2,",","");  ?> </td>
                      <td> <?php echo number_format($porcet2,2,",",""); ?> % </td>
               </tr>

          </tbody>
          <tfoot>

    <tr>
     <td>Total:</td>
     <td>R$ <?php echo number_format($retotal,2,",",""); ?></td>

     <td><?php
      echo $quantotal; 
      ?></td>
      <td> R$ <?php echo number_format($totalTicket,2,",",""); ?> </td>

     <td><?php echo $porcetotal; ?> %</td>

  </tr>

          </tfoot>

        </table>

 <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

google.charts.load('current', {
    packages: ['bar']
}).then(function () {
    var dataDefault = google.visualization.arrayToDataTable([
        ['Todo Periodo', 'Valor [Entrega]', 'Valor [Retirada]'],
        ['R$', <?php echo $vralueFinal;   ?>, <?php echo $vralueFinal2;   ?>],
    ]);

    var dataLibraryBooks = google.visualization.arrayToDataTable([
        ['Todo Periodo', 'Quantidade [Entrega]', 'Quantidade [Retirada]'],
        ['R$', <?php echo $total_fiscal_0_n;   ?>, <?php echo $total_fiscal_1_n;   ?>],
    ]);;

    var dataSunspots = google.visualization.arrayToDataTable([
        ['x', 'y'],
        ['A', 10],
        ['B', 30],
        ['C', 50],
        ['D', 70],
        ['E', 90]
    ]);

    var options = {

        chart: {
            title: 'Visualização Gráfica'
        }
    };



    var chart = new google.charts.Bar(document.getElementById('chart_div'));

    var menu = document.getElementById('menu');
    menu.addEventListener('change', drawChart, false);
    options['vAxis']['format'] = 'long';

    drawChart();
    function drawChart() {
      switch (menu.selectedIndex) {
        case 1:
          console.log('librarybooks');
          chart.draw(dataLibraryBooks, google.charts.Bar.convertOptions(options));
          break;

        case 2:
          console.log('Sunspots');
          chart.draw(dataSunspots, google.charts.Bar.convertOptions(options));
          break;

        default:
          console.log('default');
          chart.draw(dataDefault, google.charts.Bar.convertOptions(options));
      }
    }
});
    </script>

    <!--Div that will hold the pie chart-->

  <script src="https://www.gstatic.com/charts/loader.js"></script>
<select id="menu" class="select">
  <option selected>Valores</option>
  <option>Quantidade</option>
  <option>Ticket Médio</option>
</select><br><br>

<div id="chart_div"></div>




        <?php $conn->close(); ?>
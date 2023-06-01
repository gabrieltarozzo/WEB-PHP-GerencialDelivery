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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.20/sorting/datetime-moment.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.20/sorting/date-uk.js"></script>
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

        order: [[ 4, "desc" ]],
             columnDefs: [
       { type: 'date-uk', targets: [5, 6] }
     ],
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
                url:'fetchDashClientes.php',
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
                url:'fetchDashClientes.php',
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
 //$nota_fiscal_0 = "SELECT *, COUNT(id_usuarios) as nped FROM pedidos where empresa = '$filterEmp' GROUP BY id_usuarios ";
 //$query_fiscal_0 = mysqli_query($conn, $nota_fiscal_0);
 // $fetch_fiscal_0 = mysqli_fetch_assoc($query_fiscal_0);
 // $total_fiscal_0 = mysqli_num_rows($query_fiscal_0);
 //necessario aplicar count de id_usuarios no pedidos para saber quantos pedidos foram efetuados
 //talves usar o id de cada pedido.. pensar no group by tambem
    $nota_fiscal_0 = "
    SELECT usuarios.*,
    COUNT(pedidos . id_usuarios) AS nped,
    SUM(pedidos . valor) AS valorMax,
    SUM(pedidos . valorCd) AS valorMax2,
    SUM(pedidos . valorAd) AS valorMax3,
    SUM(pedidos . valorMax2) AS valorMax4,
    endereco . rua AS ruaCliente,
    endereco . cidade AS cidadeCliente,
    endereco . bairro AS bairroCliente,
    endereco . distancia AS distanciaCliente,
    endereco . complemento AS complementoCliente,
    endereco . telefoneCliente AS telefonedoClienteX,
    pedidos . nomeCliente AS nomedoCliente,
    pedidos . telefoneCliente AS telefonedoCliente,
    pedidos . numeroCasaCliente AS numeroCasaCliente1,
    MAX(DATE_FORMAT(pedidos . created,'%d/%m/%Y')) as pedidocreated,
    usuarios . nome as meunome,
    usuarios . telefone as meutelefone,
    usuarios . created AS dataCriado
    FROM usuarios
    LEFT JOIN pedidos
    ON usuarios . id = pedidos . id_usuarios
    LEFT JOIN endereco
    ON usuarios . id = endereco . id_usuarios
    where usuarios . empresa = $filterEmp
    GROUP BY usuarios . id, `pedidos` . `id_usuarios`
    ORDER BY (nped) ASC ";
    $query_fiscal_0 = mysqli_query($conn, $nota_fiscal_0);
  ?>

<div id="table-container">
<table id="example" class="mdl-data-table table table-bordered table-striped" style="width:100%;">
        <thead>
            <tr>
                <th >Nome</th>
                <th>Telefone</th>
                <th>Total Gasto</th>
                <th>Ticket Médio</th>
                <th>Nº de pedidos</th>
                <th>Data do ultimo pedido</th>
                <th>Cliente desde</th>
                <th> Detalhes </th>
            </tr>
        </thead>
        <tbody>
         <?php while($rows_categorias = mysqli_fetch_assoc($query_fiscal_0)){ ?>
          <tr>
                  <td > <?php if ($rows_categorias['meunome'] == null) { echo $rows_categorias['nomedoCliente']; } else { echo $rows_categorias['meunome']; }?> </td>
                  <td align="center"> <?php if ($rows_categorias['telefonedoClienteX'] == null) { echo "Não cadastrado"; } else { echo $rows_categorias['telefonedoClienteX']; }?> </td>
                  <td align="center"> R$ <?php 
                  $valormax1234 = $rows_categorias['valorMax'] + $rows_categorias['valorMax2'] + $rows_categorias['valorMax3'] + $rows_categorias['valorMax4'];
                  echo number_format($valormax1234,2,",",""); ?> </td>
                  <td align="center"> R$ <?php if($rows_categorias['nped'] != 0) { $ticketmedio = $rows_categorias['valorMax'] / $rows_categorias['nped']; } else{ $ticketmedio = 0; }echo number_format($ticketmedio,2,",","");  ?> </td>
                  <td align="center"> <?php echo $rows_categorias['nped']; ?> </td>
                  <td align="center"> <?php if ($rows_categorias['pedidocreated'] == NULL) { echo "N/A"; } echo $rows_categorias['pedidocreated']; ?> </td>
                  <td align="center"> <?php  if ($rows_categorias['dataCriado'] == NULL) { echo "29/01/2019"; } else { $date2 = new DateTime($rows_categorias['dataCriado']);echo $date2->format('d/m/Y'); }?> </td>
                  <td align="center"> <button type="button" data-toggle="modal" data-target="#myModal<?php echo $rows_categorias['id'];?>" data-whatever="<?php echo $rows_categorias['id']; ?>"  class="btn btn-xs btn-warning" > <b> Detalhar </b> </button> </td>
                  </tr>
                <div class="modal fade " id="myModal<?php echo $rows_categorias['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div  class="modal-header" >
                               <button id="fechar<?php echo $rows_categorias['id']; ?>" type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                              <h3  id="bodi<?php echo $rows_categorias['id']; ?>" class="modal-title text-center" id="myModalLabel"> Ficha do cliente: <?php echo $rows_categorias['nomedoCliente']; ?> </h3>
                            </div>
                            <div class="modal-body"  id="bodi<?php echo $rows_categorias['id']; ?>">
                              <b> Email: <?php echo $rows_categorias['email']; ?> </b> <br>
                              <b> Telefone: <?php echo $rows_categorias['telefonedoCliente']; ?> </b> <br>
                              <hr>
                              <b> Cidade: <?php echo $rows_categorias['cidadeCliente']; ?> </b> <br>
                              <b> Bairro: <?php echo $rows_categorias['bairroCliente']; ?> </b> <br>
                              <b> Rua: <?php echo $rows_categorias['ruaCliente']; ?> </b> - <b> Nº: <?php echo $rows_categorias['numeroCasaCliente1']; ?> </b>
                       <?php if ($rows_categorias['complementoCliente'] != 'undefined' && $rows_categorias['complementoCliente'] != NULL && $rows_categorias['complementoCliente'] != " " ) { ?>
                             <br> <b> Complemento: <?php echo $rows_categorias['complementoCliente']; ?> </b> <br>
                              <?php } ?>
                              <br>
                              <hr>
                              <b> Extras </b> <br>
                              <b> Distância até o(a) <?php echo $_SESSION['usuarioNome']; ?>: <?php echo $rows_categorias['distanciaCliente']; ?> KM </b>
                          </div>
                        </div>
                      </div>
                    </div>
               <?php } ?>
          </tbody>
        </table>
      </div>
        <?php $conn->close(); ?>
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
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>-->
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
                 messageTop: ' <h4> Relatório Geral de Produtos - Todos os registros. </h4>',
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
//preciso contar quantos itens existem com aquele preço e quantidade
// imagina que existem 10 do mesmo item 6 dos itens deram 5 reais com 4 em quantidade
// 2 dos itens deram 3 reais com 2 em quantidade
// 2 dos itens deram 2 reais com 5 em quantidade
//trazendo para nossa realidade - 2 pizzas calabresas
// existem 2 itens, 1 desse item deu 26 quantidade 1
// 1 desse item deu 22.9 quantidade 1
//GROUP BY nomeProduto
  $result_categorias = "SELECT  `nota_fiscal` . *, sum(valorTotalDesconto) AS vlr_valor , sum(valorMax2) AS max2, sum(valorAd) AS adValor, sum(valorCd) AS cdValor, SUM(quantidade) AS quantidadesoma, valor AS qtdValor, `categoria_produtos` . `nome` AS `nomeCategoria` FROM nota_fiscal
  LEFT JOIN `categoria_produtos` ON `nota_fiscal` . `categoria_id` = `categoria_produtos` . `id`
  where `nota_fiscal` . `empresa` = '$filterEmp'
  GROUP BY nomeProduto
  ORDER BY (id) ASC";
  $resultado_categorias = mysqli_query($conn, $result_categorias);
  $total_categorias = mysqli_num_rows($resultado_categorias);
    $result_categoriaswe = "SELECT  `nota_fiscal` . *, sum(valorTotalDesconto) AS vlr_valor , sum(valorMax2) AS max2, sum(valorAd) AS adValor, sum(valorCd) AS cdValor, SUM(quantidade) AS quantidadesoma, valor AS qtdValor, `categoria_produtos` . `nome` AS `nomeCategoria` FROM nota_fiscal
    LEFT JOIN `categoria_produtos` ON `nota_fiscal` . `categoria_id` = `categoria_produtos` . `id`
    where `nota_fiscal` . `empresa` = '$filterEmp'  ";
    $resultado_categoriaswe = mysqli_query($conn, $result_categoriaswe);
    $resultCount = "SELECT * FROM nota_fiscal where valorAd != '' and empresa = '$filterEmp' ";
    $resCount = mysqli_query($conn, $resultCount);
    $data=mysqli_fetch_assoc($resCount);
    $datatotal = mysqli_num_rows($resCount);
    $resultCountC = "SELECT * FROM nota_fiscal where valorCd != '' and empresa = '$filterEmp' ";
    $resCountC = mysqli_query($conn, $resultCountC);
    $dataC=mysqli_fetch_assoc($resCountC);
    $datatotalC = mysqli_num_rows($resCountC);
    $resultCountCX = "SELECT * FROM nota_fiscal where valorMax2 != '' and empresa = '$filterEmp' ";
    $resCountCX = mysqli_query($conn, $resultCountCX);
    $dataCX = mysqli_fetch_assoc($resCountCX);
    $datatotalCX = mysqli_num_rows($resCountCX);
    $tot = "SELECT sum(quantidade) as qtde from nota_fiscal where empresa = '$filterEmp' ";
    $resultado_categoriase = mysqli_query($conn, $tot);
    $rows_categoriase = mysqli_fetch_assoc($resultado_categoriase);
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
                url:'fetchDash.php',
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
                url:'fetchDash.php',
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
  <?php $rows_categoriasw = mysqli_fetch_assoc($resultado_categoriaswe);
        $total_categoriaswe = mysqli_num_rows($resultado_categoriaswe);
        $newAd = $rows_categoriasw['adValor'];
        $newMax2 = $rows_categoriasw['max2'];
        $newCd = $rows_categoriasw['cdValor'];
        $MEUVALOR = $rows_categoriasw['vlr_valor'] + $newAd + $newCd + $newMax2; ?>
          <?php $MEUVALORE = $rows_categoriasw['vlr_valor'] + $newCd + $newAd + $newMax2; ?>
<div id="table-container">
<table id="example" class="mdl-data-table table table-bordered table-striped" style="width:100%;">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>% Vendas</th>
            </tr>
        </thead>
        <tbody>
                    <tr>
<?php
              $rowtotal = $rows_categoriase['qtde'];
              $rowedit = $rowtotal + $datatotal;
             if ($MEUVALOR != 0) { $porcetdata = ($newAd / $MEUVALOR) * 100; } else { $porcetdata = 0;}  ?>
                  <td> ADICIONAIS </td>
                  <td> ADICIONAIS </td>
                  <td> R$ <?php echo number_format($newAd,2,",","");  ?> </td>
                    <td>  <?php echo $datatotal; ?></td>
                      <td> <?php echo number_format($porcetdata,2,",",""); ?> % </td>
               </tr> 
          <?php $total = 0; $totall = 0; $totalll = 0; $newsomatotal = 0; $porcettotal = 0; $VALOROFICIAL = 0; $totalAd = 0; $newMax2 = 0; ?>
           <?php while($rows_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>
            <tr>
                <td><?php echo $rows_categorias['nomeProduto']; ?></td>
                <?php
                // idéia, aqui o codigo gira 19x, talvez contar os valores nao daria certo ou n ao acho q nao pqpqwekoqkoe
                  $newAd = $rows_categorias['adValor'] ;
                      $newMax2 = $rows_categorias['max2'] ;
                 $newvalor = $rows_categorias['vlr_valor'] + $newMax2 ;
               $newsomatotal =  $newsomatotal + $rows_categorias['quantidadesoma'];
              if ($MEUVALOR != 0) {   $porcet = ($newvalor / $MEUVALOR) * 100; } else { $porcet = 0;}
               $porcettotal = $porcettotal + $porcet;
                ?>
                <td><?php echo $rows_categorias['nomeCategoria']; ?></td>
                <td style="white-space:nowrap;">R$ <?php echo number_format($newvalor,2,",","");  ?></td>
                 <td><?php $qtdsoma2=  $rows_categorias['quantidadesoma']; echo number_format($qtdsoma2,0 ,",",""); ?>
                 </td>
                <td style="white-space:nowrap;"><?php echo number_format($porcet,2,",",""); ?> %</td>
            </tr>
           <?php
           $total = $newvalor + $total;
           $totalll = $total + $totall;
           $totalAd = $newAd + $totalAd;
         ?>
               <?php }  // PARTE DOS COMPLEMENTOS ?>
                    <tr>
<?php
              $rowtotal = $rows_categoriase['qtde'];
              $rowedit = $rowtotal + $datatotalC;
              if ($MEUVALORE != 0) { $porcetdataC = ($newCd / $MEUVALORE) * 100; } else { $porcetdataC = 0;} ?>
                  <td> COMPLEMENTOS </td>
                  <td> COMPLEMENTOS </td>
                  <td> R$ <?php echo number_format($newCd,2,",","");  ?> </td>
                    <td>  <?php echo $datatotalC; ?></td>
                      <td> <?php echo number_format($porcetdataC,2,",",""); ?> % </td>
               </tr> 
          <?php $VALOROFICIAL = 0; $totalCd = 0; ?>
           <?php while($rows_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>
            <tr>
                <td><?php echo $rows_categorias['nomeProduto']; ?></td>
                <?php
                // idéia, aqui o codigo gira 19x, talvez contar os valores nao daria certo ou n ao acho q nao pqpqwekoqkoe
                  $newCd = $rows_categorias['cdValor'] ;
                 $newvalor = $rows_categorias['vlr_valor'] ;
               $newsomatotal =  $newsomatotal + $rows_categorias['quantidadesoma'];
               $porcet = ($newvalor / $MEUVALORE) * 100;
               $porcettotal = $porcettotal + $porcet;
                ?>
                <td><?php echo $rows_categorias['nomeCategoria']; ?></td>
                <td style="white-space:nowrap;">R$ <?php echo number_format($newvalor,2,",","");  ?></td>
                 <td><?php $qtdsoma2=  $rows_categorias['quantidadesoma']; echo number_format($qtdsoma2,0 ,",",""); ?>
                 </td>
                <td style="white-space:nowrap;"><?php echo number_format($porcet,2,",",""); ?> %</td>
            </tr>
           <?php
           $total = $newvalor + $total;
           $totall = $rows_categorias['frete'] + $totall;
           $totalll = $total + $totall;
           $totalCd = $newCd + $totalCd;
         ?>
               <?php } ?>
          </tbody>
          <tfoot>
       <tr>
<?php
 $newAd = $rows_categoriasw['adValor'];
 $retotal = $total + $newAd + $newCd ;
  //$resultCount = "SELECT * FROM nota_fiscal where valorAd != '' and empresa = '$filterEmp' ";
 // $resCount = mysqli_query($conn, $resultCount);
  //$data=mysqli_fetch_assoc($resCount);
    $datatotal = mysqli_num_rows($resCount);
    ?>
    <td> </td>
     <td>Total:</td>
     <td>R$ <?php echo number_format($retotal,2,",",""); ?></td>
     <td><?php $newst = $newsomatotal + $datatotal + $datatotalC;
      echo $newst; ?></td>
        <?php  if($datatotalC != '' or $datatotalC != 0 and $datatotal != '' or $datatotal != 0) { $porcettotal = $porcettotal + $porcetdata + $porcetdataC; }
        else if ( $datatotal != '' or $datatotal != 0 ) {
              $porcettotal = $porcettotal + $porcetdata;
        } else if ($datatotalC != '' or $datatotalC != 0  ) {
$porcettotal = $porcettotal + $porcetdataC;
        }
        ?>
     <td><?php echo $porcettotal; ?> %</td>
  </tr>
  </tfoot>
        </table>
      </div>
        <?php $conn->close(); ?>
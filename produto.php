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
  //$pagina = (isset ($_GET['pagina']))? $_GET['pagina'] : 1;
  $filterEmp = $_SESSION['usuarioEmpresa'];
  //Selecionar todos os produtos da tabela
  //$result_produto = "SELECT * FROM produtos where empresa = '$filterEmp' ORDER BY (nome)";
  //$resultado_produto = mysqli_query($conn, $result_produto);
  //Contar o total de produtos
  //$total_produtos = mysqli_num_rows($resultado_produto);
  //Seta a quantidade de produtos por página
  //$quantidade_pg = 99999;
  //Calcular o nº de paginas necessárias para apresentar os produtos
  //$num_pagina = ceil($total_produtos/$quantidade_pg);
  //Calcular o inicio da visualização
  //$inicio = ($quantidade_pg * $pagina) - $quantidade_pg;
  //Selecionar os produtos a serem apresentados na página

  //$result_produtos = "SELECT * FROM produtos where empresa = '$filterEmp' ORDER BY (nome) ASC";
  //$result_produtos = "SELECT * FROM produtos ORDER BY (nome) ASC limit $inicio, $quantidade_pg";
  //$resultado_produtos = mysqli_query($conn, $result_produtos);
  //$total_produtos = mysqli_num_rows($resultado_produtos);

  //Abaixo a representacao de como deitar e rolar no codigo:

$result_produtos = "SELECT `produtos` . *, `categoria_produtos` . `nome` 
AS `categoria_do_nome` , `situacoes` . `nome` AS`situacao_do_nome` FROM `produtos`

LEFT JOIN `categoria_produtos` ON `produtos` . `categoria_produtos_id` = `categoria_produtos` . `id`

LEFT JOIN `situacoes` ON `produtos` . `situacao_id` = `situacoes` . `id`

WHERE `produtos` . `empresa` = '$filterEmp' ORDER BY (nome) ASC";

 
  //$result_produtos = "SELECT * FROM produtos ORDER BY (nome) ASC limit $inicio, $quantidade_pg";
  $resultado_produtos = mysqli_query($conn, $result_produtos);
  $total_produtos = mysqli_num_rows($resultado_produtos);




?>
<br>

<!DOCTYPE html>
<html lang="pt-br" >

<head>
   <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.png">

        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
       
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




<!--    <script type="text/javascript">
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > -50) {
                    $('.newsletter').fadeIn();
                } else {
                    $('.newsletter').fadeOut();
                }
            });
        });
    </script> -->
<!-- script do selectbox filter -->

<script>
    $(document).ready(function()
                     {
        $("#fetchval").on('change',function()
                         {
            var keyword = $(this).val();
            var keyword2 = $(fetchval2).val();

            $.ajax(
            {
                url:'fetch.php',
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
<script>
    $(document).ready(function()
                     {
        $("#fetchval2").on('change',function()
                         {
             var keyword = $(fetchval).val();
            var keyword2 = $(this).val();

            $.ajax(
            {
                url:'fetch.php',
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







<!-- fimm do script do selectbox filter -->
    <!-- fim teste -->
  </head>




    <!-- Original Navbar -->
    <!-- esse estilo aqui que faz sumir os titulo da tabela --> 
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
               <li><a href="../postmessage/index.php">Envio de Notificações</a></li>
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

  <body role="document">


 <div id="main" class="container-fluid" style="margin-top: 50px">
  <div id="top" class="row">
    <div class="col-sm-3">
      <h2>Produtos</h2>
    </div>
    <div class="col-sm-5">

      <div class="col-sm-5 pull-right" style="width: 50%">
        <h4> Filtre por Categoria:</h4>
        <select class="form-control " id="fetchval" name="fetchby">
          <option value = "0"> Mostrar Tudo</option>
          <?php
           include_once("conexao.php");

              $resultado =mysqli_query($conn, "SELECT * FROM categoria_produtos where empresa = '$filterEmp'");
            while($dados = mysqli_fetch_assoc($resultado)){
              ?>
                <option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
              <?php
            }
          ?>
        </select>
        </div>

      <div class="col-sm-5 pull-right" style="width: 50%">

        <h4> Filtre por Situacao:</h4>
        <select class="form-control " id="fetchval2" name="fetchby2">
          <option value = "0"> Mostrar Tudo</option>
          <?php
           include_once("conexao.php");

              $resultadoe =mysqli_query($conn, "SELECT * FROM situacoes WHERE tipoSelect = 0");
            while($dados = mysqli_fetch_assoc($resultadoe)){
              ?>
                <option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
              <?php
            }
          ?>
        </select>
    </div>
    </div>

  <div  class="row" style="margin-right:10px;">
    <div >
      <a href="cadastrar_produto.php" class="btn btn-primary pull-right h2">Cadastrar Produto</a>
    </div>
    <div style="margin-right:50px;">
    <div  style="margin-right:120px;" >
      <a href="adicionais.php" class="btn btn-primary pull-right h2">Adicionais</a>
    </div>
        </div>
  </div>
  </div>
  </div>
  </div>
  <hr />

        <!-- -->
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
order: [[ 1, "asc" ]],
   
        responsive: true,
        fixedHeader: true,  
  
         
            fixedHeader: {
        headerOffset: $('#navheight').outerHeight(),
 
    },

    } );
} );

</script>

<div id="table-container">

        <table id="example" style="width:100%;" class="table table-striped table-hover table" cellspacing="0" cellpadding="0">
      <thead>
          <tr>
            <th >Cód</th>
            <th >Nome do produto</th>
            <th >Preço de Venda</th>
            <th style="white-space: nowrap;">% Promocional</th>
            <th style="white-space: nowrap;">Desconto em R$</th>
            <th >Situação</th>
            <th  >Categoria produto</th>
  <?php    $filterEmp = $_SESSION['usuarioEmpresa']; ?>

           <?php if ($filterEmp == 4) {  ?> <th  >Unidade de medida </th>
                                               <th  >Tipo de valor </th>
 <?php } ?>
            <th></th>
          </tr>
        </thead>
            <tbody>

                <?php
                //($rows_categorias = mysqli_fetch_assoc($resultado_categorias))
                //$rows_categorias['id']
                  include_once("conexao.php");

                    //sempre que alterar aqui lembrar de alterar no fetch.php também
                while($rows_produtos = mysqli_fetch_assoc($resultado_produtos)){ ?>
                <?php $sit_id = $rows_produtos['situacao_id']; ?>


                  <tr <?php if($sit_id == '2'){ ?> class="desativado" <?php } ?> <?php if($sit_id == '3'){ ?> class="desativado" <?php } ?> >

                    <td  ><?php if($rows_produtos['codigo'] == ""){echo $rows_produtos['id'];} else{echo $rows_produtos['codigo'];} ?></td>
                              <td >
                                                    <div style=" overflow:auto; overflow-wrap: break-word;">
                                                       <?php echo $rows_produtos['nome']; ?>
                                                    </div>
                                                         </td>

                                                        <?php $valor_final = $rows_produtos['valor']-$rows_produtos['promo_valor'];  ?>

                              <td >
                                                    <div style=" overflow:auto; overflow-wrap: break-word;">
                                                        R$ <?php echo number_format($valor_final,2,",",""); ?> 
                                                    </div>
                                                         </td>

                    <?php if($rows_produtos['valor'] == 0) { $porcento = 0; } else { $porcento = (-$rows_produtos['valor']-(-$rows_produtos['promo_valor']))*100/$rows_produtos['valor']-(-100); }?>

                    <td >
                                    <div style=" overflow:auto; overflow-wrap: break-word;">
                                                        <?php echo number_format($porcento,2,".",""); ?> %
                                                    </div>
                                             </td>


                    <?php $valor_finall = +$rows_produtos['promo_valor'];  ?>

                    <td >
                                    <div style=" overflow:auto; overflow-wrap: break-word;">
                                                        R$ <?php echo number_format($valor_finall,2,",",""); ?>
                                                    </div>
                                             </td>


                    <td ><?php echo $rows_produtos['situacao_do_nome']; ?></td>

                    <td ><?php echo $rows_produtos['categoria_do_nome']; ?></td>


           <?php if ($filterEmp == 4) { ?> 

  <td > <?php $filterEmp = $_SESSION['usuarioEmpresa'];
      
            $metricaVal =  $rows_produtos['metricaValor'];

           $resultado =mysqli_query($conn, "SELECT * FROM situacoes where tipoSelect = 1 and valor = '$metricaVal'");
           $dados = mysqli_fetch_assoc($resultado);
            echo $dados["nome"]; ?> </td>

            <td > <?php
      $filterEmp = $_SESSION['usuarioEmpresa'];
            $tipoValor =  $rows_produtos['tipoValor'];

           $resultado =mysqli_query($conn, "SELECT * FROM situacoes where tipoSelect = 2 and valor = '$tipoValor'");
           $dados = mysqli_fetch_assoc($resultado);
            echo $dados["nome"];

            ?>   </td>

<?php } ?>


                    <!--<td><?php // echo $rows_produtos['created']; ?></td> pensar em adicionar imagem -->

                    <td style="width:200px;">
       <button type="button" class="btn btn-xs btn-primary teste1" data-toggle="modal" data-target="#myModal<?php echo $rows_produtos['id'];?>"> Visualizar</button>
                      <!--  -->
                      <button type="button" class="btn btn-xs btn-warning teste1" data-toggle="modal" data-target="#exampleModal"
                      data-whatever="<?php echo $rows_produtos['id']; ?>"
                      data-whateversituacao_id="<?php echo $rows_produtos['situacao_id'];?>"
                      data-whatevercategoria_produtos_id="<?php echo $rows_produtos['categoria_produtos_id'];?>"
                      data-whatevernome="<?php echo $rows_produtos['nome']; ?>"
                      data-whateverimagens="<?php echo $rows_produtos['imagens']; ?>"
                      data-whatevermetrica_Valor="<?php echo $rows_produtos['metricaValor'];; ?>"
                      data-whatevertipo_Valor="<?php echo $rows_produtos['tipoValor']; ?>"
                      data-whatevervalor="<?php echo $rows_produtos['valor']; ?>"
                      data-whateverdescricao="<?php echo $rows_produtos['descricao']; ?>"
                      data-whatevercodigo="<?php if($rows_produtos['codigo'] == ""){echo $rows_produtos['id'];} else{echo $rows_produtos['codigo'];} ?>"
                      data-whateverpromo_valor="<?php echo $rows_produtos['promo_valor']; ?>">
                      Editar</button>
                        <!-- -->
                        <button type="button" class="btn btn-xs btn-danger teste1" data-toggle="modal" data-target="#delete-modal" data-whatever="<?php echo $rows_produtos['id']; ?>">Excluir</button>
                            <?php if($rows_produtos['temcomple'] == '1') {  ?>
                    <?php echo "<a href='edit_complement.php?id=".$rows_produtos['id']."'>" ?>
                      <button type="button"  class="btn btn-xs btn-warning" style="width:83%;margin-top:5px;background-color:#5F9EA0;color:white;">Editar Complementos</button>
                   <?php "</a> "; ?> <?php } ?>
                                        <?php //if($rows_produtos['temcomple'] == '1') {  ?>
                   <!--   <button type="button"  class="btn btn-xs btn-warning"  data-toggle="modal" data-target="#myModalComple<?php echo $rows_produtos['id'];?>" style="width:83%;margin-top:5px;background-color:#5F9EA0;color:white;">Editar Complementos</button>  -->
                   <?php//  } ?>
                    </td>
                  </tr>

                <!-- Inicio Modal -->
                <div class="modal fade" id="myModal<?php echo $rows_produtos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                  <div class="modal-dialog modal-se " role="document">
                    <div class="modal-content back">
                      <div class="modal-header headermodal">
                          <link href="css/visualizar/produto.css" rel="stylesheet">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center" id="myModalLabel">Visual no aplicativo</h3>
                      </div>
                      <div class="modal-body" align="center">
                        <?php echo "<div class='card' id='img_div'>"; ?>
                        <p><b style="font-size:20px;color:black;"> <?php echo $rows_produtos['nome']; ?></b></p><p> <?php echo "<img class='imgt' src='imagens_produtos/".$rows_produtos['imagens']."' >" ?> </p>

                        <!-- <img src="caminho_imagem/nome_imagem.jpg">﻿
                                echo "<div id='img_div'>";
                            echo "<img src='imagens_produtos/".$row['image']."' >";
                          echo "</div>";

                         TESTE  -->
      <b style="font-size:18px;color:black;"> Valor:</b> <b style="font-size:21px;color:green;"> R$<?php echo $rows_produtos['valor'] - $rows_produtos['promo_valor']; ?></b> <br><br>
      <p><b style="font-size:18px;color:black;"> Descricao... </b></p><p><h4 class="th4"><?php echo $rows_produtos['descricao']; ?></p>

    <?php echo "</div>"; ?>
                          <!--FIM TESTE -->

                      </div>
                    </div>
                  </div>
                </div>


                                <div class="modal fade" id="myModalComple<?php echo $rows_produtos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalCompleLabel" >

                  <div class="modal-dialog xe"  role="document">
                    <div class="modal-content">
                      <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center" id="myModalCompleLabel">Complementos</h3>
                      </div>
                      <div class="modal-body xa" align="center">
            <button type="button" class="addmoreX pqw"><b style="font-size:21px;"> + </b> <b> Adicionar Categoria </b></button>
      <br> <br>

                      <?php

                  include_once("conexao.php");
                  $idProdutoX = $rows_produtos['id'];


$result_produtos_comple = "SELECT * FROM `categoriaComplementos` WHERE `empresa` = '$filterEmp' and idProduto = '$idProdutoX'";

  //$result_produtos = "SELECT * FROM produtos ORDER BY (nome) ASC limit $inicio, $quantidade_pg";
  $resultado_produtos_comple  = mysqli_query($conn, $result_produtos_comple );



         ?>

<div class="addressessz" id="addressessz" >

     <div class="addressess" id="addressess" >

     <button type="button" style="visibility:hidden;" class="addmoreX pqw">Adicionar Categoria</button>
          <?php   while($rows_produtos_comple = mysqli_fetch_assoc($resultado_produtos_comple)){ ?>

               <div class="form-group col-md-2" style="display: none;">
<input  name='numbercat[]' value='1' type='text' id='numbercat[]'>
    </div>
    <div class="row" style="margin:1px;">
   <hr>
          <div class='form-group col-md-6'>
        <label  for="recipient-name" class="control-label">Nome da Categoria</label>
        <input name="nomeCategoria[]" type="text" id="nomeCategoria[]" class="form-control" placeholder="Digite o nome da Categoria" value="<?php echo $rows_produtos_comple['categoriaComplemento']; ?>" >
     </div>
       <div class="form-group col-md-3">
        <label  for="recipient-name" class="control-label">Qtd. Min.</label>
        <input name="qtdMin[]" type="text" id="qtdMin[]"  class="form-control" placeholder="" value="<?php echo $rows_produtos_comple['qtdMin']; ?>" >
      </div>

       <div class="form-group col-md-3">
        <label  for="recipient-name" class="control-label">Qtd. Max.</label>
        <input name="qtdMax[]" type="text" id="qtdMax[]" class="form-control" placeholder="" value="<?php echo $rows_produtos_comple['qtdMax']; ?>"  >
      </div>

</div>

     <div class="form-group col-md-12" >
          <label class="">Complemento Obrigatorio</label>

        <select class="form-control" name="complementoObriga[]" value="<?php echo $rows_produtos_comple['CompleObriga']; ?>" >
                <option value="1">Sim</option>
                <option value="0">Não</option>

        </select>
    
    </div>


         <div class="addresses" id="addresses" >

          <div class="address" id="address0">

              <div class="row" style="margin-left:1%;" class="rea">
 <button type="button" class="addmore pqw"><b style="font-size:21px;"> + </b> <b> Adicionar Complemento </b></button>
</div>
 <?php 
$numbercompleX = $rows_produtos_comple['numbercomple'];
 $result_produtos_comple_C = "SELECT * FROM `complementos` WHERE `empresa` = '$filterEmp' and idProduto = '$idProdutoX' and numbercomple = '$numbercompleX'";
  $resultado_produtos_comple_C  = mysqli_query($conn, $result_produtos_comple_C );
 while($rows_produtos_comple_C = mysqli_fetch_assoc($resultado_produtos_comple_C)){ 

 ?>
        <div class="addmoreaddX">


 <div class="form-group col-md-12">
      <div class="form-group col-md-12">
    <label for="" class="control-label">Complemento </label>
      <div >
  <input name="nomeComplemento[]" type="text"  class="form-control" placeholder="" style="white-space: nowrap;display:inline-block;" value="<?php echo $rows_produtos_comple_C['nomeComplemento']; ?>" >
  </div>
    </div>

      <div class="form-group col-md-7">
    <label for="" class="control-label">Descricao</label>
      <div >
  <input name="descComplemento[]" type="text"  class="form-control" placeholder="" style="white-space: nowrap;display:inline-block;" value="<?php echo $rows_produtos_comple_C['descComplemento']; ?>" >
  </div>
    </div>

     <div class="form-group col-md-5" align="center">
    <label for="" class="control-label">Valor</label>
      <div >
  <input name="valorComplemento[]" type="text"  class="form-control" placeholder="" style="white-space: nowrap;display:inline-block;" value="<?php echo $rows_produtos_comple_C['valorComplemento']; ?>">

  </div>

    </div>
  <div class="addmoreadd">
  </div>
         <div class="form-group col-md-2" style="display: none;">
<input  name='numbercomple[]' value='1' type='text' id='numbercomple[]'>
    </div>
  </div>
</div>
  <div class="addressesH" id="addressesH" > </div>
  <?php } ?>

  </div>

</div>
 



<?php } ?>
</div>
</div>
    </div>
      </div>
    </div>
                <!--FIM TESTE -->
                <!-- Fim Modal -->
                <?php } ?>
      </tbody>
    <!--  -->
      </table>

    </div>

<!-- Modal -->
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
              <form method="POST" action="processoproduto/processa_apagar.php" enctype="multipart/form-data">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div  style="background: #FA8072;" class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <h4  class="modal-title" id="modalLabel">Excluir Item</h4>
            </div>
            <div class="modal-body">
            <p><?php echo $rows_produtos['id']; ?></p>
            <h4><b>Deseja realmente excluir este item?</b></h4>
            </div>
              <input class="hidden" name="id"<?php echo $rows_produtos['id']; ?>  id="id_produto">
            <div class="modal-footer">
             <button  type="submit"  class="btn btn-danger">Sim</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
            </div>
          </div>
          </div>
          </form>
        </div>
<!-- Modal -->


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Produto</h4>
          </div>

          <div class="modal-body">
<!-- talvez se especificar a form... -->
            <form method="POST" id="formNovaCrise" action="processoproduto/processa.php" enctype="multipart/form-data">
                <input name="id" type="hidden" id="id_produto">
              <div class="form-group">
                <label for="recipient-nome" class="control-label">Nome:</label>
                <input name="nome" type="text" class="form-control" id="recipient-nome">
                                <label for="recipient-tipoValor" class="control-label">Tipo Valor:</label>
                <input name="tipoValor" type="text" class="form-control" id="recipient-tipoValor">
              </div>
              <div class="form-group">
                <label for="recipient-codigo" class="control-label">Codigo:</label>
                <input name="codigo" type="number" class="form-control" id="recipient-codigo">
              </div>

                <div class="form-group">
                <label for="recipient-valor" class="control-label">Valor: </label>
                 <div class="input-group">
                <div class="input-group-addon">R$</div>
                <input type="text" class="form-control" name="valor" size="20" onKeydown="Formata(this,20,event,2)" id="recipient-valor">
                 </div>
                </div>

              <div class="form-group">
                <label for="recipient-promo_valor" class="control-label">Desconto em R$:</label>
                                 <div class="input-group">
                <div class="input-group-addon">R$</div>
                <input type="text" class="form-control" name="promo_valor" size="20" onKeydown="Formata(this,20,event,2)" id="recipient-promo_valor" >
              </div>

              </div>
              <div class="form-group">
                <label for="descricao-text" class="control-label">Descricao:</label>
                <textarea name="descricao" class="form-control" id="descricao-text"></textarea>
              </div>

              <script>
                 document.getElementById("descricao-text").onkeypress = function (event) {
                       if (event.keyCode == 13) {
                           event.preventDefault();
                       }
                   };
              </script>
                    <div class="form-group">
              <label for="situacao_id" class="control-label">Situação</label>
              <div class="">
                <select id = "recipient-situacao_id" class="form-control" name="situacao_id"   required>
                  <?php
                   include_once("conexao.php");
                  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

                      $resultado =mysqli_query($conn, "SELECT * FROM situacoes WHERE tipoSelect = 0");
                    while($dados = mysqli_fetch_assoc($resultado)){
                      ?>
                        <option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
                      <?php
                    }
                  ?>
                </select>
              </div>
              </div>
         <div class="form-group">
            <label for="recipient-metricaValor" class="">Metrica Valor</label>
            <div>
              <select class="form-control" name="metricaValor"  id="recipient-metricaValor" required >
                <?php
                 include_once("conexao.php");
                $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                    $resultado =mysqli_query($conn, "SELECT * FROM produtos where empresa = '$filterEmp'");
                  while($dados = mysqli_fetch_assoc($resultado)){
                    ?>
                      <option value="<?php echo $dados["metricaValor"]; ?>"><?php echo $dados["metricaValor"];?></option>
                    <?php
                  }
                ?>
              </select>
            </div>
            </div>

            <div class="form-group">
            <label for="recipient-categoria_produtos_id" class="">Categoria</label>
            <div>
              <select class="form-control" name="categoria_produtos_id"  id="recipient-categoria_produtos_id" required >
                <?php
                 include_once("conexao.php");
                $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                    $resultado =mysqli_query($conn, "SELECT * FROM categoria_produtos where empresa = '$filterEmp'");
                  while($dados = mysqli_fetch_assoc($resultado)){
                    ?>
                      <option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
                    <?php
                  }
                ?>
              </select>
            </div>

            </div>
                  <div class="form-group col-md-4">
                <label for="recipient-imagens" class="control-label" >Imagem </label>
                <input name="nomeimagem"  readonly="true" type="text" class="form-control" id="recipient-imagens">
              </div>

               <div class="form-group">
                    <label >Alterar Imagem</label>
                    <br>
                      <input name="arquivo" type="file"/>
                  </div>

      </div>
       <script language= 'javascript'>


//-->
$('#formNovaCrise').submit(function() {
    if(confirm (' Tudo certo? '))
{
document.forms['formNovaCrise'].onsubmit = function(){return true;}
}

else
{
  event.preventDefault();
document.forms['formNovaCrise'].onsubmit = function(){return false;}
}

});
</script>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Alterar</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<script>

function Limpar(valor, validos) {

// retira caracteres invalidos da string

var result = "";

var aux;

for (var i=0; i < valor.length; i++) {

aux = validos.indexOf(valor.substring(i, i+1));

if (aux>=0) {

result += aux;

}

}

return result;

}

//Formata número tipo moeda usando o evento onKeyDown

function Formata(campo,tammax,teclapres,decimal) {

var tecla = teclapres.keyCode;

vr = Limpar(campo.value,"0123456789");

tam = vr.length;

dec=decimal

if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }

if (tecla == 8 )

{ tam = tam - 1 ; }

if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 )

{

if ( tam <= dec )

{ campo.value = vr ; }

if ( (tam > dec) && (tam <= 5) ){

campo.value = vr.substr( 0, tam - 2 ) + "." + vr.substr( tam - dec, tam ) ; }

if ( (tam >= 6) && (tam <= 8) ){

campo.value = vr.substr( 0, tam - 5 ) + "." + vr.substr( tam - 5, 3 ) + "." + vr.substr( tam - dec, tam ) ;

}

if ( (tam >= 9) && (tam <= 11) ){

campo.value = vr.substr( 0, tam - 8 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "." + vr.substr( tam - dec, tam ) ; }

if ( (tam >= 12) && (tam <= 14) ){

campo.value = vr.substr( 0, tam - 11 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "." + vr.substr( tam - dec, tam ) ; }

if ( (tam >= 15) && (tam <= 17) ){

campo.value = vr.substr( 0, tam - 14 ) + "." + vr.substr( tam - 14, 3 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - 2, tam ) ;}

}

}

</script>


<style>
.pqw {
  background:transparent;
  color:#631071;
  border:none;
  outline:none; 
}

</style>
                                  <style>


/* Important part */
.xe{
    overflow-y: initial !important
}
.xa{
    height: 100%;
    overflow-y: auto;
}
::-webkit-input-placeholder {
   text-align: center;
}

:-moz-placeholder { /* Firefox 18- */
   text-align: center;  
}

::-moz-placeholder {  /* Firefox 19+ */
   text-align: center;  
}

:-ms-input-placeholder {  
   text-align: center; 
}
</style>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientnome = button.data('whatevernome')
        //var recipientcreated = button.data('whatevercreated')
        var recipientvalor = button.data('whatevervalor')
        var recipientpromo_valor = button.data('whateverpromo_valor')
        var recipientimagens = button.data('whateverimagens')
         var recipientmetrica_Valor = button.data('whatevermetrica_Valor')
          var recipienttipo_Valor = button.data('whatevertipo_Valor')
        var recipientcodigo = button.data('whatevercodigo')
        var recipientdescricao = button.data('whateverdescricao')
        var recipientsituacao_id = button.data('whateversituacao_id')
        var recipientcategoria_produtos_id = button.data('whatevercategoria_produtos_id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID do Produto: ' + recipient)
        modal.find('#id_produto').val(recipient)
        modal.find('#recipient-nome').val(recipientnome)
        //modal.find('#recipient-created').val(recipientcreated)
        modal.find('.modal-valor').text('Valor do produto: R$' + recipientvalor)
        modal.find('#recipient-valor').val(recipientvalor)
        modal.find('#recipient-promo_valor').val(recipientpromo_valor)
        modal.find('#recipient-imagens').val(recipientimagens)
        modal.find('#recipient-metrica_Valor').val(recipientmetrica_valor)
        modal.find('#recipient-tipo_Valor').val(recipienttipo_Valor)
        modal.find('#recipient-codigo').val(recipientcodigo)
        modal.find('#descricao-text').val(recipientdescricao)
        modal.find('#recipient-situacao_id').val(recipientsituacao_id)
        modal.find('#recipient-categoria_produtos_id').val(recipientcategoria_produtos_id)
      })
    </script>
    <script type="text/javascript">
      $('#delete-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientnome = button.data('whatevernome')
        //var recipientcreated = button.data('whatevercreated')
        var recipientvalor = button.data('whatevervalor')
        var recipientpromo_valor = button.data('whateverpromo_valor')
        var recipientdescricao = button.data('whateverdescricao')
        var recipientcategoria_produtos_id = button.data('whatevercategoria_produtos_id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID do Produto: ' + recipient)
        modal.find('#id_produto').val(recipient)
        modal.find('#recipient-name').val(recipientnome)
        //modal.find('#recipient-created').val(recipientcreated)
        modal.find('#recipient-valor').val(recipientvalor)
        modal.find('#recipient-promo_valor').val(recipientpromo_valor)
        modal.find('#descricao-text').val(recipientdescricao)
        modal.find('#recipient-categoria_produtos_id').val(recipientcategoria_produtos_id)
      })
    </script>


</body>

</html>

<?php $conn->close(); ?>
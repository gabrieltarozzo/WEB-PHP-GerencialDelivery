<?php
  
  include_once("conexao.php");

session_start();
  $request=$_POST['request'];
   $request2=$_POST['request2'];
$filterEmp = $_SESSION['usuarioEmpresa'];


    $result_produtos = "SELECT `produtos` . *, `categoria_produtos` . `nome` 
AS `categoria_do_nome` , `situacoes` . `nome` AS`situacao_do_nome` FROM `produtos`

LEFT JOIN `categoria_produtos` ON `produtos` . `categoria_produtos_id` = `categoria_produtos` . `id`

LEFT JOIN `situacoes` ON `produtos` . `situacao_id` = `situacoes` . `id`

WHERE `produtos` . `empresa` = '$filterEmp' and `produtos` . `categoria_produtos_id` = '$request' 
and `produtos` . `situacao_id` = '$request2'
ORDER BY (nome) ASC";


  //$resultado_produtos = mysqli_query($conn, $result_produtos);
  //$query="select * from produtos where categoria_produtos_id='$request'";
  if($request2 != '0' and $request == '0'){
    $result_produtos = "SELECT `produtos` . *, `categoria_produtos` . `nome` 
AS `categoria_do_nome` , `situacoes` . `nome` AS`situacao_do_nome` FROM `produtos`

LEFT JOIN `categoria_produtos` ON `produtos` . `categoria_produtos_id` = `categoria_produtos` . `id`

LEFT JOIN `situacoes` ON `produtos` . `situacao_id` = `situacoes` . `id`

WHERE `produtos` . `empresa` = '$filterEmp'
and `produtos` . `situacao_id` = '$request2'
ORDER BY (nome) ASC ";

  }

    if($request2 == '0' and $request != '0'){
    $result_produtos = "SELECT `produtos` . *, `categoria_produtos` . `nome` 
AS `categoria_do_nome` , `situacoes` . `nome` AS`situacao_do_nome` FROM `produtos`

LEFT JOIN `categoria_produtos` ON `produtos` . `categoria_produtos_id` = `categoria_produtos` . `id`

LEFT JOIN `situacoes` ON `produtos` . `situacao_id` = `situacoes` . `id`

WHERE `produtos` . `empresa` = '$filterEmp'
and `produtos` . `categoria_produtos_id` = '$request'
ORDER BY (nome) ASC";

  }



  if($request == '0' and $request2 =='0'){
    $result_produtos = "SELECT `produtos` . *, `categoria_produtos` . `nome` 
AS `categoria_do_nome` , `situacoes` . `nome` AS`situacao_do_nome` FROM `produtos`

LEFT JOIN `categoria_produtos` ON `produtos` . `categoria_produtos_id` = `categoria_produtos` . `id`

LEFT JOIN `situacoes` ON `produtos` . `situacao_id` = `situacoes` . `id`

WHERE `produtos` . `empresa` = '$filterEmp'

ORDER BY (nome) ASC";
  }
  $resultado_produtos=mysqli_query($conn,$result_produtos); ?>

<script>
$(document).ready(function() {
    $('#example2').DataTable( {
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

<table id="example2" style="width:100%;" class="table table-striped table-hover table" cellspacing="0" cellpadding="0">
   
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
<!--      -->
  <?php
                while($rows_produtos = mysqli_fetch_assoc($resultado_produtos)){ ?>
                <?php $sit_id = $rows_produtos['situacao_id']; ?>


                  <tr <?php if($sit_id == '2'){ ?> class="desativado" <?php } if($sit_id == '3'){ ?> class="desativado" <?php } ?>  >

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


           <?php if ($filterEmp == 4) { ?>   <td > <?php
      $filterEmp = $_SESSION['usuarioEmpresa'];
            $metricaVal =  $rows_produtos['metricaValor'];

           $resultado =mysqli_query($conn, "SELECT * FROM situacoes where tipoSelect = 1 and valor = '$metricaVal'");
           $dados = mysqli_fetch_assoc($resultado);
            echo $dados["nome"]; ?>  </td> 

  <td > <?php
      $filterEmp = $_SESSION['usuarioEmpresa'];
            $tipoValor =  $rows_produtos['tipoValor'];

           $resultado =mysqli_query($conn, "SELECT * FROM situacoes where tipoSelect = 2 and valor = '$tipoValor'");
           $dados = mysqli_fetch_assoc($resultado);
            echo $dados["nome"]; 

            ?>   </td>

             <?php }
?>

                    <!--<td><?php // echo $rows_produtos['created']; ?></td> pensar em adicionar imagem -->


                    <td style="width:200px;">

                                           <button type="button" class="btn btn-xs btn-primary teste1" data-toggle="modal" data-target="#myModal<?php echo $rows_produtos['id'];?>">
                      Visualizar</button>
                      <!--  -->
                      <button type="button" class="btn btn-xs btn-warning teste1" data-toggle="modal" data-target="#exampleModal"
                      data-whatever="<?php echo $rows_produtos['id']; ?>"
                      data-whateversituacao_id="<?php echo $rows_produtos['situacao_id'];?>"
                      data-whatevercategoria_produtos_id="<?php echo $rows_produtos['categoria_produtos_id'];?>"
                      data-whatevernome="<?php echo $rows_produtos['nome']; ?>"
                      data-whateverimagens="<?php echo $rows_produtos['imagens']; ?>"
                      data-whatevervalor="<?php echo $rows_produtos['valor']; ?>"
                      data-whateverdescricao="<?php echo $rows_produtos['descricao']; ?>"
                      data-whatevercodigo="<?php if($rows_produtos['codigo'] == ""){echo $rows_produtos['id'];} else{echo $rows_produtos['codigo'];} ?>"
                      data-whateverpromo_valor="<?php echo $rows_produtos['promo_valor']; ?>">
                      Editar</button>

                        <button type="button" class="btn btn-xs btn-danger teste1" data-toggle="modal" data-target="#delete-modal" data-whatever="<?php echo $rows_produtos['id']; ?>">Excluir</button>
                    </td>
                  </tr>

<!--  Inicio Modal myModal<php $rows_produtos['id']; tabindex="-2" role="dialog" class="" ?>-->

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
                <!-- Fim Modal -->
                <?php } ?>
      </tbody>
    <!--  -->
      </table>

<?php $conn->close(); ?>
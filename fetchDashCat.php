<?php
  
  include_once("conexao.php");

session_start();
//  $request=$_POST['request'];
$Date1=$_POST['request'];
$Date2=$_POST['request2'];


 //  $request2=$_POST['request2'];
$filterEmp = $_SESSION['usuarioEmpresa'];

  $result_categorias = "SELECT  `nota_fiscal` . *, sum(valorTotalDesconto) AS vlr_valor, sum(valorAd) AS adValor, sum(valorMax2) AS max2, sum(valorCd) AS cdValor, SUM(quantidade) AS quantidadesoma, valor AS qtdValor, `categoria_produtos` . `nome` AS `nomeCategoria` FROM nota_fiscal
  LEFT JOIN `categoria_produtos` ON `nota_fiscal` . `categoria_id` = `categoria_produtos` . `id`
  WHERE `nota_fiscal` . `created` >= STR_TO_DATE('$Date1', '%d/%m/%Y') AND `nota_fiscal` . `created` <= STR_TO_DATE('$Date2', '%d/%m/%Y') + INTERVAL 1 DAY AND `nota_fiscal` . `empresa` = '$filterEmp'
  GROUP BY nomeCategoria
  ORDER BY (id) ASC";
  $resultado_categorias = mysqli_query($conn, $result_categorias);
  $total_categorias = mysqli_num_rows($resultado_categorias);

    $result_categoriaswe = "SELECT  `nota_fiscal` . *, sum(valorTotalDesconto) AS vlr_valor , sum(valorAd) AS adValor, sum(valorMax2) AS max2, sum(valorCd) AS cdValor, SUM(quantidade) AS quantidadesoma, valor AS qtdValor, `categoria_produtos` . `nome` AS `nomeCategoria` FROM nota_fiscal
  LEFT JOIN `categoria_produtos` ON `nota_fiscal` . `categoria_id` = `categoria_produtos` . `id` 
   WHERE `nota_fiscal` . `created` >= STR_TO_DATE('$Date1', '%d/%m/%Y') AND `nota_fiscal` . `created` <= STR_TO_DATE('$Date2', '%d/%m/%Y') + INTERVAL 1 DAY AND `nota_fiscal` . `empresa` = '$filterEmp'";
  $resultado_categoriaswe = mysqli_query($conn, $result_categoriaswe);

  $resultCount = "SELECT * FROM nota_fiscal where valorAd != '' and `nota_fiscal` . `created` >= STR_TO_DATE('$Date1', '%d/%m/%Y') AND `nota_fiscal` . `created` <= STR_TO_DATE('$Date2', '%d/%m/%Y') + INTERVAL 1 DAY AND `nota_fiscal` . `empresa` = '$filterEmp'";
  $resCount = mysqli_query($conn, $resultCount);
  $data=mysqli_fetch_assoc($resCount);
    $datatotal = mysqli_num_rows($resCount);

        $resultCountC = "SELECT * FROM nota_fiscal where valorCd != '' and `nota_fiscal` . `created` >= STR_TO_DATE('$Date1', '%d/%m/%Y') AND `nota_fiscal` . `created` <= STR_TO_DATE('$Date2', '%d/%m/%Y') + INTERVAL 1 DAY AND `nota_fiscal` . `empresa` = '$filterEmp'";
    $resCountC = mysqli_query($conn, $resultCountC);
    $dataC=mysqli_fetch_assoc($resCountC);
    $datatotalC = mysqli_num_rows($resCountC);

  $tot = "SELECT sum(quantidade) as qtde from nota_fiscal where `nota_fiscal` . `created` >= STR_TO_DATE('$Date1', '%d/%m/%Y') AND `nota_fiscal` . `created` <= STR_TO_DATE('$Date2', '%d/%m/%Y') + INTERVAL 1 DAY AND empresa = '$filterEmp' ";
    $resultado_categoriase = mysqli_query($conn, $tot);
$rows_categoriase = mysqli_fetch_assoc($resultado_categoriase); ?>


<script>
$(document).ready(function() {
    $('#example2').DataTable( {
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
        buttons: [
          { extend: 'pdf', footer: true },
            {
             extend: 'print',
             messageTop: ' <h4>   Relatório de Categorias -  Referente a: '+ document.getElementById('start').value  +' até '+ document.getElementById('end').value  +' </h4>',
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

  <?php $result_categoriaswe = mysqli_fetch_assoc($resultado_categoriaswe);
        $total_categoriaswe = mysqli_num_rows($resultado_categoriaswe);
        $newAd = $result_categoriaswe['adValor'];
        $newMax2 = $result_categoriaswe['max2'];
            $newCd = $result_categoriaswe['cdValor'];
        $MEUVALOR = $result_categoriaswe['vlr_valor'] + $newAd + $newCd + $newMax2; ?>

          <?php $MEUVALORE = $result_categoriaswe['vlr_valor'] + $newCd + $newAd + $newMax2; ?>

<table id="example2" class="mdl-data-table table table-bordered table-striped" style="width:100%;">

        <thead>
            <tr>
              <!--  <th>Data do Pedido</th> -->
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
                $porcetdata = ($newAd / ( $MEUVALOR == 0 ? 1 : $MEUVALOR )) * 100;  ?>
                  <td> ADICIONAIS </td>
                  <td> R$ <?php echo number_format($newAd,2,",","");  ?> </td>
                    <td>  <?php echo $datatotal; ?></td>
                      <td> <?php echo number_format($porcetdata,2,",",""); ?> % </td>
               </tr>
          <?php $total = 0; $totall = 0; $totalll = 0; $newsomatotal = 0; $porcettotal = 0; $newMax2 = 0; ?>
           <?php while($rows_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>
            <tr>
             <!-- <td style="white-space:nowrap;"><?php //$date = new DateTime($rows_categorias['created']);echo $date->format('d/m/Y'); ?></td> -->
                <?php
                   $newMax2 = $rows_categorias['max2'] ;
                $newvalor = $rows_categorias['vlr_valor'] + $newMax2 ;

               $newsomatotal =  $newsomatotal + $rows_categorias['quantidadesoma'];
              $rowtotal = $rows_categoriase['qtde'] + $datatotal;

               $porcet = ($newvalor / $MEUVALOR ) * 100;

               $porcettotal = $porcettotal + $porcet ;

                ?>

                <td><?php echo $rows_categorias['nomeCategoria']; ?></td>
                <td style="white-space:nowrap;">R$ <?php echo number_format($newvalor,2,",",""); ?></td>
                 <td><?php echo $rows_categorias['quantidadesoma']; ?></td>
                <td style="white-space:nowrap;"><?php echo number_format($porcet,2,",",""); ?> %</td>
            </tr>

           <?php
           $total = $newvalor + $total;
         //  $totall = $rows_categorias['frete'] + $totall;
           $totalll = $total + $totall;
           ?>

               <?php } ?>

                    <tr>
<?php
              $rowtotal = $rows_categoriase['qtde'];
              $rowedit = $rowtotal + $datatotalC;
                 $porcetdataC = ($newCd / ( $MEUVALORE == 0 ? 1 : $MEUVALORE )) * 100;
                 ?>
                  <td> COMPLEMENTOS </td>
                  <td> R$ <?php echo number_format($newCd,2,",","");  ?> </td>
                    <td>  <?php echo $datatotalC; ?></td>
                      <td> <?php echo number_format($porcetdataC,2,",",""); ?> % </td>
               </tr>
          <?php  $VALOROFICIAL = 0; $totalCd = 0; ?>
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
                 <td><?php $qtdsoma2 = 0; $qtdsoma2=  $rows_categorias['quantidadesoma']; echo number_format($qtdsoma2,0 ,",",""); ?>
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
<?php  $retotal = $total + $newAd + $newCd;
  //$resultCount = "SELECT * FROM nota_fiscal where valorAd != '' and empresa = '$filterEmp' ";
 // $resCount = mysqli_query($conn, $resultCount);
  //$data=mysqli_fetch_assoc($resCount);
  if($datatotal != '' or $datatotal != 0) {  $porcetdata = ($newAd / $MEUVALOR) * 100;
    $datatotal = mysqli_num_rows($resCount);
    }
    ?>
     <td>Total:</td>
     <td>R$ <?php echo number_format($retotal,2,",",""); ?></td>

     <td><?php $newst = $newsomatotal + $datatotal + $datatotalC;
      echo $newst; ?></td>
     <?php    $porcettotal = $porcettotal + $porcetdata + $porcetdataC;  ?>
     <td><?php echo $porcettotal; ?> %</td>

  </tr>
  </tfoot>
        </table>

      </div>


        <?php $conn->close(); ?>
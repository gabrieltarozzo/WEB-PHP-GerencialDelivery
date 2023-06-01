<?php
  
  include_once("conexao.php");

session_start();
//  $request=$_POST['request'];
$Date1=$_POST['request'];
$Date2=$_POST['request2'];


 //  $request2=$_POST['request2'];
$filterEmp = $_SESSION['usuarioEmpresa'];

  $nota_fiscal_0_n = "SELECT * FROM pedidos where `pedidos` . `created` >= STR_TO_DATE('$Date1', '%d/%m/%Y') AND `pedidos` . `created` <= STR_TO_DATE('$Date2', '%d/%m/%Y') + INTERVAL 1 DAY AND empresa = '$filterEmp' and id_entrega = 0  ";
  $query_fiscal_0_n = mysqli_query($conn, $nota_fiscal_0_n);
  $fetch_fiscal_0_n = mysqli_fetch_assoc($query_fiscal_0_n);
  $total_fiscal_0_n = mysqli_num_rows($query_fiscal_0_n);

    $nota_fiscal_1_n = "SELECT * FROM pedidos where `pedidos` . `created` >= STR_TO_DATE('$Date1', '%d/%m/%Y') AND `pedidos` . `created` <= STR_TO_DATE('$Date2', '%d/%m/%Y') + INTERVAL 1 DAY AND empresa = '$filterEmp' and id_entrega = 1  ";
  $query_fiscal_1_n = mysqli_query($conn, $nota_fiscal_1_n);
  $fetch_fiscal_1_n = mysqli_fetch_assoc($query_fiscal_1_n);
  $total_fiscal_1_n = mysqli_num_rows($query_fiscal_1_n);

  $nota_fiscal_0 = "SELECT *, sum(valorTotalDesconto) as value, sum(valorCd) as value1, sum(valorAd) as value2, sum(valorMax2) as value3 FROM nota_fiscal where `nota_fiscal` . `created` >= STR_TO_DATE('$Date1', '%d/%m/%Y') AND `nota_fiscal` . `created` <= STR_TO_DATE('$Date2', '%d/%m/%Y') + INTERVAL 1 DAY AND empresa = '$filterEmp' and entrega = '0'  ";
  $query_fiscal_0 = mysqli_query($conn, $nota_fiscal_0);
  $fetch_fiscal_0 = mysqli_fetch_assoc($query_fiscal_0);
  $total_fiscal_0 = mysqli_num_rows($query_fiscal_0);

//quando entrega for 1 é retirada
  $nota_fiscal_1 = "SELECT *, sum(valorTotalDesconto) as value, sum(valorCd) as value1, sum(valorAd) as value2, sum(valorMax2) as value3 FROM nota_fiscal where `nota_fiscal` . `created` >= STR_TO_DATE('$Date1', '%d/%m/%Y') AND `nota_fiscal` . `created` <= STR_TO_DATE('$Date2', '%d/%m/%Y') + INTERVAL 1 DAY AND empresa = '$filterEmp' and entrega = '1'  ";
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

  $totalTicket = ($retotal / $quantotal);
} else{ $porcet1 = 0; $porcet2 = 0; $totalTicket = 0;}
  //porcentagem total
  $porcetotal = $porcet1 + $porcet2;

  //TOTAL TICKET MEDIO

?>


<script>

$(document).ready(function() {
    $('#example2').DataTable( {
//aoColumns: [
  //      { "sType": "date-uk" },
  //          null,
   //         null,
   //         null,
    //        null,
    //        null
     //   ],
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

<div id="table-container">
<table id="example2" class="mdl-data-table table table-bordered table-striped" style="width:100%;">

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

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Entrega', <?php echo $total_fiscal_0_n; ?>],
          ['Retirada', <?php echo $total_fiscal_1_n; ?>],

        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':900,
                       'height':800};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


 
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>

      </div>


        <?php $conn->close(); ?>
<?php
  
  include_once("conexao.php");

session_start();
//  $request=$_POST['request'];
$Date1=$_POST['request'];
$Date2=$_POST['request2'];


 //  $request2=$_POST['request2'];
$filterEmp = $_SESSION['usuarioEmpresa'];

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
    pedidos . nomeCliente AS nomedoCliente,
    pedidos . telefoneCliente AS telefonedoCliente,
    pedidos . numeroCasaCliente AS numeroCasaCliente1,
    MAX(pedidos . created) as pedidocreated,
    usuarios . nome as meunome,
    usuarios . telefone as meutelefone,
    usuarios . created AS dataCriado
    FROM usuarios
    LEFT JOIN pedidos
    ON usuarios . id = pedidos . id_usuarios
    LEFT JOIN endereco
    ON usuarios . id = endereco . id_usuarios
    where usuarios . created >= STR_TO_DATE('$Date1', '%d/%m/%Y') AND `usuarios` . `created` <= STR_TO_DATE('$Date2', '%d/%m/%Y') + INTERVAL 1 DAY AND usuarios . empresa = $filterEmp
    GROUP BY usuarios . id, `pedidos` . `id_usuarios`
    ORDER BY (nped) ASC ";
    $query_fiscal_0 = mysqli_query($conn, $nota_fiscal_0);

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

order: [[ 4, "desc" ]],
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
                  <td align="center"> <?php if ($rows_categorias['telefonedoCliente'] == null) { echo "Não cadastrado"; } else { echo $rows_categorias['telefonedoCliente']; }?> </td>
                  <td align="center"> R$ <?php 
                  $valormax1234 = $rows_categorias['valorMax'] + $rows_categorias['valorMax2'] + $rows_categorias['valorMax3'] + $rows_categorias['valorMax4'];
                  echo number_format($valormax1234,2,",",""); ?> </td>
                  <td align="center"> R$ <?php if($rows_categorias['nped'] != 0) { $ticketmedio = $rows_categorias['valorMax'] / $rows_categorias['nped']; } else{ $ticketmedio = 0; }echo number_format($ticketmedio,2,",","");  ?> </td>
                  <td align="center"> <?php echo $rows_categorias['nped']; ?> </td>
                  <td align="center"> <?php $date = new DateTime($rows_categorias['pedidocreated']);echo $date->format('d/m/Y'); ?> </td>
                  <td align="center"> <?php  if ($rows_categorias['dataCriado'] == NULL) { echo "Anterior a 29/01/2019"; } else { $date2 = new DateTime($rows_categorias['dataCriado']);echo $date2->format('d/m/Y'); }?> </td>
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
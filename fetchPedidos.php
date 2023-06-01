<?php

  include_once("conexao.php");

    session_start();

    $_SESSION['usuarioNome'];

  $request=$_POST['request'];
  $filterEmp = $_SESSION['usuarioEmpresa'];


    //Selecionar todos os categorias da tabela
    $filterEmp = $_SESSION['usuarioEmpresa'];
    $result_pedidos = "SELECT * FROM pedidos where empresa = '$filterEmp' order by id desc";
      if($request == 0){
 $result_pedidos = "SELECT * FROM pedidos where empresa = '$filterEmp' AND DATE(created) = CURDATE() order by id desc";
      }
                if($request == 2){
 $result_pedidos = "SELECT * FROM pedidos where empresa = '$filterEmp' AND YEARWEEK(created, 1) = YEARWEEK(CURDATE(), 1) order by id desc";
      }

          if($request == 0){
 $result_pedidos = "SELECT * FROM pedidos where empresa = '$filterEmp' AND DATE(created) = CURDATE() order by id desc";
      }

          if($request == 2){
 $result_pedidos = "SELECT * FROM pedidos where empresa = '$filterEmp' AND datediff(date(now()),created) <= 7 order by id desc";
      }

         if($request == 2){
 $result_pedidos = "SELECT * FROM pedidos where empresa = '$filterEmp' AND datediff(date(now()),created) <= 7 order by id desc";
      }


    $resultado_pedidos = mysqli_query($conn, $result_pedidos);
    $total_pedidos = mysqli_num_rows($resultado_pedidos);



    ?>

<style>
#esconde { display:none !important };
</style>

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
order: [[ 0, "desc" ]],

        responsive: true,
        fixedHeader: true,


            fixedHeader: {
        headerOffset: $('#navheight').outerHeight(),

    },

    } );
} );
</script>
               <table id="example2" align="center" class="table table-striped table-hover table loli" style="width:95%;border-style:double;" >
 <thead>
                    <tr>
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
<?php
    while($rows_pedidos = mysqli_fetch_assoc($resultado_pedidos)){ ?>
              <tr <?php if($rows_pedidos['status'] == "Retirada"){?> class="gonden" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Confirmado"){?> class="greeen" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Aguardando"){?> class="yelloww" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Em Entrega"){?> class="emEntrega" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Finalizado"){?> class="bluee" <?php } ?>
                  <?php if($rows_pedidos['status'] == "Cancelado"){?> class="reed" <?php } ?>>
                <td ><?php echo $rows_pedidos['id']; ?></td>
                <td > <?php echo $rows_pedidos['nomeCliente']; ?></td>
                <td style="white-space:nowrap;"> <?php if($rows_pedidos['status'] == "Em Entrega"){?>  <i class="fas fa-motorcycle" style="font-size:14px;margin-left:4px;"></i> 

                  <?php } ?> <?php if($rows_pedidos['status'] == "Retirada"){?>  <i class="fas fa-hand-holding-usd" style="font-size:14px;margin-left:4px;"></i>

                   <?php } ?> <?php if($rows_pedidos['status'] == "Finalizado"){?>  <i class="fas fa-check-double" style="font-size:14px;margin-left:4px;"></i> 

                   <?php } ?> <?php if($rows_pedidos['status'] == "Aguardando"){?> <i class="fas fa-exclamation" style="font-size:14px;width:14px;margin-left:4px;"></i> 

                   <?php } ?> <?php if($rows_pedidos['status'] == "Cancelado"){?> <i class="fas fa-times-circle" style="font-size:14px;margin-left:7px;"></i>

                    <?php } ?> <?php if($rows_pedidos['status'] == "Confirmado"){?> <i class="fas fa-check-circle" style="font-size:14px;margin-left:7px;"></i>

                     <?php } ?> <b><?php echo $rows_pedidos['status']; ?> </b></td>
                <td ><?php if($rows_pedidos['id_entrega'] == "0"){ ?> Entrega <?php  } ?> <?php if($rows_pedidos['id_entrega'] == "1"){ ?>  Retirada <?php  } ?> </td>
                 <td > <?php echo $rows_pedidos['telefoneCliente']; ?> </td>
             <td ><?php $date = new DateTime($rows_pedidos['created']);echo $date->format('d-m-Y - H:i'); ?> </td>

                <td >
<div align="center">
       <!-- antigo <button onclick="cancelActivityRefresh();" name="confirmar" data-toggle="modal" data-target="#open-modal" data-whatever="<?php echo $rows_pedidos['id']; ?>" type="button" <?php if($rows_pedidos['status'] == "Aguardando" || $rows_pedidos['status'] == "Retirada"){?> style="display: all;" <?php }else{ ?> style="display: none" <?php } ?>  class="btn btn-xs btn-success" ><H5><b>CONFIRMAR</b></H5></button> -->
       <button style="width:80px;"  onclick="cancelActivityRefresh();" type="button" data-toggle="modal" data-target="#myModal<?php echo $rows_pedidos['id'];?>" class="btn btn-xs btn-warning" data-whatever="<?php echo $rows_pedidos['id']; ?>"><b>DETALHAR </b></button>

        <button style="width:80px;" onclick="cancelActivityRefresh();" data-toggle="modal" data-target="#status-modal<?php echo $rows_pedidos['id']; ?>" 
         data-whatever="<?php echo $rows_pedidos['id']; ?>"
        data-whatevervalor="<?php echo $rows_pedidos['valor']; ?>"
        data-whatevernome="<?php echo $rows_pedidos['nomeCliente']; ?>"
        data-whateverstatus="<?php echo $rows_pedidos['status']; ?>" type="button" class="btn btn-xs btn-danger" ><b>STATUS</b></button>
     </div>
    </td>

    </tr>
    <!-- adicionei duas divs -->
  </div>

 <div class="modal fade" id="status-modal<?php echo $rows_pedidos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
              <form id="statusdo" name="statusdo" method="GET"  enctype="multipart/form-data">
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
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable2<?php echo $rows_pedidos['id'];?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
});
  </script>  <?php
                } ?>
                <!-- confirmado ou cancelado -->
                 <?php if($rows_pedidos['status'] == 'Aguardando'){
                ?>  <script>
                      $(document).ready(function () {
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");

 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable2<?php echo $rows_pedidos['id'];?>").css("display", "none");
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable3<?php echo $rows_pedidos['id'];?>").css("display", "none");
  $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
  $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
  // muda o estilo para height 100% na impressao.
});
  </script>  <?php
                } ?>
                <?php if($rows_pedidos['status'] == 'Confirmado' && $rows_pedidos['id_entrega'] == 1){
                ?>  <script>
                      $(document).ready(function () {

 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable1<?php echo $rows_pedidos['id'];?>").css("display", "none");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").css("opacity", "0.4");
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
     $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("display", "none");
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
  $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable1<?php echo $rows_pedidos['id'];?>").css("display", "none");
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable3<?php echo $rows_pedidos['id'];?>").css("display", "none");
  $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
     $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("display", "none");
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
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable2<?php echo $rows_pedidos['id'];?>").css("display", "none");
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable1<?php echo $rows_pedidos['id'];?>").css("display", "none");
  $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
     $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").css("display", "none");
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
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable2<?php echo $rows_pedidos['id'];?>").css("display", "none");
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable1<?php echo $rows_pedidos['id'];?>").css("display", "none");
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable3<?php echo $rows_pedidos['id'];?>").css("display", "none");
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable4<?php echo $rows_pedidos['id'];?>").css("display", "none");
  $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
      $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
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
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable2<?php echo $rows_pedidos['id'];?>").css("display", "none");
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable1<?php echo $rows_pedidos['id'];?>").css("display", "none");
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable3<?php echo $rows_pedidos['id'];?>").css("display", "none");
 $("#status-modal<?php echo $rows_pedidos['id']; ?> #disable4<?php echo $rows_pedidos['id'];?>").css("display", "none");
  $("#status-modal<?php echo $rows_pedidos['id']; ?> #ementrega<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #confirmar<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
      $("#status-modal<?php echo $rows_pedidos['id']; ?> #final<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #cancelado<?php echo $rows_pedidos['id']; ?>").attr("disabled", true);
    $("#status-modal<?php echo $rows_pedidos['id']; ?> #stpara<?php echo $rows_pedidos['id']; ?>").css("display", "none");

});
  </script>  <?php
                } ?>
              <div align="center">
  <?php $id = $rows_pedidos['id'];?>

      <a id="disable1<?php echo $rows_pedidos['id'];?>" href="processopedidos/processafetch.php/?id=<?php echo $rows_pedidos['id'];?>&status=confirmar">  <button  id="confirmar<?php echo $rows_pedidos['id']; ?>" onclick="return confirm('Tem certeza? esta ação é irreversivel.'); " name="confirmar"   type="submit" class="btn btn-xs btn-success" ><H5><b>CONFIRMAR</b></H5></button></a>
          <a id="disable2<?php echo $rows_pedidos['id'];?>" href="processopedidos/processafetch.php/?id=<?php echo $rows_pedidos['id'];?>&status=em entrega">   <button  id="ementrega<?php echo $rows_pedidos['id']; ?>" onclick="return confirm('Tem certeza? esta ação é irreversivel.');" name="ementrega" class="btn btn-xs btn-info"><H5><b>EM ENTREGA</b></H5></button></a>
            <a id="disable3<?php echo $rows_pedidos['id'];?>" href="processopedidos/processafetch.php/?id=<?php echo $rows_pedidos['id'];?>&status=finalizado">  <button id="final<?php echo $rows_pedidos['id']; ?>" onclick="return confirm('Tem certeza? esta ação é irreversivel.');" name="entregue" class="btn btn-xs btn-primary"><H5><b>FINALIZADO</b></H5></button></a>
            <a id="disable4<?php echo $rows_pedidos['id'];?>" href="processopedidos/processafetch.php/?id=<?php echo $rows_pedidos['id'];?>&status=cancelado">    <button id="cancelado<?php echo $rows_pedidos['id']; ?>" onclick="return confirm('Tem certeza? esta ação é irreversivel.');" name="cancelado" type="submit"  class="btn btn-xs btn-danger "><H5><b>CANCELADO</b></H5></button></a>

         <!-- antigo <button type="button" class="btn btn-warning" data-dismiss="modal"><h4>Voltar</h4></button> -->
        </div>
            </div>
          </div>
          </div>
          </form>
        </div>

 <!-- antigo button type button class="btn btn-warning" data-dismiss="modal"> <h4> Voltar </h4> </button> -->

        <script type="text/javascript">

            $(document).ready(function () {

                $("#btnPrint<?php echo $rows_pedidos['id']; ?>").click(function () {
                    //get the modal box content and load it into the printable div
                    $(".printable").html($("#myModal<?php echo $rows_pedidos['id']; ?>").html());
                   $(".printable #foraDIV<?php echo $rows_pedidos['id']; ?>").css("display", "block");

                   $(".printable #este<?php echo $rows_pedidos['id']; ?>").css("max-height", "100%"); // muda o estilo para height 100% na impressao.
                   $(".printable #este<?php echo $rows_pedidos['id']; ?>").css("font-size", "18px");
                   $(".printable #bodi<?php echo $rows_pedidos['id']; ?>").css("font-family", "arial"); // courier new
                   $(".printable #bodi<?php echo $rows_pedidos['id']; ?>").css("font-size", "18px");
                   $(".printable #bodi<?php echo $rows_pedidos['id']; ?>").css("width", "298px");

                   $(".printable #feud<?php echo $rows_pedidos['id']; ?>").css("font-family", "arial"); // courier new
                   $(".printable #feud<?php echo $rows_pedidos['id']; ?>").css("font-size", "18px");
                   $(".printable #feud<?php echo $rows_pedidos['id']; ?>").css("width", "280px");

                   $(".printable #feud<?php echo $rows_pedidos['id']; ?>").css("border-style", "dashed");

                   $(".printable #feud<?php echo $rows_pedidos['id']; ?>").css("border-width", "2px");

  //  $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-style", "dashed");
     //   $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-width", "2px");
      //     $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-style", "none");
      //  $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-width", "none");
       //  $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-left", "none");
        //  $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-right", "none");
       //    $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("border-bottom", "none");
          //  $(".printable #feude<?php echo $rows_pedidos['id']; ?>").css("height", "200px");

                    $(".printable #complo<?php echo $rows_pedidos['id']; ?>").css("text-transform", "uppercase");
                    $(".printable #bodi<?php echo $rows_pedidos['id']; ?>").css("font-weight", "bold");
                    $(".printable #este<?php echo $rows_pedidos['id']; ?>").css("width", "298px");
                    $(".printable #este<?php echo $rows_pedidos['id']; ?>").css("font-weight", "bold");
                    $(".printable #foraM<?php echo $rows_pedidos['id']; ?>").css("margin-left", "0");
                    $(".printable #bodi<?php echo $rows_pedidos['id']; ?>").css("text-align", "left");
                          // $(".printable #bodiaw<?php echo $rows_pedidos['id']; ?>").css("text-align", "center");
                    $(".printable #myModal<?php echo $rows_pedidos['id']; ?>").css("font-size", "18px");
                    $(".printable #este<?php echo $rows_pedidos['id']; ?>").css("font-family", "arial"); // courier new
                   // $(".printable #este<?php echo $rows_pedidos['id']; ?>").style.height = 100%;
                  // document.getElementById(".printable #este<?php echo $rows_pedidos['id']; ?>").classList.add('din');
                    $(".printable #btnPrint<?php echo $rows_pedidos['id']; ?>").remove();
                    $(".printable #fora<?php echo $rows_pedidos['id']; ?>").remove();
                    $(".printable #fechar<?php echo $rows_pedidos['id']; ?>").remove();
                    $(".printable").printThis({
    importCSS: false,
    loadCSS: "css/print.css",
    //header: "<h1>Look at all of my kitties!</h1>"
});
//<a href="javascript:window.location.reload(true);" >
                });
            });
        </script>
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
<?php
$filterEmp = $_SESSION['usuarioEmpresa'];

      if ($filterEmp == 1) { $nome = 'Top Entregas'; }
      if ($filterEmp == 2) { $nome = 'Turbo Dog'; }

      ?>

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
                      <div> <b class="meldin"> Data: </b> <a class="meld"> <?php $date = new DateTime($rows_pedidos['created']);echo $date->format('d/m/Y - H:i'); ?>  </a> </div>
                  <div  ><b class="meldin"> Pedido: </b> <a class="meld"> #<?php echo $rows_pedidos['id']; ?> </a> </div><?php $valorsemFrete = $rows_pedidos['valor'] - $rows_pedidos['frete']; ?>
                               <div id="idEntrega<?php echo $rows_pedidos['id']; ?>" > <b class="meldin"> Tipo de pedido: </b> <a class="meld"> <?php if ($rows_pedidos['id_entrega'] == '1'){?> Retirada <?php } else { ?> Entrega <?php  } ?></a></div>
                    <p> </p>
                  </div>
                   <hr id="fora<?php echo $rows_pedidos['id']; ?>">
              <div  align="left"> <div style="margin-left:15px;" id="foraM<?php echo $rows_pedidos['id']; ?>">  <b class="melde"> Dados do cliente </b></div> </div><p> </p>
                <hr id="fora<?php echo $rows_pedidos['id']; ?>">
                <div style="margin-left:25px;" id="foraM<?php echo $rows_pedidos['id']; ?>">
                  <div ><b class="meldin"> Cliente: </b> <a id="complo<?php echo $rows_pedidos['id']; ?>" class="meld"> <?php echo $rows_pedidos['nomeCliente']; ?></a> </div>
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
             <div id="formaPagamento<?php echo $rows_pedidos['id']; ?>" <?php if($rows_pedidos['formaPagamento'] == 'null'){?> style="display:none;" <?php } ?> ><b class="meldin" > Forma de Pagamento: </b> <br id="foraDIV<?php echo $rows_pedidos['id']; ?>" style="display:none;"> <a class="meld" style="text-transform: uppercase"> <?php echo $rows_pedidos['formaPagamento']; ?></a> </div>

              <div  id="troco<?php echo $rows_pedidos['id']; ?>" ><h4> <b class="meldin"> Troco para: </b> <a class="meld"> R$<?php echo $rows_pedidos['troco']; ?></a>  <b class="meldin">- Precisa levar </b> <a class="meld">R$<?php echo number_format($levetroco,2,",",""); ?></a>  <b class="meldin">de troco.</b></h4></div>

                    <hr id="fora<?php echo $rows_pedidos['id']; ?>">

                            <div  align="center">
                             <button  type="button" class="btn btn-xs btn-danger" id="btnPrint<?php echo $rows_pedidos['id']; ?>" ><H5><b>Imprimir</b></H5></button>
                          </div>

                            <?php } ?>
</div>
</div>
</div>
</div>
 <div class="printable"></div>
     <!-- Fim Modal -->
        <!--  -->

  </table>

</body>

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


<script type="text/javascript">
      $('#status-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientstatus = button.data('whateverstatus')
         var recipiententrega = button.data('whateverentrega')
         var recipientnome = button.data('whatevernome')
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
        modal.find('.modal-pedidos').text('' + recipient)
        modal.find('#id_entrega').val(recipiententrega)
        modal.find('#recipient-nome').val(recipientnome)
         modal.find('.modal-nome').text('Cliente: ' + recipientnome)
        modal.find('#recipient-status').val(recipientstatus)
        modal.find('.modal-status').text('' + recipientstatus)
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
<?php
    session_start();

  
if  ($_SESSION['usuarioNiveisAcessoId'] == "3") {
        goto A;
}
if  ($_SESSION['usuarioNiveisAcessoId'] != "2") {
        header("Location: sair.php");
}

A:

?>
<br>

<!DOCTYPE html>
<html lang="pt-br">
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

<script>
$(function(){
  $("#nav-placeholder").load("nav.php");
});
</script>
</head>
<body >
    <div id="nav-placeholder">

</div>

 <div style="margin-top: 6%;" text-align="center" id="main" class="container-fluid" >
  <h3 class="page-header">Configurações Dentro do APP</h3>
  <br> <br>
<?php $filterEmp = $_SESSION['usuarioEmpresa'] ?>
    <form class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12" method="POST" id="cadCat" action="processoAPP/processa_formaPagamento.php" enctype="multipart/form-data">
<div class="row">

</div>
<div class="row">
        <div class="row">
  </div>

        <div class="form-group col-md-2 col-lg-2 col-sm-3 col-xs-5 ">
        <label  for="recipient-name" class="control-label"> Forma de pagamento</label>
        <input name="nome" type="text" class="form-control" placeholder="Nova forma de pagamento?" required>
      </div>

        <div >
    <div style="margin-top:24px;margin-left:15px;">
      <button type="submit"  class="btn btn-primary">Adicionar</button>

</div>
</div>
</div>
  </form>
  <br> <br> <br> <br>
<hr />

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
order: [[ 0, "asc" ]],
   
       // responsive: true,
        fixedHeader: true,  
  
         
            fixedHeader: {
        headerOffset: $('#navheight').outerHeight(),
 
    },

    } );
} );

</script>


<link href="css/button.css" rel="stylesheet">

 
<table id="example" class="table table-striped table-hover table-bordered col-md-7 col-lg-7 col-sm-7 col-xs-7 " cellspacing="0" cellpadding="0" width="30%">
      <thead>
          <tr>
            <th >Formas de Pagamento</th>
            <th> Deletar </th>


            <?php
                  include_once("conexao.php");
                   $filterEmp = $_SESSION['usuarioEmpresa'];
                    $result_categorias = "SELECT * FROM extras where empresa = '$filterEmp' ";
                    $resultado_categorias = mysqli_query($conn, $result_categorias);
                    $total_categorias = mysqli_num_rows($resultado_categorias);
                    $resultado_categorias=mysqli_query($conn,$result_categorias);

?>
          </tr>
        </thead>
        <tbody>
          <?php
            while($rows_categorias = mysqli_fetch_assoc($resultado_categorias)){
                $nomeC = $rows_categorias['formaPagamento'];
                $idC = $rows_categorias['id'];
                ?>
                <tr>
           <td><?php echo $nomeC; ?>  </td>
                 <td  align="center"> <button type="button" class="btn btn-xs btn-danger teste1" data-toggle="modal" data-target="#delete-modal<?php echo $rows_categorias['id']; ?>" data-whatever="<?php echo $rows_categorias['id']; ?>">Excluir</button></td>
                </tr>


         <div class="modal fade" id="delete-modal<?php echo $rows_categorias['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
              <form method="POST" action="processoAPP/processa_apagar.php" enctype="multipart/form-data">
          <div class="modal-dialog" role="document">
          <div class="modal-content" align="center">
            <div  style="background: #FA8072;" class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <h4  class="modal-title" id="modalLabel"><b>Excluir Forma de Pagamento</b></h4>
            </div>
            <div class="modal-body">
            <h4 align="center"><b>Deseja realmente excluir esta forma de pagamento?</b></h4>
            </div>
              <input class="" type="hidden" name="id" value="<?php echo $rows_categorias['id']; ?>">
            <div class="modal-footer">
             <button  type="submit"  class="btn btn-danger">Sim</button>
          <button type="button" style="color:black;" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
            </div>
          </div>
          </div>
           </form>
        </div>


           <?php } ?>


         </tbody>

       </table>


</form>

<div class="col-md-7 col-lg-7 col-sm-7 col-xs-7 " id="wrapper">

          <p><a style="font-size:21px;" >Retirada no balcão</a></p> 

        <!-- Blue Buttons -->
    <div>
      <a class="btn btn--md btn--blue" onclick="return confirm('Tem certeza?');" href="onOrOFf/retiradaON.php">Ativar</a>
      <a class="btn btn--md btn--red"  onclick="return confirm('Tem certeza?');" href="onOrOFf/retiradaOFF.php">Desativar</a>
    </div>

    <?php
                    $result_categoriasX = "SELECT * FROM EMPRESAS where ID_EMPRESA = '$filterEmp' ";
                    $resultado_categoriasX = mysqli_query($conn, $result_categoriasX);
                    $rows_categoriasX = mysqli_fetch_assoc($resultado_categoriasX);


    ?>

     <p><a style="font-size:15px;">Estado atual: <?php if ($rows_categoriasX['retiradaB'] == '0') { ?> <b style="color:red"> Retirada desligado </b>  <?php } else { ?>  <b style="color:green"> Retirada Ativado </b> <?php } ?> </a></p> 

</div>



  <form class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12" method="POST" id="cadCatT" action="processoAPP/processa_diasemana.php" enctype="multipart/form-data">
    <br><br>
<div class="row">
  <h3> Lista de horários do APP </h3>
<hr> <br><br>
</div>
<div class="row">
        <div class="row">
  </div>

        <div class="form-group col-md-2 col-lg-2 col-sm-3 col-xs-5 ">
        <label  for="recipient-name" class="control-label"> Dia da semana</label>
        <input name="dia" type="text" class="form-control" placeholder="Novo dia?" required>
      </div>

              <div class="form-group col-md-2 col-lg-2 col-sm-3 col-xs-5 ">
        <label  for="recipient-name" class="control-label"> Horario</label>
        <input name="horario" type="text" class="form-control" placeholder="Novo horario?" required>
      </div>

        <div >
    <div style="margin-top:24px;margin-left:15px;">
      <button type="submit"  class="btn btn-primary">Adicionar</button>

</div>
</div>
</div>
<hr> <br>
  </form>

<div style="width:50%;margin-top:10%;">
<table id="example" class="table table-striped table-hover table-bordered col-md-7 col-lg-7 col-sm-7 col-xs-7 " cellspacing="0" cellpadding="0" width="30%">
      <thead>
          <tr>
            <th >Dia da semana</th>
            <th> Horarios </th>
            <th> Opções </th>


            <?php
                  include_once("conexao.php");
                   $filterEmp = $_SESSION['usuarioEmpresa'];
                    $result_categoriasT = "SELECT * FROM TempoAPP where empresa = '$filterEmp' ";
                    $resultado_categoriasT = mysqli_query($conn, $result_categoriasT);
                    $total_categoriasT = mysqli_num_rows($resultado_categoriasT);
                    $resultado_categoriasT=mysqli_query($conn,$result_categoriasT);

?>
          </tr>
        </thead>
        <tbody>
          <?php
            while($rows_categoriasT = mysqli_fetch_assoc($resultado_categoriasT)){
                $nomeC = $rows_categoriasT['diaSemana'];
                $hor = $rows_categoriasT['horarios'];
                $idC = $rows_categoriasT['id'];
                ?>
                <tr>
           <td><?php echo $nomeC; ?>  </td>
           <td><?php echo $hor; ?>  </td>
                 <td  align="center">

<button type="button" class="btn btn-xs btn-info teste1" data-toggle="modal" data-target="#exampleModal<?php echo $rows_categoriasT['id']; ?>" data-whatever="<?php echo $rows_categoriasT['id']; ?>">Editar</button>
 <button type="button" class="btn btn-xs btn-danger teste1" data-toggle="modal" data-target="#delete-modal2<?php echo $rows_categoriasT['id']; ?>" data-whatever="<?php echo $rows_categoriasT['id']; ?>">Excluir</button>
                 </td>
                </tr>

         <div class="modal fade" id="delete-modal2<?php echo $rows_categoriasT['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
              <form method="POST" action="processoAPP/processa_apagadiasemana.php" enctype="multipart/form-data">
          <div class="modal-dialog" role="document">
          <div class="modal-content" align="center">
            <div  style="background: #FA8072;" class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <h4  class="modal-title" id="modalLabel"><b>Excluir Horario</b></h4>
            </div>
            <div class="modal-body">
            <h4 align="center"><b>Deseja realmente excluir este horario?</b></h4>
            </div>
              <input class="" type="hidden" name="id" value="<?php echo $rows_categoriasT['id']; ?>">
            <div class="modal-footer">
             <button  type="submit"  class="btn btn-danger">Sim</button>
          <button type="button" style="color:black;" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
            </div>
          </div>
          </div>
           </form>
        </div>


 <div class="modal fade" id="exampleModal<?php echo $rows_categoriasT['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Horarios</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="processoAPP/processaDIA.php" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="recipient-valor" class="control-label">Dia da semana:</label>
                                <div class="input-group">
                              
                                <input  value="<?php echo $rows_categoriasT['diaSemana']?>"  class="form-control" name="diaSemana" id="diaSemana">
                                    </div>

                                      <input  type="hidden" value="<?php echo $rows_categoriasT['id']?>"  class="form-control" name="id" id="id">
                            </div>
                                                         <div class="form-group">
                                <label for="recipient-valor" class="control-label">Horarios:</label>
                                <div class="input-group">
                             
                                <input  class="form-control" name="horario"  value="<?php echo $rows_categoriasT['horarios']?>" id="horario">
                                    </div>
                            </div>


                         </div>
                       
                            <div class="modal-footer">
                                <button type="button" style="color:black;" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-info">Alterar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


           <?php } ?>


         </tbody>

       </table>
</div>
    <!-- <div style="width:50%;margin-left:5%;"> <div align="center"> <button type="submit"  class="btn btn-primary"><b style="font-size:21px;">Salvar Tabela</b></button> </div></div> -->


 
  <!-- teste -->


<!-- fim teste(apagar) -->

<script language= 'javascript'>
$('#cadCat').submit(function() {
    if(confirm (' Tudo certo? '))
{
document.forms['cadCat'].onsubmit = function(){return true;}
}

else
{
  event.preventDefault();
document.forms['cadCat'].onsubmit = function(){return false;}
}

});
</script>

<script language= 'javascript'>
$('#cadCat2').submit(function() {
    if(confirm (' Tudo certo? ')){document.forms['cadCat2'].onsubmit = function(){return true;}}else{event.preventDefault();document.forms['cadCat2'].onsubmit = function(){return false;}}});
</script>
  <hr />



 </div>


</body>




</html>

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
        modal.find('.modal-title').text('ID do Adicional: ' + recipient)
        modal.find('#id_produto').val(recipient)
        modal.find('#recipient-name').val(recipientnome)
        //modal.find('#recipient-created').val(recipientcreated)
        modal.find('#recipient-valor').val(recipientvalor)

      })
    </script>

            <script type="text/javascript">
      $('#delete-modal2').on('show.bs.modal', function (event) {
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
        modal.find('.modal-title').text('ID do Adicional: ' + recipient)
        modal.find('#id_produto').val(recipient)
        modal.find('#recipient-name').val(recipientnome)
        //modal.find('#recipient-created').val(recipientcreated)
        modal.find('#recipient-valor').val(recipientvalor)

      })
    </script>

            <script type="text/javascript">
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')
                //var recipientcreated = button.data('whatevercreated')
                var recipientvalor = button.data('whatevervalor')
                 var recipienttempo = button.data('whatevertempo')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text(recipientnome)
                modal.find('#id_precos').val(recipient)
                modal.find('#recipient-nome').val(recipientnome)
                //modal.find('#recipient-created').val(recipientcreated)
                modal.find('.modal-valor').text('Valor do categoria: R$' + recipientvalor)
                modal.find('#recipient-valor').val(recipientvalor)
                modal.find('#recipient-tempo').val(recipienttempo)

            })
        </script>

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




<?php $conn->close(); ?>

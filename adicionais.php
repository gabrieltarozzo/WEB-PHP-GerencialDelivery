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
  <h3 class="page-header">Adicionais</h3>
  <br> <br>
<?php $filterEmp = $_SESSION['usuarioEmpresa'] ?>
    <form class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12" method="POST" id="cadCat" action="processa_adicional/processa_adicional.php" enctype="multipart/form-data">
<div class="row">

</div>
<div class="row">
        <div class="row">
  </div>

        <div class="form-group col-md-2 col-lg-2 col-sm-3 col-xs-5 ">
        <label  for="recipient-name" class="control-label">Adicional</label>
        <input name="nome" type="text" class="form-control" placeholder="Digite o nome do adicional" required>
      </div>
              <div class="form-group col-md-2 col-lg-2 col-sm-3 col-xs-5 ">
        <label  for="recipient-valor" class="control-label">Valor:</label>
            <div class="input-group">
             <div class="input-group-addon">R$</div>
               <input maxlength="5" type="number" step=".01" class="form-control" name="valor" size="20" onKeydown="Formata(this,20,event,2)" id="recipient-valor"  placeholder="" required>
             </div>
      </div>
        <div >
    <div style="margin-top:24px;margin-left:15px;">
      <button type="submit"  class="btn btn-primary">Adicionar</button>
    <a  href="produto.php"" class="btn btn-default">Cancelar</a>
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




 <form class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12" method="POST" id="cadCat2" name="cadCat2" action="processa_adicional/categoria_adicional.php" enctype="multipart/form-data">



<table id="example" class="table table-striped table-hover table-bordered" cellspacing="0" cellpadding="0" >
      <thead>
          <tr>
            <th >Adicionais</th>
            <th >Valores</th>
           <th style="width:1%;">Deletar</th>
            <?php
                  include_once("conexao.php");
                   $filterEmp = $_SESSION['usuarioEmpresa'];
                    $result_categorias = "SELECT * FROM categoria_produtos where empresa = '$filterEmp' and adicional = 1";
                    $resultado_categorias = mysqli_query($conn, $result_categorias);
                    $total_categorias = mysqli_num_rows($resultado_categorias);
                    $resultado_categorias=mysqli_query($conn,$result_categorias);

                while($rows_categorias = mysqli_fetch_assoc($resultado_categorias)){
                $nomeC = $rows_categorias['nome']; 
                $idC = $rows_categorias['id']; 
                ?>
           <th ><?php echo $nomeC; ?>  </th>
           <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php
                   $filterEmp = $_SESSION['usuarioEmpresa'];

                    $result_adicionais = "SELECT * FROM adicionais where empresa = '$filterEmp' and desativado = 0";

                    $resultado_adicionais = mysqli_query($conn, $result_adicionais);
                    $total_adicionais = mysqli_num_rows($resultado_adicionais);
                    $resultado_adicionais=mysqli_query($conn,$result_adicionais);
                      $i = 0;
                      $t  = 1;
                while($rows_adicionais = mysqli_fetch_assoc($resultado_adicionais)){ ?>
                <?php
                $idd = $rows_adicionais['id'];
                $nome = $rows_adicionais['nome'];
                $valor = $rows_adicionais['valor'];  
                $desativado = $rows_adicionais['desativado'];?>
          <tr <?php if ($desativado == "1") { ?> style="display:none;" <?php } ?>>
     <td  ><?php echo $nome ; ?></td>
          <td >R$ <?php echo number_format($valor,2,",",""); ?> </td>
            <td > <button type="button" class="btn btn-xs btn-danger teste1" data-toggle="modal" data-target="#delete-modal<?php echo $rows_adicionais['id']; ?>" data-whatever="<?php echo $rows_adicionais['id']; ?>">Excluir</button></td>
<?php
             		 include_once("conexao.php");
                   $filterEmp = $_SESSION['usuarioEmpresa'];
                    $result_categorias = "SELECT * FROM categoria_produtos where empresa = '$filterEmp' and adicional = 1";
                    $resultado_categorias = mysqli_query($conn, $result_categorias);
                    $total_categorias = mysqli_num_rows($resultado_categorias);
                    $resultado_categorias=mysqli_query($conn,$result_categorias);
                    ?>
               <?php while($i < $total_categorias){
                $rows_categorias = mysqli_fetch_assoc($resultado_categorias);
             ?> <td> <?php    $t = $idd."".$rows_categorias['id'];
          
     $result_adic = "SELECT id FROM categorias_adicionais WHERE checkbox_id ='$t' and desativado = 0";
    $resultado_adic = mysqli_query($conn, $result_adic);
    if(($resultado_adic) AND ($resultado_adic->num_rows != 0)){
      	$top = "checked";
       }else {
       	$top = ""; //checkbox id = junção de id adicional e id categoria ex: 1690.. 1790 1680
       } ?>


<div align="center" <?php if ($top == "checked") { ?> style="display:none;" <?php } ?>>
 <input onChange="document.cadCat2.submit()" id="checkbox_id<?php echo $t; ?>" style="cursor: pointer;" name="checkbox_id[]"  value="<?php echo $idd . ' , ' . $rows_categorias['id'] . ' , ' . $t . ' , '; ?> " type="checkbox" > </input >

</div>

</form>

<form method="POST" action="processa_adicional/apaga_check.php?" enctype="multipart/form-data" id="cadCat3" name="cadCat3">  <div align="center" <?php if ($top != "checked") { ?> style="display:none;" <?php } ?>>

  <input name="checkmat[]" value="<?php echo $t; ?>" type="hidden" checked>
            <BUTTON  style="width:100%;height:0px;background:transparent;border:0px;box-shadow: 0 0 0 0;border: 0 none;outline: 0;" TYPE="SUBMIT"> <img  src="imagens/checkbox.png" alt=""> </BUTTON></div> </form> <?php $i++; ?> 
				 <?php }   $i = 0;  ?>
 </div> </td>

         <div class="modal fade" id="delete-modal<?php echo $rows_adicionais['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
              <form method="POST" action="processa_adicional/processa_apagar.php" enctype="multipart/form-data">
          <div class="modal-dialog" role="document">
          <div class="modal-content" align="center">
            <div  style="background: #FA8072;" class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <h4  class="modal-title" id="modalLabel"><b>Excluir Adicional</b></h4>
            </div>
            <div class="modal-body">
            <h4 align="center"><b>Deseja realmente excluir este adicional?</b></h4>
            </div>
              <input class="" type="hidden" name="id" value="<?php echo $rows_adicionais['id']; ?>">
            <div class="modal-footer">
             <button  type="submit"  class="btn btn-danger">Sim</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
            </div>
          </div>
          </div>
           </form>
        </div>
         <?php } ?>
        </tbody>
      </table>

    <!-- <div style="width:50%;margin-left:5%;"> <div align="center"> <button type="submit"  class="btn btn-primary"><b style="font-size:21px;">Salvar Tabela</b></button> </div></div> -->

  </form>
  </div>

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

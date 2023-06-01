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

    //Selecionar todos os categorias da tabela
    $filterEmp = $_SESSION['usuarioEmpresa'];
    //$result_preco = "SELECT * FROM precos where empresa = '$filterEmp'";
    //$resultado_preco = mysqli_query($conn, $result_preco);
    //Contar o total de categorias
    //$total_precos = mysqli_num_rows($resultado_preco);
    //Seta a quantidade de categorias por página
    //Calcular o nº de paginas necessárias para apresentar os categorias
    //Calcular o inicio da visualização
    //Selecionar os categorias a serem apresentados na página
    $result_precos = "SELECT * FROM precos where empresa = '$filterEmp' order by created";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $total_precos = mysqli_num_rows($resultado_precos);
?>
<br>

<!DOCTYPE html>
<html lang="pt-br" >

<!-- TENTATIVA DE LOADING

<script type="text/javascript">
    var i = setInterval(function () {
    clearInterval(i);
    // O código desejado é apenas isto:
    document.getElementById("loading").style.display = "none";
    document.getElementById("conteudo").style.display = "inline";

}, 4000);
</script>


<div id="loading" style="display: block">
    <img src="http://media.giphy.com/media/FwviSlrsfa4aA/giphy.gif" style="width:150px;height:150px;" />
</div>
 -->

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.png">

        <title>Top Entregas</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">

          <link href="css/navbarsResponsives/navbarResponsive.css" rel="stylesheet">
                <!-- teste -->
<!--         <script type="text/javascript">
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 200) {
                        $('.newsletter').fadeIn();
                    } else {
                        $('.newsletter').fadeOut();
                    }
                });
            });
        </script> -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
 <!-- -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.2/b-print-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.2/b-print-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.js"></script>
</head>
        <!-- fim teste -->
<br><br>
 <body role="document">
        <div id="nav-placeholder">
</div>
<script>
$(document).ready(function() {
    $('#example6').DataTable( {
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

} );
</script>

 <div id="main" class="container-fluid" style="margin-top: 50px">
    <div id="top" class="row">
        <div align="center">
            <h2>Tabela de Fretes</h2>
        </div>
        <div class="col-sm-6">
            </div>

    </div>
            <hr />
        <!-- Fixed navbar -->

  <table align="center" id="example6" style="width:42%;border-style:double;" class="table table-striped table-hover table" cellspacing="0" cellpadding="0">
    <thead>
                    <tr>
                        <th><h3>Distancias</h3></th>
                        <th><h3>Valores</h3></th>
                     <?php if ($filterEmp == '9') { ?>    <th><h3>Tempo de entrega</h3></th> <?php } ?>
                         <th></th>
                    </tr>
                </thead>
            <tbody>
                                <?php
                                while($rows_precos = mysqli_fetch_assoc($resultado_precos)){ ?>

                                    <tr>
                                        <td><h4><?php echo $rows_precos['nome']; ?></h4></td>
                                        <?php $rvalores = $rows_precos['valores']; ?>
                                        <td><h4>R$<?php echo number_format($rvalores,2,",",""); ?> </h4></td>
                            <?php if ($filterEmp == '9') { ?>    <td><h4 align="center"><?php echo $rows_precos['tempoEntrega']; ?> Minutos</h4></td>  <?php } ?>
                                        <td>
                                            <style>
                                            button {
                                               padding: 15px !important;
                                            }

                                          </style>
                                          <div align="center">
                                            <button type="button" class="btn btn-xs btn-warning  buttoni" data-toggle="modal" data-target="#exampleModal"  
                                            data-whatever="<?php echo $rows_precos['id']; ?>" 
                                             data-whatevernome="<?php echo $rows_precos['nome']; ?>"
                                              data-whatevervalor="<?php echo $rows_precos['valores']; ?>"
                                              data-whatevertempo="<?php echo $rows_precos['tempoEntrega']; ?>">
                                             <b>EDITAR </b></button>
                                                </div>

                                        </td>
                                    </tr>
                                <!-- Inicio Modal -->
                                    <?php } ?>
            </tbody>
        <!--  -->
            </table>
        </div>
    </div> <!-- /#list -->
        <div align="center">O aplicativo bloqueará distancias maiores que estas. Se deseja adicionar maiores distancias por favor contate o suporte. </div>

        <script>
$(function(){
  $("#nav-placeholder").load("nav.php");
});
</script>


</body>

</html>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Preços</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="processopreco/processa.php" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="recipient-valor" class="control-label">Valor:</label>
                                <div class="input-group">
                                <div class="input-group-addon">R$</div>
                                <input maxlength="5" type="number" step=".01" class="form-control" name="valor" size="20" onKeydown="Formata(this,20,event,2)" id="recipient-valor">
                                    </div>
                            </div>
  <?php if ($filterEmp == '9') { ?>

                                <div class="form-group">
                                <label for="recipient-tempo" class="control-label">Tempo de entrega:</label>
                                <input maxlength="5" type="number" step=".01" class="form-control" name="tempo" size="20"  id="recipient-tempo" >

                  </div> <?php } ?>

                         </div>
                            <input name="id" type="hidden" id="id_precos">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Alterar</button>
                            </div>
                        </form>
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


        <!-- Include all compiled plugins (below), or include individual files as needed -->
   
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
<?php $conn->close(); ?>
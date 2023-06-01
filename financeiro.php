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
    $filterEmp = $_SESSION['usuarioEmpresa'];
  //Verificar se está sendo passado na URL a página atual, se não é atribuido à página 1.
  //$pagina = (isset ($_GET['pagina']))? $_GET['pagina'] : 1;
  //Selecionar todos os categorias da tabela
  //$result_categoria = "SELECT * FROM categoria_produtos where empresa = '$filterEmp'";
  //$resultado_categoria = mysqli_query($conn, $result_categoria);
  //Contar o total de categorias
  //$total_categorias = mysqli_num_rows($resultado_categoria);
  //Seta a quantidade de categorias por página
  //$quantidade_pg = 25999;
  //Calcular o nº de paginas necessárias para apresentar os categorias
  //$num_pagina = ceil($total_categorias/$quantidade_pg);
  //Calcular o inicio da visualização
  //$inicio = ($quantidade_pg * $pagina) - $quantidade_pg;
  //Selecionar os categorias a serem apresentados na página
  $result_categorias = "SELECT * FROM EMPRESAS ORDER BY (nome) ASC";
  $resultado_categorias = mysqli_query($conn, $result_categorias);
  $total_categorias = mysqli_num_rows($resultado_categorias);
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.png">
        <script src="https://kit.fontawesome.com/fea54296e5.js"></script>
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
<script> HTML  SCSS  JS  Result
Edit on 
var $el = $("#very-specific-design");
var elHeight = $el.outerHeight();
var elWidth = $el.outerWidth();

var $wrapper = $("#scaleable-wrapper");

$wrapper.resizable({
  resize: doResize
});

function doResize(event, ui) {
  
  var scale, origin;
    
  scale = Math.min(
    ui.size.width / elWidth,    
    ui.size.height / elHeight
  );
  
  $el.css({
    transform: "translate(-50%, -50%) " + "scale(" + scale + ")"
  });
  
}

var starterData = { 
  size: {
    width: $wrapper.width(),
    height: $wrapper.height()
  }
}
doResize(null, starterData);
</script>
    <!-- <script type="text/javascript">
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 200) {
                    $('.newsletter2').fadeIn();
                } else {
                    $('.newsletter2').fadeOut();
                }
            });
        });
    </script> -->
  </head>

  
<!-- NEWSLETTER -->

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
             <?php if ($filterEmp == 0) { ?> class="logoresponsive2"  src="imagens/logo.png" <?php } ?>></a>
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

 <body >
<br>
 <div id="main"  >
  <div id="top"  class="row">
  <div >
    <div style="margin-bottom: 20px;margin-top:20px;margin-left:12px;" class="col-sm-3 col-ls-3 col-xs-3 col-md-3">
      <h2>  Financeiro </h2>

  </div>

  </div>
      <div style="margin-top:40px;margin-right:30px;" align="right">
        <a href="cadastrar_categoria.php" class="btn btn-primary">Cadastrar Categoria</a>
    </div>
</div>

</div>
<hr>
      <!--  <div class="pull-right">
        <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>
      </div> Antigo botao -->



<!-- fIM NEWSLETTER -->
    <!-- Fixed navbar -->


<script>
$(document).ready(function() {
    $('#example3').DataTable( {
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

        responsive: true,
        fixedHeader: true,
            fixedHeader: {
        headerOffset: $('#navheight').outerHeight(),

    },

    } );
} );

</script>
<!-- TAREFINHAS

- relatorios

- horario no app definido pelo gererencial

- botao desligar app no gerencial

- modificar algumas mensagens no app

-->
<!-- border-style:double; -->
<table  id="example3" align="center" style="width:100%;" class="table table-striped table-hover table " cellspacing="0" cellpadding="0">
        <thead>
          <tr>
          <th>Nome</th>
          <th>Usuario</th>
          <th>Senha</th>
          <th>Boletos</th>
          <th>Observacao</th>
          <th>Imagem da Categoria</th>
          <th> </th>
          </tr>
        </thead>

        <tbody>

                <?php
                while($rows_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>

                   <?php  ?>
                    <tr  class="">
                    <td><h4><?php echo $rows_categorias['NOME']; ?></h4></td>
                    <td > <h4><?php echo $rows_categorias['usuario']; ?></h4></td>

                   <td ><h4><?php echo $rows_categorias['senha']; ?> </h4></td>
                   <!-- <a href="ativar_desativarAD/ativaAD.php"> <button style="width:50px;" id="cancelado<?php echo $rows_categorias['id']; ?>" type="submit" class="btn btn-success">+-</button> </a> -->

                <td>  </td>
                     <td> <h4></h4> </td>
                   <td style="width:340px;">  </td>
                    <!--<td><?php // echo $rows_categorias['created']; ?></td> pensar em adicionar imagem -->
                    <td style="width:120px;" >
                    </td>
                  </tr>


                <!-- Fim Modal -->
                <?php } ?>
      </tbody>
    <!--  -->
      </table>

        <!-- <?php
        //verificar pagina anterior e posterior
        //$pagina_anterior = $pagina - 1;
        //$pagina_posterior = $pagina +1;
        ?>
        <nav align=center>
        <div id="bottom" class="row">
          <div class="col-md-12">
            <ul class="pagination">
              <li class="#">
              <?php
                if($pagina_anterior != 0) { ?>
                <a href="categoria.php?pagina=<?php echo $pagina_anterior; ?>"> &laquo; Anterior</a>
                <?php } else{   ?>
                    <a> &laquo; Anterior</a>
              <?php }
              ?>
              </li>
              <?php //apresentar paginação
                  for($i = 1; $i < $num_pagina + 1 ; $i++) { ?>
              <li><a href="categoria.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php } ?>

              <li class="next">             <?php
                if($pagina_posterior <= $num_pagina) { ?>
                <a href="categoria.php?pagina=<?php echo $pagina_posterior; ?>">Próximo &raquo </a>
                <?php } else{   ?>
                    <a> Próximo &raquo</a>
              <?php }
              ?></li>
            </ul><! /.pagination -->
          </div>
        </div> <!-- /#bottom -->
        </nav>
 </div> <!-- /#main -->

<!-- Modal -->
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
              <form method="POST" action="processocategoria/processa_apagar.php" enctype="multipart/form-data">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"  style="background: #FA8072;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
            </div>
            <div class="modal-body">
            <p><?php echo $rows_categorias['id']; ?></p>
            <h4><b>Deseja realmente excluir este item?</b></h4>
            </div>
              <input class="hidden" name="id"<?php echo $rows_categorias['id']; ?>  id="id_categoria">
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
            <h4 class="modal-title" id="exampleModalLabel">Categoria</h4>
          </div>
          <div class="modal-body">
            <form method="POST" id="editcat" action="processocategoria/processa.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="recipient-nome" class="control-label">Nome:</label>
                <input name="nome" type="text" class="form-control" id="recipient-nome">
              </div>

                            <div class="form-group">
                <label for="recipient-codigo" class="control-label">Codigo:</label>
                <input name="codigo" type="text" class="form-control" id="recipient-codigo">
              </div>


               <div class="form-group">

                <!-- <input name="semObs" type="number" class="modal-semObs" id="recipient-semObs"> -->
              </div>

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


                <div class="form-group col-md-4">
                <label for="recipient-imagens" class="control-label" >Imagem </label>
                <input name="recipient-imagens"  readonly="true" type="text" class="form-control" id="recipient-imagens">
              </div>

               <div class="form-group">
                    <label >Alterar Imagem</label>
                    <br>
                      <input name="arquivo" type="file"/>
                  </div>


             </div>
             <!--
 <div align="center">

      <div class="form-group  col-md-6  col-xs-6  col-ls-6">
          <br> <br>

  <button style="width:200px;"  href="ativar_desativarAD/desativaAD.php" type="submit" class="btn btn-danger">Desativar adicionais</button>
  </div>
  <div class="form-group  col-md-6  col-xs-6  col-ls-6">
      <br> <br>
  <button style="width:200px;" type="submit" class="btn btn-success">Ativar observação</button> <p> </p>

  <button style="width:200px;" type="submit" class="btn btn-danger">Desativar observação</button>
      </div>
    </div>
  -->
 <input name="id" type="hidden" id="id_categoria">
 <script language= 'javascript'>
//-->
$('#editcat').submit(function() {
    if(confirm (' Tudo certo? '))
{
document.forms['editcat'].onsubmit = function(){return true;}
}

else
{
  event.preventDefault();
document.forms['editcat'].onsubmit = function(){return false;}
}

});
</script>

<!--
 <div class="form-group " style="margin-left:35px;">
  <div style="margin-bottom:10px;">
  <input class="input" type="checkbox" id="fruit4" name="fruit4" value="1" checked>
  <label for="fruit4"> Terá campo observação?</label>
</div>
<div style="margin-bottom:10px;">
  <input class="input" type="checkbox" id="fruit2" name="fruit2" value="1" checked>
  <label for="fruit2"> Terá opção de adicionais?</label>
  </div>
<div >
  <input class="input" type="checkbox" id="fruit3" name="fruit3" value="1">
  <label for="fruit3"> Terá opção meio a meio?</label>
  </div>
</div> -->


              <div class="modal-footer" align="center">
              <!-- <div style="float:left;top:0;height:0;">
                <input type="checkbox" id="fruit4" name="fruit4" value="1" <?php ?>>
                <label for="fruit4"> Campo observação?</label>
                </div> -->

                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Alterar</button>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script type="text/javascript">
      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientnome = button.data('whatevernome')
        var recipientcodigo = button.data('whatevercodigo')
        var recipientadicional = button.data('whateveradicional')
        var recipientsemObs = button.data('whateversemObs')
        //var recipientcreated = button.data('whatevercreated')
        var recipientvalor = button.data('whatevervalor')
        var recipientpromo_valor = button.data('whateverpromo_valor')
        var recipientdescricao = button.data('whateverdescricao')
        var recipientimagens = button.data('whateverimagens')
        var recipientsituacao_id = button.data('whateversituacao_id')
        var recipientcategoria_categorias_id = button.data('whatevercategoria_categorias_id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID da Categoria: ' + recipient)
        modal.find('#id_categoria').val(recipient)
        modal.find('#recipient-nome').val(recipientnome)
        modal.find('#recipient-codigo').val(recipientcodigo)
        modal.find('#recipient-adicional').val(recipientadicional)
        modal.find('#recipient-semObs').val(recipientsemObs)
        modal.find('.modal-semObs').text('ID da Obs: ' + recipientsemObs)
        //modal.find('#recipient-created').val(recipientcreated)
        modal.find('.modal-valor').text('Valor do categoria: R$' + recipientvalor)
        modal.find('#recipient-valor').val(recipientvalor)
        modal.find('#recipient-promo_valor').val(recipientpromo_valor)
        modal.find('#descricao-text').val(recipientdescricao)
        modal.find('#recipient-imagens').val(recipientimagens)
        modal.find('#recipient-situacao_id').val(recipientsituacao_id)  
        modal.find('#recipient-categoria_categorias_id').val(recipientcategoria_categorias_id)
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
        var recipientcategoria_categorias_id = button.data('whatevercategoria_categorias_id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID da categoria: ' + recipient)
        modal.find('#id_categoria').val(recipient)
        modal.find('#recipient-name').val(recipientnome)
        //modal.find('#recipient-created').val(recipientcreated)
        modal.find('#recipient-valor').val(recipientvalor)
        modal.find('#recipient-promo_valor').val(recipientpromo_valor)
        modal.find('#descricao-text').val(recipientdescricao)
        modal.find('#recipient-categoria_categorias_id').val(recipientcategoria_categorias_id)
      })
    </script>
</body>

</html>

<?php $conn->close(); ?>
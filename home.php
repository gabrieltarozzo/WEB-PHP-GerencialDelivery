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
   // $pagina = (isset ($_GET['pagina']))? $_GET['pagina'] : 1;
    //Selecionar todos os categorias da tabela
   // $result_novidade = "SELECT * FROM novidades where empresa = '$filterEmp' ORDER BY nome ";
    //$resultado_novidade = mysqli_query($conn, $result_novidade);
    //Contar o total de categorias
   // $total_novidades = mysqli_num_rows($resultado_novidade);
    //Seta a quantidade de categorias por página
   // $quantidade_pg = 9999999;
    //Calcular o nº de paginas necessárias para apresentar os categorias
   // $num_pagina = ceil($total_novidades/$quantidade_pg);
    //Calcular o inicio da visualização
   // $inicio = ($quantidade_pg * $pagina) - $quantidade_pg;
    //Selecionar os categorias a serem apresentados na página
    $result_novidades = "SELECT `novidades` . *, `situacoes` . `nome` AS`situacao_do_nome` FROM `novidades`

LEFT JOIN `situacoes` ON `novidades` . `situacao_id` = `situacoes` . `id`

WHERE `novidades` . `empresa` = '$filterEmp' ORDER BY (nome) ASC";
    $resultado_novidades = mysqli_query($conn, $result_novidades);
    $total_novidades = mysqli_num_rows($resultado_novidades);

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
       <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
    <meta name="author" content="Atalos Corporation">
    <link rel="icon" href="imagens/logotop.jpg">

    <title>Top Entregas</title>
    

        <script src="js/bootstrap.min.js"></script>

       

        <link href="css/navbarsResponsives/navbarResponsive.css" rel="stylesheet">

<!-- DATABLE NOVA -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
 <!-- -->
 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.2/b-print-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.2/b-print-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.js"></script>




                <!-- teste -->

        <!-- <script type="text/javascript">
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
 

        <!-- fim teste -->
    </head>
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
             <?php if ($filterEmp == 5) { ?>  class="logoresponsive2" src="imagens/logo.png" <?php } ?>></a>
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
               <li><a href="postmessage/index.php">Envio de Notificações</a></li>
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

<br>
 <div id="main"  >
  <div id="top"  class="row">
  <div >
    <div style="margin-bottom: 20px;margin-top:20px;margin-left:12px;" class="col-sm-3 col-ls-3 col-xs-3 col-md-3">
      <h2>Novidades</h2>

  </div>

  </div>
      <div style="margin-top:40px;margin-right:30px;" align="right">
        <a href="cadastrar_novidade.php" class="btn btn-primary">Cadastrar Novidade</a>
    </div>
</div>
<hr>

        <!-- Fixed navbar -->


<div >
  <?php
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr';  // retirar o "sandbox. para voltar a produção"
$paypal_id='sb-ea82x1081940@business.example.com'; // aqui é o id do vendedor que receberá a quantia
$tot = 10;
?>
               

               <form action='<?php echo $paypal_url; ?>' method='post' name='frmPayPal1'>
    <input type='hidden' name='business' value='<?php echo $paypal_id;?>'>
    <input type='hidden' name='cmd' value='_xclick'>
    <input type='hidden' name='item_name' value='Products Total'>
    <input type='hidden' name='amount' value='10'> <!-- aqui é a variavel que receberá o valor do produto -->
    <input type='hidden' name='no_shipping' value='1'>
    <input type='hidden' name='currency_code' value='BRL'>
    <input type='hidden' name='handling' value='0'>
    <input type='hidden' name='cancel_return' value='http://localhost/gerencialdelivery/home.php'> <!-- aqui é a pagina para quando o usuario cancelar a compra -->
    <input type='hidden' name='return' value='http://localhost/gerencialdelivery/home.php'> <!-- adicionar pagina do sucesso -->
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

      <table id="guest" class="table table-striped table-hover table" align="center" style="width:70%;border-style:double;" cellspacing="0" cellpadding="0">
                   <thead>
                    <tr >
                        <th >ID</th>
                        <th >Nome</th>
                        <th >Descricao</th>
                        <th >Situação</th>
                        <th >Imagem da novidade</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
<!-- <style>
.desativado {
    background-color: #A9A9A9 !important;
}
</style> -->
                                <?php
                                while($rows_novidades = mysqli_fetch_assoc($resultado_novidades)){ ?>
                                <?php $sit_id = $rows_novidades['situacao_id']; ?>
                                    <tr <?php if($sit_id == '2'){ ?> class="desativado" <?php } ?>>
                                        <td  ><?php echo $rows_novidades['id']; ?></td>
                                        <td  ><?php echo $rows_novidades['nome']; ?></td>
                                                <td >
                                                    <div style="width:250px; height:130px; overflow:auto; overflow-wrap: break-word;">
                                                       <?php echo $rows_novidades['descricao']; ?>
                                                    </div> 
                                                         </td>
                                           <?php

                                           //tentativa de melhorar a consulta ao banco, estou tirando dos whiles as validacoes de consulta, deixando apenas a consulta ser realizada uma vez.

                                        //$id_doidi = $rows_novidades['situacao_id'];
                                       // $nome_situacao = ("SELECT nome FROM situacoes WHERE id = '$id_doidi'  ");
                                       // $resultado_situacao = mysqli_query($conn, $nome_situacao);
                                       // $roww = mysqli_fetch_assoc($resultado_situacao);
                                       // $n_sit = $roww['nome'];

                                         ?>
                                         <td ><?php echo $rows_novidades['situacao_do_nome']; ?></td>
                                         <td style="width:340px;"> <?php echo "<img style='width:300px;height:140px;' src='imagens_novidades/".$rows_novidades['imagens']."' >" ?></td>

                                        <!--<td><?php // echo $rows_categorias['created']; ?></td> pensar em adicionar imagem -->
                                        <td style="width:120px;">
                                            <button style="margin-top:4%;width:80px;" type="button" class="btn btn-xs btn-primary teste1" data-toggle="modal" data-target="#myModal<?php echo $rows_novidades['id']; ?>"><h6 style="font-size:15px;">Visualizar</h6> </button>

                                            <button style="margin-top:4%;width:80px;" type="button" class="btn btn-xs btn-warning teste1" data-toggle="modal" data-target="#exampleModal" 
                                            data-whateverdescricao="<?php echo $rows_novidades['descricao']; ?>" 
                                            data-whatever="<?php echo $rows_novidades['id']; ?>" 
                                            data-whatevernome="<?php echo $rows_novidades['nome']; ?>"
                                            data-whateversituacao_id="<?php echo $rows_novidades['situacao_id']; ?>"
                                            data-whateverimagens="<?php echo $rows_novidades['imagens']; ?>">
                                             <h6 style="font-size:15px;">Editar</h6></button>

                                            <button style="margin-top:4%; width:80px;" type="button" class="btn btn-xs btn-danger teste1" data-toggle="modal" data-target="#delete-modal" data-whatever="<?php echo $rows_novidades['id']; ?>"><h6 style="font-size:15px;">Excluir</h6></button>

                                        </td>
                                    </tr>
                    
                 
                             
                                <!-- Inicio Modal -->
                                <div class="modal fade" id="myModal<?php echo $rows_novidades['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                                    <div class="modal-dialog modal-xs headermodal modal-ku" role="document">
                                        <div class="modal-content headermodal">
                                          <link href="css/visualizar/home.css" rel="stylesheet">
                                            <div class="modal-header headermodal">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title text-center" id="myModalLabel">Visual no aplicativo</h3>
                                            </div>



                                                <div class="modal-body back" align="center">
                                                 <div id="wrapper">
                                                  <div id="container">

                                                  <section class="open-book">

                                                <?php echo "<img class='imgteste' src='imagens_novidades/".$rows_novidades['imagens']."' >" ?>

                                                <!-- <h4> <b> ID da novidade: </b></h4><?php echo $rows_novidades['id']; ?> -->

                                     <article class="typecard1">

                           <header style="float:left;font-size:10px;margin:10px;" class="header">
                                <h1>Estabelecimento</h1>
                                <h6>Local</h6>
                            </header>  
                            <br>
                                                <h2  style="font-family:panroman;font-size:20px;margin:20px;" class="chapter-title titleh2 h233"><b> <p> <?php echo $rows_novidades['nome']; ?> </p></b></h2> 
                                                <h2 style="font-family:panroman;font-size:16px;margin:40px;" class="textH h233"><b> <p><?php echo $rows_novidades['descricao']; ?></p> </b></h2> <br>
                                              </article>
                                              </section>
                                            </div>
                                          </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fim Modal -->
                                <?php } ?>
            </tbody>
        <!--  -->
            </table>

<!--                 <?php
                //verificar pagina anterior e posterior
                $pagina_anterior = $pagina - 1;
                $pagina_posterior = $pagina +1;
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
                            <?php   }
                            ?>
                            </li>
                            <?php //apresentar paginação
                                    for($i = 1; $i < $num_pagina + 1 ; $i++) { ?>
                            <li><a href="categoria.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php } ?>

                            <li class="next">                           <?php
                                if($pagina_posterior <= $num_pagina) { ?>
                                <a href="categoria.php?pagina=<?php echo $pagina_posterior; ?>">Próximo &raquo </a>
                                <?php } else{   ?>
                                        <a> Próximo &raquo</a>
                            <?php   }
                            ?></li>
                        </ul><!-- /.pagination -->
                    </div>
                </div> <!-- /#bottom -->
                </nav>
 </div> <!-- /#main --> 

<!-- Modal -->
                <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                      <form method="POST" action="processonovidade/processa_apagar.php" enctype="multipart/form-data">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header"  style="background: #FA8072;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                      </div>
                      <div class="modal-body">
                      <p><?php echo $rows_novidades['id']; ?></p>
                        <h4><b>Deseja realmente excluir este item?</b></h4>
                      </div>
                        <input class="hidden" name="id"<?php echo $rows_novidades['id']; ?>  id="id_novidade">
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
                        <h4 class="modal-title" id="exampleModalLabel">Novidade</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="edithome" action="processonovidade/processa.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-nome" class="control-label">Nome:</label>
                                <input name="nome" type="text" class="form-control" id="recipient-nome">
                            </div>

                            <div class="form-group">
                                <label for="descricao-text" class="control-label">Descricao:</label>
                             <textarea  name="descricao" class="form-control" id="descricao-text"></textarea> 
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

                                            $resultado =mysqli_query($conn, "SELECT * FROM situacoes");
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
                            <input name="id" type="hidden" id="id_novidade">

                             <script language= 'javascript'>


//-->
$('#edithome').submit(function() {
    if(confirm (' Tudo certo? '))
{
document.forms['edithome'].onsubmit = function(){return true;}
}

else
{
  event.preventDefault();
document.forms['edithome'].onsubmit = function(){return false;}
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


        <!-- Include all compiled plugins (below), or include individual files as needed -->

        <script type="text/javascript">
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientnome = button.data('whatevernome')
                //var recipientcreated = button.data('whatevercreated')
                var recipientvalor = button.data('whatevervalor')
                var recipientpromo_valor = button.data('whateverpromo_valor')
                var recipientimagens = button.data('whateverimagens')
                var recipientsituacao_id = button.data('whateversituacao_id')
                var recipientdescricao = button.data('whateverdescricao')
                var recipientcategoria_categorias_id = button.data('whatevercategoria_categorias_id')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('ID da Novidade: ' + recipient)
                modal.find('#id_novidade').val(recipient)
                modal.find('#recipient-nome').val(recipientnome)
                //modal.find('#recipient-created').val(recipientcreated)
                modal.find('.modal-valor').text('Valor do categoria: R$' + recipientvalor)
                modal.find('#recipient-valor').val(recipientvalor)
                modal.find('#recipient-imagens').val(recipientimagens)
                modal.find('#recipient-situacao_id').val(recipientsituacao_id)
                modal.find('#recipient-promo_valor').val(recipientpromo_valor)
                modal.find('#descricao-text').val(recipientdescricao)
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
                modal.find('.modal-title').text('ID da novidade: ' + recipient)
                modal.find('#id_novidade').val(recipient)
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

<script>
$(document).ready(function() {
    $('#guest').DataTable( {
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

<?php $conn->close(); ?>
   


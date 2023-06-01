<?php

    session_start();
	
if 	($_SESSION['usuarioNome'] != "Administrador") {
		header("Location: sair.php");

}
	include_once("conexao.php");
	//Verificar se está sendo passado na URL a página atual, se não é atribuido à página 1.
	$pagina = (isset ($_GET['pagina']))? $_GET['pagina'] : 1;
	
	
	//aqui faz o pesquisar
	$valor_pesquisar = $_GET['resultado'];

	
	//Selecionar todos os produtos da tabela precisa adicionar o where pra frente pra pesquisar
	$result_produto = "SELECT * FROM produtos WHERE nome LIKE 'valor_pesquisar'";
	$resultado_produto = mysqli_query($conn, $result_produto);
	
	//Contar o total de produtos
	$total_produtos = mysqli_num_rows($resultado_produto);
	//Seta a quantidade de produtos por página
	$quantidade_pg = 2;
	//Calcular o nº de paginas necessárias para apresentar os produtos
	$num_pagina = ceil($total_produtos/$quantidade_pg);
	//Calcular o inicio da visualização
	$inicio = ($quantidade_pg * $pagina) - $quantidade_pg;
	
	//Selecionar os produtos a serem apresentados na página
	$result_produtos = "SELECT * FROM produtos limit $inicio, $quantidade_pg";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$total_produtos = mysqli_num_rows($resultado_produtos);


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
		<meta name="author" content="Cesar Szpak - Celke">
		<link rel="icon" href="imagens/favicon.ico">

		<title>Top Entregas</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
		
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/javascriptpersonalizado.js"></script>
	</head>

	<body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">GerencialDelivery</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="#">Produtos</a></li>
					<li><a href="cadastrar_categoria.php">Categorias</a></li>
					<li><a href="sair.php">Sair</a></li>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
    </nav>
	<!-- TESTE2 
	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Dashboard</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuário <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Listar</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
				<li><a href="#">Home</a></li>
			</ul>
			<div class="navbar-form navbar-right">					
				<a href="sair.php"><button type="submit" class="btn btn-success">Sair</button></a>
			</div>
		</div><!--/.nav-collapse --				
	</div>
</nav>

<!-- FIM TESTE2 -->
 

 <div id="main" class="container-fluid" style="margin-top: 50px">
 
 	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Produtos</h2>
		</div>
		
		<div class="col-sm-6">
			<form class="form_inline" method="GET" action="pesquisar.php">
			<div class="input-group h2">
				<input name="pesquisar" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</form>
				</span>
			</div>
			
		</div>
				
		<form method="POST" id="form-pesquisa" action="">
			Pesquisar: <input type="text" name="pesquisa" id="pesquisa" placeholder="O que você está procurando?">
			<input type="submit" name="enviar" value="Pesquisar">
		</form>
			<ul class="resultado">
			</ul>
		

		<div class="col-sm-3">
			<a href="cadastrar_produto.php" class="btn btn-primary pull-right h2">Cadastrar Produto</a>
		</div> 
			<!--	<div class="pull-right">
				<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>
			</div> Antigo botao -->
			<!-- Inicio Modal -->
			<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">Cadastrar Produto</h4>
						</div>
						<div class="modal-body">
							<form method="POST" action="processa_cad.php" enctype="multipart/form-data">
								<div class="form-group">
									<label for="recipient-name" class="control-label">Nome:</label>
									<input name="nome" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="recipient-categoria_produtos_id" class="control-label">Categoria_produto:</label>
									<input name="categoria_produtos_id" type="text" class="form-control">
								</div>
						     	<div class="form-group">
									<label for="recipient-valor" class="control-label">Valor:</label>
									<input name="valor" type="text" class="form-control">
								</div>
						     	<div class="form-group">
									<label for="recipient-promo_valor" class="control-label">Promo_valor:</label>
									<input name="promo_valor" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="descricao-text" class="control-label">Descricao:</label>
									<textarea name="descricao" class="form-control"></textarea>
								</div>
								<!--
								<div class="form-group">
									<label for="recipient-created" class="control-label"></label>
									<input name="created" type="text" class="form-control"  > <?php echo date('d/m/Y') ?>
								</div>  tentativa de data -->
								<div class="modal-footer">
									<button type="submit" class="btn btn-success">Cadastrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fim Modal -->
	</div> <!-- /#top -->


 	<hr />

 	<div id="list" class="row">

		<div class="table-responsive col-md-12">
			<table class="table table-striped" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome do produto</th>
						<th>Valor final do produto</th>
						<th>Valor de desconto do produto</th>
							<th>% Promocional</th>
						<th>Valor original do produto</th>

						<th class="actions"  >Botões</th>

					</tr>
				</thead>

							<!-- Botões antigos
							<a class="btn btn-success btn-xs" href="colaborador.php">Visualizar</a>
							<a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
							<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
							-->

<?php
// aqui são as masks
function mask($val, $mask)
{
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++)
 {
 if($mask[$i] == '#')
 {
 if(isset($val[$k]))
 $maskared .= $val[$k++];
 }
 else
 {
 if(isset($mask[$i]))
 $maskared .= $mask[$i];
 }
 }
 return $maskared;
$data = "10102010";

}


$cnpj = "11222333000199";
$cpf = "00100200300";
$cep = "08665110";
$data = "10102010";


//echo mask($cnpj,'##.###.###/####-##');
//echo mask($cpf,'###.###.###-##');
//echo mask($cep,'#####-###');
//echo mask($data,'##/##/####');

?>

				<!---->
			<tbody>
								<?php 

								while($rows_produtos = mysqli_fetch_assoc($resultado_produtos)){ ?>


									<tr>
										<td><?php echo $rows_produtos['id']; ?></td>
										<td><?php echo $rows_produtos['nome']; ?></td>
										<td>R$ <?php echo $rows_produtos['valor']-$rows_produtos['promo_valor']*$rows_produtos['valor']/100; ?> </td>
										<td>R$ <?php echo $rows_produtos['promo_valor']*$rows_produtos['valor']/100;?>  </td> 
										<td><?php echo $rows_produtos['promo_valor'];?> %</td>
										<td>R$ <?php echo $rows_produtos['valor']; ?> </td>
										<!--<td><?php // echo $rows_produtos['created']; ?></td> pensar em adicionar imagem -->


										<td>
											<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_produtos['id']; ?>">Visualizar</button>
											<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows_produtos['id']; ?>" data-whatevernome="<?php echo $rows_produtos['nome']; ?>" data-whatevervalor="<?php echo $rows_produtos['valor']; ?>" data-whateverdescricao="<?php echo $rows_produtos['descricao']; ?>"data-whateverpromo_valor="<?php echo $rows_produtos['promo_valor']; ?>">Editar</button>
									    <!-- <a onclick="confirma(50)"  <a href="processa_apagar.php?id=<?php //echo $rows_produtos['id']; ?>" </a>  <button type="button" class="btn btn-xs btn-danger">Apagar</button> </a> -->
										    <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-modal" data-whatever="<?php echo $rows_produtos['id']; ?>">Excluir</button>
									</td>

									</tr>

								<!-- Inicio Modal -->
						
								<div class="modal fade" id="myModal<?php echo $rows_produtos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_produtos['nome']; ?></h4>
											</div>
											<div class="modal-body" align="center">
												<b> ID do produto: </b> <p><?php echo $rows_produtos['id']; ?></p>
												<b> Nome do produto: </b><p><?php echo $rows_produtos['nome']; ?></p>
												<b> Descricao do produto: </b><p><?php echo $rows_produtos['descricao']; ?></p>	
												<b> Valor do produto:</b><p>R$<?php echo $rows_produtos['valor']; ?></p>	
												<b> Imagem do produto: </b><p> <img src="imagens/221.gif"></p>													
									
											</div>
										</div>
									</div>
								</div>
							
								<!-- Fim Modal -->
				
								<?php } ?>
			</tbody>
		<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
			</table>
		</div>
	
	</div> <!-- /#list -->
				<?php
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
								<a href="pesquisar.php?pagina=<?php echo $pagina_anterior; ?>"> &laquo; Anterior</a>
							
								<?php } else{   ?>
										<a> &laquo; Anterior</a>
							<?php	}
							?>
							</li>
							<?php //apresentar paginação
									for($i = 1; $i < $num_pagina + 1 ; $i++) { ?>
							<li><a href="pesquisar.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
									<?php } ?>

							<li class="next">							<?php 
								if($pagina_posterior <= $num_pagina) { ?>
								<a href="pesquisar.php?pagina=<?php echo $pagina_posterior; ?>">Próximo &raquo </a>
								<?php } else{   ?>
										<a> Próximo &raquo</a>
							<?php	}
							?></li>
						</ul><!-- /.pagination -->
					</div>
				</div> <!-- /#bottom -->
				</nav>
 </div> <!-- /#main -->

<!-- Modal -->
				<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
				  	  <form method="POST" action="processa_apagar.php" enctype="multipart/form-data">
				  <div class="modal-dialog" role="document">
				  	  
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
					  </div>
					  <div class="modal-body">
					  <p><?php echo $rows_produtos['id']; ?></p>
						Deseja realmente excluir este item?
					  </div>
					  	<input class="hidden" name="id"<?php echo $rows_produtos['id']; ?>  id="id_produto">
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
						<h4 class="modal-title" id="exampleModalLabel">Produto</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="processa.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="recipient-nome" class="control-label">Nome:</label>
								<input name="nome" type="text" class="form-control" id="recipient-nome">
							</div>
						    <div class="form-group">
								<label for="recipient-valor" class="control-label">Valor:</label>
								<input name="valor" type="text" class="form-control" id="recipient-valor">
							</div>
							<div class="form-group">
								<label for="recipient-promo_valor" class="control-label">% Promocional:</label>
								<input name="promo_valor" type="text" class="form-control" id="recipient-promo_valor">
							</div>
							<div class="form-group">
								<label for="descricao-text" class="control-label">Descricao:</label>
								<textarea name="descricao" class="form-control" id="descricao-text"></textarea>
							</div>
							<input name="id" type="hidden" id="id_produto">
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-danger">Alterar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script src="js/jquery.min.js"></script>

 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
 		<script type="text/javascript">
			$('#exampleModal').on('show.bs.modal', function (event) {
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
				modal.find('.modal-title').text('ID do Produto: ' + recipient)
				modal.find('#id_produto').val(recipient)
				modal.find('#recipient-nome').val(recipientnome)
				//modal.find('#recipient-created').val(recipientcreated)
				modal.find('.modal-valor').text('Valor do produto: R$' + recipientvalor)
				modal.find('#recipient-valor').val(recipientvalor)
				modal.find('#recipient-promo_valor').val(recipientpromo_valor)
				modal.find('#descricao-text').val(recipientdescricao)
				modal.find('#recipient-categoria_produtos_id').val(recipientcategoria_produtos_id)
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
				var recipientcategoria_produtos_id = button.data('whatevercategoria_produtos_id')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID do Produto: ' + recipient)
				modal.find('#id_produto').val(recipient)
				modal.find('#recipient-name').val(recipientnome)
				//modal.find('#recipient-created').val(recipientcreated)
				modal.find('#recipient-valor').val(recipientvalor)
				modal.find('#recipient-promo_valor').val(recipientpromo_valor)
				modal.find('#descricao-text').val(recipientdescricao)
				modal.find('#recipient-categoria_produtos_id').val(recipientcategoria_produtos_id)
			})
		</script>

</body>

</html>


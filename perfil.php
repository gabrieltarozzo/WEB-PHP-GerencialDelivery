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
<link href="css/perfil.css" rel="stylesheet">
<link href="css/navbarsResponsives/navbarResponsivePERFIL.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">


<html>

<head>
	<!--- teste via cepp -->
<script type="text/javascript" >

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
            document.getElementsByClassName('nome')[0].innerHTML = connteudo.cidade;
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>


	<!-- fim teste via cep -->
<title> Top Entregas </title>
</head>
<body class="background3">
	 <nav class="navbar">
  <div class="container-fluid">
   <div class="navbar-header">

				 <a class="lol1" href="#" data-toggle="modal" data-target="#exampleModal">
            <img class="lol1" src="imagens/logo.png" alt="">
            </a>
   </div>
   <div class="nomeAdmin" >
      <div  class="nav navbar-nav navbar-left">
      <a class="aa"> Logado como: <b><?php echo $_SESSION['usuarioNome'] ?> </b></a>
    </div>
  </div>
   <div id="navbar" >
    <ul class="nav navbar-nav navbar-right">
     <li><a href="home.php">Novidades <img  src="imagens/news.png" alt=""></a></li>
      <li><a href="pedidos.php">Pedidos <img  src="imagens/pedido.png" alt=""></a></li>
      <li><a href="produto.php">Produtos <img  src="imagens/produtos.png" alt=""></a></li>
      <li><a href="categorias.php">Categorias <img  src="imagens/categoria.png" alt=""></a></li>
      <li><a href="precos.php">Fretes <img  src="imagens/preco.png" alt=""></a></li>
      <li><a href="dashboard.php">Relatórios <img  src="imagens/dashboard.png" alt=""></a></li>
     <li><a href="perfil.php">Perfil <img  src="imagens/admin.png" alt=""> </a> </li>
     <li><a href="ajuda.php">Suporte <img  src="imagens/support.png" alt=""></a></li>
       <li><a href="painel.php">Painel <img src="imagens/settings.png" alt=""></a></li>
    <li><a href="sair.php">Sair <img  src="imagens/logout.png" alt=""></a></li>
    </ul>
   </div>
  </div>
 </nav>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div style="margin-top:5%" class="card">
   <img src="imagens/tip1.jpg" alt="John" class="imgt">
  <h1><?php	echo $_SESSION['usuarioNome']; 	?> </h1>
    <?php   
     include_once("conexao.php");
  	$iduser = $_SESSION['usuarioId'];
    $result_usuarios = "SELECT * FROM endereco where id_usuarios='$iduser'";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);
  	$rows_usuarios = mysqli_fetch_assoc($resultado_usuarios); ?>

  <p class="title"><?php echo $rows_usuarios['empresa']; ?></p>
  <p class="title2">Cidade: <?php echo $rows_usuarios['cidade']; ?>     <img  src="imagens/skyline.png" alt="">   </p>
  <p class="title3">Bairro:  <?php echo $rows_usuarios['bairro']; ?> <img  src="imagens/bairro.png" alt=""></p>
  <p class="title4">  <?php echo $rows_usuarios['rua']; ?> <img  src="imagens/rua.png" alt="">, Nº:  <?php echo $rows_usuarios['numero']; ?> <img  src="imagens/home.png" alt=""></p>

  <a href="https://www.linkedin.com/company/atalos-solu%C3%A7%C3%B5es-sustent%C3%A1veis?trk=top_nav_home"><i class="fa fa-linkedin"></i></a> 
  <a href="https://pt-br.facebook.com/atalosriopreto/"><i class="fa fa-facebook"></i></a> 
  <br> <br> <br>
  <?php   

  	include_once("conexao.php");
  	$nomeuser = $_SESSION['usuarioNome'];
    $result_senhas = "SELECT * FROM usuarios where nome='$nomeuser'";
    $resultado_senhas = mysqli_query($conn, $result_senhas);
  	$rows_senhas = mysqli_fetch_assoc($resultado_senhas); ?>

  <!--<p><button class="buttoni" data-toggle="modal" data-target="#TROCASENHA" data-whatever="<?php echo $rows_senhas['id']; ?>" >Alterar senha <img  style="margin-left: 15px" src="imagens/key.png" alt=""></button> </p> -->

    <?php   

  	include_once("conexao.php");
  	$idUserr = $_SESSION['usuarioId'];
    $result_enderecos = "SELECT * FROM endereco where id_usuarios='$idUserr'";
    $resultado_enderecos = mysqli_query($conn, $result_enderecos);
  	$rows_enderecos = mysqli_fetch_assoc($resultado_enderecos); 
  	?>

    <!-- <a href="alterarEndereco.php"> <button class="buttoni" 
    	data-whatever="<?php echo $rows_enderecos['id']; ?>" data-whateverempresa="<?php echo $rows_enderecos['empresa']; ?>" data-whatevercidade="<?php echo $rows_enderecos['cidade']; ?>"
    	data-whateverbairro="<?php echo $rows_enderecos['bairro']; ?>"
    	data-whateverrua="<?php echo $rows_enderecos['rua']; ?>"
    	data-whatevernumero="<?php echo $rows_enderecos['numero']; ?>"
    	>Alterar endereço <img  style="margin-left: 15px" src="imagens/book.png" alt=""></button> </a> -->

</div>



		 <div class="modal fade" id="trocaendereco" tabindex="-1" role="dialog" aria-labelledby="trocaenderecoLabel">
		 	<form method="POST" action="processoperfil/processa_endereco.php" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Alterar senha</h4>
                    </div>
                    <div class="modal-body">
                    	       
                      		<div class="form-group">
                                <label for="recipient-empresa" class="control-label">Empresa:</label>
                                  <span id="empresa" class="nome"></span></b> 
                                <input name="empresa" type="text" class="form-control" id="recipient-empresa" >
                            </div>
                            <div class="form-group">
                                <label for="recipient-cidade" class="control-label">Cidade:</label>
                                  <span id="cidade" class="cidade"></span></b> 
                                <input name="cidade" type="text" class="form-control" id="recipient-cidade" >
                            </div>
                            <div class="form-group">
                                <label for="recipient-bairro" class="control-label">Bairro:</label>
                                  <span id="bairro" class="bairro"></span></b> 
                                <input name="bairro" type="text" class="form-control" id="recipient-bairro" >
                            </div>
                              <div class="form-group">
                                <label for="recipient-rua" class="control-label">Rua:</label>
                                  <span id="rua" class="nome"></span></b> 
                                <input name="rua" type="text" class="form-control" id="recipient-rua" >
                            </div>
                            <div class="form-group">
                                <label for="recipient-numero" class="control-label">Numero:</label>
                                <input name="numero" type="text" class="form-control" id="recipient-numero" >
                            </div>
                            <input name="id" type="hidden" id="id_endereco">
                            <hr />
                            <div align="center">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                <button name="alterar" type="submit" class="btn btn-danger">Alterar</button>
                            </div>
                             </div>
                    </div>
                </div>
                 </form>
            </div>



<!-- modal do logo -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="modal-body">
		
					
						<h2 class="h2cof"> Quem somos: </h2>
						<b class="b2cof"> <p> A atalos é uma empresa..  </p> </b>
						<h2 class="h2cof"> Valores: </h2>
						<b class="b2cof"> <p> Os valores da atalos são..  </p> </b>
						<h2 class="h2cof"> Metas: </h2>
						<b class="b2cof"> <p> A meta da atalos é..  </p> </b>

						
					  </div>
									<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					
					</div>
				</div>

			</div>
		</div>
	</div>

</body>
</html>




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
				var recipientimagens = button.data('whateverimagens')
				var recipientdescricao = button.data('whateverdescricao')
				var recipientsituacao_id = button.data('whateversituacao_id')
				var recipientcategoria_produtos_id = button.data('whatevercategoria_produtos_id')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('Atalos Soluções Sustentaveis')
				modal.find('#id_produto').val(recipient)
				modal.find('#recipient-nome').val(recipientnome)
				//modal.find('#recipient-created').val(recipientcreated)
				modal.find('.modal-valor').text('Valor do produto: R$' + recipientvalor)
				modal.find('#recipient-valor').val(recipientvalor)
				modal.find('#recipient-promo_valor').val(recipientpromo_valor)
				modal.find('#recipient-imagens').val(recipientimagens)
				modal.find('#descricao-text').val(recipientdescricao)
				modal.find('#recipient-situacao_id').val(recipientsituacao_id)
				modal.find('#recipient-categoria_produtos_id').val(recipientcategoria_produtos_id)
			})
		</script>

<!-- MODAL PARA TROCAR SENHA -->


		 <div class="modal fade" id="TROCASENHA" tabindex="-1" role="dialog" aria-labelledby="TROCASENHALabel">
		 	<form method="POST" action="processoperfil/processa.php" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Alterar senha</h4>
                    </div>
                    <div class="modal-body">
                      		<div class="form-group">
                                <label for="recipient-senhaAntiga" class="control-label">Senha Antiga:</label>
                                <input name="senhaAntiga" type="password" class="form-control" id="recipient-senhaAntiga" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-senhaNova" class="control-label">Nova Senha:</label>
                                <input name="senhaNova" type="password" class="form-control" id="recipient-senhaNova" required>
                            </div>
                        
                            <input name="id" type="hidden" id="id_usuarios">
                            <div class="">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                <button name="alterar" type="submit" class="btn btn-danger">Alterar</button>
                            </div>
                             </div>
                    </div>
                </div>
                 </form>
            </div>

        <script src="js/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $('#TROCASENHA').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientsenhaAntiga = button.data('whateversenhaAntiga')
                //var recipientcreated = button.data('whatevercreated')
                var recipientsenhaNova = button.data('whateversenhaNova')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Alterar Senha: ' )
                modal.find('#id_usuarios').val(recipient)
                modal.find('#recipient-senhaAntiga').val(recipientsenhaAntiga)
                //modal.find('#recipient-created').val(recipientcreated)
                modal.find('.modal-valor').text('Valor do categoria: R$' + recipientvalor)
                modal.find('#recipient-senhaNova').val(recipientsenhaNova)

            })
        </script>





        <script src="js/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $('#trocaendereco').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientempresa = button.data('whateverempresa')
                var recipientcep = button.data('whatevercep')
                var recipientcidade = button.data('whatevercidade')
                var recipientbairro = button.data('whateverbairro')
                var recipientrua = button.data('whateverrua')
                var recipientnumero = button.data('whatevernumero')
                var modal = $(this)
                modal.find('.modal-title').text('Alterar endereço: ' )
                modal.find('#id_endereco').val(recipient)
                modal.find('#recipient-empresa').val(recipientempresa)
                modal.find('#recipient-cep').val(recipientcep)
                modal.find('#recipient-cidade').val(recipientcidade)
                modal.find('#recipient-bairro').val(recipientbairro)
                modal.find('#recipient-rua').val(recipientrua)
                modal.find('#recipient-numero').val(recipientnumero)

            })
        </script>










<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando https://viacep.com.br,
 * webservice gratuito, acessado 15/07/2016.
 *-->
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
<link href="css/navbar.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">


<html>
    <head>
    <title>Troca de Endereço</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            
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
    </head>

    <title> Pagina de Endereco </title>
</head>
<body class="background3">
	 <nav class="navbar">
  <div class="container-fluid">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
    </button>
				 <a class="lol1" href="#" data-toggle="modal" data-target="#exampleModal">
            <img class="lol1" src="imagens/logo.png" alt="">
            </a>
   </div>
      <div style="margin-top:20px; margin-left:150px;" class="nav navbar-nav navbar-left">
      <h4>Logado como: <b><?php echo $_SESSION['usuarioNome'] ?> </b></h4>
    </div>
   <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
     <li><a href="home.php">Novidades <img  src="imagens/news.png" alt=""></a></li>
      <li><a href="pedidos.php">Pedidos <img  src="imagens/pedido.png" alt=""></a></li>
      <li><a href="produto.php">Produtos <img  src="imagens/produtos.png" alt=""></a></li>
      <li><a href="categorias.php">Categorias <img  src="imagens/categoria.png" alt=""></a></li>
      <li><a href="precos.php">Fretes <img  src="imagens/preco.png" alt=""></a></li>
      <li><a href="dashboard.php">Relatórios <img  src="imagens/dashboard.png" alt=""></a></li>
  <!-- <li><a href="perfil.php">Perfil <img  src="imagens/admin.png" alt=""> </a> </li> -->
     <li><a href="ajuda.php">Suporte <img  src="imagens/support.png" alt=""></a></li>
       <li><a href="painel.php">Painel <img src="imagens/settings.png" alt=""></a></li>
    <li><a href="sair.php">Sair <img  src="imagens/logout.png" alt=""></a></li>
    </ul>
   </div>
  </div>
 </nav>

    <?php   

    include_once("conexao.php");
    $idUserr = $_SESSION['usuarioId'];
    $result_enderecos = "SELECT * FROM endereco where id_usuarios='$idUserr'";
    $resultado_enderecos = mysqli_query($conn, $result_enderecos);
    $rows_enderecos = mysqli_fetch_assoc($resultado_enderecos); 
    ?>

    <body>
    <!-- Inicio do formulario -->
         <div  style="margin-top:10%; margin-left: 35%;" class="container-fluid">
      <h3 ><b>Alterar Endereço</b></h3>
      <hr />

  


        <form  method="Post" action="processoperfil/processa_endereco.php">
        <div class="row">
      <div class="form-group col-xs-2 col-sm-3 col-md-2 col-lg-2">
        <label  for="recipient-name" class="control-label">CEP:</label>
        <input name="cep" type="text" id="cep"  maxlength="9" size="60" class="form-control"  onblur="pesquisacep(this.value);" required>
      </div>
               <div class="form-group col-xs-3 col-sm-4 col-md-3 col-lg-3 ">
        <label  for="recipient-name" class="control-label" >Nome da empresa</label>
        <input name="empresa" type="text" id="empresa"  size="60" class="form-control"  required>
      </div>
                   <div class="form-group col-xs-1 col-sm-2 col-md-1 col-lg-1 ">
        <label  for="recipient-name" class="control-label">Numero</label>
        <input name="numero" type="text" id="numero"  size="60" class="form-control"  required>
      </div>
        </div>
         <div class="row">
         <div class="form-group col-xs-3 col-sm-4 col-md-3 col-lg-3  ">
        <label  for="recipient-name" class="control-label">Rua</label>
        <input name="rua" type="text" id="rua"  readonly="true" size="60" class="form-control"  required>
      </div>
                 <div class="form-group col-xs-3 col-sm-5  col-md-3 col-lg-3 ">
        <label  for="recipient-name" class="control-label">Bairro</label>
        <input name="bairro" type="text" readonly="true" id="bairro"  size="80" class="form-control"  required>
      </div>
        </div>
         <div class="row">
                 <div class="form-group col-xs-3 col-sm-4 col-md-3 col-lg-3 ">
        <label  for="recipient-name" class="control-label">Cidade</label>
        <input name="cidade" type="text" id="cidade"  readonly="true" size="250" class="form-control"  required>
      </div>
                 <div class="form-group col-xs-1 col-sm-2 col-md-1 col-lg-1 ">
        <label  for="recipient-name" class="control-label">Estado</label>
        <input name="uf" type="text" id="uf"  size="60" readonly="true" class="form-control"  required>
      </div>
       <div class="form-group col-xs-2 col-sm-3 col-md-2 col-lg-2 ">
        <label  for="recipient-name" class="control-label">Complemento</label>
        <input name="complemento" type="text" id="complemento"  placeholder="Há complemento ?" size="60" class="form-control">
      </div>

       <?php $rows_enderecos['id']; ?>
      <input name="id" type="hidden" id="<?php $rows_enderecos['id'];?>">
     

       </div>
         <div class="row">
		                            <div style="margin-left: 15px;">
                                <a href="perfil.php"><button type="button" class="btn btn-default">Cancelar</button> </a>
                               <a href=""> <button name="alterar" type="submit" class="btn btn-primary">Alterar</button> </a>
                            </div>
                             </div>
      </form>
            </div>

  </div>
    </body>

    </html><?php $conn->close(); ?>
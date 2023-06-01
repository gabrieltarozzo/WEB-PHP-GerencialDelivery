
<?php

error_reporting(0);
ini_set(“display_errors”, 0 );
session_start();
?>

</html>
<META HTTP-EQUIV=Refresh CONTENT="3; URL=../home.php">
<?php
	include_once("../conexao.php");
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
	$situacao_id = mysqli_real_escape_string($conn, $_POST['situacao_id']);
	//$created = mysqli_real_escape_string($conn, $_POST['created']);
	//INICIANDO TESTE IMAGEM 

			$arquivo = $_FILES['arquivo']['name'];


			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../imagens_novidades/';

			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*3; //5mb

			//Array com a extensões permitidas
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

			

			//Renomeiar
			$_UP['renomeia'] = true;

			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($_FILES['arquivo']['error'] != 0){
				die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
				exit; //Para a execução do script
			}

			//Faz a verificação da extensao do arquivo
			//negocio do cara é assim
			 //  $file_extension = end(explode('.', $file_name)); //ERROR ON THIS LINE
			//concerto é assim 
			// $tmp = explode('.', $file_name);
			//$file_extension = end($tmp);
			// tentei assim e nao deu certo
			//			$tmp = (explode('.', $_FILES['arquivo']['name']);
			//          $extensao = strtolower(end($tmp)));
			// parece que assim deu certo
			$file_name = $_FILES['arquivo']['name'];
			$tmp = explode('.', $file_name);

			$extensao = strtolower(end($tmp));
			if(array_search($extensao, $_UP['extensoes'])=== false){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastrar_novidade.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
				";
			}

			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastrar_novidade.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande, tamanho maximo permitido 500KB.\");
					</script>
				";
			}

			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
			else{
				//Primeiro verifica se deve trocar o nome do arquivo
				if($_UP['renomeia'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$nome_final = time().'.jpg';
				}else{
					//mantem o nome original do arquivo
					$nome_final = $_FILES['arquivo']['name'];
				}
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
					//Upload efetuado com sucesso, exibe a mensagem

	//FIM TESTE IMAGEM

$filterEmp = $_SESSION['usuarioEmpresa'];

	//teria que adicionar created aqui denovo \/
	$result_novidades = "INSERT INTO novidades ( nome, created, imagens, descricao, situacao_id, empresa ) VALUES ('$nome', NOW(), '$nome_final', '$descricao', '$situacao_id', '$filterEmp')";
	}
	else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastrar_novidade.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada.\");
						</script>
					";
				}
			}

	$resultado_novidades = mysqli_query($conn, $result_novidades);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
		
		
?>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/cssteste/css/mdb.min.css" rel="stylesheet">
     

<!-- Central Modal Medium Success -->
  <div class="modal show" id="centralModalSuccess" style="margin-top:7%" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-success" role="document">
      <!--Content-->
      <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
              <p class="heading lead"><h3 style="color: white;">Sucesso!<h3></p>

          </div>
  
          <!--Body-->
          <div class="modal-body">
              <div class="text-center">
                  <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                  <p><h4>Novidade Cadastrada com Sucesso!</h4></p>
              </div>
          </div>
  
          <!--Footer-->
          <div class="modal-footer justify-content-center">
              <center><a type="button" href="../home.php" class="btn btn-success"><h4>Ok!</h4></a></center>
              
          </div>
      </div>
      <!--/.Content-->
  </div>
  </div>

			<?php
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../cadastrar_novidade.php'>
				<script type=\"text/javascript\">
					alert(\"Novidade não foi cadastrada.\");
				</script>
			";
		}?>
	</body>
</html>



<?php $conn->close(); ?>
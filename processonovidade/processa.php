<?php
    session_start();

	include_once("../conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
	//$descricao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['descricao'];
	$situacao_id = mysqli_real_escape_string($conn, $_POST['situacao_id']);
//INICIANDO TESTE IMAGEM 

			$arquivo = $_FILES['arquivo']['name'];
				if($arquivo != ""){
			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../imagens_novidades/';

			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*0.5; //5mb

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

	//echo "$id - $nome" - "$descricao" - "$nome_final" -"$situacao_id";
	$result_novidades = "UPDATE novidades SET modified=NOW(), nome='$nome', descricao = '$descricao', imagens='$nome_final', situacao_id = '$situacao_id' WHERE id = '$id'";
	}
	else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastrar_produto.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi alterada com Sucesso.\");
						</script>
					";
				}
			}
	$resultado_novidades = mysqli_query($conn, $result_novidades);
}else {
	//echo "$id - $nome" - "$descricao" - "$situacao_id";

	$result_novidades = "UPDATE novidades SET modified=NOW(), nome='$nome', descricao = '$descricao', situacao_id = '$situacao_id' WHERE id = '$id'";

	$resultado_novidades = mysqli_query($conn, $result_novidades);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../home.php'>
				<script type=\"text/javascript\">
					alert(\"Novidade alterada com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../home.php'>
				<script type=\"text/javascript\">
					alert(\"Novidade não foi alterada com Sucesso.\");
				</script>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>
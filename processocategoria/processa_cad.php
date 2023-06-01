<?php
	include_once("../conexao.php");
	session_start();
	error_reporting(0);
ini_set(“display_errors”, 0 );
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
	$fruit2 = mysqli_real_escape_string($conn, $_POST['fruit2']);
	$fruit3 = mysqli_real_escape_string($conn, $_POST['fruit3']);
	$fruit4 = mysqli_real_escape_string($conn, $_POST['fruit4']);

	$situacao_id = mysqli_real_escape_string($conn, $_POST['situacao_id']);

	 $erro = false;

$filterEmp = $_SESSION['usuarioEmpresa'];
    $result_usuario = "SELECT id FROM categoria_produtos WHERE codigo='". $codigo ."' and empresa='". $filterEmp ."'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
      $erro = true;
      					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../cadastrar_categoria.php'>
						<script type=\"text/javascript\">
							alert(\"Código de categoria já existe, cancelando a operação.\");
						</script>
					";
    }

  //var_dump($dados);
  if(!$erro){
  //$_SESSION['msg'] = "Caracter ( ' ) utilizado na senha é inválido";

  //  $result_usuario = "SELECT id FROM usuarios WHERE usuario='". $usuario ."'";
  //  $resultado_usuario = mysqli_query($conn, $result_usuario);
  //  if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
  //    $erro = true;
  //    echo 3;
    //  $_SESSION['msg'] = "Este usuário já está sendo utilizado";
   // }


	//$created = mysqli_real_escape_string($conn, $_POST['created']);
	//INICIANDO TESTE IMAGEM

			$arquivo = $_FILES['arquivo']['name'];

			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../imagens_categoria/';

			//Tamanho máximo do arquivo em Bytes
		//	$_UP['tamanho'] = 1024*1024*0.5; //5mb  100 = 5mb // 50 = 2,5mb // 25 =  1,25mb // 12,25 = 0,625kb // 2 = 2 mb?
			$_UP['tamanho'] = 1024*1024*3; //5mb  100 = 5mb // 50 = 2,5mb // 25 =  1,25mb // 12,25 = 0,625kb // 2 = 2 mb?

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
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastrar_categoria.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada, extensão inválida.\");
					</script>
				";


			}

			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastrar_categoria.php'>
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

	//teria que adicionar created aqui denovo \/
$filterEmp = $_SESSION['usuarioEmpresa'];
	$result_categorias = "INSERT INTO categoria_produtos ( nome, codigo, adicional, meio, semObs, created, imagens, situacao_id, empresa ) VALUES ('$nome', '$codigo', '$fruit2', '$fruit3', '$fruit4', NOW(), '$nome_final', '$situacao_id','$filterEmp')";

	// semObs, meio, adicional ,'$fruit4', '$fruit3', '$fruit2'
	}
	else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastrar_categoria.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada.\");
						</script>
					";
				}
			}
	$resultado_categorias = mysqli_query($conn, $result_categorias);

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../categorias.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria cadastrada com sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../categorias.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria não foi cadastrada.\");
				</script>
			";
		}?>

	</body>
</html>



<?php } $conn->close(); ?>
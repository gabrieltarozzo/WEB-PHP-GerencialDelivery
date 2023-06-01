<?php
	include_once("../conexao.php");
    session_start();
    $temcomple = '1';
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
	$categoria_produtos_id = mysqli_real_escape_string($conn, $_POST['categoria_produtos_id']);
	$valor = mysqli_real_escape_string($conn, $_POST['valor']);
	$codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
	$situacao_id = mysqli_real_escape_string($conn, $_POST['situacao_id']);
	$promo_valor = mysqli_real_escape_string($conn, $_POST['promo_valor']);
	$metricaValor = mysqli_real_escape_string($conn, $_POST['metricaValor']);
	$tipoValor = mysqli_real_escape_string($conn, $_POST['tipoValor']);

	//complementos
	$nomeCategoria = $_POST['nomeCategoria'];
	$qtdMin = $_POST['qtdMin'];
	$qtdMax = $_POST['qtdMax'];
	$complementoObriga = $_POST['complementoObriga'];

	$nomeComplemento = $_POST['nomeComplemento'];
	$descComplemento =  $_POST['descComplemento'];
	$valorComplemento = $_POST['valorComplemento'];
        $valorDesconto = $_POST['valorDesconto'];
        $maiorValor = $_POST['maiorValor'];

	$numbercomple = $_POST['numbercomple'];
	$numbercat = $_POST['numbercat'];

	//	$nomeComplemento = mysqli_real_escape_string($conn, $_POST['nomeComplemento']);
	//$descComplemento =  mysqli_real_escape_string($conn, $_POST['descComplemento']);
	//$valorComplemento = mysqli_real_escape_string($conn, $_POST['valorComplemento']);


					$filterEmp = $_SESSION['usuarioEmpresa'];


	//INICIANDO TESTE IMAGEM

			$arquivo = $_FILES['arquivo']['name'];

			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../imagens_produtos/';

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
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastrar_produto.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
				";
			}

			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastrar_produto.php'>
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
					//se caso vir a dar ruim, voltar ao estado normal esta pagina apenas retirando as informações extras e o do insert INTO aqui embaixo do "imagens" e $nome_final
					$filterEmp = $_SESSION['usuarioEmpresa'];

	 if($nomeCategoria[0] == '' OR $nomeCategoria[0] == ' ' OR $nomeCategoria[0] == NULL) {  $temcomple = '0'; } 


	$result_produtos = "INSERT INTO produtos (codigo, created, imagens, categoria_produtos_id, situacao_id, nome, descricao, metricaValor, tipoValor, valor, promo_valor, empresa, temcomple ) VALUES ('$codigo', NOW(), '$nome_final', '$categoria_produtos_id', '$situacao_id', '$nome', '$descricao', '$metricaValor', '$tipoValor', '$valor', '$promo_valor', '$filterEmp', '$temcomple')";
	$resultado_produtos = mysqli_query($conn, $result_produtos);

$last_id = mysqli_insert_id($conn);


for($i = 0; $i < count($nomeComplemento); $i++){

if($nomeComplemento[$i] <> '' OR $nomeComplemento[$i] <> ' ' OR $nomeComplemento[$i] <> NULL) {
// $data = array('nomeComplemento' =>$nomeComplemento[$i] );
  //$data2 = array('descComplemento' =>$descComplemento[$i] );
 //  $data3 = array('valorComplemento' =>$valorComplemento[$i] );


//$result=explode(",", implode($data));
//$result2=explode(",", implode($data2));
//$result3=explode(",", implode($data3));

  //$date = $result;

  //$date2 = $result2;

  //$date3 = $result3;
//$result=explode(",", implode($nomeComplemento));
//$result2=explode(",", implode($descComplemento));
//$result3=explode(",", implode($valorComplemento));

//$date = $result[$i];

  //$date2 = $result2[$i];

  //$date3 = $result3[$i];

  $date = $nomeComplemento[$i];
  $date2 = $descComplemento[$i];
  $date3 = $valorComplemento[$i];
  $date8 = $numbercomple[$i];
  $date10 = $valorDesconto [$i];

 //$results=$this->db->insert('subject', $data);
 $result_produtos2 = "INSERT INTO complementos (nomeComplemento, descComplemento, valorComplemento, valorDesconto, idProduto, empresa, numbercomple) VALUES ('$date', '$date2', '$date3', '$date10', '$last_id', '$filterEmp', '$date8')";
 $resultado_produtos2 = mysqli_query($conn, $result_produtos2);

     $sql="DELETE FROM complementos where nomeComplemento=''";
    $res=mysqli_query($conn,$sql);

 }
}

for($i = 0; $i < count($nomeCategoria); $i++){
 if($nomeCategoria[$i] <> '' OR $nomeCategoria[$i] <> ' ' OR $nomeCategoria[$i] <> NULL) {
  $date4 = $nomeCategoria[$i];
  $date5 = $qtdMin[$i];
  $date6 = $qtdMax[$i];
  $date7 = $complementoObriga[$i];
  $date9 = $numbercat[$i];
  $date11 = $maiorValor[$i];

 	$result_produtos = "INSERT INTO categoriaComplementos (categoriaComplemento, qtdMin, qtdMax, CompleObriga, numbercomple, empresa , idProduto, pizza ) VALUES('$date4', '$date5', '$date6', '$date7', '$date9', '$filterEmp', '$last_id', '$date11')";
		$resultado_produtos = mysqli_query($conn, $result_produtos);

    $sql="DELETE FROM categoriaComplementos where categoriaComplemento=''";
    $res=mysqli_query($conn,$sql);

}
		} }

	else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastrar_produto.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada com Sucesso.\");
						</script>
					";
				}
			}


//$query = mysql_query("INSERT INTO categorias (nome, created) VALUES ('$nome', NOW())");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../produto.php'>
				<script type=\"text/javascript\">
					alert(\"Produto Cadastrado com Sucesso.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../produto.php'>
				<script type=\"text/javascript\">
					alert(\"Produto Cadastrado com Sucesso.\");
				</script>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>
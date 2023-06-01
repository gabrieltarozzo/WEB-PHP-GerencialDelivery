<?php
	include_once("../conexao.php");
    session_start();
    $temcomple = '0';
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
//pizaria fornalha
	/// 58 pizzas e 9 bordas
	$meusnomes = ['MASSA MÉDIA', 'MASSA FINA', 'MASSA MÉDIA COM BORDA RECHEADA DE BACON', 'MASSA MÉDIA COM BORDA RECHEADA DE CALABRESA', 'MASSA MÉDIA COM BORDA RECHEADA DE CHEDDAR', 'MASSA MÉDIA COM BORDA RECHEADA DE FRANGO', 'MASSA MÉDIA COM BORDA RECHEADA DE PRESUNTO', 'MASSA MÉDIA COM BORDA RECHEADA DE REQUEIJÃO SCALA 10', 'MASSA GROSSA', '01) MUSSARELA', '02) ESCAROLA', '03) ESCAROLA COM TOMATE SECO', '04) SERRANA', '05) CALABRESA', '06) PORTUGUESA', '07) ATUM', '08) MARGHERITA', '09) BOLOGNA', '10) ESPANHOLA', '11) QUATRO QUEIJOS', '12) BRÓCOLIS COM DOIS QUEIJOS', '13) FRANGO COM REQUEIJÃO', '14) ALICHE', '15) TORTONI', '16) FRANGOLONE', '17) DA CASA', '19) FORNALHA', '20) À MODA', '24) NAPOLI', '25) PALMITO', '27) CHAMPIGNON', '28) BAIANA ', '30) BRASILEIRA', '33) TOSCANA', '34) TORTONI - 2 (FRANGO)', '40) BRÓCOLIS COM REQUEIJÃO SCALA', '41) DONNA', '42) MANDACARU', '45) DO PADRE', '46) DOLARE', '50) SUPREMA', '55) CINCO FORMAGGIO', '56) ÉPOCA', '57) BELA VISTA', '58) DO DOUTOR', '61) SELEÇÃO', '62) ESCAROLA COM ALICHE', '63) LIDER', '64) AO PENTA', '66) RIACHO', '69) FILÉ AO ALHO', '70) BELLA', '71) RIO PRETO', '72) FILÉ COM DOIS QUEIJOS', '73) FILÉPALMI', '74) VEGETARIANA', '77) QUEIJO PRATO COM BACON', '78) ANASTÁCIA', '79) MUSSARELA COM BACON', '201) TOMATE SECO', '206) ESTHER', '207) PEITO DE PERU', '208) MUSSARELA DE BÚFALA COM CALABRESA', '213) MARAVILHA', '100) SAN FRANCISCO', '101) DE PRIMA', '107) LUIGI'];

$meusdescs =['','','','','','','','','', 'Molho de tomate, mussarela, rodelas de tomate e azeitonas', 'Molho de tomate, escarola refogada, mussarela, bacon, cebola e azeitonas', 'Molho de tomate, escarola refogada, tomate seco, mussarela e azeitonas', 'Molho de tomate, mussarela, lombo defumado, creme de milho, parmesão e azeitonas', 'Molho de tomate, mussarela, calabresa fatiada, ovo cozido, cebola e azeitonas', 'Molho de tomate, presunto, palmito, ervilha, ovo cozido, mussarela, calabresa, cebola e azeitonas', 'Molho de tomate, mussarela, atum sólido, cebola e azeitonas', 'Molho de tomate, mussarela, rodelas de tomate, manjericão, parmesão e azeitonas', 'Molho de tomate, presunto, mussarela, rodelas de tomate, bacon, champignon e azeitonas', 'Molho de tomate, mussarela, atum sólido, aliche importado, cebola, alho frito e azeitonas', 'Molho de tomate, mussarela, requeijão scala, provologne, gorgonzola e azeitonas', 'Molho de tomate, brócolis, mussarela, bacon, parmesão e azeitonas.', 'Molho de tomate, peito desfiado, palmito, requeijão scala, parmesão e azeitonas.', 'Molho de tomate, mussarela, rodelas de tomate, aliche importado, cheiro verde, cebola e azeitonas', 'Molho de tomate, mussarela, palmito, requeijão scala, coberta com massa fina, azeite, manjericão e parmesão', 'Molho de tomate, mussarela, frango, requeijão scala, provolone, bacon e azeitonas', 'Molho de tomate, mussarela, atum sólido, alcaparra, bacon, rodelas de tomate, alho frito e azeitonas.', 'Molho de tomate, mussarela, calabresa fatiada, bacon, rodelas de tomate, cebola e azeitonas', 'Molho de tomate, presunto, rodelas de tomate, mussarela e azeitonas.', 'Molho de tomate, presunto, rodelas de tomate, mussarela e azeitonas', 'Molho de tomate, palmito, mussarela, rodelas de tomate e azeitonas.', 'Molho de tomate, mussarela, champignon, bacon e azeitonas', 'Molho de tomate, mussarela, calabresa moída, presunto moído, cebola e pimenta ardida', 'Molho de tomate, mussarela, lombo defumado, requeijão scala, rodelas de tomate e azeitonas.', 'Molho de tomate, mussarela, peito de frango, calabresa moída, parmesão, cebola e azeitonas.', 'Molho de tomate, frango desfiado, requeijão scala, coberta com massa fina, azeitei, ricota temperada e azeitonas', 'Molho de tomate, brócolis, requeijão scala e azeitonas', 'Molho de tomate, mussarela, rodelas de tomate, manjericão, bacon, parmesão e azeitonas', 'Molho de tomate, mussarela, rodelas de tomate, parmesão, alho frito e azeitonas.', 'Molho de tomate, mussarela, lombo defumado, provolone, rodelas de tomate, bacon e azeitonas', 'Molho de tomate, brócolis refogado com alho e alcaparra, mussarela, parmesão, bacon e azeitonas', 'Molho de tomate, champignon refogado ao alho e alcaparra, mussarela, parmesão, bacon e azeitonas', 'Molho de tomate, mussarela, requeijão scala, cheddar, provolone, parmesão e azeitonas', 'Molho de tomate, mussarela, palmito, cheddar, rodelas de tomate, manjericão, bacon e azeitonas.', 'Molho de tomate, lombo defumado, champignon, palmito, requeijão scala, rodelas de tomate, bacon e azeitonas.', 'Molho de tomate, mussarela, palmito, alcaparras, manjericão, rodelas de tomate, bacon, parmesão e azeitonas', 'Molho de tomate, mussarela, atum sólido, requeijão scala e azeitonas sem caroço.', 'Molho de tomate, escarola refogada, mussarela, aliche importado, cebola e azeitonas.', 'Molho de tomate, mussarela, gorgonzola, calabresa fatiada, cebola e azeitonas', 'Molho de tomate, tomate seco, requeijão scala, provolone e azeitonas.', 'Molho de tomate, mussarela, peito de peru, requeijão scala, ervilha, ricota, rodela de tomate e azeitonas.', 'Molho de tomate, mussarela, filé ao azeite, requeijão scala, rodelas de tomate, alho frito e azeitonas', 'Molho de tomate, filé ao azeite, champignon, creme de leite, mussarela e azeitonas.', 'Molho de tomate, filé ao azeite, mussarela, rodelas de tomate, parmesão e azeitonas.', 'Molho de tomate, filé ao azeite, requeijão scala, mussarela, rodelas de tomate e azeitonas.', 'Molho de tomate, filé ao azeite, palmito, mussarela, rodelas de tomate, gorgonzola salpicado e azeitonas', 'Molho de tomate, mussarela, palmito, ervilha, milho, champignon, rodelas de tomate, salada de rúcula e azeitonas.', 'Molho de tomate, mussarela, queijo prato, bacon, rodelas de tomate e azeitonas.', 'Molho de tomate, brócolis, queijo prato, bacon, rodelas de tomate, parmesão salpicado e azeitonas', 'Molho de tomate, mussarela, rodelas de tomate, bacon e azeitonas', 'Molho de tomate, tomate seco, mussarela de búfala, salada de rúcula e azeitonas.', 'Molho de tomate, mussarela de búfala, requeijão scala, bacon, rodelas de tomate e azeitonas', 'Molho de tomate, peito de peru, palmito, mussarela de búfala, bacon, rodelas de tomate e azeitonas.', 'Molho de tomate, mussarela de búfala, calabresa fatiada, cebola, rodelas de tomate e azeitonas', 'Molho de tomate, tomate seco, filé ao azeite, mussarela de búfala, rodelas de tomate, cebola, parmesão e azeitonas', 'Molho de tomate, tomate seco, mussarela de búfala, peito de frango desfiado e queijo frescal', 'Molho de tomate, atum sólido, mussarela de búfala, queijo frescal, rodelas de tomate e cebola', 'Molho de tomate, peito de frango desfiado, champignon, mussarela de búfala e rodelas de tomate'];

//valor


//fim valores

//valor pizza grande
//$meusvalor =['0','0','10','10','10','10','10','10','1', '34.00', '39.00', '51.00', '45.00', '45.00', '45.00', '45.00', '39.00', '45.00', '51.00', '45.00', '45.00', '45.00', '51.00', '52.00', '51.00', '45.00', '45.00', '45.00', '43.00', '45.00', '43.00','43.00', '45.00', '45.00', '52.00', '45.00', '43.00', '43.00', '45.00', '45.00', '45.00', '51.00', '45.00', '45.00', '45.00', '45.00', '51.00', '45.00', '51.00', '51.00', '51.00', '51.00', '51.00', '51.00', '51.00', '47.00', '45.00', '45.00', '39.00', '51.00', '51.00', '51.00', '51.00', '51.00', '51.00', '51.00', '51.00'];


//valores pizza média

$meusvalor =['0','0','10','10','10','10','10','10','1', '30', '34', '46', '41', '41', '41', '41', '34', '41', '46', '41', '41', '41', '46', '48', '45', '41', '41', '41', '39', '41', '39', '39', '41', '41', '48', '41', '39', '39', '41', '41', '41', '46', '41', '41', '41', '41', '46', '41', '46', '46', '46', '46', '46', '46', '46', '43', '41', '41', '34', '46', '46', '46', '46', '46', '46', '46', '46'];


//fim valores medio

$meusvalordesconto =  ['','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''];

//1 e 2 é no online, 2 e 3 é no off aqui no localhost
$complestotal = ['1','1','1','1','1','1','1','1','1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2'];
//fim pizzaria fornalha
	$nomeComplemento = $meusnomes;
	$descComplemento =  $meusdescs;
	$valorComplemento = $meusvalor;
    $valorDesconto = $meusvalordesconto;
    $maiorValor = $_POST['maiorValor'];

	$numbercomple = $complestotal;
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

	 if($nomeCategoria <> '' OR $nomeCategoria <> ' ' OR $nomeCategoria <> NULL) {  $temcomple = '1'; }


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
  $date11 = $maiorValor [$i];

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
<?php
	//Incluir a conexão com banco de dados
	include_once('conexao.php');
	
	//Recuperar o valor da palavra
	$produtos = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$produtos = "SELECT * FROM produtos WHERE nome LIKE '%$produtos%'";
	$resultado_produtos = mysqli_query($conn, $produtos);
	
	if(mysqli_num_rows($resultado_produtos) <= 0){
		echo "Nenhum produto encontrado...";
	}else{
		while($rows = mysqli_fetch_assoc($resultado_produtos)){
			echo "<li>".$rows['nome']."</li>";
		}
	}
?>
<?php $conn->close(); ?>
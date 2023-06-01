<?php
    session_start();

    $_SESSION['usuarioNome'];

	include_once("../conexao.php");
	//$id = mysqli_real_escape_string($conn, $_POST['id']);
	//$status = mysqli_real_escape_string($conn, $_POST['status']);
	$id = $_GET['id'];
	$status = $_GET['status'];

if($status == 'cancelado'){
		$result_pedidos = "UPDATE pedidos SET status='Cancelado' WHERE id = '$id'";
	$resultado_pedidos = mysqli_query($conn, $result_pedidos);

		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status Alterado para Cancelado!.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status não foi alterado.\");
				</script>
			";
		}?> <?php
}

	if($status == 'finalizado'){
		$result_pedidos = "UPDATE pedidos SET status='Finalizado' WHERE id = '$id'";
	$resultado_pedidos = mysqli_query($conn, $result_pedidos);

		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status Alterado para finalizado!.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status não foi alterado.\");
				</script>
			";
		}?> <?php
}

	if($status == 'em entrega'){
		$result_pedidos = "UPDATE pedidos SET status='Em Entrega' WHERE id = '$id'";
	$resultado_pedidos = mysqli_query($conn, $result_pedidos);

		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status Alterado para em entrega!.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status não foi alterado.\");
				</script>
			";
		}?> <?php
}

  	if($status == 'confirmar'){
	$result_pedidos = "UPDATE pedidos SET status='Confirmado' WHERE id = '$id'";
	$resultado_pedidos = mysqli_query($conn, $result_pedidos);


?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"Status alterado para Confirmado.\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../pedidos.php'>
				<script type=\"text/javascript\">
					alert(\"status não foi alterado para confirmado\");
				</script>
			";
		}?>
	</body>
</html>
<?php $conn->close(); ?>
<?php
}?>









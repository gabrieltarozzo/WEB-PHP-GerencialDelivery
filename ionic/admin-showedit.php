<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"config.php";

		$query="SELECT * FROM usuarios
				where id='".$_GET["id"]."'  ";
		$result = $conn->query($query);

        $outp = "";

		if( $rs=$result->fetch_array()) {
			if ($outp != "") {$outp .= ",";}
			$outp .= '{"id":"'  . $rs["id"] . '",';
			$outp .= '"nome":"'   . $rs["nome"]        . '",';
			$outp .= '"senha":"'. $rs["senha"]     . '"}';
		}
		$outp ='{"records":'.$outp.'}';
		$conn->close();

		echo($outp);

 $conn->close();
?>

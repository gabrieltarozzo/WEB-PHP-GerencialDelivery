<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

		include"config.php";


    $filterEmp=$_GET["idEmpresa"];

		$query="SELECT * FROM TempoAPP where empresa ='$filterEmp'";
		$result = $conn->query($query);

		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
       if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
  	    $outp .= '"diaSemana":"'.$rs["diaSemana"].'",';
        $outp .= '"horarios":"'.$rs["horarios"].'",';
  		$outp .= '"empresa":"'.$rs["empresa"]. '"}';
    }
    $outp ='{"records":['.$outp.']}';
    $conn->close();

    echo($outp);

 $conn->close();
?>

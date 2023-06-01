<?php
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

		include"config.php";


    $filterEmp=$_GET["filterEmp"];

		$query="SELECT * FROM horarios where empresa ='$filterEmp'";
		$result = $conn->query($query);

		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
       if ($outp != "") {$outp .= ",";}
       $outp .= '{"id":"'.$rs["id"].'",';
  			$outp .= '"HorInicio":"'.$rs["HorInicio"].'",';
        $outp .= '"HorInicio2":"'.$rs["HorInicio2"].'",';
        $outp .= '"HorFim":"'.$rs["HorFim"].'",';
        $outp .= '"HorFim2":"'.$rs["HorFim2"].'",';
         $outp .= '"ter1":"'.$rs["ter1"].'",';
          $outp .= '"ter2":"'.$rs["ter2"].'",';
           $outp .= '"ter3":"'.$rs["ter3"].'",';
            $outp .= '"ter4":"'.$rs["ter4"].'",';
           $outp .= '"quar1":"'.$rs["quar1"].'",';
          $outp .= '"quar2":"'.$rs["quar2"].'",';
           $outp .= '"quar3":"'.$rs["quar3"].'",';
            $outp .= '"quar4":"'.$rs["quar4"].'",';
            $outp .= '"quin1":"'.$rs["quin1"].'",';
          $outp .= '"quin2":"'.$rs["quin2"].'",';
           $outp .= '"quin3":"'.$rs["quin3"].'",';
            $outp .= '"quin4":"'.$rs["quin4"].'",';
            $outp .= '"sex1":"'.$rs["sex1"].'",';
          $outp .= '"sex2":"'.$rs["sex2"].'",';
           $outp .= '"sex3":"'.$rs["sex3"].'",';
            $outp .= '"sex4":"'.$rs["sex4"].'",';
            $outp .= '"sab1":"'.$rs["sab1"].'",';
          $outp .= '"sab2":"'.$rs["sab2"].'",';
           $outp .= '"sab3":"'.$rs["sab3"].'",';
            $outp .= '"sab4":"'.$rs["sab4"].'",';
            $outp .= '"domin1":"'.$rs["domin1"].'",';
          $outp .= '"domin2":"'.$rs["domin2"].'",';
           $outp .= '"domin3":"'.$rs["domin3"].'",';
  			$outp .= '"domin4":"'.$rs["domin4"]. '"}';
    }
    $outp ='{"records":['.$outp.']}';
    $conn->close();

    echo($outp);

 $conn->close();
?>

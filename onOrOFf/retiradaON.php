<?php
include_once("../conexao.php");
    session_start();

$filterEmp = $_SESSION['usuarioEmpresa'];
$valor = 1;

    $sql="UPDATE EMPRESAS SET retiradaB='$valor' where ID_EMPRESA = '$filterEmp'
    ";
		
    $res=mysqli_query($conn,$sql);
    if($res){
     echo "
          <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../tips.php'>
          <script type=\"text/javascript\">
            alert(\"Retirada Ativada!\");
          </script>
        ";
    }else{
      echo "
          <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../tips.php'>
          <script type=\"text/javascript\">
            alert(\"Retirada não foi alterado. \");
          </script>
        ";
    }
     $conn->close();

?>

<?php
include_once("../conexao.php");
    session_start();

$filterEmp = $_SESSION['usuarioEmpresa'];
$valor = 0;
    $sql="UPDATE horarios SET controle='$valor' where empresa = '$filterEmp'
    ";
		
    $res=mysqli_query($conn,$sql);
    if($res){
     echo "
          <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../painel.php'>
          <script type=\"text/javascript\">
            alert(\"Aplicativo Online!\");
          </script>
        ";
    }else{
      echo "
          <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../painel.php'>
          <script type=\"text/javascript\">
            alert(\"Algo deu errado..\");
          </script>
        ";
    }
     $conn->close();

?>

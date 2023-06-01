<?php
include_once("../conexao.php");
    session_start();

$filterEmp = $_SESSION['usuarioEmpresa'];
$valor = 0;

    $sql="UPDATE EMPRESAS SET retiradaB='$valor' where ID_EMPRESA = '$filterEmp'
    ";

    $res=mysqli_query($conn,$sql);
    if($res){
     echo "
          <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../tips.php'>
          <script type=\"text/javascript\">
            alert(\"Retirada Desativado!\");
          </script>
        ";
    }else{
      echo "
          <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../tips.php'>
          <script type=\"text/javascript\">
            alert(\"Algo deu errado..\");
          </script>
        ";
    }
     $conn->close();

?>

<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");



      include"config.php";

  $nome=$_GET["nome"];
  //$usuario=$_GET["usuario"];
  $email=$_GET["email"];
  $senha=$_GET["senha"];
   $empresa=$_GET["empresa"];

  $erro = false;

  //$_SESSION['msg'] = "Caracter ( ' ) utilizado na senha é inválido";

  //  $result_usuario = "SELECT id FROM usuarios WHERE usuario='". $usuario ."'";
  //  $resultado_usuario = mysqli_query($conn, $result_usuario);
  //  if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
  //    $erro = true;
  //    echo 3;
    //  $_SESSION['msg'] = "Este usuário já está sendo utilizado";
   // }

    $result_usuario = "SELECT id FROM usuarios WHERE email='". $email ."' and empresa='". $empresa ."'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
      $erro = true;
      echo 2;
    //  $_SESSION['msg'] = "Este e-mail já está cadastrado";
    }


  //var_dump($dados);
  if(!$erro){
    //var_dump($dados);
   // $senha = password_hash($senha, PASSWORD_DEFAULT); criptografa a senha porem nao sei logar

    $result_usuario = "INSERT INTO usuarios (nome, email, senha, empresa, created) VALUES (
            '" .$nome. "',
            '" .$email. "',
            '" .$senha. "',
            '" .$empresa. "',
               NOW() 
            )";
    $resultado_usario = mysqli_query($conn, $result_usuario);
    if(mysqli_insert_id($conn)){
      echo true;
    }else{
      echo false;
    }
  }

 $conn->close();
?>

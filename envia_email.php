<?php
header('Content-type: text/html; charset=utf-8');
 
// Conta de Email no servidor de hospedagem
define('SERVIDOR', 'sistema.atalos@topentregas.com.br');
 
// Para onde será enviado o contato
define('DESTINO', 'sistema.atalos@hotmail.com');
 
// Identifica o site que foi enviada a mensagem
define('SITE', 'Top Entregas');
 
if (isset($_POST)):
 
    $nome    = (isset($_POST['nome']))? $_POST['nome']: '';
    $email   = (isset($_POST['email']))? $_POST['email']: '';
    $assunto = (isset($_POST['assunto']))? $_POST['assunto']: '';
    $msg     = (isset($_POST['mensagem']))? $_POST['mensagem']: '';
 
    // Valida se foram preenchidos todos os campos
    if (empty($nome) || empty($email) || empty($assunto) || empty($msg)):
        $array  = array('tipo' => 'alert alert-danger', 'mensagem' => 'Preencher todo os campos obrigatórios(*)!');
        echo json_encode($array);
    else:
 
        // Grava no banco de dados as informações do contato
        $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
        $pdo = new PDO('mysql:host=localhost;dbname=db_blog', 'usuario', 'senha', $opcoes);
        $sql = "INSERT INTO contato (nome, email, assunto, mensagem)VALUES(?, ?, ?, ?)";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(1, $nome);
        $stm->bindValue(2, $email);
        $stm->bindValue(3, $assunto);
        $stm->bindValue(4, $msg);
        $stm->execute();
 
        if (empty($assunto)):
            $assunto = "Contato enviado pelo site " . SITE;
        endif;
 
        // Monta a mensagem do email
        $mensagem = "Contato enviado pelo site ".SITE."\n";
        $mensagem .= "**********************************************************\n";
        $mensagem .= "Nome do Contato: ".$nome."\n";
        $mensagem .= "E-mail do Contato: ".$email."\n";
        $mensagem .= "**********************************************************\n";
        $mensagem .= "Mensagem: \n".$msg."\n";
 
        // Envia o e-mail e captura o retorno
        $retorno = EnviaEmail(DESTINO, $assunto, $mensagem);
 
        // Conforme o retorno da função exibe a mensagem para o usuário
        if ($retorno):
            $array  = array('tipo' => 'alert alert-success', 'mensagem' => 'Sua mensagem foi enviada com sucesso!');
            echo json_encode($array);
        else:
            $array  = array('tipo' => 'alert alert-danger', 'mensagem' => 'Infelizmente houve um erro ao enviar sua mensagem!');
            echo json_encode($array);
        endif;
 
    endif;
endif;
 
// Função para envio de e-mail usando a função nativa do PHP mail()
function EnviaEmail($para, $assunto, $mensagem){
 
    $headers = "From: ".SERVIDOR."\n";
    $headers .= "Reply-To: $para\n";
    $headers .= "Subject: $assunto\n";
    $headers .= "Return-Path: ".SERVIDOR."\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "X-Priority: 3\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\n";
 
    $retorno = mail($para, $assunto, nl2br($mensagem), $headers);
    return $retorno;
}
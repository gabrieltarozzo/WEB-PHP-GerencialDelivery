<?php

    session_start();

	
if  ($_SESSION['usuarioNiveisAcessoId'] == "3") {
        goto A;
}
if  ($_SESSION['usuarioNiveisAcessoId'] != "2") {
        header("Location: sair.php");
}

A:
	
?>


<style>
.card {
    margin-top: 6% ;

    box-shadow: 12px 20px 8px 12px rgba(0, 0, 0, 0.2) ;
    background-color: white ;
    max-width: 80% ;


    text-align: center ;
}

.h2cof {
    color: black;
    text-align: center ;
}
.b2cof {
    font-size: 20px;
    text-align: center ;
}
.title {
    color: grey ;
    font-size: 25px ;
}

.title2 {
    margin-top: 22px ;
    color: black ;
    font-size: 25px ;
}
.title3 {
    color: black ;
    font-size: 25px ;
}
.title4 {
    margin-bottom: 25px ;
    color: black ;
    font-size: 25px ;
}

.imgt {
        width:100%;
        height: 30%;
}




.buttoni {
    border: none ;
    outline: 0 ;
    display: inline-block;
    padding: 8px ;
    color: white ;
    background-color: #000 ;
    text-align: center ;
    cursor: pointer ;
    width: 100% ;
    font-size: 30px ;
}

.ae {
    text-decoration: none ;
    font-size: 22px ;
    color: black !important;
}

button:hover, a:hover {
    opacity: 0.7 !;
}
</style>
<html>

<head>
         <meta name="viewport" content="width=device-width, initial-scale=1">


<link href="css/style.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">


    <link href="css/navbarsResponsives/navbarResponsive.css" rel="stylesheet">
<title> Top Entregas </title>
</head>
<body class="background2">

    <div id="nav-placeholder">

</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div align="center" style="margin-top:100px;" >
  <div  align="center" class="card">

  <img src="imagens/atalos_logo.png" alt="John" class="imgt">
  <h1> Suporte </h1>
  <p class="title">Atalos - Soluções Sustentaveis</p>


  <a class="ae" href="https://www.linkedin.com/company/atalos-solu%C3%A7%C3%B5es-sustent%C3%A1veis?trk=top_nav_home"><i class="fa fa-linkedin"></i></a> 
  <a class="ae" href="https://pt-br.facebook.com/atalosriopreto/"><i class="fa fa-facebook ae"></i></a> 
  <br> <br>
  <!-- <p><button class="buttoni" data-toggle="modal" data-target="#myModal">Termos de uso <img  style="margin-left: 15px" src="imagens/file.png" alt=""></button></p> -->
  <p><button class="buttoni" data-toggle="modal" data-target="#myContato">Contato <img  style="margin-left: 15px" src="imagens/contact.png" alt=""></button></p>

</div>

 <!-- Modal -->
      <div class="modal fade" id="myContato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-center" id="myModalLabel">Atalos Soluções Sustentaveis </h4>
            </div>
            <div class="modal-body">
        
              <p> <b>Email para contato:</b> sistema@atalos.com.br </p>
              <p> <b>WhatsApp para contato:</b> (17) 98827-8706 </p>
              <p> <b>Telefone para contato:</b> (17) 3227-1269 </p>
              <p> <b>Endereço:</b>  Rua Maximiano Mendes, 425 - Vila Santa Cruz - São José do Rio Preto - SP </p>

              
            </div>          
          </div>
        </div>
      </div>    
    </div>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-center" id="myModalLabel">Termo de Uso</h4>
            </div>
            <div class="modal-body">
              <p>Este Termo de Uso (“Termo”) contém as “Condições Gerais para Empresas (Corporativo)”, aplicáveis ao uso dos serviços oferecidos pela ATALOS SOLUÇÕES SUSTENTAVEIS., sociedade limitada com sede na Rua Maximiano Mendes, 425, Vila Santa Cruz,  na cidade de Rio Preto, no estado de São Paulo, Brasil, CEP 0000-000, inscrita no CNPJ sob o nº 16.809.351/0001-88, doravante denominada simplesmente "ATALOS", especificamente para seus clientes corporativos (“EMPRESAS”), que consistem na prestação de serviços de construção e aplicação de sites e aplicativos em geral. atalosgerencial.com.br (“Site”) e do aplicativo gerencialatalos para celular (“App” e, em conjunto com o Site, “Aplicativo”), de forma a viabilizar vendas online de comida. </p>

              <p>ATENÇÃO: LEIA ESTE “TERMO” CUIDADOSAMENTE ANTES DE EFETUAR O CADASTRO NA "atalosgerencial", POIS, DADA SUA PUBLICIDADE, SEU CONTEÚDO É VINCULATIVO A QUALQUER PESSOA JURÍDICA, DEVIDAMENTE REPRESENTADA NOS TERMOS DE SEUS ATOS CONSTITUTIVOS, QUE UTILIZE OS SERVIÇOS DA "atalosgerencial", QUE AO CONTRATAR COM A Atalos DECLARA ACEITAR ESTE “TERMO” E TODAS AS POLÍTICAS E PRINCÍPIOS QUE O REGEM..</p>

              <p>A ACEITAÇÃO DO PRESENTE “TERMO” É INDISPENSÁVEL E OBRIGATÓRIA PARA A UTILIZAÇÃO DOS SERVIÇOS DA "atalosgerencial". A UTILIZAÇÃO DOS SERVIÇOS OFERECIDOS PELA "atalosgerencial" IMPLICA NA IMEDIATA ANUÊNCIA DESTE “TERMO” E SEU CONTEÚDO. ESTE “TERMO” CONSTITUI UM DOCUMENTO EXCLUSIVO ENTRE "atalosgerencial" E A “EMPRESA”, SUBSTITUINDO, DESTE MODO, TODOS OS ACORDOS, REPRESENTAÇÕES, GARANTIAS E ENTENDIMENTOS ANTERIORES COM RELAÇÃO À "atalos", SEUS CONTEÚDOS, PRODUTOS OU SERVIÇOS FORNECIDOS POR OU POR MEIO DO “APLICATIVO”.</p>

              <p>Este Termo está disponível ao final da página principal do SITE, no link Termos de Uso, para verificação por qualquer usuário, independentemente de cadastro prévio no APLICATIVO.</p>

              <p>ESTE “TERMO” É DESTINADO A REGULAR A RELAÇÃO ENTRE A ATALOSGERENCIAL E AS “EMPRESAS”, E, DADA SUA PUBLICIDADE, NÃO CABE ALEGAÇÃO DE DESCONHECIMENTO DE SEU CONTEÚDO POR PARTE DE NENHUM USUARIO DO APLICATIVO.</p>
            </div>          
          </div>
        </div>
      </div>    
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<script>
$(function(){
  $("#nav-placeholder").load("nav.php");
});
</script>

</body>
</html>

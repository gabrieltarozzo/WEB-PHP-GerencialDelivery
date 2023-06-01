

<style>
html,
body {
  font-family: sans-serif;
  font-smoothing: antialiased;
  height: 100%;
  background: url(imagens/banner1.jpg) repeat !important;
}



a {
  color: inherit;
  text-decoration: none !important;
}

#slideshow {
  margin: 0 auto;
  padding-top: 50px;
  height: 900px;
  width: 100%;

  box-sizing: border-box;
}

.slideshow-title {
  font-family: 'Allerta Stencil';
  font-size: 62px;
  color: #fff;
  margin: 0 auto;
  text-align: center;
  margin-top: 25%;
  letter-spacing: 3px;
  font-weight: 300;
}

.sub-heading {
  padding-top: 50px;
  font-size: 18px;
} .sub-heading-two {
  font-size: 15px;
} .sub-heading-three {
  font-size: 13px;
} .sub-heading-four {
  font-size: 11px;
} .sub-heading-five {
  font-size: 9px;
} .sub-heading-six {
  font-size: 7px;
} .sub-heading-seven {
  font-size: 5px;
} .sub-heading-eight {
  font-size: 3px;
} .sub-heading-nine {
  font-size: 1px;
}

.entire-content {
  margin: auto;
  width: 190px;
  perspective: 1000px;
  position: relative;
  padding-top: 80px;
}

.content-carrousel {
  width: 100%;
  position: absolute;
  float: right;
  animation: rotar 15s infinite linear;
  transform-style: preserve-3d;
}

.content-carrousel:hover {
  animation-play-state: paused;
  cursor: pointer;
}

.content-carrousel figure {
  width: 100%;
  height: 420px;



}

.content-carrousel figure:nth-child(1) {
  transform: rotateY(0deg) translateZ(300px); 
} .content-carrousel figure:nth-child(2) {
  transform: rotateY(40deg) translateZ(300px); 
} .content-carrousel figure:nth-child(3) {
  transform: rotateY(80deg) translateZ(300px); 
} .content-carrousel figure:nth-child(4) {
  transform: rotateY(120deg) translateZ(300px); 
} .content-carrousel figure:nth-child(5) {
  transform: rotateY(160deg) translateZ(300px); 
} .content-carrousel figure:nth-child(6) {
  transform: rotateY(200deg) translateZ(300px); 
} .content-carrousel figure:nth-child(7) {
  transform: rotateY(240deg) translateZ(300px); 
} .content-carrousel figure:nth-child(8) {
  transform: rotateY(280deg) translateZ(300px); 
} .content-carrousel figure:nth-child(9) {
  transform: rotateY(320deg) translateZ(300px); 
} .content-carrousel figure:nth-child(10) {
  transform: rotateY(360deg) translateZ(300px); 
} 

.shadow {
    position: absolute;
    box-shadow: 0px 0px 20px 0px #000;
    border-radius: 1px;
}

.content-carrousel img {
  image-rendering: auto;
  transition: all 300ms;
  width: 100%;
  height: 100%;
}

.content-carrousel img:hover {
  transform: scale(1.2);
  transition: all 300ms;
}

@keyframes rotar {
  from {
    transform: rotateY(0deg);
  } to {
    transform: rotateY(360deg);
  }
}

/*end carrousel */
#projects {
 /* background-color: #e5e5e5; */

  padding: 80px 0;
}
#projects h2 {
  display: block;
  font-size: 38px;
  font-weight: 400;
  letter-spacing: 5px;
  margin: 0 !important;
  margin-after: 0.83em;
  margin-before: 0.83em;
  padding-bottom: 50px;
  position: relative;
  text-align: center;
}
#projects h2after {
  bottom: 30px;
  content: "";
  display: block;
  height: 3px;
  left: 50%;
  position: absolute;
  transform: translateX(-50%);
  width: 100px;
}

.dark-gray-background {
  background-color: #222222;
}

.dark-gray-font {
  color: #222222 !important;
}

.light-white-font {
  color: #f5f5f5;
}

.container-fluid {
  min-height: 100%;
  padding: 0;
}

.fixed-width {
  max-width: 300px;
  min-width: 300px;
}

#carouselHeader h3 {
  position: relative;
  text-align: center;
}

/* Indicators list style */
.project-slide .carousel-indicators {
  bottom: 0;
  left: 0;
  margin-left: 5px;
  width: 100%;
}

/* Indicators list style */
.project-slide .carousel-indicators li {
  border: medium none;
  border-radius: 0;
  float: middle;
  height: 35px;
  margin-bottom: -10px;
  margin-left: 0;
  margin-right: 5px !important;
  margin-top: 0;
  width: 50px;
  border-radius: 3px;
}

/* Indicators images style */
.project-slide .carousel-indicators img {
  border: 2px solid #b8770d;
  border-radius: 3px;
  float: left;
  height: 35px;
  left: 0;
  width: 50px;
  opacity: 0.7;
}

/* Indicators active image style */
.project-slide .carousel-indicators .active img {
  border: 2px solid #fca311;
  opacity: 1;
}

/* carousel-control */
.carousel-control {
  color: #b8770d;
  opacity: 0.5;
}

.carousel-control:hover,
.carousel-control:focus {
  color: #fca311;
  opacity: 1;
}

.carousel-control.left, .carousel-control.right {
  background: none !important;
  filter: none !important;
  progid: none !important;
}

</style>

<script>
$(".carousel").swipe({

  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

    if (direction == 'left') $(this).carousel('next');
    if (direction == 'right') $(this).carousel('prev');

  },
  allowPageScroll:"vertical"

});
  </script>

    <html lang="pt-br" >
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
 <!-- <meta http-equiv="X-UA-Compatible" content="IE=8">
   <meta http-equiv="X-UA-Compatible" content="IE=Edge"> -->


  <title>Top Entregas</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="css/cssSite/iconPlayApple.css">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="landing-plans.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>



    <div  style="margin-bottom: 72px;">
      <img  style="width:100%;" src="imagens/banner11-min.jpg">
    </div>
  <section class="et-hero-tabs" style="width:100% !important;">

    <div class="et-hero-tabs-container"  >

        <a class="et-hero-tab" style="font-size:20px;" href="#tab-react">QUEM SOMOS</a>
      <a class="et-hero-tab" style="font-size:20px;" href="#tab-es6">COMO FUNCIONA?</a>
      <a class="et-hero-tab" style="font-size:20px;" href="#tab-flexbox">FUNCIONALIDADES</a>
      <a class="et-hero-tab" style="font-size:20px;" href="#tab-angular">CLIENTES</a>
      <a class="et-hero-tab" style="font-size:20px;" href="#tab-other">PLANOS</a>
         <a class="et-hero-tab" style="font-size:20px;" href="#tab-other2">CONTATO</a>

      <span class="et-hero-tab-slider"></span>
    </div>

  </section> 
 <!-- <section class="et-hero-tabs" style="width:100% !important;">

  <div class="nav "><img  align="center" class="responsiveimg" style="width:100px;height:100px; position:absolute;margin-bottom:20px;margin-left:240px;" src="imagens/icon1.png">
  <div class="nav-title ">
    <h1> </h1>
  </div>

  <div class="nav-menu ">
    <ul>
      <li>Sobre nos</li>
      <li>Como Funciona?</li>
      <li>Funcionalidades</li>
      <li>Clientes</li>
      <li>Planos</li>
    </ul>
  </div>
</div>
</section> -->
<header class="container" >
  <style>

.nav {
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
          flex-direction: row;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 70px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  background: #fff;
  z-index: 10;
}
.nav {
  position: fixed;
  top: 0;
}

 .nav{
  
    color: black !important;
    height: 70px;
    font-family: sans-serif;

    display: flex;
    flex-wrap:wrap;
    align-items: center;
   }

   .nav-title{

    padding: 0px 40px;
    text-align: center;

   }

   .nav-menu{
    width: 70%;
   }

   .nav-menu ul{
    display: flex;
    justify-content: flex-end;
   }

   .nav-menu ul li{
    padding: 10px 20px;
    color: #ccc;
    font-size: 20px;
    list-style-type: none;
    cursor: pointer;
   }

   .nav-menu ul li:hover{
    color: black;
    font-weight: bold;
   }

    /*style for responsive menu*/

    @media screen and (max-width:1000px){
.et-hero-tab{

  font-size:10px !important;
}
.font-redirect{
font-size:23px;
}
.trend-redirect{
font-size:33px !important;

}
.et-hero-tabs-container{
  
}
      .responsiveimg{

        margin-top:-20px;
      }


      .nav{

        height: 110px !important;

      }
      .nav .nav-title{
        text-align: left;
        width: 100%;

      }

      .nav .nav-menu{
        width: 100%;

      }
      .nav .nav-menu ul{
        justify-content: space-around;

      }

      .nav .nav-menu ul li{
        width: 20%;

  
        text-align: center;
        font-size: 16px;
      }
    }

  </style>



  </header>

  <main class="container" charset="utf-8" >
    <section style="margin-top:-10%;" class="hero container" align="center" >
   <!--   <h1 style="color:rgb(100,0,0);">Aplicativo de delivery único para <B style="text-decoration:underline;"> SEU NEGÓCIO! </B></h1>
      <p style="color:black;">Somos especializados na criação de aplicativo próprio para a sua empresa, com suas cores e a sua cara!   Atendemos <b style="text-decoration:underline;color:black;"> QUALQUER NEGÓCIO </b> e deixamos seu aplicativo pronto para uso! </p>
-->

   <h1 style="color:rgb(100,0,0);" id="tab-react" class="trend-redirect">  Quem Somos </h1> <br>

<p style="font-size:18px;color:black;"> Sediada em São José do Rio Preto, no interior de São Paulo, atuando há mais de 5 anos no mercado, a ATALOS possui uma equipe capacitada com soluções em documentações empresariais e no desenvolvimento de Aplicativos que facilitam o dia a dia dos clientes e atendam as mais diversas demandas. <br> <br> Especializada em Desenvolver Aplicativos para Delivery, a ATALOS vem se destacando no mercado com o aplicativo "TOP ENTREGAS", um aplicativo leve e pré-formatado que permite aos clientes iniciarem suas vendas em menos de 15 dias, através de um Aplicativo próprio, com um preço bastante acessível. </b>

   <h1 style="color:rgb(100,0,0);" ID="tab-es6" class="trend-redirect">  Como Funciona o Aplicativo ? </h1> 
<p></p>
<div>
   <img width="40%" src="imagens/app/3.png" align="left" />
  <b style="font-size:18px;color:black;">  Desenvolvemos o app próprio de delivery do seu estabelecimento. <br><br>
É um aplicativo que será da SUA EMPRESA, com suas cores, sua logomarca, seus produtos, e seus clientes.  <br><br>
Atendemos QUALQUER NEGÓCIO e deixamos seu aplicativo pronto para uso! <br><br>

TRABALHA COM DELIVERY E QUER OTIMIZAR SEUS PEDIDOS ? <br>
PRECISA DE UM APLICATIVO PERSONALIZADO ? <br>
SUA EMPRESA PRECISA DE OTIMIZAR A GESTÃO ? <br>

Nós temos a solução! </b> </div> 

</div>
<br><br>

   <h1 style="color:rgb(100,0,0);" class="trend-redirect">  Por que investir no seu próprio APP? </h1>
<p style="font-size:18px;color:black;"> 
1.  Redução de custos com taxas e comissões de aplicativos de Delivery <br>
2.  Fidelização do cliente. Descontos + ofertas exclusivas = Pedidos com maior frequência<br>
3.  Fortalecimento da sua Marca. Seus clientes compartilham sua marca e você ganha em divulgação<br>
4.  Menos falhas no atendimento. O próprio cliente escolhe seus produtos sem precisar de atendentes em canais de telefone ou whatsapp, por exemplo.<br>
5.  Aumento das vendas. Sem demora para atender, sem linhas telefônicas ocupadas, recebendo pedidos simultâneos.<br>
</p>



          <h1 id="tab-flexbox" style="color:rgb(100,0,0) !important;" class="trend-redirect">Funcionalidades </h1>
          <p></p>
 <div class="section-tittle">

        </div>
<br><br>

    <div class="row">
      <div class="col-xs-12 no_brdr">
        <div class="row wrapper-plans"> <!--wrapper-plans -->
          <div class="col-md-3" >
            <div class="plan-wrappere" style="background-color:white;padding:30px;margin-bottom:20px;color:black;" >
              <div class="plans-logo no_bckgrnd">
                <i class="fab fa-elementor" style="margin-left:27%;margin-top:20%;color:rgb(100,0,0) !important;"></i>
              </div>
              <div class="plans-title" align="center">
                <span >MENU</span>
              </div>
              <div class="plans-description">
                <span class="font-redirect">Inclua, exclua, edite ou oculte seus produtos, descrições, complementos, fotos e etc no catálogo em tempo real para seus clientes.</span>
              </div>
            </div>
          </div>
          <div class="col-md-3" >
            <div class="plan-wrappere" style="background-color:white;padding:30px;margin-bottom:20px;color:black;">
              <div class="plans-logo no_bckgrnd">
<i class="fas fa-desktop" style="margin-left:27%;margin-top:20%;color:rgb(100,0,0) !important;"></i>
              </div>
              <div class="plans-title" align="center">
                <span>PEDIDOS</span>
              </div>
              <div class="plans-description">
                <span class="font-redirect">Acompanhe e confirme os pedidos dos clientes através do gerencial online multi usuários, de forma dinâmica, pratica e muito simples. </span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="plan-wrappere" style="background-color:white;padding:30px;margin-bottom:20px;color:black;" > <!-- plan-wrapper little -->
              <div class="plans-logo no_bckgrnd">
                <svg version="1.1" id="Шар_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" height="50" width="50">
                  <g>

                      <i id="path-1" class="fas fa-bell" style="margin-left:27%;margin-top:20%;color:rgb(100,0,0) !important;"></i>
                  </g>
                </svg>
              </div>
              <div class="plans-title" align="center">
                <span>NOVIDADES</span>
              </div>
              <div class="plans-description">
                <span class="font-redirect">Utilize a aba novidades para informar seus clientes sobre novos produtos, promoções, alterações de horários, etc.</span>
              </div>
            </div>
          </div>
          <div class="col-md-3" >
            <div class="plan-wrappere" style="background-color:white;padding:30px;margin-bottom:20px;color:black;">
              <div class="plans-logo no_bckgrnd">
<i class="fas fa-truck" style="margin-left:27%;margin-top:20%;color:rgb(100,0,0) !important;"></i>
              </div>
              <div class="plans-title" align="center">
                <span >ENTREGA</span>
              </div>
              <div class="plans-description">
                <span class="font-redirect">Defina os raios de entrega e valores de acordo com as distâncias percorridas do Google Maps.</span>
              </div>
            </div>
          </div>
        </div>

                  <div class="row wrapper-plans"> <!-- wrapper-plans-->
 <div class="col-md-3" >
            <div class="plan-wrappere" style="background-color:white;padding:30px;margin-bottom:20px;color:black;">
              <div class="plans-logo no_bckgrnd">
<i class="fas fa-wrench" style="margin-left:27%;margin-top:20%;color:rgb(100,0,0) !important;"></i>
              </div>
              <div class="plans-title" align="center">
                <span>CONFIGURAÇÕES</span>
              </div>
              <div class="plans-description">
               <div style="margin-top:27px;"></div>
                <span class="font-redirect">Altere em tempo real as configurações da empresa como valor mínimo de pedido, tempo de entrega, horários de funcionamento.</span>
              </div>
            </div>
          </div>
 <div class="col-md-3" >
            <div class="plan-wrappere" style="background-color:white;padding:30px;margin-bottom:20px;color:black;">
              <div class="plans-logo no_bckgrnd">
<i class="fas fa-comments" style="margin-left:27%;margin-top:20%;color:rgb(100,0,0) !important;"></i>
              </div>
              <div class="plans-title" align="center">
                <span>ENVIO DE NOTIFICAÇÕES</span>
              </div>
              <div class="plans-description">
                <span class="font-redirect">Aumente suas vendas através do envio direto de notificações aos usuários do seu APP. Capriche e prepare-se para aumentar seus pedidos.</span>
              </div>
            </div>
          </div>
 <div class="col-md-3" >
            <div class="plan-wrappere" style="background-color:white;padding:30px;margin-bottom:20px;color:black;">
              <div class="plans-logo no_bckgrnd">
<i class="fas fa-chart-line" style="margin-left:27%;margin-top:20%;color:rgb(100,0,0) !important;"></i>
              </div>
              <div class="plans-title" align="center">
                <span>RELATÓRIOS</span>
              </div>
              <div style="margin-top:27px;" class="plans-description">
                <span class="font-redirect">Acompanhe o desempenho do seu negócio através dos relatórios gerenciais de clientes, pedidos, produtos, ticket médio, etc. </span>
              </div>
            </div>
          </div>
 <div class="col-md-3" >
            <div class="plan-wrapperew" style="background-color:white;padding:30px;margin-bottom:20px;color:black;">
              <div class="plans-logo no_bckgrnd">
<i class="fas fa-question" style="margin-left:27%;margin-top:20%;color:rgb(100,0,0) !important;"></i>
              </div>
              <div class="plans-title" align="center">
                <span>SUPORTE</span>
              </div>
              <div style="margin-top:27px;" class="plans-description">
                <span class="font-redirect">Nossa equipe não te deixará na mão quando estiver com dúvidas ou necessidades técnicas. Sempre prontos para lhe ajudar!</span>
              </div>
            </div>
          </div>


        </div><!-- .row wrapper-plans -->


      </div>
    </div>
  </div>


  <h1 id="tab-angular" class="" style="color:rgb(100,0,0) !important;">Clientes</h1>
  <p></p>

    <div  class=" light-white-font" >

</div>

    <section id="slideshow">
      <div class="entire-content">
        <div class="content-carrousel">
          <figure class="shadow"><img src="imagens/app/1.jpg"/></figure>
          <figure class="shadow"><img src="imagens/app/2.jpg"/></figure>
          <figure class="shadow"><img src="imagens/app/4.jpg"/></figure>
          <figure class="shadow"><img src="imagens/app/5.jpg"/></figure>
          <figure class="shadow"><img src="imagens/app/9.jpg"/></figure>
          <figure class="shadow"><img src="imagens/app/6.jpg"/></figure>
          <figure class="shadow"><img src="imagens/app/8.jpg"/></figure>
          <figure class="shadow"><img src="imagens/app/7.jpg"/></figure>
          <figure class="shadow"><img src="imagens/app/9.jpg"/></figure>
    </div>
  </div>
</section>

    </section>
<!--
    <div id="projects" class="container-fluid light-white-font">
  <h2 class="text-uppercase dark-gray-font">Clientes</h2>
  <div class="container dark-gray-font" >
    <div class="row">
      <div class="col-md-4">
        <div class="panel panel-default fixed-width center-block" data-toggle="modal" data-target="#projectA">
          <div class="panel-body">
            <a style="cursor: pointer;">
              <img class="img-responsive center-block" src="imagens/pouso1IMAGE.jpg" />
            </a>
          </div>
          <div class="panel-footer">
            <a ><h3>Pouso e Decolagem</h3></a>
            <a >
              <p>Restaurante em São José do Rio Preto.</p>
            </a>
          </div>
        </div>


        <div class="modal fade" id="projectA">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
              </div>
              <div class="modal-body">
                <div id="projectAsel" class="carousel slide project-slide" data-interval="false">
                  <div class="carousel-inner">
                    <div class="item active"> <img src="imagens/pouso1.jpg" alt="item1">
                    </div>
                    <div class="item"><img src="imagens/pouso1.jpg" alt="item2">
                    </div>
                    <div class="item"> <img src="imagens/pouso1.jpg" alt="item3">
                    </div>
                    <div class="item"> <img src="imagens/pouso1.jpg" alt="item4">
                    </div>
                    <ol class="carousel-indicators">
                      <li class="active" data-slide-to="0" data-target="#projectAsel">
                        <img alt="" src="imagens/pouso1.jpg">
                      </li>
                      <li class="" data-slide-to="1" data-target="#projectAsel">
                        <img alt="" src="imagens/pouso1.jpg">
                      </li>
                      <li class="" data-slide-to="2" data-target="#projectAsel">
                        <img alt="" src="imagens/pouso1.jpg">
                      </li>
                      <li class="" data-slide-to="3" data-target="#projectAsel">
                        <img alt="" src="imagens/pouso1.jpg">
                      </li>
                    </ol>
                  </div>
                  <a class="left carousel-control" href="#projectAsel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a>
                  <a class="right carousel-control" href="#projectAsel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div id="carouselHeader">
                  <h3>Pouso e Decolagem</h3></div>
                <div id="info">
<P> No dia 30 de março de 2005 o Pouso e Decolagem abre suas portas pela primeira vez, idealizado por seus proprietários que ao conhecer o local ficaram fascinados com aviões pousando e decolando, e imaginaram um bar restaurante onde as pessoas pudessem ver pousos e decolagens curtindo tudo que um bar pode proporcionar, como bons petiscos, cerveja gelada e ambiente descontráido para um bate-papo. <p></p>

                    Desde a inaguração até os dias de hoje o objetivo do Pouso e Decolagem é a satisfação de seus clientes, sempre oferecendo produtos de qualidade e prezando pelo bom atendimento aos seus clientes, a casa está sempre em busca de novidades como: promoções no happy hour, programa de fidelidade, etc.
                    <p></p>
                    Diferenciada não só pelo ambiente de pousos e decolagens, oferece espaços agradáveis e aconchegantes, possuindo uma parte interna toda decorada com maquetes de aviões e quadros sobre aviação, já o Deck é uma área coberta, porém nas lateiras para quem gosta de pouca iluminação e um ambiente refrescante é o lugar ideal, em pouco tempo se tornou um local totalmente aberto sem construções ao seu redor, se torna um lugar bem ventilado, que no verão é um local ideal para tomar aquele choppinho gelado no fim de tarde, além de bate papo com os amigos apreciando Pousos e Decolagens.
                    <p></p>
                    Venha conhecer o Pouso e Decolagem e confira que...
                    <p></p>
                    Sua Satifação é Nosso Objetivo!
                </p>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn-sm close" type="button" data-dismiss="modal">Voltar ao site</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default fixed-width center-block" data-toggle="modal" data-target="#projectB">
          <div class="panel-body">
            <a style="cursor: pointer;">
              <img class="img-responsive center-block" src="imagens/Fratter1.jpg" />
            </a>
          </div>
          <div class="panel-footer">
            <a ><h3>Fratter</h3></a>
            <a >
              <p>Restaurante em São José do Rio Preto</p>
            </a>
          </div>
        </div>
        <div class="modal fade" id="projectB">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
              </div>
              <div class="modal-body">
                <div id="projectBsel" class="carousel slide project-slide" data-interval="false">
                  <div class="carousel-inner">
                    <div class="item active"> <img src="imagens/fratter.jpg" alt="item1">
                    </div>
                    <div class="item"><img src="imagens/fratter.jpg" alt="item2">
                    </div>
                    <div class="item"> <img src="imagens/fratter.jpg" alt="item3">
                    </div>
                    <div class="item"> <img src="imagens/fratter.jpg" alt="item4">
                    </div>
                    <ol class="carousel-indicators">
                      <li class="active" data-slide-to="0" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="1" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="2" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="3" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                    </ol>
                  </div>
                  <a class="left carousel-control" href="#projectBsel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a>
                  <a class="right carousel-control" href="#projectBsel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div id="carouselHeader">
                  <h3>Fratter</h3></div>
                <div id="info">
                  <p>Comida deliciosa com gostinho da "comidinha lá de casa". Tudo feito com muito carinho, qualidade e incomparável sabor da culinária brasileira familiar.</p>

                </div>
              </div>
              <div class="modal-footer">
                <button class="btn-sm close" type="button" data-dismiss="modal">Voltar ao site </button>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="col-md-4">
        <div class="panel panel-default fixed-width center-block" data-toggle="modal" data-target="#projectB">
          <div class="panel-body">
            <a style="cursor: pointer;">
              <img class="img-responsive center-block" src="imagens/Fratter1.jpg" />
            </a>
          </div>
          <div class="panel-footer">
            <a ><h3>Fratter</h3></a>
            <a >
              <p>Restaurante em São José do Rio Preto</p>
            </a>
          </div>
        </div>
        <div class="modal fade" id="projectB">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
              </div>
              <div class="modal-body">
                <div id="projectBsel" class="carousel slide project-slide" data-interval="false">
                  <div class="carousel-inner">
                    <div class="item active"> <img src="imagens/fratter.jpg" alt="item1">
                    </div>
                    <div class="item"><img src="imagens/fratter.jpg" alt="item2">
                    </div>
                    <div class="item"> <img src="imagens/fratter.jpg" alt="item3">
                    </div>
                    <div class="item"> <img src="imagens/fratter.jpg" alt="item4">
                    </div>
                    <ol class="carousel-indicators">
                      <li class="active" data-slide-to="0" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="1" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="2" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="3" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                    </ol>
                  </div>
                  <a class="left carousel-control" href="#projectBsel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a>
                  <a class="right carousel-control" href="#projectBsel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div id="carouselHeader">
                  <h3>Fratter</h3></div>
                <div id="info">
                  <p>Comida deliciosa com gostinho da "comidinha lá de casa". Tudo feito com muito carinho, qualidade e incomparável sabor da culinária brasileira familiar.</p>

                </div>
              </div>
              <div class="modal-footer">
                <button class="btn-sm close" type="button" data-dismiss="modal">Voltar ao site </button>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="col-md-4">
        <div class="panel panel-default fixed-width center-block" data-toggle="modal" data-target="#projectB">
          <div class="panel-body">
            <a style="cursor: pointer;">
              <img class="img-responsive center-block" src="imagens/Fratter1.jpg" />
            </a>
          </div>
          <div class="panel-footer">
            <a ><h3>Fratter</h3></a>
            <a >
              <p>Restaurante em São José do Rio Preto</p>
            </a>
          </div>
        </div>
        <div class="modal fade" id="projectB">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
              </div>
              <div class="modal-body">
                <div id="projectBsel" class="carousel slide project-slide" data-interval="false">
                  <div class="carousel-inner">
                    <div class="item active"> <img src="imagens/fratter.jpg" alt="item1">
                    </div>
                    <div class="item"><img src="imagens/fratter.jpg" alt="item2">
                    </div>
                    <div class="item"> <img src="imagens/fratter.jpg" alt="item3">
                    </div>
                    <div class="item"> <img src="imagens/fratter.jpg" alt="item4">
                    </div>
                    <ol class="carousel-indicators">
                      <li class="active" data-slide-to="0" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="1" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="2" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="3" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                    </ol>
                  </div>
                  <a class="left carousel-control" href="#projectBsel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a>
                  <a class="right carousel-control" href="#projectBsel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div id="carouselHeader">
                  <h3>Fratter</h3></div>
                <div id="info">
                  <p>Comida deliciosa com gostinho da "comidinha lá de casa". Tudo feito com muito carinho, qualidade e incomparável sabor da culinária brasileira familiar.</p>

                </div>
              </div>
              <div class="modal-footer">
                <button class="btn-sm close" type="button" data-dismiss="modal">Voltar ao site </button>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="col-md-4">
        <div class="panel panel-default fixed-width center-block" data-toggle="modal" data-target="#projectB">
          <div class="panel-body">
            <a style="cursor: pointer;">
              <img class="img-responsive center-block" src="imagens/Fratter1.jpg" />
            </a>
          </div>
          <div class="panel-footer">
            <a ><h3>Fratter</h3></a>
            <a >
              <p>Restaurante em São José do Rio Preto</p>
            </a>
          </div>
        </div>
        <div class="modal fade" id="projectB">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
              </div>
              <div class="modal-body">
                <div id="projectBsel" class="carousel slide project-slide" data-interval="false">
                  <div class="carousel-inner">
                    <div class="item active"> <img src="imagens/fratter.jpg" alt="item1">
                    </div>
                    <div class="item"><img src="imagens/fratter.jpg" alt="item2">
                    </div>
                    <div class="item"> <img src="imagens/fratter.jpg" alt="item3">
                    </div>
                    <div class="item"> <img src="imagens/fratter.jpg" alt="item4">
                    </div>
                    <ol class="carousel-indicators">
                      <li class="active" data-slide-to="0" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="1" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="2" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="3" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                    </ol>
                  </div>
                  <a class="left carousel-control" href="#projectBsel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a>
                  <a class="right carousel-control" href="#projectBsel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div id="carouselHeader">
                  <h3>Fratter</h3></div>
                <div id="info">
                  <p>Comida deliciosa com gostinho da "comidinha lá de casa". Tudo feito com muito carinho, qualidade e incomparável sabor da culinária brasileira familiar.</p>

                </div>
              </div>
              <div class="modal-footer">
                <button class="btn-sm close" type="button" data-dismiss="modal">Voltar ao site </button>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="col-md-4">
        <div class="panel panel-default fixed-width center-block" data-toggle="modal" data-target="#projectB">
          <div class="panel-body">
            <a style="cursor: pointer;">
              <img class="img-responsive center-block" src="imagens/Fratter1.jpg" />
            </a>
          </div>
          <div class="panel-footer">
            <a ><h3>Fratter</h3></a>
            <a >
              <p>Restaurante em São José do Rio Preto</p>
            </a>
          </div>
        </div>
        <div class="modal fade" id="projectB">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
              </div>
              <div class="modal-body">
                <div id="projectBsel" class="carousel slide project-slide" data-interval="false">
                  <div class="carousel-inner">
                    <div class="item active"> <img src="imagens/fratter.jpg" alt="item1">
                    </div>
                    <div class="item"><img src="imagens/fratter.jpg" alt="item2">
                    </div>
                    <div class="item"> <img src="imagens/fratter.jpg" alt="item3">
                    </div>
                    <div class="item"> <img src="imagens/fratter.jpg" alt="item4">
                    </div>
                    <ol class="carousel-indicators">
                      <li class="active" data-slide-to="0" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="1" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="2" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                      <li class="" data-slide-to="3" data-target="#projectBsel">
                        <img alt="" src="imagens/fratter.jpg">
                      </li>
                    </ol>
                  </div>
                  <a class="left carousel-control" href="#projectBsel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a>
                  <a class="right carousel-control" href="#projectBsel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div id="carouselHeader">
                  <h3>Fratter</h3></div>
                <div id="info">
                  <p>Comida deliciosa com gostinho da "comidinha lá de casa". Tudo feito com muito carinho, qualidade e incomparável sabor da culinária brasileira familiar.</p>

                </div>
              </div>
              <div class="modal-footer">
                <button class="btn-sm close" type="button" data-dismiss="modal">Voltar ao site </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--
      <div class="col-md-4">
        <div class="panel panel-default fixed-width center-block" data-toggle="modal" data-target="#projectC">
          <div class="panel-body">
            <a style="cursor: pointer;">
              <img class="img-responsive center-block" src="http://placeimg.com/600/480/tech/90" />
            </a>
          </div>
          <div class="panel-footer">
            <a ><h3>Project C</h3></a>
            <a >
              <p>Some description.</p>
            </a>
          </div>
        </div>
        <div class="modal fade" id="projectC">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
              </div>
              <div class="modal-body">
                <div id="projectCsel" class="carousel slide project-slide" data-interval="false">
                  <div class="carousel-inner">
                    <div class="item active"> <img src="http://placeimg.com/600/480/tech/90" alt="item1">
                    </div>
                    <div class="item"><img src="http://placeimg.com/600/480/tech/100" alt="item2">
                    </div>
                    <div class="item"> <img src="http://placeimg.com/600/480/tech/110" alt="item3">
                    </div>
                    <div class="item"> <img src="http://placeimg.com/600/480/tech/120" alt="item4">
                    </div>
                    <ol class="carousel-indicators">
                      <li class="active" data-slide-to="0" data-target="#projectCsel">
                        <img alt="" src="http://placeimg.com/600/480/tech/90">
                      </li>
                      <li class="" data-slide-to="1" data-target="#projectCsel">
                        <img alt="" src="http://placeimg.com/600/480/tech/100">
                      </li>
                      <li class="" data-slide-to="2" data-target="#projectCsel">
                        <img alt="" src="http://placeimg.com/600/480/tech/110">
                      </li>
                      <li class="" data-slide-to="3" data-target="#projectCsel">
                        <img alt="" src="http://placeimg.com/600/480/tech/120">
                      </li>
                    </ol>
                  </div>
                  <a class="left carousel-control" href="#projectCsel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a>
                  <a class="right carousel-control" href="#projectCsel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div id="carouselHeader">
                  <h3>Project C</h3></div>
                <div id="info">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquet ipsum vitae interdum molestie. Mauris accumsan rhoncus purus at laoreet. Aenean non placerat lacus. Nam porttitor, ante a placerat fermentum, odio libero congue arcu,
                    vitae semper elit eros vitae nulla. Sed commodo porta leo eget malesuada.</p>
                  <p>Ut ligula nisl, ullamcorper ac accumsan id, bibendum et urna. Nunc sed euismod dolor. Phasellus consequat nisi elementum odio placerat aliquet. Mauris maximus augue ut dictum porta. Nulla dignissim mi non libero venenatis eleifend sed
                    ac lacus. Duis ultrices libero massa, non commodo tortor consectetur sed. Praesent porta ex et interdum porttitor.</p>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn-sm close" type="button" data-dismiss="modal">Voltar ao site</button>
              </div>
            </div>
          </div>
        </div>
      </div>-->
  <!--  </div>
  </div>
</div> -->
<!-- atribuir um slide aqui com todos os nossos clientes e app base -->
<!-- 
<h2 id="tab-react"> Monte seu próprio aplicativo! </h2>

    <div class="device" > 
      <figure>
        <div class="device device-iphone-x">
          <div class="device-frame">
    <a style="color:white;font-size:23px;z-index:90000;margin-top:30%;" > Gostaria de montar uma prévia de seu próprio aplicativo antes de pedir um orçamento? </a>

    <a style="color:white;font-size:23px;z-index:90000;margin-top:30%;" href="colortopng-master/index.html"> Monte a imagem ideal de seu próprio aplicativo. Para isso, <b style="color:yellow;"> clique aqui! </b> </a>

        <a style="color:white;font-size:23px;z-index:90000;margin-top:30%;" > Após criar sua própria imagem, encaminhe junto ao seu pedido! </a>
        
          </div>   
          <div class="device-stripe"> </div>
          <div class="device-header"></div>
          <div class="device-sensors"></div> 
          <div class="device-btns"></div>
          <div class="device-power"></div>
        </div>
      </figure>
    </div>
  -->
      <main class="container"  >

           <section style="margin-top:-5%;"  class="hero container" align="center">
 <p> <h2 style="color:black;"> Confira nosso aplicativo de demonstração, caso queira testar: </h2>
</section>
<div class="stage">
 <a class="btnw btnw--ios" href="https://apps.apple.com/br/app/top-entregas-2/id1477197673">
            <svg class="btnw__icon btnw__icon--apple" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            preserveAspectRatio="xMidYMid"
            viewBox="0 0 20 20">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5640259,13.8623047
        c-0.4133301,0.9155273-0.6115723,1.3251343-1.1437988,2.1346436c-0.7424927,1.1303711-1.7894897,2.5380249-3.086853,2.5500488
        c-1.1524048,0.0109253-1.4483032-0.749939-3.0129395-0.741333c-1.5640259,0.008606-1.8909302,0.755127-3.0438843,0.7442017
        c-1.296814-0.0120239-2.2891235-1.2833252-3.0321655-2.4136963c-2.0770874-3.1607666-2.2941895-6.8709106-1.0131836-8.8428955
        c0.9106445-1.4013062,2.3466187-2.2217407,3.6970215-2.2217407c1.375,0,2.239502,0.7539673,3.3761597,0.7539673
        c1.1028442,0,1.7749023-0.755127,3.3641357-0.755127c1.201416,0,2.4744263,0.6542969,3.3816528,1.7846069
        C14.0778809,8.4837646,14.5608521,12.7279663,17.5640259,13.8623047z M12.4625244,3.8076782
        c0.5775146-0.741333,1.0163574-1.7880859,0.8571167-2.857666c-0.9436035,0.0653076-2.0470581,0.6651611-2.6912842,1.4477539 C10.0437012,3.107605,9.56073,4.1605835,9.7486572,5.1849365C10.7787476,5.2164917,11.8443604,4.6011963,12.4625244,3.8076782z"/>
            </svg>
            <span class="btnw__text">Download pela</span> 
            <span class="btnw__storename">App Store</span>
        </a>

         <a class="btnw btnw--android" href="https://play.google.com/store/apps/details?id=com.delivery.atalos3&hl=pt_BR">
            <svg class="btnw__icon btnw__icon--google" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            preserveAspectRatio="xMidYMid"
            viewBox="0 0 20 20">
                <path d="M4.942627,18.0508423l7.6660156-4.3273926l-1.6452026-1.8234253L4.942627,18.0508423z M2.1422119,2.1231079
        C2.0543823,2.281311,2,2.4631958,2,2.664917v15.1259766c0,0.2799683,0.1046143,0.5202026,0.2631226,0.710144l7.6265259-7.7912598
        L2.1422119,2.1231079z M17.4795532,9.4819336l-2.6724854-1.508606l-2.72229,2.7811279l1.9516602,2.1630249l3.4431152-1.9436035
        C17.7927856,10.8155518,17.9656372,10.5287476,18,10.2279053C17.9656372,9.927063,17.7927856,9.6402588,17.4795532,9.4819336z
         M13.3649292,7.1592407L4.1452026,1.954834l6.8656616,7.609314L13.3649292,7.1592407z"/>
            </svg>
            <span class="btnw__text">Donwload pela</span> 
            <span class="btnw__storename">Google Play</span>
        </a>
      </stage>


<!-- 
    <section style="margin-top:-10%;" class="hero container" align="center">
      <p> Confira nosso aplicativo de exemplo, caso queira testar: </p>
     
      <a href="https://apps.apple.com/br/app/top-entregas-2/id1477197673">Apple Store !</a>
      <a href="https://play.google.com/store/apps/details?id=com.delivery.atalos3&hl=pt_BR">Google Play !</a>
    </section> -->
  </main>


  <div class="container">
    <div class="row">
    </div>
  </div><!-- .container -->

  <div class="container no_icons" id="tab-other">
    <div class="row">
      <div class="col-xs-12">
        <div class="section-tittle">
          <h3 style="font-size:41px;color:black;">Nossos Planos!</h3>
        </div>
        <br><br>
        <div class="row wrapper-plans">

          <div class="col-md-6">
            <div class="plan-wrapper info" style="margin-right: 0;height:980px;">
              <div class="plans-title">
                <span class="plans-price price">PLANO 1 <p> SEM FIDELIDADE</span>
              </div><!-- .plans-title -->
              <div class="plans-price">
                <span class="price">
                  R$80,00*
                </span>
                <span class="per">
                  por mês
                </span>
              </div><!-- .plans-price -->
              <div class="plans-links">
         
                  <hr>
                 <b>  <li><a>▪ SETUP INICIAL:  <b class="plans-price price" style="font-size:26px;">  R$ 250,00  </b> <p> </p>       <hr>

Configuração inicial do APP + Publicação na APP Store e Play Store)
<hr>
                  <li> <b> ▪ Mensalidade conforme faixas de  vendas no APP: </b> <br> <br>
                    <hr>
 <a style="font-size:13px;word-spacing: 2px;"> <b class="plans-price price" style="font-size:13px;"> - FAIXA 1 </b> (até R$3.000,00 de Vendas) - 10% do valor de venda <p> </p>
(porém, nessa faixa a <b class="plans-price price" style="font-size:13px;"> mensalidade mínima é  *R$ 80,00 </b>)<p> </p>
<hr>
<b class="plans-price price" style="font-size:13px;"> - FAIXA 2 </b> (R$3.000,00 até R$6.000,00 de Vendas) - R$ 300,00 (fixo)<p> </p>
<hr>
<b class="plans-price price" style="font-size:13px;"> - FAIXA 3 </b> (acima de R$6.000,000) -R$ 400,00 (fixo)<p> </p> </b>
<hr>
</li></b> </a>  </li> </b>

              </div><!-- .plans-links -->
              <div class="plans-subscribe">
                <a  data-toggle="modal" data-target="#exampleModal" class="btn">Quero Este!</a>
              </div><!-- .plans-subscribe -->
<!------ -- -->

 <?php
if (isset($_POST['BTEnvia2'])) {
 
 //Variaveis de POST, Alterar somente se necessário 
 //====================================================
 $nome2 = $_POST['nome2'];
 $email2 = $_POST['email2'];
 $telefone2 = $_POST['telefone2']; 
 $mensagem2 = $_POST['mensagem2'];
  $cidade2 = $_POST['cidade2'];
 //====================================================
 
 //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 //==================================================== 
 $email_remetente2 = "sistema.atalos@topentregas.com.br"; // deve ser uma conta de email do seu dominio 
 //====================================================
 
 //Configurações do email, ajustar conforme necessidade
 //==================================================== 
 $email_destinatario2 = "sistema.atalos@hotmail.com"; // pode ser qualquer email que receberá as mensagens
 $email_reply2 = "$email2"; 
 $email_assunto2 = "CLIENTE - PLANO 1"; // Este será o assunto da mensagem
 //====================================================
 
 //Monta o Corpo da Mensagem
 //====================================================
  $email_conteudo2 = "Plano escolhido = PLANO 1 SEM FIDELIDADE \n"; 
 $email_conteudo2 = "Nome = $nome2 \n"; 
 $email_conteudo2 .= "Email = $email2 \n";
 $email_conteudo2 .= "Telefone = $telefone2 \n"; 
 $email_conteudo2 .= "Nome Negócio = $mensagem2 \n"; 
  $email_conteudo2 .= "Cidade em que reside = $cidade2 \n"; 
 //====================================================
 
 //Seta os Headers (Alterar somente caso necessario) 
 //==================================================== 
 $email_headers2 = implode ( "\n",array ( "From: $email_remetente2", "Reply-To: $email_reply2", "Return-Path: $email_remetente2","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 //====================================================
 
 //Enviando o email 
 //==================================================== 
 if (mail ($email_destinatario2, $email_assunto2, nl2br($email_conteudo2), $email_headers2)){ 
  echo '<script>alert("Formulário enviado com sucesso, aguarde nosso contato!!"); </script>';
 } 
 else{ 
    echo '<script>alert("Ocorreu um erro!!"); </script>'; } 
 //====================================================
} 
?>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">PLANO 1 - SEM FIDELIDADE</h4>
          </div>

          <div class="modal-body">
<!-- talvez se especificar a form... -->
 Após o envio do formulário nossa equipe entrará em contato com você em até 24 horas para solicitar informações adicionais e formalizar a inicialização de seu novo aplicativo.
            <form action="<? $PHP_SELF; ?>" method="POST">

              <div class="form-group">
                <label for="recipient-nome" class="control-label">Seu nome:</label>
                <input type="text" size="30" name="nome2" type="text" class="form-control">

              </div>

            <div class="form-group">

                <label for="recipient-nome" class="control-label">Email de contato:</label>
                <input name="email2" type="text" class="form-control" >

              </div>


            <div class="form-group">

                <label for="recipient-nome" class="control-label">Telefone:</label>
         <input type="text" size="35" id="phone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="telefone2" placeholder="Telefone com DDD" type="text" class="form-control" >

              </div>


              <div class="form-group">

                <label for="recipient-nome" class="control-label">Nome do seu negócio:</label>
                <input name="mensagem2" type="text" class="form-control" >

              </div>


              <div class="form-group">

                <label for="recipient-nome" class="control-label">Cidade em que reside:</label>
                <input name="cidade2" type="text" class="form-control" >

              </div>


<br>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="BTEnvia2" class="btn btn-primary">Enviar</button>


              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

     <?php
if (isset($_POST['BTEnvia3'])) {
 
 //Variaveis de POST, Alterar somente se necessário 
 //====================================================
 $nome3 = $_POST['nome3'];
 $email3 = $_POST['email3'];
 $telefone3 = $_POST['telefone3']; 
 $mensagem3 = $_POST['mensagem3'];
  $cidade3 = $_POST['cidade3'];
 //====================================================
 
 //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 //==================================================== 
 $email_remetente3 = "sistema.atalos@topentregas.com.br"; // deve ser uma conta de email do seu dominio 
 //====================================================
 
 //Configurações do email, ajustar conforme necessidade
 //==================================================== 
 $email_destinatario3 = "sistema.atalos@hotmail.com"; // pode ser qualquer email que receberá as mensagens
 $email_reply3 = "$email3"; 
 $email_assunto3 = "CLIENTE - PLANO 2"; // Este será o assunto da mensagem
 //====================================================
 
 //Monta o Corpo da Mensagem
 //====================================================
  $email_conteudo3 = "Plano escolhido = PLANO 2 COM FIDELIDADE \n"; 
 $email_conteudo3 = "Nome = $nome3 \n"; 
 $email_conteudo3 .= "Email = $email3 \n";
 $email_conteudo3 .= "Telefone = $telefone3 \n"; 
 $email_conteudo3 .= "Nome Negócio = $mensagem3 \n"; 
  $email_conteudo3 .= "Cidade em que reside = $cidade3 \n"; 
 //====================================================
 
 //Seta os Headers (Alterar somente caso necessario) 
 //==================================================== 
 $email_headers3 = implode ( "\n",array ( "From: $email_remetente3", "Reply-To: $email_reply3", "Return-Path: $email_remetente3","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 //====================================================
 
 //Enviando o email 
 //==================================================== 
 if (mail ($email_destinatario3, $email_assunto3, nl2br($email_conteudo3), $email_headers3)){ 
  echo '<script>alert("Formulário enviado com sucesso, aguarde nosso contato!!"); </script>';
 } 
 else{ 
    echo '<script>alert("Ocorreu um erro!!"); </script>'; } 
 //====================================================
} 
?>


    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">PLANO 2 - COM FIDELIDADE</h4>
          </div>

          <div class="modal-body">
<!-- talvez se especificar a form... -->
 Após o envio do formulário nossa equipe entrará em contato com você em até 24 horas para solicitar informações adicionais e formalizar a inicialização de seu novo aplicativo.
            <form action="<? $PHP_SELF; ?>" method="POST">

              <div class="form-group">
                <label for="recipient-nome" class="control-label">Seu nome:</label>
                <input type="text" size="30" name="nome3" type="text" class="form-control">

              </div>

            <div class="form-group">

                <label for="recipient-nome" class="control-label">Email de contato:</label>
                <input name="email3" type="text" class="form-control" >

              </div>


            <div class="form-group">

                <label for="recipient-nome" class="control-label">Telefone:</label>
         <input type="text" size="35" id="phone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="telefone3" placeholder="Telefone com DDD" type="text" class="form-control" >

              </div>


              <div class="form-group">

                <label for="recipient-nome" class="control-label">Nome do seu negócio:</label>
                <input name="mensagem3" type="text" class="form-control" >

              </div>


              <div class="form-group">

                <label for="recipient-nome" class="control-label">Cidade em que reside:</label>
                <input name="cidade3" type="text" class="form-control" >

              </div>


<br>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="BTEnvia3" class="btn btn-primary">Enviar</button>


              </div>

            </form>
          </div>
        </div>
      </div>
    </div>


<!--                       -->
            </div>
          </div>

          <div class="col-md-6">
            <div class="plan-wrapper warning" style="margin-right: 0;height:980px;">
              <div class="plans-title">
                <span class="plans-price price">PLANO 2 <p> FIDELIDADE DE 12 MESES</span>
              </div><!-- .plans-title -->
              <div class="plans-price">
                <span class="price">
                  R$200
                </span>
                <span class="per">
                  por mês
                </span>
              </div><!-- .plans-price -->
              <div class="plans-links">
               <!-- <ul> -->   <hr>
               <b>   <li><a >▪ SETUP INICIAL: <b class="plans-price price" style="font-size:26px;"> ISENTO</b> <p> 
                <hr>
Configuração inicial do APP + Publicação na APP Store e Play Store)
</a></li>   <hr>
  <li><a >▪ Mensalidade fixa no valor de R$200,00 <p> - Independente do Faturamento.</a></li> </b>
   <hr>

               <!-- </ul> -->
              </div><!-- .plans-links -->
              <div class="plans-subscribe" style="margin-top:220px;">
                <a  data-toggle="modal" data-target="#exampleModal3"class="btn">Quero Este!</a>
              </div><!-- .plans-subscribe -->
            </div>
          </div>


        </div>
      </div>
      </div>
    </div>
  </div><!-- .container no_icons -->
<br>
<hr>
        <h2 id="tab-other2" style="color:black;">Entre em contato conosco!</h2>


  <form action="<? $PHP_SELF; ?>" method="POST">
  <input type="text" size="30" name="nome" class="default-input half" placeholder="Nome" />
  <input type="email" size="30" name="email" class="default-input half float-right" placeholder="Endereço de E-mail"/>
  <input  type="text" size="35" id="phone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="telefone" class="default-input" placeholder="Telefone com DDD" />
 <!-- <select class="default-input option-menu">
    <option value="option-1">Plano 1</option>
    <option value="option-2">Plano 2</option>
    <option value="option-3">Plano 3</option>
  
  </select> -->
  <textarea type="text" size="35" name="mensagem" placeholder="Motivo do contato?" class="default-input"></textarea>
  <input class="btnew blue float-right" type="submit" name="BTEnvia" value="Enviar">
    <input class="btnew blue float-left" style="background-color:red;" type="reset" name="BTApaga" value="Apagar">
</form>


<br><br> <br> <br>


</body>

</html>


        <style>
.plan-wrappere {
  width:97%;
  height:370px;
}
          .plan-wrappere:hover,
.no_brdr .plan-wrappere:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}

.plan-wrapperew {
  width:97%;
  height:370px;
}
          .plan-wrapperew:hover,
.no_brdr .plan-wrapperew:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}


.plan-wrappere:hover .plans-subscribe a,
.plan-wrappere.default:hover .plans-subscribe a,
.plan-wrappere.warning:hover .plans-subscribe a,
.plan-wrappere.info:hover .plans-subscribe a,
.plan-wrappere.error:hover .plans-subscribe a {
  border: 2px solid transparent;
  color: #fff;
}

</style>
<style> 
/*=============================
* Slice by Joe Richardson
* V1
* Licensed under MIT
=============================*/



form {
  width: 90%;
  max-width: 700px;
  margin: 50px auto;
}

/* Clearfix */
.cf:after {
  content: "";
  display: table;
  clear: both;
}

input,
textarea {
  -webkit-appearance: none;
  -moz-appearance: none;
  border-radius: 0;
}

textarea {
  resize: none;
  max-width: 100%;
  height: 150px;
}

/* Reset for Input elements */
label,
select,
button,
input[type="submit"],
input[type="radio"],
input[type="checkbox"],
input[type="button"] {
  position: relative;
  cursor: pointer;
  border: 0;
  outline: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}

input:focus,
textarea:focus {
  outline: none;
}

/* Default Inputs */
.default-input {
  padding: 0.8em;
  border: 2px solid #ccc;
  font-size: 1em;
  width: 100%;
  color: #999;
  margin-bottom: 15px;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
}

.default-input:focus {
  border: 2px solid #999;
}

/* Rounded Inputs */
.rounded {
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
  overflow: hidden;
}

/* Placeholder */
.default-input::-webkit-input-placeholder {
  color: #ccc;
}

.default-input:-moz-placeholder {
  color: #ccc;
}

.default-input::-moz-placeholder {
  color: #ccc;
}

.default-input:-ms-input-placeholder {
  color: #ccc;
}

/* Label with Icons */
.label-icon {
  color: rgba(0, 0, 0, 0.6);
  position: absolute;
  bottom: -15px;
  display: block;
  font-size: 1.5em;
  padding: 8px 15px;
}

.label-input {
  padding-left: 60px;
}

/* Option Menu / Select Menu */
.option-menu {
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEYAAAAlCAYAAAD/Tp9wAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAdBJREFUeNrs2L1WwjAUAOCkeQEegbUbbo6wOZpHYHRk9BHcHB0Z3aqjk4xudHSEN8A38F4Nh2hPm7T5T3vPKQTapJfvpG24lHO+J4QsyBRy1AW8rLAxWVxQ0IRiC2bNDN7ep5nzi1JV1Ymev5lwLij4gcp7BA7ec+YjQznAdnVGwSjkvWIHh+00IpSf3yyjNGaMNHMW4rKajQAFL5/Gw4e29RgBTitKJ0zmOJ0ojXvM/xAd1xnOlnUXCgZTjfAJUZblEZq3GaE8qw5iOiOBTZ0JDqJsdQ5kuiNmgKON0gtGwvmC5k1iKBtAeerTgfU9A+B8AM48ob8OW0C579uJDTkT4LwmgoMog56qbOgZE8AZjGIEEzmOEYpy5asbsELG1fEyEpQdoKxMByksJcNJHFXAWuRiHNRWRhEUuv4UmqKBCYxjFcU6TCAc6yhOYDyXK5Tlg6hgPOE4Q3EK4xjHKYpzGEc4zlG8wAicpcCxEYiyc50z8wEDfx0Olmo5WFN58ZGzFxiBY1ro6lVoSgbGEMcrineYgTjeUYLASDj4lLpWHPoIKA8hcgwCI3DeFLUcrKnchcovGIzAaSt0GReakoZpwQmOElXAIrDCLZZ8vgUYANCa63k2/DsoAAAAAElFTkSuQmCC")
    no-repeat;
  background-size: 15px;
  background-position: right 20px top 20px;
  text-indent: 0.01px;
  text-overflow: "";
}

/* Buttons */


/* Main Colours */
.blue {
  background: #40b3df;
}
.green {
  background: #1abc9c;
}
.red {
  background: #c0392b;
}
.orange {
  background: #e67e22;
}
.yellow {
  background: #f1c40f;
}
.purple {
  background: #8e44ad;
}
.dark {
  background: #2c3e50;
}

.btn:hover {
  background: #ddd;
}
.blue:hover {
  background: #2980b9;
}
.green:hover {
  background: #16a085;
}
.red:hover {
  background: #e74c3c;
}
.orange:hover {
  background: #d35400;
}
.yellow:hover {
  background: #f39c12;
}
.purple:hover {
  background: #9b59b6;
}
.dark:hover {
  background: #34495e;
}

.btn-icon {
  font-size: 1em;
  padding: 10px 15px;
  letter-spacing: 0;
  text-transform: none;
}

/* Legend */
fieldset {
  padding: 20px;
  border: 1px solid rgba(0, 0, 0, 0.1);
}

legend {
  margin: 0 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 0.7em;
  font-weight: bold;
}

/* Radio Button */
input[type="radio"] {
  width: 32px;
  height: 32px;
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
}

input[type="radio"]:checked:after {
  position: absolute;
  content: "";
  background: #fff;
  width: 50%;
  height: 50%;
  top: 25%;
  left: 25%;
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
}

/* Checkbox */
input[type="checkbox"] {
  width: 32px;
  height: 32px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

input[type="checkbox"]:checked:after {
  position: absolute;
  color: #fff;
  content: "\f00c";
  font-family: FontAwesome;
  font-size: 1.45em;
  width: 50%;
  height: 50%;
  top: 25%;
  left: 25%;
}

.btnew {
  border: 0;
  padding: 10px;
  color: #fff;

  text-transform: uppercase;
  letter-spacing: 1px;
  font-size: 1.2em;
  margin-bottom: 3px;
}

/* Shortcuts / Helpers */
.half {
  width: 48.7%;
}

.full {
  width: 100%;
}

.float-left {
  float: left;
}

.float-right {
  float: right;
}

.padding-big {
  padding: 10px;
}

.padding-bigger {
  padding: 20px;
}

.rounded {
  border-radius: 6px;
}

.full-rounded {
  border-radius: 100px;
}



</style>
 <br> <br>

 <?php
if (isset($_POST['BTEnvia'])) {
 
 //Variaveis de POST, Alterar somente se necessário 
 //====================================================
 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $telefone = $_POST['telefone']; 
 $mensagem = $_POST['mensagem'];
 //====================================================
 
 //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 //==================================================== 
 $email_remetente = "sistema.atalos@topentregas.com.br"; // deve ser uma conta de email do seu dominio 
 //====================================================
 
 //Configurações do email, ajustar conforme necessidade
 //==================================================== 
 $email_destinatario = "sistema.atalos@hotmail.com"; // pode ser qualquer email que receberá as mensagens
 $email_reply = "$email"; 
 $email_assunto = "Contato formmail"; // Este será o assunto da mensagem
 //====================================================
 
 //Monta o Corpo da Mensagem
 //====================================================
 $email_conteudo = "Nome = $nome \n"; 
 $email_conteudo .= "Email = $email \n";
 $email_conteudo .= "Telefone = $telefone \n"; 
 $email_conteudo .= "Mensagem = $mensagem \n"; 
 //====================================================
 
 //Seta os Headers (Alterar somente caso necessario) 
 //==================================================== 
 $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 //====================================================
 
 //Enviando o email 
 //==================================================== 
 if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
  echo '<script>alert("Dados enviados com sucesso!!"); </script>';
 } 
 else{ 
    echo '<script>alert("Ocorreu um erro!!"); </script>'; } 
 //====================================================
} 
?>
 


<script>
  //javascript que não permite o reenvio de formulario ao dar f5
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }


/* Máscaras ER */
function mask(o, f) {
  setTimeout(function() {
    var v = mphone(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function mphone(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}

</script>




  
<script>
class StickyNavigation {
  
  constructor() {
    this.currentId = null;
    this.currentTab = null;
    this.tabContainerHeight = 70;
    let self = this;
    $('.et-hero-tab').click(function() { 
      self.onTabClick(event, $(this)); 
    });
    $(window).scroll(() => { this.onScroll(); });
    $(window).resize(() => { this.onResize(); });
  }
  
  onTabClick(event, element) {
    event.preventDefault();
    let scrollTop = $(element.attr('href')).offset().top - this.tabContainerHeight + 1;
    $('html, body').animate({ scrollTop: scrollTop }, 600);
  }
  
  onScroll() {
    this.checkTabContainerPosition();
    this.findCurrentTabSelector();
  }
  
  onResize() {
    if(this.currentId) {
      this.setSliderCss();
    }
  }
  
  checkTabContainerPosition() {
    let offset = $('.et-hero-tabs').offset().top + $('.et-hero-tabs').height() - this.tabContainerHeight;
    if($(window).scrollTop() > offset) {
      $('.et-hero-tabs-container').addClass('et-hero-tabs-container--top');
    } 
    else {
      $('.et-hero-tabs-container').removeClass('et-hero-tabs-container--top');
    }
  }
  
  findCurrentTabSelector(element) {
    let newCurrentId;
    let newCurrentTab;
    let self = this;
    $('.et-hero-tab').each(function() {
      let id = $(this).attr('href');
      let offsetTop = $(id).offset().top - self.tabContainerHeight;
      let offsetBottom = $(id).offset().top + $(id).height() - self.tabContainerHeight;
      if($(window).scrollTop() > offsetTop && $(window).scrollTop() < offsetBottom) {
        newCurrentId = id;
        newCurrentTab = $(this);
      }
    });
    if(this.currentId != newCurrentId || this.currentId === null) {
      this.currentId = newCurrentId;
      this.currentTab = newCurrentTab;
      this.setSliderCss();
    }
  }
  
  setSliderCss() {
    let width = 0;
    let left = 0;
    if(this.currentTab) {
      width = this.currentTab.css('width');
      left = this.currentTab.offset().left;
    }
    $('.et-hero-tab-slider').css('width', width);
    $('.et-hero-tab-slider').css('left', left);
  }
  
}

new StickyNavigation();

</script>
<style>

body {
  font-family: "Century Gothic", "Lato", sans-serif;
}

a {
  text-decoration: none;
}

.et-hero-tabs,
.et-slide {
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
          flex-direction: column;
  -webkit-box-pack: center;
          justify-content: center;
  -webkit-box-align: center;
          align-items: center;
  width:120vh !important;
  position: relative;
  background: #eee;
  text-align: center;
  padding: 0 2em;
}
.et-hero-tabs h1,
.et-slide h1 {
  font-size: 2rem;
  margin: 0;
  letter-spacing: 1rem;
}
.et-hero-tabs h3,
.et-slide h3 {
  font-size: 1rem;
  letter-spacing: 0.3rem;
  opacity: 0.6;
}

.et-hero-tabs-container {
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
          flex-direction: row;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 70px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  background: #fff;
  z-index: 10;
}
.et-hero-tabs-container--top {
  position: fixed;
  top: 0;
}

.et-hero-tab {
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: center;
          justify-content: center;
  -webkit-box-align: center;
          align-items: center;
  -webkit-box-flex: 1;
          flex: 1;
  color: #000;
  letter-spacing: 0.1rem;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  font-size: 0.8rem;
}
.et-hero-tab:hover {
  color: white;
  background: rgba(102, 177, 241, 0.8);
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

.et-hero-tab-slider {
  position: absolute;
  bottom: 0;
  width: 0;
  height: 6px;
  background: #66b1f1;
  -webkit-transition: left 0.3s ease;
  transition: left 0.3s ease;
}

@media (min-width: 800px) {
  .et-hero-tabs h1,
  .et-slide h1 {
    font-size: 3rem;
  }
  .et-hero-tabs h3,
  .et-slide h3 {
    font-size: 1rem;
  }

  .et-hero-tab {
    font-size: 1rem;
  }
}

/*
html {
  box-sizing: border-box;
}

body {
  font-family: 'Ubuntu', sans-serif;
} */

*:hover, 
*:active. 
*:focus {
  text-decoration: none!important;
  outline: none!important;
}

.section-tittle {
  text-align: center;
}


.plan-wrapper {
  text-align: center;
  margin-right: 26px;
    border: 1px solid #e5e5e5;
    border-radius: 6px;
    box-shadow: 0 0px 0px rgba(0,0,0,0.25), 0 0px 6px rgba(0,0,0,0.22);
    transition: all .3s ease-in-out;
    background-color: #fff;
      padding-top: 44px;
}

.plan-wrapper:hover,
.no_brdr .plan-wrapper:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}


.plans-logo {
  border-radius: 50%;
  height: 100px;
  width: 100px;
  margin: 0 auto;
  position: relative;
  font-size: 50px;
  
  /*margin-bottom: 14px;
  margin-top: 44px;*/
}


.plans-logo img,
.plans-logo svg  {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  fill: #f77750;
}

.plans-logo.no_bckgrnd {
  background: transparent !important;
  border: 2px solid #f9f9f9;
}

.default .plans-logo {
  background: #f9f9f9;
}


.warning .plans-logo {
  background: linear-gradient(45deg,rgb(240,173,78),rgb(255,220,76));
}


.info .plans-logo {
  background: linear-gradient(45deg,rgb(61,130,168),rgb(14,232,207));
}


.error .plans-logo {
  background: linear-gradient(45deg,rgb(179,64,76),rgb(255,85,66));
}


svg.default {
  fill: #989898;
}

svg.white {
  fill: #fff;
}

svg.warning {
  fill: #f0ad4e;
}

svg.info {
  fill: #5bc0de;
}

svg.error {
  fill: #e74c3c;
}


.plans-title {
  text-transform: uppercase;
   /* margin-bottom: 30px;
    margin-top: 18px;*/
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 3.1px;
      padding-bottom: 30px;
      padding-top: 18px;
}

.default .plans-title,
.default .plans-subscribe a {
  color: #989898;
}

.warning .plans-title,
.warning .plans-subscribe a,
.no_icons .warning .plans-price {
  color: #f0ad4e;
}

.info .plans-title,
.info .plans-subscribe a,
.no_icons .info .plans-price {
  color: #5bc0de;
}

.error .plans-title,
.error .plans-subscribe a,
.no_icons .error .plans-price {
  color: #e74c3c;
}

.plans-links ul {
  padding: 0;
  margin: 0;
  padding-top: 8px;
  padding-bottom: 31px;

}
.plans-links ul li {
  list-style-type: none;
}
.plans-links ul li:not(:last-child) {
  margin-bottom: 16px;
}
.plans-links ul li:last-child {
  padding-bottom: 24px;
  border-bottom: 1px solid #e5e5e5;
}
.plans-links a {
  font-size: 14px;
  color: #555;
  text-decoration: none;
}

.wrapper-plans .col-md-3 {
  padding: 0;
}



.plans-price {
  font-weight: bold;
  font-size: 20px;
}

.plans-subscribe {
  padding-bottom: 35px;
    padding-top: 13px;
}

.plans-subscribe a {
  padding: 4px 33px;
    border: 2px solid;
    border-radius: 15px;
    border-color: #e5e5e5;
    color: #989898;
}

.default .plans-subscribe a {
  border-color: #e5e5e5;
}

.warning .plans-subscribe a {
  border-color: #f0ad4e;
}

.info .plans-subscribe a {
  border-color: #5bc0de;
}

.error .plans-subscribe a {
  border-color: #e74c3c;
}
.plan-wrapper:hover .plans-subscribe a,
.plan-wrapper.default:hover .plans-subscribe a,
.plan-wrapper.warning:hover .plans-subscribe a,
.plan-wrapper.info:hover .plans-subscribe a,
.plan-wrapper.error:hover .plans-subscribe a {
  border: 2px solid transparent;
  color: #fff;
}

.plan-wrapper:hover .plans-subscribe a {
  background: #f77750
}
.no_icons .plan-wrapper:hover .plans-price {
  color: #f77750;
}
.plan-wrapper.default:hover .plans-subscribe a {
  background: #989898;
}
.plan-wrapper.warning:hover .plans-subscribe a {
  background: linear-gradient(45deg,rgb(240,173,78),rgb(255,220,76));
}
.plan-wrapper.info:hover .plans-subscribe a {
  background: linear-gradient(45deg,rgb(61,130,168),rgb(14,232,207));
}
.plan-wrapper.error:hover .plans-subscribe a {
  background: linear-gradient(45deg,rgb(179,64,76),rgb(255,85,66));
}

.wrapper-page {
  background: url(background-img.jpg) no-repeat;
  background-size: cover;
  position: relative;
}

.wrapper-page:after {
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  content: '';
  background: linear-gradient(45deg,rgb(48,35,174),rgb(151,83,163));
  opacity: .95;
  width: 100%;
  height: 100%;
}

.transparent .plan-wrapper {
  background-color: rgba(255, 255, 255, 0.1);
  color: #fff;
  position: relative;
  z-index: 1;
  border-color: transparent;
  box-shadow: none;
}

.transparent .plan-wrapper:hover {
  background-color: rgba(255, 255, 255, 0.2);
}

.transparent .plans-logo {
  border: 2px solid;
  border-color: rgba(255, 255, 255, 0.1);
  transition: all .3s ease-in-out;  
}

.transparent .plan-wrapper:hover .plans-logo {
  border-color: #fff;
}

.transparent .plans-links ul li:last-child {
  border-bottom-color: rgba(255, 255, 255, 0.1);
}

.transparent .plans-links a {
  color: #fff;
}

.transparent .plans-subscribe a {
  border-color: rgba(255, 255, 255, 0.1);
  color: #fff;
}

.transparent .plan-wrapper:hover .plans-subscribe a {
    background: #fff;
    color: #000;
}


.no_icons .plans-title {
  padding-top: 30px;
}

.no_icons .plans-price span {
  display: block;
}

.no_icons .plans-price .price {
  font-size: 58px;
  font-weight: 100;
}

.no_icons .plans-price .per {
  font-size: 14px;
}

.no_icons .plans-links ul {
  /*margin-top: 41px;*/
    padding-top: 44px;
}

.no_icons .plans-links ul li {
  padding-bottom: 4px;
}

.no_icons .plans-links ul li:last-child {
  border-bottom: 0;
}

.no_icons .plans-links a {
  font-size: 17px;
  word-spacing: -3px;
}

.no_icons .plans-subscribe {
  padding-bottom: 52px;
}

.no_icons .plans-subscribe a {
  font-size: 16px;
  padding-top: 12px;
  padding-bottom: 12px;
    border-radius: 25px;
}

.no_brdr .plan-wrapper {
  border: 0;
  box-shadow: none;
}

.plan-wrapper.little {
  padding-top: 100px;
}

.little .plans-title {
  padding-top: 30px;
    padding-bottom: 19px;
}

.little .plans-title span {
  font-size: 16px;
}

.little .plans-description span {
  padding-right: 39px;
  padding-left: 39px;
  display: block;
}

@media screen and (max-width: 991px) {
  .plan-wrapper {
    margin-left: 26px;
  }
  .no_icons .plan-wrapper,
  .no_brdr .plan-wrapper {
    margin: 0px;
  }
}

@media screen and (max-width: 767px) {
  .plan-wrapper {
    margin-left: 10%;
    margin-right: 10%;
  }
}





* {
  transition: all 300ms ease-in-out;
}

/*! Devices.css v0.1.16 | MIT License | github.com/picturepan2/devices.css */
.device,
.device *,
.device ::after,
.device ::before,
.device::after,
.device::before {
  box-sizing: border-box;
  display: block;
}
.device {
  position: relative;
  transform: scale(1);
  z-index: 1;
}
.device .device-frame {
  z-index: 1;
}
.device .device-content {
  background-color: #fff;
  background-position: center center;
  background-size: cover;
  object-fit: cover;
  position: relative;
}
.device-iphone-x {
  height: 868px;
  width: 428px;
}
.device-iphone-x .device-frame {
  background: #222;
  border-radius: 68px;
  box-shadow: inset 0 0 2px 2px #c8cacb, inset 0 0 0 7px #e2e3e4;
  height: 868px;
  padding: 28px;
  width: 428px;
}
.device-iphone-x .device-content {
  border-radius: 40px;
  height: 812px;
  width: 375px;
}
.device-iphone-x .device-stripe::after,
.device-iphone-x .device-stripe::before {
  border: solid rgba(51, 51, 51, 0.25);
  border-width: 0 7px;
  content: "";
  height: 7px;
  left: 0;
  position: absolute;
  width: 100%;
  z-index: 9;
}
.device-iphone-x .device-stripe::after {
  top: 85px;
}
.device-iphone-x .device-stripe::before {
  bottom: 85px;
}
.device-iphone-x .device-header {
  background: #222;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  height: 30px;
  left: 50%;
  margin-left: -102px;
  position: absolute;
  top: 28px;
  width: 204px;
}
.device-iphone-x .device-header::after,
.device-iphone-x .device-header::before {
  content: "";
  height: 10px;
  position: absolute;
  top: 0;
  width: 10px;
}
.device-iphone-x .device-header::after {
  background: radial-gradient(
    circle at bottom left,
    transparent 0,
    transparent 75%,
    #222 75%,
    #222 100%
  );
  left: -10px;
}
.device-iphone-x .device-header::before {
  background: radial-gradient(
    circle at bottom right,
    transparent 0,
    transparent 75%,
    #222 75%,
    #222 100%
  );
  right: -10px;
}
.device-iphone-x .device-sensors::after,
.device-iphone-x .device-sensors::before {
  content: "";
  position: absolute;
}
.device-iphone-x .device-sensors::after {
  background: #444;
  border-radius: 3px;
  height: 6px;
  left: 50%;
  margin-left: -25px;
  top: 32px;
  width: 50px;
}
.device-iphone-x .device-sensors::before {
  background: #444;
  border-radius: 50%;
  height: 14px;
  left: 50%;
  margin-left: 40px;
  top: 28px;
  width: 14px;
}
.device-iphone-x .device-btns {
  background: #c8cacb;
  height: 32px;
  left: -3px;
  position: absolute;
  top: 115px;
  width: 3px;
}
.device-iphone-x .device-btns::after,
.device-iphone-x .device-btns::before {
  background: #c8cacb;
  content: "";
  height: 62px;
  left: 0;
  position: absolute;
  width: 3px;
}
.device-iphone-x .device-btns::after {
  top: 60px;
}
.device-iphone-x .device-btns::before {
  top: 140px;
}
.device-iphone-x .device-power {
  background: #c8cacb;
  height: 100px;
  position: absolute;
  right: -3px;
  top: 200px;
  width: 3px;
}
.device-iphone-8 {
  height: 871px;
  width: 419px;
}
.device-iphone-8 .device-frame {
  background: #fff;
  border-radius: 68px;
  box-shadow: inset 0 0 0 2px #c8cacb, inset 0 0 0 7px #e2e3e4;
  height: 871px;
  padding: 102px 22px;
  width: 419px;
}
.device-iphone-8 .device-content {
  border: 2px solid #222;
  border-radius: 4px;
  height: 667px;
  width: 375px;
}
.device-iphone-8 .device-stripe::after,
.device-iphone-8 .device-stripe::before {
  border: solid rgba(51, 51, 51, 0.15);
  border-width: 0 7px;
  content: "";
  height: 6px;
  left: 0;
  position: absolute;
  width: 100%;
  z-index: 9;
}
.device-iphone-8 .device-stripe::after {
  top: 68px;
}
.device-iphone-8 .device-stripe::before {
  bottom: 68px;
}
.device-iphone-8 .device-header {
  border: 2px solid #c8cacb;
  border-radius: 50%;
  bottom: 25px;
  height: 58px;
  left: 50%;
  margin-left: -29px;
  position: absolute;
  width: 58px;
}
.device-iphone-8 .device-sensors {
  background: #666;
  border-radius: 3px;
  height: 6px;
  left: 50%;
  margin-left: -38px;
  position: absolute;
  top: 52px;
  width: 76px;
}
.device-iphone-8 .device-sensors::after,
.device-iphone-8 .device-sensors::before {
  background: #666;
  border-radius: 50%;
  content: "";
  position: absolute;
}
.device-iphone-8 .device-sensors::after {
  height: 10px;
  left: 50%;
  margin-left: -5px;
  top: -25px;
  width: 10px;
}
.device-iphone-8 .device-sensors::before {
  height: 12px;
  left: -42px;
  margin-top: -6px;
  top: 50%;
  width: 12px;
}
.device-iphone-8 .device-btns {
  background: #c8cacb;
  height: 30px;
  left: -3px;
  position: absolute;
  top: 102px;
  width: 3px;
}
.device-iphone-8 .device-btns::after,
.device-iphone-8 .device-btns::before {
  background: #c8cacb;
  content: "";
  height: 56px;
  left: 0;
  position: absolute;
  width: 3px;
}
.device-iphone-8 .device-btns::after {
  top: 62px;
}
.device-iphone-8 .device-btns::before {
  top: 132px;
}
.device-iphone-8 .device-power {
  background: #c8cacb;
  height: 80px;
  position: absolute;
  right: -2px;
  top: 160px;
  width: 3px;
}
.device-iphone-8.device-gold .device-frame {
  box-shadow: inset 0 0 0 2px #e4b08a, inset 0 0 0 7px #f7e8dd;
}
.device-iphone-8.device-gold .device-header {
  border-color: #e4b08a;
}
.device-iphone-8.device-gold .device-btns,
.device-iphone-8.device-gold .device-btns::after,
.device-iphone-8.device-gold .device-btns::before {
  background: #e4b08a;
}
.device-iphone-8.device-gold .device-power {
  background: #e4b08a;
}
.device-iphone-8.device-spacegray .device-frame {
  background: #222;
  box-shadow: inset 0 0 0 2px #74747a, inset 0 0 0 7px #9b9ba0;
}
.device-iphone-8.device-spacegray .device-stripe::after,
.device-iphone-8.device-spacegray .device-stripe::before {
  border-color: rgba(204, 204, 204, 0.35);
}
.device-iphone-8.device-spacegray .device-btns,
.device-iphone-8.device-spacegray .device-btns::after,
.device-iphone-8.device-spacegray .device-btns::before {
  background: #74747a;
}
.device-google-pixel-2-xl {
  height: 832px;
  width: 404px;
}
.device-google-pixel-2-xl .device-frame {
  background: #121212;
  border-radius: 36px;
  box-shadow: inset 0 0 0 2px #cfcfcf, inset 0 0 0 7px #9c9c9c;
  height: 832px;
  padding: 56px 22px;
  width: 404px;
}
.device-google-pixel-2-xl .device-content {
  border-radius: 27px;
  height: 720px;
  width: 360px;
}
.device-google-pixel-2-xl .device-header {
  height: 832px;
  left: 50%;
  margin-left: -150px;
  position: absolute;
  top: 0;
  width: 300px;
}
.device-google-pixel-2-xl .device-header::after,
.device-google-pixel-2-xl .device-header::before {
  background: #333;
  border-radius: 3px;
  content: "";
  height: 6px;
  left: 50%;
  margin-left: -73px;
  margin-top: -3px;
  position: absolute;
  width: 146px;
}
.device-google-pixel-2-xl .device-header::after {
  top: 24px;
}
.device-google-pixel-2-xl .device-header::before {
  bottom: 28px;
}
.device-google-pixel-2-xl .device-sensors {
  background: #333;
  border-radius: 7px;
  height: 14px;
  left: 54px;
  margin-top: -7px;
  position: absolute;
  top: 36px;
  width: 14px;
}
.device-google-pixel-2-xl .device-btns {
  background: #cfcfcf;
  height: 102px;
  position: absolute;
  right: -3px;
  top: 306px;
  width: 3px;
}
.device-google-pixel-2-xl .device-power {
  background: #cfcfcf;
  height: 58px;
  position: absolute;
  right: -3px;
  top: 194px;
  width: 3px;
}
.device-google-pixel {
  height: 744px;
  width: 360px;
}
.device-google-pixel .device-frame {
  background: #f7f7f8;
  border-radius: 54px;
  box-shadow: inset 0 0 0 2px #c8cacb, inset 0 0 0 6px #e2e3e4,
    inset 0 0 0 10px #fff;
  height: 744px;
  padding: 82px 18px 86px 18px;
  width: 360px;
}
.device-google-pixel .device-content {
  border: 2px solid #222;
  border-radius: 2px;
  height: 576px;
  width: 324px;
}
.device-google-pixel .device-stripe {
  border-top: 6px solid rgba(51, 51, 51, 0.15);
  bottom: 0;
  left: 254px;
  position: absolute;
  top: 0;
  width: 8px;
}
.device-google-pixel .device-stripe::after,
.device-google-pixel .device-stripe::before {
  border: solid rgba(51, 51, 51, 0.15);
  border-width: 0 6px;
  content: "";
  height: 10px;
  left: -254px;
  position: absolute;
  width: 360px;
  z-index: 9;
}
.device-google-pixel .device-stripe::after {
  top: 60px;
}
.device-google-pixel .device-stripe::before {
  bottom: 46px;
}
.device-google-pixel .device-sensors {
  background: #ddd;
  border-radius: 2.5px;
  height: 5px;
  left: 50%;
  margin-left: -39px;
  margin-top: -2.5px;
  position: absolute;
  top: 41px;
  width: 78px;
}
.device-google-pixel .device-sensors::after,
.device-google-pixel .device-sensors::before {
  background: #333;
  border-radius: 6px;
  content: "";
  position: absolute;
}
.device-google-pixel .device-sensors::after {
  height: 12px;
  left: 50%;
  margin-left: -14px;
  top: 21.5px;
  width: 28px;
}
.device-google-pixel .device-sensors::before {
  height: 10px;
  left: -81px;
  margin-top: -5px;
  top: 50%;
  width: 10px;
}
.device-google-pixel .device-btns {
  background: #c8cacb;
  height: 102px;
  position: absolute;
  right: -2px;
  top: 298px;
  width: 3px;
}
.device-google-pixel .device-power {
  background: #c8cacb;
  height: 50px;
  position: absolute;
  right: -2px;
  top: 184px;
  width: 3px;
}
.device-google-pixel.device-black .device-frame {
  background: #211d1c;
  box-shadow: inset 0 0 0 2px #363635, inset 0 0 0 6px #6a6967,
    inset 0 0 0 10px #3d3533;
}
.device-google-pixel.device-black .device-stripe,
.device-google-pixel.device-black .device-stripe::after,
.device-google-pixel.device-black .device-stripe::before {
  border-color: rgba(13, 13, 13, 0.35);
}
.device-google-pixel.device-black .device-sensors {
  background: #444;
}
.device-google-pixel.device-black .device-sensors::after {
  background: #0d0d0d;
}
.device-google-pixel.device-black .device-btns,
.device-google-pixel.device-black .device-btns::after,
.device-google-pixel.device-black .device-btns::before {
  background: #363635;
}
.device-google-pixel.device-black .device-power {
  background: #363635;
}
.device-google-pixel.device-blue .device-frame {
  box-shadow: inset 0 0 0 2px #2a5aff, inset 0 0 0 6px #7695ff,
    inset 0 0 0 10px #fff;
}
.device-google-pixel.device-blue .device-btns,
.device-google-pixel.device-blue .device-btns::after,
.device-google-pixel.device-blue .device-btns::before {
  background: #2a5aff;
}
.device-google-pixel.device-blue .device-power {
  background: #2a5aff;
}
.device-galaxy-s8 {
  height: 828px;
  width: 380px;
}
.device-galaxy-s8 .device-frame {
  background: #222;
  border: solid #cfcfcf;
  border-radius: 55px;
  border-width: 5px 0;
  box-shadow: inset 0 0 0 2px #9c9c9c;
  height: 828px;
  padding: 48px 10px 40px 10px;
  width: 380px;
}
.device-galaxy-s8 .device-content {
  border: 2px solid #222;
  border-radius: 34px;
  height: 740px;
  width: 360px;
}
.device-galaxy-s8 .device-stripe::after,
.device-galaxy-s8 .device-stripe::before {
  border: solid rgba(51, 51, 51, 0.15);
  border-width: 5px 0;
  content: "";
  height: 828px;
  position: absolute;
  top: 0;
  width: 6px;
  z-index: 9;
}
.device-galaxy-s8 .device-stripe::after {
  left: 48px;
}
.device-galaxy-s8 .device-stripe::before {
  right: 48px;
}
.device-galaxy-s8 .device-sensors {
  background: #666;
  border-radius: 3px;
  height: 6px;
  left: 50%;
  margin-left: -24px;
  margin-top: -3px;
  position: absolute;
  top: 32px;
  width: 48px;
}
.device-galaxy-s8 .device-sensors::after,
.device-galaxy-s8 .device-sensors::before {
  background: #666;
  border-radius: 50%;
  content: "";
  position: absolute;
  top: 50%;
}
.device-galaxy-s8 .device-sensors::after {
  box-shadow: -192px 0 #333, -174px 0 #333, -240px 0 #333;
  height: 8px;
  margin-top: -4px;
  right: -90px;
  width: 8px;
}
.device-galaxy-s8 .device-sensors::before {
  box-shadow: 186px 0 #666;
  height: 12px;
  left: -90px;
  margin-top: -6px;
  width: 12px;
}
.device-galaxy-s8 .device-btns {
  background: #9c9c9c;
  border-radius: 3px 0 0 3px;
  height: 116px;
  left: -3px;
  position: absolute;
  top: 144px;
  width: 3px;
}
.device-galaxy-s8 .device-btns::after {
  background: #9c9c9c;
  border-radius: 3px 0 0 3px;
  content: "";
  height: 54px;
  left: 0;
  position: absolute;
  top: 164px;
  width: 3px;
}
.device-galaxy-s8 .device-power {
  background: #9c9c9c;
  border-radius: 0 3px 3px 0;
  height: 54px;
  position: absolute;
  right: -3px;
  top: 260px;
  width: 3px;
}
.device-galaxy-s8.device-blue .device-frame {
  border-color: #a3c5e8;
  box-shadow: inset 0 0 0 2px #5192d4;
}
.device-galaxy-s8.device-blue .device-stripe::after,
.device-galaxy-s8.device-blue .device-stripe::before {
  border-color: rgba(255, 255, 255, 0.35);
}
.device-galaxy-s8.device-blue .device-btns,
.device-galaxy-s8.device-blue .device-btns::after {
  background: #5192d4;
}
.device-galaxy-s8.device-blue .device-power {
  background: #5192d4;
}
.device-ipad-pro {
  height: 804px;
  width: 560px;
}
.device-ipad-pro .device-frame {
  background: #fff;
  border-radius: 38px;
  box-shadow: inset 0 0 0 2px #c8cacb, inset 0 0 0 6px #e2e3e4;
  height: 804px;
  padding: 62px 25px;
  width: 560px;
}
.device-ipad-pro .device-content {
  border: 2px solid #222;
  border-radius: 2px;
  height: 680px;
  width: 510px;
}
.device-ipad-pro .device-header {
  border: 2px solid #c8cacb;
  border-radius: 50%;
  bottom: 17px;
  height: 34px;
  left: 50%;
  margin-left: -17px;
  position: absolute;
  width: 34px;
}
.device-ipad-pro .device-sensors {
  background: #666;
  border-radius: 50%;
  height: 10px;
  left: 50%;
  margin-left: -5px;
  margin-top: -5px;
  position: absolute;
  top: 34px;
  width: 10px;
}
.device-ipad-pro.device-gold .device-frame {
  box-shadow: inset 0 0 0 2px #e4b08a, inset 0 0 0 6px #f7e8dd;
}
.device-ipad-pro.device-gold .device-header {
  border-color: #e4b08a;
}
.device-ipad-pro.device-rosegold .device-frame {
  box-shadow: inset 0 0 0 2px #f6a69a, inset 0 0 0 6px #facfc9;
}
.device-ipad-pro.device-rosegold .device-header {
  border-color: #f6a69a;
}
.device-ipad-pro.device-spacegray .device-frame {
  background: #222;
  box-shadow: inset 0 0 0 2px #818187, inset 0 0 0 6px #9b9ba0;
}
.device-ipad-pro.device-spacegray .device-header {
  border-color: #818187;
}
.device-surface-pro {
  height: 394px;
  width: 561px;
}
.device-surface-pro .device-frame {
  background: #0d0d0d;
  border-radius: 10px;
  box-shadow: inset 0 0 0 2px #c8c8c8;
  height: 394px;
  margin: 0 auto;
  padding: 26px 24px;
  width: 561px;
}
.device-surface-pro .device-content {
  border: 2px solid #121212;
  border-radius: 2px;
  height: 342px;
  width: 513px;
}
.device-surface-pro .device-btns::after,
.device-surface-pro .device-btns::before {
  background: #c8c8c8;
  content: "";
  height: 2px;
  position: absolute;
  top: -2px;
}
.device-surface-pro .device-btns::after {
  left: 48px;
  width: 26px;
}
.device-surface-pro .device-btns::before {
  left: 94px;
  width: 48px;
}
.device-surface-pro .device-sensors {
  background: #333;
  border-radius: 50%;
  height: 6px;
  left: 50%;
  margin-left: -3px;
  margin-top: -3px;
  position: absolute;
  top: 14px;
  width: 6px;
}
.device-surface-book {
  height: 424px;
  width: 728px;
}
.device-surface-book .device-frame {
  background: #0d0d0d;
  border-radius: 12px;
  box-shadow: inset 0 0 0 2px #c8c8c8;
  height: 408px;
  margin: 0 auto;
  padding: 24px 22px;
  position: relative;
  width: 584px;
}
.device-surface-book .device-content {
  border: 2px solid #121212;
  border-radius: 2px;
  height: 360px;
  width: 540px;
}
.device-surface-book .device-btns::after,
.device-surface-book .device-btns::before {
  background: #c8c8c8;
  content: "";
  height: 2px;
  position: absolute;
  top: -2px;
}
.device-surface-book .device-btns::after {
  left: 122px;
  width: 20px;
}
.device-surface-book .device-btns::before {
  left: 168px;
  width: 44px;
}
.device-surface-book .device-power {
  background: linear-gradient(to bottom, #eee, #c8c8c8);
  border: solid #c8c8c8;
  border-radius: 2px;
  border-width: 0 2px;
  height: 12px;
  margin-top: 4px;
  position: relative;
  width: 728px;
}
.device-surface-book .device-power::after,
.device-surface-book .device-power::before {
  content: "";
  position: absolute;
}
.device-surface-book .device-power::after {
  background: radial-gradient(circle at center, #eee 0, #eee 95%, #a2a1a1 100%);
  border-radius: 0 0 6px 6px;
  height: 8px;
  left: 50%;
  margin-left: -125px;
  top: 0;
  width: 250px;
  z-index: 1;
}
.device-surface-book .device-power::before {
  background: linear-gradient(to bottom, #eee, #c8c8c8);
  border-radius: 2px 2px 0 0;
  bottom: 12px;
  height: 8px;
  left: 50%;
  margin-left: -292px;
  width: 584px;
}
.device-macbook-pro {
  height: 444px;
  width: 740px;
}
.device-macbook-pro .device-frame {
  background: #0d0d0d;
  border-radius: 20px;
  box-shadow: inset 0 0 0 2px #c8cacb;
  height: 428px;
  margin: 0 auto;
  padding: 29px 19px 39px 19px;
  position: relative;
  width: 614px;
}
.device-macbook-pro .device-frame::after {
  background: #272626;
  border-radius: 0 0 20px 20px;
  bottom: 2px;
  content: "";
  height: 26px;
  left: 2px;
  position: absolute;
  width: 610px;
}
.device-macbook-pro .device-frame::before {
  bottom: 10px;
  color: #c8cacb;
  content: "MacBook Pro";
  font-size: 12px;
  height: 16px;
  left: 50%;
  line-height: 16px;
  margin-left: -100px;
  position: absolute;
  text-align: center;
  width: 200px;
  z-index: 1;
}
.device-macbook-pro .device-content {
  border: 2px solid #121212;
  border-radius: 2px;
  height: 360px;
  width: 576px;
}
.device-macbook-pro .device-power {
  background: #e2e3e4;
  border: solid #d5d6d8;
  border-radius: 2px 2px 0 0;
  border-width: 2px 4px 0 4px;
  height: 14px;
  margin-top: -10px;
  position: relative;
  width: 740px;
  z-index: 9;
}
.device-macbook-pro .device-power::after,
.device-macbook-pro .device-power::before {
  content: "";
  position: absolute;
}
.device-macbook-pro .device-power::after {
  background: #d5d6d8;
  border-radius: 0 0 10px 10px;
  box-shadow: inset 0 0 4px 2px #babdbf;
  height: 10px;
  left: 50%;
  margin-left: -60px;
  top: -2px;
  width: 120px;
}
.device-macbook-pro .device-power::before {
  background: #a0a3a7;
  border-radius: 0 0 180px 180px/0 0 12px 12px;
  box-shadow: inset 0 -2px 6px 0 #474a4d;
  height: 12px;
  left: -4px;
  margin: 0 auto;
  top: 10px;
  width: 740px;
}
.device-macbook-pro.device-spacegray .device-frame {
  box-shadow: inset 0 0 0 2px #767a7d;
}
.device-macbook-pro.device-spacegray .device-power {
  background: #909496;
  border-color: #767a7d;
}
.device-macbook-pro.device-spacegray .device-power::after {
  background: #83878a;
  box-shadow: inset 0 0 4px 2px #6a6d70;
}
.device-macbook-pro.device-spacegray .device-power::before {
  background: #515456;
  box-shadow: inset 0 -2px 6px 0 #000;
}
.device-macbook {
  height: 432px;
  width: 740px;
}
.device-macbook .device-frame {
  background: #0d0d0d;
  border-radius: 20px;
  box-shadow: inset 0 0 0 2px #c8cacb;
  height: 428px;
  margin: 0 auto;
  padding: 29px 19px 39px 19px;
  position: relative;
  width: 614px;
}
.device-macbook .device-frame::after {
  background: #272626;
  border-radius: 0 0 20px 20px;
  bottom: 2px;
  content: "";
  height: 26px;
  left: 2px;
  position: absolute;
  width: 610px;
}
.device-macbook .device-frame::before {
  bottom: 10px;
  color: #c8cacb;
  content: "MacBook";
  font-size: 12px;
  height: 16px;
  left: 50%;
  line-height: 16px;
  margin-left: -100px;
  position: absolute;
  text-align: center;
  width: 200px;
  z-index: 1;
}
.device-macbook .device-content {
  border: 2px solid #121212;
  border-radius: 2px;
  height: 360px;
  width: 576px;
}
.device-macbook .device-power {
  background: #e2e3e4;
  border: solid #d5d6d8;
  border-radius: 2px 2px 0 0;
  border-width: 0 4px;
  height: 4px;
  margin-top: -10px;
  position: relative;
  width: 740px;
  z-index: 9;
}
.device-macbook .device-power::after,
.device-macbook .device-power::before {
  content: "";
  position: absolute;
}
.device-macbook .device-power::after {
  background: radial-gradient(
    circle at center,
    #e2e3e4 0,
    #e2e3e4 85%,
    #a0a3a7 100%
  );
  border: solid #adb0b3;
  border-width: 0 2px;
  height: 4px;
  left: 50%;
  margin-left: -60px;
  width: 120px;
}
.device-macbook .device-power::before {
  background: #a0a3a7;
  border-radius: 0 0 180px 180px/0 0 10px 10px;
  box-shadow: inset 0 -2px 6px 0 #474a4d;
  height: 10px;
  left: -4px;
  margin: 0 auto;
  top: 4px;
  width: 740px;
}
.device-macbook.device-gold .device-frame {
  box-shadow: inset 0 0 0 2px #edccb4;
}
.device-macbook.device-gold .device-power {
  background: #f7e8dd;
  border-color: #edccb4;
}
.device-macbook.device-gold .device-power::after {
  background: radial-gradient(
    circle at center,
    #f7e8dd 0,
    #f7e8dd 85%,
    #dfa276 100%
  );
  border-color: #e4b08a;
}
.device-macbook.device-gold .device-power::before {
  background: #edccb4;
  box-shadow: inset 0 -2px 6px 0 #83491f;
}
.device-macbook.device-rosegold .device-frame {
  box-shadow: inset 0 0 0 2px #f6a69a;
}
.device-macbook.device-rosegold .device-power {
  background: #facfc9;
  border-color: #f6a69a;
}
.device-macbook.device-rosegold .device-power::after {
  background: radial-gradient(
    circle at center,
    #facfc9 0,
    #facfc9 85%,
    #ef6754 100%
  );
  border-color: #f6a69a;
}
.device-macbook.device-rosegold .device-power::before {
  background: #f6a69a;
  box-shadow: inset 0 -2px 6px 0 #851b0c;
}
.device-macbook.device-spacegray .device-frame {
  box-shadow: inset 0 0 0 2px #767a7d;
}
.device-macbook.device-spacegray .device-power {
  background: #909496;
  border-color: #767a7d;
}
.device-macbook.device-spacegray .device-power::after {
  background: radial-gradient(
    circle at center,
    #909496 0,
    #909496 85%,
    #515456 100%
  );
  border-color: #5d6163;
}
.device-macbook.device-spacegray .device-power::before {
  background: #515456;
  box-shadow: inset 0 -2px 6px 0 #000;
}
.device-surface-studio {
  height: 506px;
  width: 640px;
}
.device-surface-studio .device-frame {
  background: #0d0d0d;
  border-radius: 10px;
  box-shadow: inset 0 0 0 2px #000;
  height: 440px;
  padding: 20px;
  width: 640px;
}
.device-surface-studio .device-content {
  border: 2px solid #121212;
  border-radius: 2px;
  height: 400px;
  width: 600px;
}
.device-surface-studio .device-stripe {
  background: #444;
  border-radius: 0 0 2px 2px;
  bottom: 0;
  height: 4px;
  left: 50%;
  margin-left: -117px;
  position: absolute;
  width: 234px;
}
.device-surface-studio .device-stripe::after,
.device-surface-studio .device-stripe::before {
  content: "";
  left: 50%;
  position: absolute;
  top: -75px;
}
.device-surface-studio .device-stripe::after {
  border: 6px solid #d5d6d8;
  border-radius: 0 0 18px 18px;
  border-top: 0;
  box-shadow: inset 0 0 0 4px #c8cacb;
  height: 60px;
  margin-left: -140px;
  width: 280px;
  z-index: -1;
}
.device-surface-studio .device-stripe::before {
  border: 15px solid #e2e3e4;
  border-radius: 0 0 4px 4px;
  border-top: 0;
  height: 70px;
  margin-left: -150px;
  width: 300px;
  z-index: -2;
}
.device-surface-studio .device-power {
  background: #eff0f0;
  border: solid #e2e3e4;
  border-radius: 0 0 2px 2px;
  border-width: 0 4px 2px 4px;
  height: 32px;
  margin: 30px auto 0 auto;
  position: relative;
  width: 250px;
}
.device-surface-studio .device-power::after {
  background: #adb0b3;
  content: "";
  height: 2px;
  left: -4px;
  position: absolute;
  top: 4px;
  width: 250px;
}
.device-imac-pro {
  height: 484px;
  width: 624px;
}
.device-imac-pro .device-frame {
  background: #0d0d0d;
  border-radius: 18px;
  box-shadow: inset 0 0 0 2px #080808;
  height: 428px;
  padding: 24px 24px 80px 24px;
  position: relative;
  width: 624px;
}
.device-imac-pro .device-frame::after {
  background: #2f2e33;
  border-radius: 0 0 18px 18px;
  bottom: 2px;
  content: "";
  height: 54px;
  left: 2px;
  position: absolute;
  width: 620px;
}
.device-imac-pro .device-frame::before {
  bottom: 15px;
  color: #0d0d0d;
  content: "";
  font-size: 24px;
  height: 24px;
  left: 50%;
  line-height: 24px;
  margin-left: -100px;
  position: absolute;
  text-align: center;
  width: 200px;
  z-index: 9;
}
.device-imac-pro .device-content {
  border: 2px solid #121212;
  border-radius: 2px;
  height: 324px;
  width: 576px;
}
.device-imac-pro .device-power::after,
.device-imac-pro .device-power::before {
  content: "";
}
.device-imac-pro .device-power::after {
  background: #222225;
  border-radius: 2px;
  height: 6px;
  margin: 0 auto;
  position: relative;
  width: 180px;
}
.device-imac-pro .device-power::before {
  border: solid transparent;
  border-bottom-color: #333;
  border-width: 0 8px 50px 8px;
  height: 50px;
  margin: 0 auto;
  position: relative;
  width: 130px;
}
.device-apple-watch {
  height: 234px;
  width: 200px;
}
.device-apple-watch .device-frame {
  background: #0d0d0d;
  border-radius: 40px;
  box-shadow: inset 0 0 2px 2px #adb0b3, inset 0 0 0 6px #e2e3e4,
    inset 0 0 0 8px #e2e3e4;
  height: 234px;
  padding: 32px;
  position: relative;
  width: 200px;
}
.device-apple-watch .device-frame::after {
  border-radius: 30px;
  box-shadow: inset 0 0 25px 0 rgba(255, 255, 255, 0.75);
  content: "";
  height: 216px;
  left: 9px;
  position: absolute;
  top: 9px;
  width: 182px;
}
.device-apple-watch .device-content {
  border: 2px solid #121212;
  border-radius: 2px;
  height: 170px;
  width: 136px;
}
.device-apple-watch .device-btns {
  background: #e2e3e4;
  border-left: 2px solid #adb0b3;
  border-radius: 8px 4px 4px 8px/20px 4px 4px 20px;
  box-shadow: inset 0 0 2px 2px #adb0b3;
  height: 44px;
  position: absolute;
  right: -10px;
  top: 52px;
  width: 16px;
  z-index: 9;
}
.device-apple-watch .device-btns::after {
  background: #e2e3e4;
  border-radius: 4px 2px 2px 4px/10px 2px 2px 10px;
  box-shadow: inset 0 0 1px 2px #adb0b3;
  content: "";
  height: 66px;
  position: absolute;
  right: 6px;
  top: 68px;
  width: 8px;
}
.device-apple-watch .device-btns::before {
  background: #adb0b3;
  box-shadow: 0 -16px #adb0b3, 0 -12px #adb0b3, 0 -8px #adb0b3, 0 -4px #adb0b3,
    0 4px #adb0b3, 0 8px #adb0b3, 0 12px #adb0b3, 0 16px #adb0b3;
  content: "";
  height: 2px;
  margin-top: -1px;
  position: absolute;
  right: 0;
  top: 50%;
  width: 6px;
}

body {
 /* background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAAUVBMVEWFhYWDg4N3d3dtbW17e3t1dXWBgYGHh4d5eXlzc3OLi4ubm5uVlZWPj4+NjY19fX2JiYl/f39ra2uRkZGZmZlpaWmXl5dvb29xcXGTk5NnZ2c8TV1mAAAAG3RSTlNAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEAvEOwtAAAFVklEQVR4XpWWB67c2BUFb3g557T/hRo9/WUMZHlgr4Bg8Z4qQgQJlHI4A8SzFVrapvmTF9O7dmYRFZ60YiBhJRCgh1FYhiLAmdvX0CzTOpNE77ME0Zty/nWWzchDtiqrmQDeuv3powQ5ta2eN0FY0InkqDD73lT9c9lEzwUNqgFHs9VQce3TVClFCQrSTfOiYkVJQBmpbq2L6iZavPnAPcoU0dSw0SUTqz/GtrGuXfbyyBniKykOWQWGqwwMA7QiYAxi+IlPdqo+hYHnUt5ZPfnsHJyNiDtnpJyayNBkF6cWoYGAMY92U2hXHF/C1M8uP/ZtYdiuj26UdAdQQSXQErwSOMzt/XWRWAz5GuSBIkwG1H3FabJ2OsUOUhGC6tK4EMtJO0ttC6IBD3kM0ve0tJwMdSfjZo+EEISaeTr9P3wYrGjXqyC1krcKdhMpxEnt5JetoulscpyzhXN5FRpuPHvbeQaKxFAEB6EN+cYN6xD7RYGpXpNndMmZgM5Dcs3YSNFDHUo2LGfZuukSWyUYirJAdYbF3MfqEKmjM+I2EfhA94iG3L7uKrR+GdWD73ydlIB+6hgref1QTlmgmbM3/LeX5GI1Ux1RWpgxpLuZ2+I+IjzZ8wqE4nilvQdkUdfhzI5QDWy+kw5Wgg2pGpeEVeCCA7b85BO3F9DzxB3cdqvBzWcmzbyMiqhzuYqtHRVG2y4x+KOlnyqla8AoWWpuBoYRxzXrfKuILl6SfiWCbjxoZJUaCBj1CjH7GIaDbc9kqBY3W/Rgjda1iqQcOJu2WW+76pZC9QG7M00dffe9hNnseupFL53r8F7YHSwJWUKP2q+k7RdsxyOB11n0xtOvnW4irMMFNV4H0uqwS5ExsmP9AxbDTc9JwgneAT5vTiUSm1E7BSflSt3bfa1tv8Di3R8n3Af7MNWzs49hmauE2wP+ttrq+AsWpFG2awvsuOqbipWHgtuvuaAE+A1Z/7gC9hesnr+7wqCwG8c5yAg3AL1fm8T9AZtp/bbJGwl1pNrE7RuOX7PeMRUERVaPpEs+yqeoSmuOlokqw49pgomjLeh7icHNlG19yjs6XXOMedYm5xH2YxpV2tc0Ro2jJfxC50ApuxGob7lMsxfTbeUv07TyYxpeLucEH1gNd4IKH2LAg5TdVhlCafZvpskfncCfx8pOhJzd76bJWeYFnFciwcYfubRc12Ip/ppIhA1/mSZ/RxjFDrJC5xifFjJpY2Xl5zXdguFqYyTR1zSp1Y9p+tktDYYSNflcxI0iyO4TPBdlRcpeqjK/piF5bklq77VSEaA+z8qmJTFzIWiitbnzR794USKBUaT0NTEsVjZqLaFVqJoPN9ODG70IPbfBHKK+/q/AWR0tJzYHRULOa4MP+W/HfGadZUbfw177G7j/OGbIs8TahLyynl4X4RinF793Oz+BU0saXtUHrVBFT/DnA3ctNPoGbs4hRIjTok8i+algT1lTHi4SxFvONKNrgQFAq2/gFnWMXgwffgYMJpiKYkmW3tTg3ZQ9Jq+f8XN+A5eeUKHWvJWJ2sgJ1Sop+wwhqFVijqWaJhwtD8MNlSBeWNNWTa5Z5kPZw5+LbVT99wqTdx29lMUH4OIG/D86ruKEauBjvH5xy6um/Sfj7ei6UUVk4AIl3MyD4MSSTOFgSwsH/QJWaQ5as7ZcmgBZkzjjU1UrQ74ci1gWBCSGHtuV1H2mhSnO3Wp/3fEV5a+4wz//6qy8JxjZsmxxy5+4w9CDNJY09T072iKG0EnOS0arEYgXqYnXcYHwjTtUNAcMelOd4xpkoqiTYICWFq0JSiPfPDQdnt+4/wuqcXY47QILbgAAAABJRU5ErkJggg==),
    rgb(196, 242, 196); */
  color: rgb(64, 35, 93);
}

li {
  list-style: none;
}

.container {
  max-width: 1005px;
  margin: 0 auto;
  padding: 2em 1em;
}

header {
  text-align: center;
}

#logo {

  width: 180px;
}


main {
  display: flex;
  flex-flow: column;
  align-items: center;
}

.hero {
  text-align: center;
}

.hero h1 {
  font-size: 2.5em;
  font-weight: bold;
}

.hero p {
  font-size: 1.5em;
  font-weight: 600;
  min-width: 500px;
  line-height: 1.8em;
  margin: 3em auto;
}

.hero p::before {
  content: "";
  display: block;
  width: 120px;
  border: 5px solid rgb(100,0,0);
  margin: 1em auto;
}

.hero a {
  background: #0e103d;
  padding: 1em 3em;
  border-radius: 40px;
  color: #d3bcc0;
  text-decoration: none;
  font-size: 1.375em;
  font-weight: bold;
}

figure {
  text-align: center;
}

figure .device {
  margin: 3em auto 0;
  /* width: 300px; */
}

@media screen and (min-width: 820px) {
  header {
    display: flex;
    justify-content: space-around;
    flex-flow: wrap;
    align-items: center;
  }



  .highlight {
    border: 3px solid #0e103d;
    display: block;
    padding: 5px 15px;
    border-radius: 50px;
  }

  main {
    /* flex-flow: row; */
  }

  .hero {
    text-align: left;
  }

  .hero h1 {
    font-size: 4em;
  }

  .hero p {
    font-size: 1.3em;
    padding: 0;
    margin: 0 0 3em 0;
  }

  .hero p::before {
    margin: 2em 0;
  }
}

</style>
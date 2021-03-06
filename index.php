<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Biblioteka ZST</title>	
        <!--------------------------CZCIONKI--------------------->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&subset=latin-ext" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,100,900,700' rel='stylesheet' type='text/css'>
        <!--------------------------CSS--------------------->
        <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
        <link rel="stylesheet" href="css/jquery-ui.structure.min.css" type="text/css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css">
      <!--------------------------BIBLIOTEKI--------------------->
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/parallax.min.js" type="text/javascript"></script>
        <script src="js/backtotop.js" type="text/javascript"></script>
        <script src="js/navbar.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js" type="text/javascript"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 logo-div">
            <h2 class="logo">BIBLIOTEKA ZESPOŁU SZKÓŁ TECHNICZNYCH W LEŻAJSKU</h2>
        </div>
    </div>
</div>
 <nav class="navbar navbar-default  navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
            <li class="menu"><a href="http://localhost/?url=home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li class="menu">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="glyphicon glyphicon-home"></i> Zbiory
                  </a>
                        <ul class="d-menu dropdown-menu">
                        <li class="menu"><a class="dropdown-item" href="http://localhost/?url=zbiory-ksiazki">Książki</a></li>
                              <li class="menu"><a class="dropdown-item" href="http://localhost/?url=zbiory-czasopisma">Czasopisma</a></li>
                              <li class="menu"><a class="dropdown-item" href="http://localhost/?url=zbiory-multimedia">Multimedia</a></li>
                              <li class="menu"><a class="dropdown-item" href="http://localhost/?url=zbiory-filmoteka">Filmoteka</a></li>
                        </ul>
            <li class="menu"><a href="http://localhost/?url=reading"><i class="glyphicon glyphicon-bookmark"></i> Lektury</a></li> 
            <li class="menu"><a href="http://localhost/?url=teczki"><i class="glyphicon glyphicon-education"></i> Matura</a></li>
            <li class="menu"><a href="http://localhost/?url=links"><i class="glyphicon glyphicon-link"></i> Linki</a></li> 
            <li class="menu"><a href="http://localhost/?url=contact"><i class="glyphicon glyphicon-phone-alt"></i> Kontakt</a></li> 
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid container-custom">
    <div class="row">
        <div class="col-md-2 hidden-sm hidden-xs hot-news">
              <h1 class="books-slider"> Godziny Otwarcia:</h1>
             
              <div class="text-center"> <i class="glyphicon glyphicon-time"></i> <b>7<sup>00</sup></b> - <b>16<sup>00</sup></b></div>
        </div>   
        <div id="content" class="col-md-8">
<?php
  include('includes/sessions.php');
  $url=@$_GET['url']; 
  switch($url)
  {
      case "home":
          include("includes/home.php");
      break;
      case "admin":
          include("includes/admin-login.php");
      break;
      case "admin-articles":
              include("includes/admin.php");
      break;
      case "links":
           include("includes/links.php");
      break; 
      case "reading":
              include("includes/reading.php");
      break;
      case "contact":
              include("includes/contact.php");
      break;
      case "admin-folder":
              include("includes/admin-teczki.php");
      break;
      case "panel":
              include("includes/panel.php");
      break;
      case "teczki":
              include("includes/teczki.php");
      break;
      case "zbiory-ksiazki":
              include("includes/zbiory-ksiazki.php");
      break;
      case "zbiory-czasopisma":
              include("includes/zbiory-czasopisma.php");
      break;
      case "zbiory-filmoteka":
              include("includes/zbiory-filmoteka.php");
      break;
      case "zbiory-multimedia":
              include("includes/zbiory-multimedia.php");
      break;
      case "admin-books":
              include("includes/admin-books.php");
      break;
      case "book":
              include("includes/book.php");
      break;
      default:
          include("includes/home.php");
      break;
  }
?>            
        </div>   
        <div id="recommend" class="col-md-2 hidden-sm hidden-xs">
        <br>
        <br>
        <a href="https://polona.pl/"><img src="img/polona.png" alt="polona" class="img-responsive"></a>
        <a href="http://culture.pl/"><img src="img/edukacja_cyfrowa.png" alt="culture.pl" class="img-responsive"></a>
        <a href="http://culture.pl/"><img src="img/culture.jpg" alt="culture.pl" class="img-responsive"></a>
        <h1 class="books-slider">Nowości Czytelnicze :</h1>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
<?php
include('includes/dbconnect.php');
$query ="select * from books";
$rezultat = $polaczenie->query($query);
$slider="";
$first_book=false;
while($rekord = $rezultat -> fetch_array())
{     $adres="http://localhost/?url=book&&id=".$rekord[0];
if($first_book==false)
{       
    $slider .= "<div class='item active'>
    <a href='$adres'><img class='img-responsive img-slider'  src='$rekord[4]' alt='zdjecie biblioteki'></a>
    </div>";
    $first_book=true;
}
else
{
    $slider .= "<div class='item'>
    <a href='$adres'><img class='img-responsive img-slider'  src='$rekord[4]' alt='zdjecie biblioteki'></a>
    </div>";  
}
}
echo $slider; 
$rezultat->close();
$polaczenie->close();
?>
            </div>
            </div>
        </div>
    </div>         
</div>
<footer class="footer">
  <a id="back-to-top" class="btn btn-primary btn-lg back-to-top hidden-sm hidden-xs" role="button" title="" >
        <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12 col-xs-12"><h3>Skontaktuj się z naszą biblioteką!</h3></div>
      </div>
      <div class="row">
          <div class="col-md-4 col-xs-12 text-centered">
                <i class="glyphicon glyphicon-home"></i>   ul. Mickiewicza 67 Leżajsk
          </div>
          <div class="col-md-4 col-xs-12 text-centered">
                <i class="glyphicon glyphicon-earphone"></i>  (17) 240 61 23
          </div>
          <div class="col-md-4 col-xs-12 text-centered">
                <i class="glyphicon glyphicon-envelope"></i>   biblioteka@zst.lezajsk.pl
          </div>
      </div>
      <div class="row">
          Copyright &copy; 2016 by KamsonPC
      </div>
  </div>
</footer>
</body>
</html>
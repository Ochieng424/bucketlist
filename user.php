<!DOCTYPE html>
<html>
<head>
	<title>shutter | Logs</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/animate/animate.css">
    <link rel="apple-touch-icon" sizes="57x57" href="fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="fav/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
  <?php
        session_start();
        if(!isset($_SESSION["user"])){
            function redirect($url){
            ob_start();
            header('Location: '.$url);
            ob_end_flush();
            die();
         }
         redirect('home.php');
        }
      ?>
<nav class="navbar navbar-light bg-faded" style="opacity: 0.9;">
        <div class="row">
             <div class="col-sm-10">
          <a class="navbar-brand" href="home.php">
            <img src="img/logoo.png" height="40" class="d-inline-block align-top" alt="logo">
            <span class="navbar-text text-warning"><b>Shutter</b></span>
          </a>
     </div>
     <div class="col-sm-1">
        <a href="php/logout.php"><button type="button" class="btn btn-outline-info">Log Out</button></a>
     </div>
    <div class="col-sm-1">
     </div>
    </div>
</nav>
    
  <div class="row" style="margin-top: 50px;">
    <div class="col-sm-1"></div>
    <div class="col-sm-2" style=" border: 1px solid white; height: 250px; background-color: aliceblue;">
        
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-4" style=" border: 1px solid white; height: 500px; background-color: aliceblue;">
      
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-3" style=" border: 1px solid white; height: 300px; background-color: aliceblue;">
      
    </div>
  </div>
</body>
</html>
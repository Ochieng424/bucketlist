<!DOCTYPE html>
<html>
<head>
	<title>shutter | Home</title>
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

    <nav class="navbar navbar-light bg-faded" style="opacity: 0.9;">
        <div class="row">
             <div class="col-sm-10">
          <a class="navbar-brand" href="home.php">
            <img src="img/logoo.png" height="40" class="d-inline-block align-top" alt="logo">
            <span class="navbar-text text-warning"><b>Shutter</b></span>
          </a>
     </div>
     <div class="col-sm-1">
        <a href="logs.php"><button type="button" class="btn btn-outline-info">Sign Up</button></a>
     </div>
    <div class="col-sm-1">
        <a href="home.php"><button type="button" class="btn btn-outline-info active">Log In</button></a>
     </div>
    </div>
  </nav>
    

   <div class="col-sm-12" style="margin-top: 0px; padding: 50px 30px;">
           <div class="row">
            <div class="col-sm-4"></div>
              <div class="col-sm-4" style=" border: 1px solid white; height: 350px; background: rgba(255,255,255,.9); margin-top: 60px;">
                <div class="loginBox">
                   <img src="img/png/004-man.png" class="user" width="120px">
                    <h3 class="text-warning">Log In</h3>
                    
                    <form method="POST" action="" role="form">
                        <?php
                           if (isset($_POST['login'])){
                               try{
                                      include 'php/connect.php';
                                      $email = $_POST['email'];
                                      $password = $_POST['password'];
                                      $statement=$pdo->prepare("SELECT * FROM `users` WHERE email=?");
                                      $statement->execute([$email]);
                                      if($statement->rowCount()==1){
                                          $user=$statement->fetch();
                                          if(password_verify($password, $user['password'])){
                                              session_start();
                                              $_SESSION['user']=$user;
                                             function redirect($url){
                                             ob_start();
                                             header('Location: '.$url);
                                             ob_end_flush();
                                             die();
                                             }
                                             redirect('user.php');
                                          }else{
                                              echo '<p class="text-warning text-center">Invalid Email or Password</p>';                                          }
                                      }else{
                                          echo '<p class="text-warning text-center">Invalid Email or Password</p>';
                                      }
                                      
                                    }catch(PDOException $e){
                                   echo '<p class="text-warning text-center">User does not exist</p>';
                               }
                           }
                         ?>
                     <p>Username</p>
                        <input type="email" name="email" placeholder="Email">
                     <p>Password</p>
                        <input type="password" name="password" placeholder="********">
                        <button type="submit" class="btn btn-success" name="login">Sign In</button>
                        <a href="#">Forgot Password</a>
                    </form>
                 </div>
             <div class="col-sm-4"></div>
           </div>
        </div>
   </div>
</body>
</html>
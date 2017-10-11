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

<nav class="navbar navbar-light bg-faded" style="opacity: 0.9;">
        <div class="row">
             <div class="col-sm-10">
          <a class="navbar-brand" href="home.html">
            <img src="img/logoo.png" height="40" class="d-inline-block align-top" alt="logo">
            <span class="navbar-text text-warning"><b>Shutter</b></span>
          </a>
     </div>
     <div class="col-sm-1">
        <button type="button" class="btn btn-outline-info active">Sign Up</button>
     </div>
    <div class="col-sm-1">
        <a href="home.php"><button type="button" class="btn btn-outline-info">Log In</button></a>
     </div>
    </div>
</nav>
    
  <div class="row">
    <div class="col-sm-4"></div>
      <div class="col-sm-4 text-center" style=" border: 1px solid white; height: 500px; margin-top: 70px; background: rgba(0,0,0,.5);">
        <div class="loginBox">
         <img src="img/png/signup.png" class="user">
         <h3 class="text-warning">Sign Up</h3>
         <form action="" method="post" role="form">
              <?php
                           if (isset($_POST['signup'])){
                               try{
                                        include 'php/connect.php';
        
                           $username = $_POST['username'];
                           $email = $_POST['email'];
                           $password = $_POST['password'];
                           $c_password = $_POST['c_password'];
                               
                               if ($password==$c_password){
                                     $statement = $pdo->prepare("SELECT `id`, `name` FROM `users` WHERE email = ?");
                                     $statement->execute([$email]);
                                     if($statement->rowCount()==0){
                                       $statement=$pdo->prepare("INSERT INTO `users`(`name`, `email`, `password`) VALUES (?,?,?)");
                                         if($statement->execute([$username, $email, password_hash($password, PASSWORD_BCRYPT) ])){
                                             $statement = $pdo->prepare("SELECT * FROM `users` WHERE email = ?");
                                             $statement->execute([$email]);
                                             
                                             session_start();
                                             $_SESSION['user']=$statement->fetch();
                                             function redirect($url){
                                             ob_start();
                                             header('Location: '.$url);
                                             ob_end_flush();
                                             die();
                                             }
                                             redirect('user.php');
                                         }else{
                                             echo '<p class="text-warning text-center">Something went wrong...please try again</p>';
                                         }
                                   }else{
                                       echo '<p class="text-warning text-center">The Email already exist</p>';
                                   }
                               }else{
                                    echo '<p class="text-warning text-center">Password does not Match</p>';
                               }
                               }catch(PDOException $e){
                                echo '<p class="text-warning text-center">An error occurred . '.$e->getMessage().'</p>';
                            }
                           }
                         ?>
             <p>Username</p>
                <input type="text" name="username" placeholder="Username" required>
             <p>Email</p>
                <input type="email" name="email" placeholder="Email" required>
             <p>Password</p>
                <input type="password" name="password" placeholder="password" required>
             <p>Re-Enter Password</p>
                <input type="password" name="c_password" placeholder="Password" required>
               <input type="image" class="form-control-file" id="exampleInputFile">
                <button type="submit" class="btn btn-success" name="signup">Sign Up</button>
         </form>
      </div>
      </div>
    <div class="col-sm-4"></div>
  </div>
</body>
</html>
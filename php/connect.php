<?php
  $host = "localhost";
  $db = "bucketdb";
  $user = "root";
  $password = "deco424yves";
  $charset = "utf8";

  try{
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
  $pdo = new PDO($dsn, $user, $password, $opt);
      }catch(PDOException $e){
      echo $e->getMessage();
  }
?>
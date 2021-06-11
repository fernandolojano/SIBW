<?php
	require_once "/usr/local/lib/php/vendor/autoload.php";
	include("bd.php");


  $loader = new \Twig\Loader\FilesystemLoader('Templates');
  $twig = new \Twig\Environment($loader);
  $bd = new BD();
  $resultadoLogin = [];
  session_start();

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
  	$username = $_POST['username-field'];
  	$pass = $_POST['password-field'];
    $email = $_POST['email-field'];
    $resultadoLogin['success'] = 0;

  	if($bd->addUser($username,$pass,$email)){
      $_SESSION['username'] = $username;
      $resultadoLogin['success'] = 1;
      header("Location:index.php");
      exit();
    }
    else{
      $resultadoLogin['success'] = -1;
    }
  }

  echo $twig->render('login.html',$resultadoLogin);
?>


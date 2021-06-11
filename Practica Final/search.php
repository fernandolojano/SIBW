<?php

  require_once "/usr/local/lib/php/vendor/autoload.php";
  include("bd.php");


  $loader = new \Twig\Loader\FilesystemLoader('Templates');
  $twig = new \Twig\Environment($loader);

  $bd = new BD();

  session_start();

    if (isset($_SESSION['username'])) {
        $usuario = $bd->getUser($_SESSION['username']);
        if($usuario['tipoUsuario']=='Gestor' or $usuario['tipoUsuario']=='Moderador'){
        	$publicados = 'false';
        }
    }

  if(isset($_POST['consulta'])){
  	$consulta = $_POST['consulta'];
  	console_log($consulta);
	  $resultadoBusqueda = $bd->searchEvento($_POST['consulta'], $publicados);
	  console_log($resultadoBusqueda);
	  echo $twig->render("lista.html", ['eventos' => $resultadoBusqueda]);

   }


?>
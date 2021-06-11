<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include("bd.php");

  $loader = new \Twig\Loader\FilesystemLoader('Templates');
  $twig = new \Twig\Environment($loader);
  $bd = new BD();
  $conectado = 0;
  session_start();

    
    if (isset($_SESSION['username'])) {
        $usuario = $bd->getUser($_SESSION['username']);
        $conectado = 1;
    }


    if(isset($_GET['id']) and $conectado==1 ){
        $idEv = $_GET['id'];
  }

  echo $twig->render('etiquetas.html',['evento' => $bd->getEvento($idEv),
                    'listaEtiquetas' => $bd->getEtiquetas($idEv),
                    'conectado' => $conectado]);
?>

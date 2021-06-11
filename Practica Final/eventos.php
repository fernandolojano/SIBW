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

  echo $twig->render('eventos.html',['eventos' => $bd->getEventos(),
                    'conectado' => $conectado]);
?>

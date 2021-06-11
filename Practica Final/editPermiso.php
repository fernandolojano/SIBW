<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("bd.php");

    $loader = new \Twig\Loader\FilesystemLoader('Templates');
    $twig   = new \Twig\Environment($loader);
    $bd = new BD();
    $conectado = 0;
    $exito = 0;
    $resultado = 1;
    session_start();

    if (isset($_SESSION['username'])) {
        $usuario = $bd->getUser($_SESSION['username']);
        $conectado = 1;
    }

    if(isset($_GET['id']) and $conectado==1 ){
        $idCom = $_GET['id'];
        $opcion = $_POST['permisos'];
        $exito = $bd->editPermiso($idCom, $opcion);
  }
    
      echo $twig->render('usuarios.html',['usuarios' => $bd->getAllUsers(),
                                          'conectado' => $conectado]);

?>
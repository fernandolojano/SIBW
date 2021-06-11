<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("bd.php");

    $loader = new \Twig\Loader\FilesystemLoader('Templates');
    $twig   = new \Twig\Environment($loader);
    $bd = new BD();
    $conectado = 0;
    $exito = 0;
    session_start();

    if (isset($_SESSION['username'])) {
        $usuario = $bd->getUser($_SESSION['username']);
        $conectado = 1;
    }

    if(isset($_GET['id']) and $conectado==1 ){
        $id = $_GET['id'];
        $res = $bd->deleteEvento($id);
       
    }

     if($res){
         header("Location:index.php");
            exit();
         } 
    
  

?>
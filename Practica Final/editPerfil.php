<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("bd.php");

    $loader = new \Twig\Loader\FilesystemLoader('Templates');
    $twig   = new \Twig\Environment($loader);
    $bd = new BD();
    $conectado = 0;
    $exito = true;
    session_start();

    if (isset($_SESSION['username'])) {
        $usuario = $bd->getUser($_SESSION['username']);
        $conectado = 1;
    }

     if(isset($_GET['id']) and $conectado==1 ){
        $id = $_GET['id'];
        $username = $_POST['username-field'];
        $email = $_POST['email-field'];
        $pass = $_POST['password-field'];
        $exito = $bd->modifyUser($id, $username, $email, $pass);

        if($exito){
            session_destroy();
           header('Location:index.php');
           exit();
           
        }
    }

    echo $twig->render('editPerfil.html', ['usuario' =>$usuario,
                                        'conectado' =>$conectado,
                                          'exito' => $exito]);
    
  

?>

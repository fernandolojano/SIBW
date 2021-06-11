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

    if($_SERVER['REQUEST_METHOD'] === 'POST' and $conectado=== 1){
        $idCom = $_GET['id'];
        $texto = $_POST['comment-field'];

        $exito = $bd->modifyOpinion($idCom, $texto);

        if($exito){
            header("Location:comentarios.php");
        }

        else{
          $resultadoLogin['success'] = -1;
        }
  }
    
    echo $twig->render('comentarios.html', ['conectado' =>$conectado,
                                            'exito' => $exito]);

?>
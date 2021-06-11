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

    
    if (isset($_GET['id'])) {
         $idCom = $_GET['id'];
        $comentario = $bd->getComentarioUnico($idCom);
    }


    if($_SERVER['REQUEST_METHOD'] === 'POST' and $conectado=== 1){
       


        $texto = $_POST['comment-field'];

        $exito = $bd->modifyOpinion($idCom, $texto);

        if($exito){
            $idEv = $comentario['idEvento'];
        
            echo $twig->render('evento.html',['evento' => $bd->getEvento($idEv),
                                      'opiniones' => $bd->getOpiniones($idEv),
                                      'banner' => $bd->getBanner($idEv),
                                      'imagenes' => $bd->getImagenes($idEv),
                                      'usuario' => $usuario,
                                      'conectado' => $conectado]);
            exit();
        }

        else{
          $resultadoLogin['success'] = -1;
        }
  }
    
    echo $twig->render('editComentario.html', ['comentario' => $comentario,
                                            'conectado' =>$conectado,
                                            'exito' => $exito]);
    exit();

?>
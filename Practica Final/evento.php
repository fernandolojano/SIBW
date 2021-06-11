<?php
	require_once "/usr/local/lib/php/vendor/autoload.php";
	include("bd.php");

	$loader = new \Twig\Loader\FilesystemLoader('Templates');
	$twig = new \Twig\Environment($loader);


	if(isset($_GET['id'])){
		$idEv = $_GET['id'];
	}
	else{
		$idEv = -1;
	}

	$db = new BD();
  	session_start();
  	$conectado = 0;

    
    if (isset($_SESSION['username'])) {
        $usuario = $db->getUser($_SESSION['username']);
        $conectado = 1;

    }

	echo $twig->render('evento.html',['evento' => $db->getEvento($idEv),
									  'opiniones' => $db->getOpiniones($idEv),
									  'banner' => $db->getBanner($idEv),
									  'imagenes' => $db->getImagenes($idEv),
									  'usuario' => $usuario,
									  'conectado' => $conectado,
									  'palabras' => $db->getBannedWords()]);
?>
<?php

	require_once "/usr/local/lib/php/vendor/autoload.php";
	include("bd.php");

	$loader = new \Twig\Loader\FilesystemLoader('Templates');
	$twig = new \Twig\Environment($loader);

	$db = new BD();

	session_start();

  	if (isset($_SESSION['username'])) {
        $usuario = $db->getUser($_SESSION['username']);
        $conectado = 1;
    }

	if(isset($_GET['id'])){
		$idEv = $_GET['id'];
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$evento = $db->getEvento($idEv);

		$nombreEvento = $evento['titulo'];
		$tituloCom = $_POST['tituloCom-field'];
		$autor = $_POST['autor-field'];
		$email = $_POST['email-field'];
		$textoComentario = $_POST['textoCom-field'];

		$resultado = $db->addOpinion($nombreEvento, $idEv, $tituloCom, $textoComentario, $autor, $email);
	}
	
   

    //header('Location: '.$_SERVER['REQUEST_URI']);  
    header ("location:".$_SERVER['HTTP_REFERER']);
    exit()



?>
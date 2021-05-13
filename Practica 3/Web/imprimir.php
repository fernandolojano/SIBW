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

	echo $twig->render('evento_imprimir.html',['evento' => $db->getEvento($idEv)]);


?>
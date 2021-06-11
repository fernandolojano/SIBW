<?php

	require_once "/usr/local/lib/php/vendor/autoload.php";
	include("bd.php");

	$loader = new \Twig\Loader\FilesystemLoader('Templates');
	$twig = new \Twig\Environment($loader);

	$db = new BD();
	$varsParaTwig = [];
    $varsParaTwig['exito'] = 0;

	session_start();

	if (isset($_SESSION['username'])) {
        $conectado = 1;
    }


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$idEv = $_GET['id'];
		console_log($idEv);
		$nombreImg = $_POST['nombre-field'];
		$autorImg = $_POST['autor-field'];
		$tipoIMG = $_POST['tipo-field'];

		if(isset($_FILES['imagen-field'])){
	        $errors= array();
	        $file_name = $_FILES['image-field']['name'];
	        $file_size = $_FILES['image-field']['size'];
	        $file_tmp = $_FILES['image-field']['tmp_name'];
	        $file_type = $_FILES['image-field']['type'];
	        $file_ext = strtolower(end(explode('.',$_FILES['image-field']['name'])));

	      
	        
	        $extensions= array("jpeg","jpg","png");
	        
	        if (in_array($file_ext,$extensions) === false){
	          $errors[] = "Extensión no permitida, elige una imagen JPEG o PNG.";
	        }
	        
	        if ($file_size > 2097152){
	          $errors[] = 'Tamaño del fichero demasiado grande';
	        }
	        
	        if (empty($errors)==true) {
	          move_uploaded_file($file_tmp, "./imgs/" . "$file_name");
	          
	          $imagenURL = "./imgs/" . "$file_name";
	        }
	        
	        if (sizeof($errors) > 0) {
	          $varsParaTwig['errores'] = $errors;
	        }

			$varsParaTwig['exito'] = $resultado;
   	
	    	$resultado = $db->addImagen($idEv, $imagenURL, $autorImg, $nombreImg, $tipoIMG);

    		if($resultado){
	             echo $twig->render('eventos.html',['eventos' => $db->getEventos(),
                    								'conectado' => $conectado]);
	          	exit();
    		}    	
   		}
 	}
	
  
   
	 echo $twig->render('addImagen.html',['eventos' => $db->getEventos(),
                    								'conectado' => $conectado]);
	 exit();
    
?>
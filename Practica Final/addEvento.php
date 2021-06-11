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
        $varsParaTwig['conectado'] = 1;
    }


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$fecha = $_POST['fecha-field'];
		$titulo = $_POST['titulo-field'];
		$ciudad = $_POST['ciudad-field'];
		$organizador = $_POST['organizador-field'];
		$contenido = $_POST['contenido-field'];

		if(isset($_FILES['eventoImg-field']) and isset($_FILES['banner-field'])){
	        $errors= array();
	        $file_name = $_FILES['banner-field']['name'];
	        $file_size = $_FILES['banner-field']['size'];
	        $file_tmp = $_FILES['banner-field']['tmp_name'];
	        $file_type = $_FILES['banner-field']['type'];
	        $file_ext = strtolower(end(explode('.',$_FILES['banner-field']['name'])));

	        $file_name2 = $_FILES['eventoImg-field']['name'];
	        $file_size2 = $_FILES['eventoImg-field']['size'];
	        $file_tmp2 = $_FILES['eventoImg-field']['tmp_name'];
	        $file_type2 = $_FILES['eventoImg-field']['type'];
	        $file_ext2 = strtolower(end(explode('.',$_FILES['eventoImg-field']['name'])));
	        
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

	          if (in_array($file_ext2,$extensions) === false){
	          $errors[] = "Extensión no permitida, elige una imagen JPEG o PNG.";
	        }
	        
	        if ($file_size2 > 2097152){
	          $errors[] = 'Tamaño del fichero demasiado grande';
	        }
	        
	        if (empty($errors)==true) {
	          move_uploaded_file($file_tmp2, "./imgs/" . "$file_name2");
	          
	          $imagenURL2 = "./imgs/" . "$file_name2";
	        }
	        
	        if (sizeof($errors) > 0) {
	          $varsParaTwig['errores'] = $errors;
	        }

	        $resultado = $db->addEvento($fecha, $titulo, $ciudad, $organizador, $contenido, $imagenURL);
			$varsParaTwig['exito'] = $resultado;

    		if($resultado){
	    		$evento = $db->getEventoFromTitulo($titulo);
	    		$id = $evento['id'];
	    		$resultado = $db->addImagen($id, $imagenURL2, 'unkown', 'unkown', 'banner');

    			if($resultado){
            		header("Location:index.php");
    	 			exit();
    			}    	
   			}

	    }

		
    
    

	}
	
  
   
	echo $twig->render('addEvento.html',$varsParaTwig);
    
?>
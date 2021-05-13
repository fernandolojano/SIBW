<?php
	class BD{
		private $mysqli;


	function __construct(){
		$this->Login();
	}


	function Login(){
		$this->mysqli = new mysqli("mysql", "reko", "reko", "SIBW");

		if( $this->mysqli->connect_errno ){
            echo ("Fallo al conectar: " . $this->mysqli->connect_error);

        }
	}

	function getEvento($id){

		$sentencia = $this->mysqli->prepare("SELECT * FROM eventos WHERE id = ?");
		$sentencia->bind_param("i", $id);
		$sentencia->execute();
		$resultado = $sentencia->get_result();

	
		if($resultado->num_rows > 0){
			$row = $resultado->fetch_assoc();
			$enlace = "../imprimir.php?id=" . $id;

			$evento = array(
				'titulo' => $row['titulo'],
				'organizador' => $row['nombreOrg'],
				'fecha' => $row['fecha'],
				'contenido' => $row['texto'],
				'banner' => $row['bannerImg'], 
            	'image1' => $row['img1'],
            	'image2' => $row['img2'],
            	'autor1' => $row['Autorimg1'],
            	'autor2' => $row['Autorimg2'],
            	'nombreImg1' => $row['nombreImg1'],
            	'nombreImg2' => $row['nombreImg2'],
            	'enlaceImp' => $enlace,
			);
		}

		$sentencia->close();
		return $evento;

	}


	function getEventos(){
		$sentencia = $this->mysqli->prepare("SELECT id, titulo, fecha, eventImg from eventos");
        $sentencia->execute();
        $resultado = $sentencia->get_result();


        $listaEventos = array();

        while($row = $resultado->fetch_assoc()){
        	$date = date_create($row['fecha']);
            $fecha = date_format($date, 'd/m/y ');
        	$id = $row['id'];
        	$enlace = "../evento.php?id=" . $id;
        	$evento = array(
        		'titulo' => $row['titulo'],
        		'Img' => $row['eventImg'],
        		'fecha' => $fecha,
        		'enlace' => $enlace,
        		
        	);

        	$listaEventos[] = $evento;
        }

        $sentencia->close();
        return $listaEventos;	
	}



	function getOpiniones($id){

		$sentencia = $this->mysqli->prepare("SELECT * FROM opiniones WHERE idEvento = ?");
		$sentencia->bind_param("i", $id);
		$sentencia->execute();
		$resultado = $sentencia->get_result();


		$listaComentarios = array();

		while($row = $resultado->fetch_assoc()){
			$date = date_create($row['fechaPublicado']);
            $fecha = date_format($date, 'y/m/d');

            $comentario = array(
            	'tituloCom' => $row['tituloCom'],
            	'autor' => $row['autor'],
            	'fechaPub' => $fecha,
            	'textoComentario' => $row['comentario']

            	);

            $listaComentarios[] = $comentario;
		}

		$sentencia->close();
		return $listaComentarios;

	}



}



?>
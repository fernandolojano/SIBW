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


	function getEventos(){
		$sentencia = $this->mysqli->prepare("SELECT * from eventos");
        $sentencia->execute();
        $resultado = $sentencia->get_result();


        $listaEventos = array();

        while($row = $resultado->fetch_assoc()){
        	$date = date_create($row['fecha']);
            $fecha = date_format($date, 'd/m/y ');
        	$id = $row['id'];
        	$enlace = "../evento.php?id=" . $id;
        	$evento = array(
				'id' => $row['id'],
				'titulo' => $row['titulo'],
				'organizador' => $row['nombreOrg'],
				'lugar' => $row['lugar'],
				'fecha' => $fecha,
				'contenido' => $row['texto'],
            	'enlace' =>$enlace,
            	'Img' => $row['eventImg'],
            	'publicado' => $row['publicado']
			);

        	$listaEventos[] = $evento;
        }

        $sentencia->close();
        return $listaEventos;	
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
				'id' => $row['id'],
				'titulo' => $row['titulo'],
				'organizador' => $row['nombreOrg'],
				'lugar' => $row['lugar'],
				'fecha' => $row['fecha'],
				'contenido' => $row['texto'],
            	'enlaceImp' => $enlace
			);
		}

		$sentencia->close();
		return $evento;

	}

	function getEventoFromTitulo($titulo){

		$sentencia = $this->mysqli->prepare("SELECT * FROM eventos WHERE titulo = ?");
		$sentencia->bind_param("s", $titulo);
		$sentencia->execute();
		$resultado = $sentencia->get_result();

	
		if($resultado->num_rows > 0){
			$row = $resultado->fetch_assoc();
			$enlace = "../imprimir.php?id=" . $id;

			$evento = array(
				'id' => $row['id'],
				'titulo' => $row['titulo'],
				'organizador' => $row['nombreOrg'],
				'lugar' => $row['lugar'],
				'fecha' => $row['fecha'],
				'contenido' => $row['texto'],
            	'enlaceImp' => $enlace
			);
		}

		$sentencia->close();
		return $evento;
	}



	 function searchEvento($titulo, $publicados){
	 	if($publicados){
	 		$query = "SELECT id, titulo FROM eventos WHERE titulo LIKE ? AND publicado=true";
	 	}
	 	else  $query = "SELECT id, titulo FROM eventos WHERE titulo LIKE ? ";
       
        $sentencia = $this->mysqli->prepare($query);
        $busqueda = "%" . $titulo . "%";
        $sentencia->bind_param('s', $busqueda);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $eventos = array();

        if( $resultado->num_rows > 0  ){
            while($row = $resultado->fetch_assoc()){
                  $eventos[] = [
                    'id'     => $row['id'],
                    'titulo' => $row['titulo']
                ];
            }
        }
     
        $sentencia->close();
        return $eventos;

    }


	function modifyEvento($id, $titulo,$nombreOrg, $lugar, $texto,$fecha,$eventImg){
		/*console_log($id);
		console_log($titulo);
		console_log($nombreOrg); 
		console_log($lugar);
		console_log($texto);
		console_log($fecha);
		console_log($eventImg);*/
		$fecha_d = date_create($fecha);
		$fecha_f =  date_format($fecha_d, 'Y/m/d');
		//console_log($fecha_f);
		$consulta = "UPDATE eventos SET titulo=?,nombreOrg=?,lugar=?,texto=?,fecha=?,eventImg=? WHERE id=?" ;
		$sentencia = $this->mysqli->prepare($consulta);
		$sentencia->bind_param("ssssssi", $titulo, $nombreOrg, $lugar, $texto, $fecha_f, $eventImg, $id);
		$res = $sentencia->execute();
		//console_log($this->mysqli->error_list);

		if($sentencia->affected_rows ==1){
			$resultado = true;
		}

		else $resultado = false;

		$sentencia->close();
		return $resultado;

	}

	function addEvento($fecha, $titulo, $lugar, $organizador, $contenido, $imagen){

		$query = "INSERT INTO eventos(titulo, eventImg, lugar, nombreOrg, fecha, texto) VALUES (?, ?, ?, ?, ?, ?)";
		$sentencia = $this->mysqli->prepare($query);
		$sentencia->bind_param("ssssss", $titulo, $imagen, $lugar, $organizador, $fecha, $contenido );
		$sentencia->execute();


        if($sentencia->affected_rows != -1){
            $resultado = TRUE;
        }
        else $resultado = FALSE;

        $sentencia->close();
        return $resultado;		


	}

	function deleteEvento($id){
		$consultaEvento = "DELETE FROM eventos WHERE id = ?";
		$consultaIMG = "DELETE FROM imagenes where idEvento = ?";
		$consultaComentarios = "DELETE FROM comentarios WHERE idEvento = ?";

		$sentencia = $this->mysqli->prepare($consultaComentarios);
		$sentencia->bind_param("i",$id);
		$sentencia->execute();

		if($sentencia->affected_rows ==-1)
			$resultado = false;
		else{
			$sentencia = $this->mysqli->prepare($consultaIMG);
			$sentencia->bind_param("i",$id);
			$sentencia->execute();

			if($sentencia->affected_rows ==-1)
			$resultado = false;
			else{
				$sentencia = $this->mysqli->prepare($consultaEvento);
				$sentencia->bind_param("i",$id);
				$sentencia->execute();
				if($sentencia->affected_rows ==-1)
					$resultado=false;
				else $resultado=true;
			}
		}
		$sentencia->close();
		return $resultado;
	}

	function statusEvent($id, $estado){
		//console_log("Cambiando estado");
		//console_log($estado);
		if($estado == 'true'){
			$query = "UPDATE eventos SET publicado = true WHERE id = ?" ;
		}
		else{
			$query = "UPDATE eventos SET publicado = false WHERE id = ?" ;
		}
		
		$sentencia = $this->mysqli->prepare($query);
		$sentencia->bind_param("i", $id);
		$sentencia->execute();

		if($sentencia->affected_rows ==1){
			$resultado = true;
		}
		else 
			$resultado = false;

		$sentencia->close();
		return $resultado;
	}

	function getBanner($id) {
		$sentencia = $this->mysqli->prepare("SELECT * FROM imagenes WHERE titulo='banner' AND idEvento= ? ");
		$sentencia->bind_param("i", $id);
		$sentencia->execute();
		$resultado = $sentencia->get_result();


		if($resultado->num_rows > 0){
			$row = $resultado->fetch_assoc();
			$bannerres = array(
				'direccion' => $row['direccion'],
				'id' => $row['idEvento'],
				'titulo' =>$row['titulo']
			);
		}

		$sentencia->close();
		return $bannerres;

	}


	function getImagenes($id){
		$sentencia = $this->mysqli->prepare("SELECT * FROM imagenes WHERE titulo <> 'banner' AND idEvento = ? ");
		$sentencia->bind_param("i", $id);
		$sentencia->execute();
		$resultado = $sentencia->get_result();

		if (mysqli_num_rows($resultado) === 0) { 
			$listaImagenes = null;
		} else { 
   			
	        $listaImagenes = array();

	        while($row = $resultado->fetch_assoc()){
	        	$imagen = array(
	        		'direccion' => $row['direccion'],
	        		'nombreImg' => $row['nombreImg'],
	        		'autorImg' => $row['autorImg'],
	        		'tipo' => $row['titulo']);

	        	$listaImagenes[] = $imagen;
	        }

	        $sentencia->close();
	       
		}

		 return $listaImagenes;	
	}

	function addImagen($id, $enlace, $autor, $nombre_foto, $tipo_foto){
		$consulta = "INSERT INTO imagenes(idEvento,direccion,nombreImg,autorImg,titulo) VALUES (?,?,?,?,?)";
		$sentencia = $this->mysqli->prepare($consulta);

		$sentencia->bind_param("issss", $id,$enlace,$nombre_foto,$autor,$tipo_foto);
		$sentencia->execute();

		if($sentencia->affected_rows != -1)
			$resultado = true;
		else $resultado = false;

		$sentencia->close();
		return $resultado;
	}

	function editImagen($id, $enlace, $autor, $nombre_foto, $tipo_foto){
		$consulta = "UPDATE imagenes SET direccion=?,nombreImg=?,autorImg=?,titulo=? where idEvento=?";
		$sentencia = $this->mysqli->prepare($consulta);

		$sentencia->bind_param("ssssi",$enlace,$nombre_foto,$autor,$tipo_foto,$id);
		$sentencia->execute();

		if($sentencia->affected_rows != -1)
			$resultado = true;
		else $resultado = false;

		$sentencia->close();
		return $resultado;
	}


	function listaOpiniones(){
		$sentencia = $this->mysqli->prepare("SELECT * FROM comentarios ORDER BY idEvento DESC");
		$sentencia->execute();
		$resultado = $sentencia->get_result();

		if($sentencia->affected_rows == -1){
			$listaComentarios = -1;
		}
		else{
			$listaComentarios = array();

			while($row = $resultado->fetch_assoc()){
				$date = date_create($row['fechaPublicado']);
            	$fecha = date_format($date, 'y/m/d ');
				$comentario = array(
				'idEvento' => $row['idEvento'],
				'idCom' =>$row['idCom'],
				'nombreEvento' => $row['nombreEvento'],
				'tituloCom' => $row['tituloCom'],
				'autor' => $row['autor'],
				'textoComentario' => $row['textoComentario'],
				'fecha' => $fecha,
				'modificado' =>$row['modificado']);

				$listaComentarios[] = $comentario;

			}
		}

		$sentencia->close();
		return $listaComentarios;
		
	}

	function getComentarioUnico($id){

		$sentencia = $this->mysqli->prepare("SELECT * FROM comentarios WHERE idCom = ?");
		$sentencia->bind_param("i", $id);
		$sentencia->execute();
		$resultado = $sentencia->get_result();



		while($row = $resultado->fetch_assoc()){
				$date = date_create($row['fechaPublicado']);
            	$fecha = date_format($date, 'y/m/d ');
				$comentario = array(
				'idEvento' => $row['idEvento'],
				'idCom' =>$row['idCom'],
				'nombreEvento' => $row['nombreEvento'],
				'tituloCom' => $row['tituloCom'],
				'autor' => $row['autor'],
				'textoComentario' => $row['textoComentario'],
				'fecha' => $fecha,
				'modificado' =>$row['modificado']);
			}
		$sentencia->close();
		return $comentario;

	}

	function getOpiniones($id){

		$sentencia = $this->mysqli->prepare("SELECT * FROM comentarios WHERE idEvento = ?");
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
            	'textoComentario' => $row['textoComentario'],
            	'idCom' => $row['idCom'],
            	'modificado' => $row['modificado']);

            $listaComentarios[] = $comentario;
		}

		$sentencia->close();
		return $listaComentarios;

	}

	function addOpinion($nombreEv, $idEv, $tituloCm ,$textoCom, $autorCom, $emailCom){
		//console_log($fecha);
		//console_log($nombreEv);
		//console_log($idEv);
		//console_log($tituloCm);
		//console_log($textoCom);
		//console_log($autorCom); 
		//console_log($emailCom);
		$query = "INSERT INTO comentarios(idEvento, tituloCom, autor, email, fechaPublicado, textoComentario, nombreEvento) VALUES (?, ?, ?, ?, now(), ?, ?)";
		$sentencia = $this->mysqli->prepare($query);
		$sentencia->bind_param("isssss",$idEv, $tituloCm, $autorCom, $emailCom, $textoCom, $nombreEv);
		$sentencia->execute();
		//console_log($this->mysqli->error_list);
		if($sentencia->affected_rows != -1){
			$resultado = true;
		}
		else $resultado = false;

		$sentencia->close();
		return $resultado;
	}


	function modifyOpinion($idCom, $texto) {
		$query = "UPDATE comentarios SET modificado=true, textoComentario=? WHERE idCom= ?";
		$sentencia = $this->mysqli->prepare($query);
		$sentencia->bind_param("si", $texto, $idCom);
		$sentencia->execute();

		if($sentencia->affected_rows == 1)
			$resultado = TRUE;
		else
			$resultado = FALSE;

		$sentencia->close();
		return $resultado;
	}


	function deleteOpinion($idCom) {
		$query = "DELETE FROM comentarios WHERE idCom=?";
		$sentencia = $this->mysqli->prepare($query);
		$sentencia->bind_param("i", $idCom);
		$sentencia->execute();

		if($sentencia->affected_rows != -1)
			$resultado = true;
		else $resultado=false;

		$sentencia->close();
		return $resultado;
	}


	function deleteEtiquetas($id){
		$query = "DELETE FROM etiquetas WHERE idEvento=?";
		$sentencia = $this->mysqli->prepare($query);
		$sentencia->bind_param("i", $id);
		$sentencia->execute();

		if($sentencia->affected_rows != -1)
			$resultado = true;
		else $resultado=false;

		$sentencia->close();
		return $resultado;
	}


	function getEtiquetas($id){
		$query = "SELECT * FROM etiquetas where idEvento=? ";
		$sentencia = $this->mysqli->prepare($query);
		$sentencia->bind_param("i", $id);
		$sentencia->execute();
		$resultado = $sentencia->get_result();

		$listaEtiquetas = array();


  		while($row = $resultado->fetch_assoc()){
        	$etiqueta = array(
        		'id' => $row['idEvento'],
				'nombre' => $row['etiqueta']);

        	$listaEtiquetas[] = $etiqueta;
        }

        $sentencia->close();
        console_log($listaEtiquetas);
        return $listaEtiquetas;	
	}

	function addEtiqueta($id, $nombre){
		console_log($nombre);
		$query = "INSERT INTO etiquetas(idEvento,etiqueta) VALUES (?, ?)";
		$sentencia = $this->mysqli->prepare($query);
		$sentencia->bind_param("is",$id, $nombre);
		$sentencia->execute();
		//console_log($this->mysqli->error_list);
		if($sentencia->affected_rows != -1){
			$resultado = true;
		}
		else $resultado = false;

		$sentencia->close();
		return $resultado;
	}

	
	function checkLogin($username, $pass){
        $found = false;
        $user = $this->getUser($username);
        if($user!=-1){
            if(password_verify($pass, $user['password'])){
                $found = TRUE;
            }
        }

        return $found;
    }
    


	function getAllUsers(){
		$sentencia = $this->mysqli->prepare("SELECT * FROM usuarios ");
		$sentencia->execute();
		$resultado = $sentencia->get_result();

		$listaUsuarios = array();


  		while($row = $resultado->fetch_assoc()){
        	$usuario = array(
        		'id' => $row['id'],
				'username' => $row['username'],
				'email' => $row['email'],
				'tipoUsuario' => $row['tipoUsuario']);

        	$listaUsuarios[] = $usuario;
        }

        $sentencia->close();
        return $listaUsuarios;	
		
	}



	function getUser($username){
		$sentencia = $this->mysqli->prepare("SELECT * FROM usuarios WHERE username=?");
		$sentencia->bind_param("s", $username);
		$sentencia->execute();
		$resultado = $sentencia->get_result();
		$usuario = -1;

		if($resultado->num_rows === 1){
			$row = $resultado->fetch_assoc();
			$usuario = [
			'id' => $row['id'],	
			'username' => $row['username'],
			'password' => $row['password'],
			'email' => $row['email'],
			'tipoUsuario' => $row['tipoUsuario']];
		}
		

		$sentencia->close();
		return $usuario;
	}



	function addUser($username, $password, $email){
		$query = "INSERT INTO usuarios(username, email, password, tipoUsuario) VALUES (?, ?, ?, 'Default')";
		$sentencia = $this->mysqli->prepare($query);
		$sentencia->bind_param("sss",$username,$email,password_hash($password, PASSWORD_DEFAULT));
		$sentencia->execute();

		if($sentencia->affected_rows != -1){
            $resultado = true;
        }
        else $resultado = false;

        $sentencia->close();
        return $resultado;
	}

	function modifyUser($id, $username, $email, $pass){

		$query = "UPDATE usuarios SET username=?,email=?,password=? WHERE id=?";
		$sentencia = $this->mysqli->prepare($query);
		$sentencia->bind_param("ssss", $username, $email, password_hash($pass, PASSWORD_DEFAULT), $id);
		$sentencia->execute();

		if($sentencia->affected_rows == 1){
			$resultado = true;
		}
		else $resultado = false;

		$sentencia->close();
		return $resultado;
	}

    
	function editPermiso($id, $permiso){
		$query = "UPDATE usuarios SET tipoUsuario=? WHERE id=?";
		$sentencia = $this->mysqli->prepare($query);
		$sentencia->bind_param("si", $permiso, $id);
		$sentencia->execute();

		if($sentencia->affected_rows != -1)
			$resultado = true;
		else $resultado = false;

		$sentencia->close();
		return $resultado;

	}

	function getBannedWords(){
		$query ="SELECT * from palabras";
        $sentencia = $this->mysqli->prepare($query);
        $sentencia-> execute();
        $resultado  = $sentencia->get_result();

        $palabras = array();

        while($row = $resultado->fetch_assoc()){   
            $palabras[] = $row['palabra'];
        }

        $sentencia->close();
        return $palabras;

    }

}

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

?>
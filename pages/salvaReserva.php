<?php 
	require('conexao.php');
	session_start();

	if(IsSet($_SESSION['idLogado']))
		$idUsu=$_SESSION['idLogado'];
   if(IsSet($_SESSION['tipo']))
		$idUsuTp=$_SESSION['tipo'];
	if(isset($_POST["reservar"])){
		$data 				=$_POST['data'];
		$hinicio 			=$_POST['hinicio']; //nao ta pegando //agora ta
		$hfim				=$_POST['hfim']; //tbm nao //agora ta
		$disciplina 		=$_POST['disciplina'];
		$finalidade 		=$_POST['finalidade'];
		$confirm	 		= 0;   
		//echo $idUsu;
		$idLab				=$_POST['lab'];
		
		$pontos = ':';

		$horainicio = str_replace($pontos, "", $hinicio);
		$horafim = str_replace($pontos, "", $hfim);
		$horainicio = intval($horainicio);
		$horafim =intval($horafim);

		if($horainicio >= $horafim){
			
			switch($idUsuTp){
		 	case 1: 
		 		echo '<script>alert("A hora início não pode ser maior ou igual a hora fim, insira novo horário, por favor.");window.location="pagReservar.php";</script>';
		
		 		break;
		 	case 2: 
		 		echo '<script>alert("A hora início não pode ser maior ou igual a hora fim, insira novo horário, por favor.");window.location="pagCadReservas.php";</script>';
		 		break;
		 		
			}
			
		}
		else{
			
			$query = "INSERT INTO tb_reserva(id_reserva, data, hora_inicio, hora_fim, disciplina, finalidade, confirmacao,
			id_usuario, id_laboratorio) VALUES (NULL, '$data', '$hinicio', '$hfim', '$disciplina', '$finalidade',
			'$confirm', '$idUsu', '$idLab')";
			
			mysql_query($query, $conn);
			}
			
			if($query){
				switch($idUsuTp){
		 		case 1: 
		 			header("location:pagReservar.php");
		 			break;
		 		case 2: 
		 			header("location:pagUsuario.php");
		 			break;
		 		
			}
		}	
	}
?>

<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
		<title>Salva Usuario</title>
	</head>
	<body>

	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
	<title>Exlui Reserva</title>
	</head>
	<body>
		<?php 
	$conn = mysql_connect("localhost","root","") or die("ERRO FUUUUH!");
	mysql_select_db("dbLaboratorio");
	$exc = $_POST['excluir'];
	//if(isset($exc)){
		$zero = 2;
		$id = $_GET['id'];
		echo $id;
		mysql_query("UPDATE tb_reserva SET confirmacao='".$zero."' WHERE id_reserva='".$id."'");
		mysql_close($conn);
	
		header("location:pagUsuario.php");
//	}
?>
	</body>

</html>
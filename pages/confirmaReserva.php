<!DOCTYPE html>
<html>
	<head>
	<title>Confirma Reserva</title>
	</head>
	<body>
	<?php 
	$conn = mysql_connect("localhost","root","") or die("ERRO FUUUUH!");
	mysql_select_db("dbLaboratorio");
	$exc = $_POST['excluir'];
	//if(isset($exc)){
		$zero = 1;
		$id = $_GET['id'];
		echo $id;
		mysql_query("UPDATE tb_reserva SET confirmacao='".$zero."' WHERE id_reserva='".$id."'");
		mysql_close($conn);
		
		header("location:pagAdm.php");
//	}
?>
	</body>

</html>
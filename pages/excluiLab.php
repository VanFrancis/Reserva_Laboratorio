<!DOCTYPE html>
<html>
	<head>
	<title>Exlui Usuario</title>
	</head>
	<body>
		<?php 
	$conn = mysql_connect("localhost","root","") or die("ERRO FUUUUH!");
	mysql_select_db("dbLaboratorio");
	$exc = $_POST['excluir'];
	//if(isset($exc)){
		$zero = 0;
		$id = $_GET['id'];
		echo $id;
		mysql_query("UPDATE tb_laboratorio SET status='".$zero."' WHERE id_laboratorio='".$id."'");
		mysql_close($conn);
		
		header("location:pagLab.php");
//	}
?>
	</body>

</html>
<?php 
	require'conexao.php';
	$nome  = $_POST["nome"];
	$qtd_pc  = $_POST["qtd_pc"];
	$multi = $_POST["multimidia"];
	$id = $_POST["id_laboratorio"];
	$id_us = (int)$id;
	$status = 1;
	echo $id_us;
	mysql_query("UPDATE tb_laboratorio SET
		nome='".$nome."',
		qtd_pc='".$qtd_pc."',
		multimidia='".$multi."',
		status='".$status."'
		WHERE id_laboratorio =".$id_us) 
		or die (mysql_error());
		mysql_close($conn);
		
		header("location:pagLab.php");
?>
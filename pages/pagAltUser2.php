<?php 
	require'conexao.php';
	$nome  = $_POST["nome"];
	$email = $_POST["email"];
	$siape = $_POST["siape"];
	$senha = $_POST["senha"];
	$id_tp = $_POST["tp_usuario"];
	$id_usuario = $_POST["id_usuario"];
	$id_us = (int)$id_usuario;
	$status = 1;
	mysql_query("UPDATE tb_usuario SET
		nome='".$nome."',
		email='".$email."',
		siape='".$siape."',
		senha='".$senha."',
		status='".$status."',
		id_tp_usuario='".$id_tp."'
		WHERE id_usuario=".$id_us) 
		or die (mysql_error());
		mysql_close($conexao);
		
	header("location:pagExibeUser.php");
?>
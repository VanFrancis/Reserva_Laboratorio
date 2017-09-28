<?php 
	//cria uma sessao
	session_start();
	//recebe tudo q tiver no campo senha e usuario
	$usuario = $_POST['email'];
	$senha = $_POST['senha'];
	require 'conexao.php';
	 ?>
	 <?php 
	//cria outra sessao
	//consulta no banco "Busca"
	$val = mysql_query("SELECT * FROM tb_usuario WHERE email = '".$usuario."' and senha = '".$senha."'",$conn);
	 // se o numeros de linhas da tabela for = 1 
	 if(mysql_num_rows($val)==1){
	 	//cria uma location 
	 	header("location:pagUsuario.php");
	 	$_SESSION['email'] = "$usuario";
	 	$_SESSION['senha'] = "$senha";
	 }else {
	 	header("location:pagErro.php");
	 }
?>
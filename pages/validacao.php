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
	$val = mysql_query("SELECT * FROM tb_usuario WHERE status=1 and email = '".$usuario."' and senha = '".$senha."'",$conn);
	
	 // se o numeros de linhas da tabela for = 1 
	 if(mysql_num_rows($val)==1){
	 	$vale=mysql_fetch_array($val);
		
		//pegando id
		$id = $vale['id_usuario'];
	 	//cria uma location 
	
	 	$_SESSION['email'] = "$usuario";
	 	$_SESSION['senha'] = "$senha";
		$_SESSION['nome'] = $vale['nome'];
	 	$_SESSION['tipo'] = $vale['id_tp_usuario'];
	 	$_SESSION['idLogado'] = "$id";
	 	
	 	switch($vale['id_tp_usuario']){
	 		case 1: 
	 			header("location:pagAdm.php");
	 			break;
	 		case 2: 
	 			header("location:pagUsuario.php");
	 			break;
	 	}
	 }else {
	 	//Mensagem de Erro
		$_SESSION['loginErro'] = "Usuário ou senha Inválido";
		//Manda o usuario para a tela de index
		header("Location:../index.php");
	 }
?>
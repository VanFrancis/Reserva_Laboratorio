<!DOCTYPE html>
<html>
    <head>
		<title>Salva Usuario</title>
	</head>
	<body>
		<?php 
			$conn = mysql_connect("localhost","root","") or die ("ERRO FUUUUH!");
			mysql_select_db("dplabreserva");
			if(isset($_Post["cadastrar"])){
				$nome = $_Post['nome'];
				
				echo $nome;
				$email = $_Post['email'];
				$siape = $_Post['siape'];
				$senha = $_Post['senha'];
				$status = 1; /*Status 1 Ativo*/
				$id_tp_usuario = 2; /*id 2 para usuários*/
				if (!$conn) 
					die ("Erro de Conexão".mysql_error());
				$query = "INSERT INTO tb_usuario(id,nome,email,siape,senha,status,id_tp_usuario) VALUES (NULL, '$nome','$email','$siape','$senha','$status','$id_tp_usuario')"; 	
				mysql_query($query,$conn);
				}
				header("location:sucesso.php");
		    ?>
	</body>
</html>
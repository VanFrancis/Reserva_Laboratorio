<!DOCTYPE html>
<html>
    <head>
		<title>Salva Laboratorio</title>
	</head>
	<body>
		<?php 
			include('conexao.php');
			
			if(isset($_POST["cadastrar"])){
				$qtd_pc = $_POST['qtd_pc'];
				$mult = $_POST['multimidia'];
				$nome = $_POST['nome'];
				$status = 1; /*Status 1 Ativo*/
				if (!$conn) 
					die ("Erro de Conexão".mysql_error());
				$query = "INSERT INTO tb_laboratorio(`id_laboratorio`,`qtd_pc`,`multimidia`,`nome`,`status`) VALUES (NULL, '$qtd_pc','$mult','$nome','$status')"; 	
				if(!mysql_query($query,$conn)) die(mysql_error());
				}
				header("location:pagLab.php");
		    ?>
	</body>
</html>
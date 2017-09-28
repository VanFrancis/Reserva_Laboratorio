<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
		<title>Salva Usuario</title>
	</head>
	<body>

	</body>
</html>
<?php 
	$conn = mysql_connect("localhost","root","") or die("ERRO FUUUUH!");
	mysql_select_db("dbLaboratorio");
	
	if(isset($_POST["cadastrar"])){
		$nome 				=$_POST['nome'];
		$email 				=$_POST['email'];
		$siape				=$_POST['siape'];
		$senha 				=$_POST['senha'];
		$status 			=1; /*Status 1 Ativo*/
		$id_tp_usuario 		=$_POST['tp_usuario'];
		//echo $id_tp_usuario; 
		$email2=0;
		$query_usu = "SELECT email FROM tb_usuario WHERE email = '".$email."'";
		$procura = mysql_query($query_usu, $conn);
	//	$vet = mysql_fetch_array($query_usu);
	//	$email2 = $vet['email'];
		
		if(mysql_num_rows($procura)==1){
			echo '<script>alert("E-mail já cadastrado, use outro, por favor.");window.location="pagUser.php";</script>';
			break;
		}
		else{
			$query = "INSERT INTO tb_usuario(id_usuario, nome, email, siape, senha, status, id_tp_usuario) VALUES (NULL, '$nome','$email','$siape','$senha','$status','$id_tp_usuario')"; 	
			mysql_query($query, $conn);
	
			if($query){
				header("location:pagUser.php");
			}	
		}
	
	}
?>


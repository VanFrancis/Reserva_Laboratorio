<?php 
//declara as variavies 
$banco = "dbLaboratorio"; //recebe o banco cirado no mySQL
$user = "root"; //define o adm pelo o login do Xamp
$passoword = "";
$hostname = "localhost"; //endereço do banco 
//Abre uma conexão 
$conn = mysql_connect($hostname,$user,$passoword) or die ("Não conectou FUUUUH!");
		mysql_select_db($banco);
	//se não tiver nada na conexão
	/*if(!$conn){
		echo "Conexão não conectou";
	}else{
		echo "AEEEH Funcionou \o/";
	}*/
 ?>
<?php 
	require'conexao.php';
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reserva - Adm</title>
        <?php include('head.php'); ?>
    </head>
    <body>
		<?php include('menuSuper.php'); ?>
		<div id="page-wrapper">
			<div class="col-md-offset-1 col-lg-8">
				<h1 class="page-titulo">Controle de Laboratórios</h1>	
				<ol class="breadcrumb">
				  <li><a href="pagAdm.php">Principal</a></li>
				  <li><a href="pagLab.php">Lista Laboratórios</a></li>
				  <li class="active">Alterar</li>
				</ol>
			</div>
			<?php
			//GET id passada pela lista
			$id=$_GET["id"];
			//Faz consulta para achar os dados a partir do id
			$consulta1=mysql_query("SELECT *FROM tb_laboratorio where id_laboratorio='".$id."'") 
			or die (mysql_error());
			//Pegando os dados apartir da consulta
			$dados1 = mysql_fetch_array($consulta1);
			//	echo 
			?>
			<div class="cont-left col-md-8 row col-md-offset-1">
				<h2 class="titulo">Alterar Laboratório</h2>
				<form class="boxreserva fomr-signin" action="alterLab2.php" method="post">
					<div class="form-group">
						<label for="basic-url">Nome do Laboratório</label>
						<input id="nome" class="form-control" value="<?=($dados1['nome']);?>" name="nome" type="text" oninput="setCustomValidity('')" 
						oninvalid="this.setCustomValidity('Preencha o campo Nome do Laboratório')" required />
					</div>
					<div class="form-group">
						<label for="basic-url">Quantidade de Computadores</label>
						<input id="qtd_pc" class="form-control" value="<?=($dados1['qtd_pc']);?>" name="qtd_pc" type="number" oninput="setCustomValidity('')" 
						oninvalid="this.setCustomValidity('Preencha o campo Quantidade de Computadores')" required />
					</div>
					<label for="basic-url">Multimídia</label>
					<div class="form-group">
						<label class="radio-inline">
					    	<input type="radio" name="multimidia" value="Datashow" 
					    	<?php
								if($dados1['multimidia']=="Datashow"){
									echo 'checked';
								}?>>Datashow
					    </label>
					    <label class="radio-inline">
					      	<input type="radio" value="Televisão" name="multimidia"						    	<?php
								if($dados1['multimidia']=="Televisão"){
									echo 'checked';
								}?>>Televisão
					    </label>
					    <label class="radio-inline">
					      	<input type="radio" value="Tv/Datashow" name="multimidia"						    	<?php
								if($dados1['multimidia']=="Tv/Datashow"){
									echo 'checked';
								}?>>TV/Datashow
					    </label>
					</div>
					<input type="hidden" id="id_laboratorio" name="id_laboratorio" value="<?=($dados1['id_laboratorio']);?>" />	
					<input class="btn btn-lg btn-primary btn-block" name="alterar" type="submit" value="Alterar">
				</form>	
			</div>
		</div>
    </body>
</html>
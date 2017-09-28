<?php 
	session_start();
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
		<?php
			//GET id passada pela lista
			$id=$_GET["id"];
			//Faz consulta para achar os dados a partir do id
			$consulta1=mysql_query("SELECT *FROM tb_usuario where id_usuario='".$id."'") 
			or die (mysql_error());
			//Pegando os dados apartir da consulta
			$dados1 = mysql_fetch_array($consulta1);
		?>
				
		<div id="page-wrapper">
			<div class="col-md-offset-1 col-lg-12">
				<h1 class="page-titulo">Detalhe Usuário</h1>
				<ol class="breadcrumb">
				  <li><a href="pagAdm.php">Principal</a></li>
				  <li><a href="pagExibeUser.php">Lista Usuários</a></li>
				  <li class="active">Visualizar</li>
				</ol>
			</div>
			<section class="pricipal col-md-12">
				<div class="col-md-offset-1 col-md-6 row visu">
					<h4>Nome: <?php
						echo $dados1['nome'];
					?></h4>
					<h4>E-mail: <?php
						echo $dados1['email'];
					?> </h4>
					<h4>Siape:  <?php
						echo $dados1['siape'];
					?> </h4>
				</div>
				
				<div class=" col-md-offset-1 cont-left col-md-10">
					<h2 class="titulo">Laboratórios Reservados</h2>	
					<table class="table table-striped">
						<tr>
						    <td><i class="fa fa-desktop" aria-hidden="true"></i><strong> Laboratório</strong></td>
						    <td><i class="fa fa-calendar"></i><strong> Data</strong></td> 
						    <td><i class="fa fa-clock-o"></i><strong> Hora-Inicio</strong></td>
						    <td><i class="fa fa-clock-o"></i><strong> Hora-Fim</strong></td>
						    
						</tr>
						  	<?php 
							$query = mysql_query("SELECT * FROM tb_reserva WHERE id_usuario='".$id."'") or die (mysql_error());
								while ($array = mysql_fetch_array($query)){
									$lab = $array['id_laboratorio'];
									$query_lab = mysql_query("SELECT nome FROM tb_laboratorio WHERE id_laboratorio='".$lab."'" );
									while($vet = mysql_fetch_array($query_lab))
										$labNome = $vet['nome'];
							
						 		?>
							<tr>
								<td>
									<?php echo $labNome; ?>
								</td>
								<td>
									<?php echo date('d/m/Y', strtotime($array['data']));  ?>
								</td>
								<td>
									<?php echo $array['hora_inicio']; ?>
								</td>
								<td>
									<?php echo $array['hora_fim']; ?>
								</td>
							</tr> <?php  } ?>
					</table>
				</div>
			</section>
		</div>

    </body>
</html>
<?php
	require'conexao.php';
	session_start();
	if(IsSet($_SESSION['idLogado']))
		$idUsu=$_SESSION['idLogado'];
	$query = mysql_query("SELECT id_laboratorio,nome FROM tb_laboratorio WHERE status=1 ORDER BY nome ASC"); //Exibir no dropdonwlist 
?>
<html>
	<head>
		<title>Painel Usário</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<section class="pricipal col-md-12">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
				    <ul class="nav navbar-nav">
				    	<a class="navbar-brand" href="#">Reserva 5à7</a>
				        <li class="active"><a href="pagUsuario.php">Principal <span class="sr-only">(current)</span></a></li>
				     </ul>
				     <ul class="nav navbar-nav">
				     	<li><a href="pagCadReservas.php">Solicitar Reservas</a></li>
				     </ul>
				     <ul class="nav navbar-nav navbar-right">
        				<li><a href="../index.php"><i class="fa fa-sign-out"></i>Sair</a></li>
        			</ul>
				     <ul class="nav navbar-nav navbar-right">
				     	<li><a href="#">Olá, <?php echo $_SESSION['nome'];?></span></a></li>
				     </ul>
			  	</div>
			</nav>
				<!--Conteudo lateral DIREITO-->
				<div class="col-md-offset-1 cont-left col-md-10 espaco">
					<h2 class="titulo">Solicitação de Reserva</h2>	
					<table class="table table-striped">
					  <tr>
					    <td><i class="fa fa-calendar"></i> Data</td>
					    <td><i class="fa fa-clock-o"></i> Hora Início</td>
					    <td><i class="fa fa-clock-o"></i> Hora Fim</td>
					    <td><i class="fa fa-book" aria-hidden="true"></i> Displina</td>
					    <td><i class="fa fa-desktop"></i> Laboratório</td> 
					    <td> </td>
					  </tr>
					  <?php 
						require'conexao.php';
						$query = mysql_query("SELECT * FROM tb_reserva WHERE id_usuario='".$idUsu."' AND confirmacao=0 ORDER BY data ASC") or die (mysql_error());
						
							while ($array = mysql_fetch_array($query)){
								
								$data 				=$array['data'];
								$hinicio 			=$array['hinicio'];
								$hfim 				=$array['hfim'];
								$disciplina 		=$array['disciplina'];
								$finalidade 		=$array['finalidade'];
								$confirma 			= 1; /*1 para reservado e não confirmado*/
								$lab 				=$array['id_laboratorio'];
								$query_lab = mysql_query("SELECT * FROM tb_laboratorio WHERE id_laboratorio='".$lab."'" );
								while($vet = mysql_fetch_array($query_lab))
									$labNome = $vet['nome'];
								
					 	?>
							<tr>
								<td>
									<?php echo date('d/m/Y', strtotime($array['data'])); ?>
								</td>
								<td>
									<?php echo $array['hora_inicio']; ?>
								</td>
								<td>
									<?php echo $array['hora_fim']; ?>
								</td>
								<td>
									<?php echo $array['disciplina']; ?>
								</td>
								<td>
									<?php echo $labNome ?>
								</td>
								<td>
								<a class="btn btn-danger btn-sm" href="excluirReserva.php?id=<?=($array['id_reserva']);?>"
								OnClick="return confirm ('Confirma exclusão da Reserva?')"><i class="fa fa-trash"></i></a></td>
							</tr> <?php  } ?>
					</table>
				</div>
				<div class="col-md-offset-1 cont-left col-md-10 espaco2">
					<h2 class="titulo">Lista de Reservas - Confirmadas</h2>	
					<table class="table table-striped">
					  <tr>
					    <td><i class="fa fa-calendar"></i> Data</td>
					    <td><i class="fa fa-clock-o"></i> Hora Início</td>
					    <td><i class="fa fa-clock-o"></i> Hora Fim</td>
					    <td><i class="fa fa-book" aria-hidden="true"></i> Displina</td>
					    <td><i class="fa fa-desktop"></i> Laboratório</td> 
					    <td> </td>
					  </tr>
					  <?php 
						require'conexao.php';
						$query = mysql_query("SELECT * FROM tb_reserva WHERE id_usuario='".$idUsu."' AND confirmacao=1 ORDER BY data ASC") or die (mysql_error());
						
							while ($array = mysql_fetch_array($query)){
								
								$data 				=$array['data'];
								$hinicio 			=$array['hinicio'];
								$hfim 				=$array['hfim'];
								$disciplina 		=$array['disciplina'];
								$finalidade 		=$array['finalidade'];
								$confirma 			= 1; /*1 para reservado e não confirmado*/
								$lab 				=$array['id_laboratorio'];
								$query_lab = mysql_query("SELECT * FROM tb_laboratorio WHERE id_laboratorio='".$lab."'" );
								while($vet = mysql_fetch_array($query_lab))
									$labNome = $vet['nome'];
								
					 	?>
							<tr>
								<td>
									<?php echo date('d/m/Y', strtotime($array['data']));  ?>
								</td>
								<td>
									<?php echo $array['hora_inicio']; ?>
								</td>
								<td>
									<?php echo $array['hora_fim']; ?>
								</td>
								<td>
									<?php echo $array['disciplina']; ?>
								</td>
								<td>
									<?php echo $labNome ?>
								</td>
							</tr> <?php  } ?>
					</table>
				</div>
				<div class="col-md-offset-1 cont-left col-md-10 espaco2">
					<h2 class="titulo">Lista de Reservas - Cancelada</h2>	
					<table class="table table-striped">
					  <tr>
					    <td><i class="fa fa-calendar"></i> Data</td>
					    <td><i class="fa fa-clock-o"></i> Hora Início</td>
					    <td><i class="fa fa-clock-o"></i> Hora Fim</td>
					    <td><i class="fa fa-book" aria-hidden="true"></i> Displina</td>
					    <td><i class="fa fa-desktop"></i> Laboratório</td> 
					    <td> </td>
					  </tr>
					  <?php 
						require'conexao.php';
						$query = mysql_query("SELECT * FROM tb_reserva WHERE id_usuario='".$idUsu."' AND confirmacao=2 ORDER BY data ASC") or die (mysql_error());
					
							while ($array = mysql_fetch_array($query)){
								
								$data 				=$array['data'];
								$hinicio 			=$array['hinicio'];
								$hfim 				=$array['hfim'];
								$disciplina 		=$array['disciplina'];
								$finalidade 		=$array['finalidade'];
								$confirma 			= 1; /*1 para reservado e não confirmado*/
								$lab 				=$array['id_laboratorio'];
								$query_lab = mysql_query("SELECT * FROM tb_laboratorio WHERE id_laboratorio='".$lab."'" );
								while($vet = mysql_fetch_array($query_lab))
									$labNome = $vet['nome'];
								
					 	?>
							<tr>
								<td>
									<?php echo date('d/m/Y', strtotime($array['data']));  ?>
								</td>
								<td>
									<?php echo $array['hora_inicio']; ?>
								</td>
								<td>
									<?php echo $array['hora_fim']; ?>
								</td>
								<td>
									<?php echo $array['disciplina']; ?>
								</td>
								<td>
									<?php echo $labNome ?>
								</td>
							</tr> <?php  } ?>
					</table>
				</div>
			</div>
		</section>
	</body>
</html>
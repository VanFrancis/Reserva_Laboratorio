<!DOCTYPE html>
<?php
	require("conexao.php");
?>
<html>
    <head>
 	<title>Reserva - Adm</title>
        <?php include('head.php'); ?>
    </head>
    <body>
		<?php include('menuSuper.php'); ?>
		<div id="page-wrapper">
			<div class="col-md-offset-1 col-lg-10">
				<h1 class="page-titulo">Gerenciamento de Reservas</h1>	
			</div>
				<!--Conteudo LISTA PENDENTE-->
				<div class="col-md-offset-1 cont-left col-md-9">
					<h2 class="titulo">Lista de Reserva - PENDENTE </h2>	
					<table class="table table-striped">
					  <tr>
					    <td><i class="fa fa-calendar"></i> Data</td>
					    <td><i class="fa fa-desktop"></i> Laboratório</td> 
					    <td><i class="fa fa-clock-o"></i> Hora-Início</td>
					    <td><i class="fa fa-clock-o"></i> Hora-Fim</td>
					    <td><i class="fa fa-user" aria-hidden="true"></i> Usuário</td>
					    <td></td>
					  </tr>
					  
					  	<?php
							$query = mysql_query("SELECT * FROM tb_reserva AS r
							INNER JOIN tb_usuario AS u
							ON r.id_usuario = u.id_usuario
							INNER JOIN tb_laboratorio AS l
							ON r.id_laboratorio = l.id_laboratorio
							WHERE r.confirmacao = 0 ORDER BY r.data ASC;
							 ") or exit( mysql_error() );
							
							while($array = mysql_fetch_array($query)){
								$lab = $array['id_laboratorio'];
								$usu = $array['id_usuario'];
								$query_lab = mysql_query("SELECT nome FROM tb_laboratorio WHERE id_laboratorio='".$lab."'" );
								while($vet = mysql_fetch_array($query_lab))
									$labNome = $vet['nome'];
								$query_usu = mysql_query("SELECT nome FROM tb_usuario WHERE id_usuario='".$usu."'");
								while($vetor = mysql_fetch_array($query_usu))
									$usuNome = $vetor['nome'];
					  	?>
					  	<tr>
					    <td><?php echo date('d/m/Y', strtotime($array['data']));  ?></td>
					    <td><?php echo $labNome; ?></td> 
					    <td><?php echo $array['hora_inicio']; ?></td>
					    <td><?php echo $array['hora_fim']; ?></td>
					    <td><?php echo $usuNome; ?></td> 
					    <td>
					    	<a class="btn btn-success btn-sm" href="confirmaReserva.php?id=<?=($array['id_reserva']);?>"
							OnClick="return confirm ('Deseja Confirmar a reserva do laboratorio?')"><i class="fa fa-check" aria-hidden="true"></i></a>
							<a class="btn btn-danger btn-sm" href="cancelaReserva.php?id=<?=($array['id_reserva']);?>"
							OnClick="return confirm ('Deseja Cancelar a reserva do laboratorio?')"><i class="fa fa-ban" aria-hidden="true"></i></a>
						</td>
						<?php 	} ?>
					  </tr>
					</table>
				</div>
				<!--Conteudo LISTA Confirmados-->
				<div class="col-md-offset-1 cont-left col-md-9">
					<h2 class="titulo">Lista de Reserva - CONFIRMADO </h2>	
					<table class="table table-striped">
					  <tr>
					    <td><i class="fa fa-calendar"></i> Data</td>
					    <td><i class="fa fa-desktop"></i> Laboratório</td> 
					    <td><i class="fa fa-clock-o"></i> Hora-Início</td>
					    <td><i class="fa fa-clock-o"></i> Hora-Fim</td>
					    <td><i class="fa fa-user" aria-hidden="true"></i> Usuário</td>
					  </tr>
					  	<?php
							$query = mysql_query("SELECT * FROM tb_reserva AS r
							INNER JOIN tb_usuario AS u
							ON r.id_usuario = u.id_usuario
							INNER JOIN tb_laboratorio AS l
							ON r.id_laboratorio = l.id_laboratorio
							WHERE r.confirmacao = 1 ORDER BY r.data ASC ;
							 ") or exit( mysql_error() );
							
							while($array = mysql_fetch_array($query)){
								$lab = $array['id_laboratorio'];
								$usu = $array['id_usuario'];
								$query_lab = mysql_query("SELECT nome FROM tb_laboratorio WHERE id_laboratorio='".$lab."'" );
								while($vet = mysql_fetch_array($query_lab))
									$labNome = $vet['nome'];
								$query_usu = mysql_query("SELECT nome FROM tb_usuario WHERE id_usuario='".$usu."'");
								while($vetor = mysql_fetch_array($query_usu))
									$usuNome = $vetor['nome'];
					  	?>
					  	<tr>
						    <td><?php echo date('d/m/Y', strtotime($array['data']));  ?></td>
						    <td><?php echo $labNome; ?></td> 
						    <td><?php echo $array['hora_inicio']; ?></td>
						    <td><?php echo $array['hora_fim']; ?></td>
						    <td><?php echo $usuNome; ?></td> 
					  </tr>
					  <?php } ?>
					</table>
				</div>
				<!--Conteudo LISTA Cancelado-->
				<div class="col-md-offset-1 cont-left col-md-9">
					<h2 class="titulo">Lista de Reserva - CANCELADO </h2>	
					<table class="table table-striped">
					  <tr>
					    <td><i class="fa fa-calendar"></i> Data</td>
					    <td><i class="fa fa-desktop"></i> Laboratório</td> 
					    <td><i class="fa fa-clock-o"></i> Hora-Início</td>
					    <td><i class="fa fa-clock-o"></i> Hora-Fim</td>
					    <td><i class="fa fa-user" aria-hidden="true"></i> Usuário</td>
					  </tr>
					  <?php
							$query = mysql_query("SELECT * FROM tb_reserva AS r
							INNER JOIN tb_usuario AS u
							ON r.id_usuario = u.id_usuario
							INNER JOIN tb_laboratorio AS l
							ON r.id_laboratorio = l.id_laboratorio
							WHERE r.confirmacao = 2 ORDER BY r.data ASC;
							 ") or exit( mysql_error() );
							
							while($array = mysql_fetch_array($query)){
								$lab = $array['id_laboratorio'];
								$usu = $array['id_usuario'];
								$query_lab = mysql_query("SELECT nome FROM tb_laboratorio WHERE id_laboratorio='".$lab."'" );
								while($vet = mysql_fetch_array($query_lab))
									$labNome = $vet['nome'];
								$query_usu = mysql_query("SELECT nome FROM tb_usuario WHERE id_usuario='".$usu."'");
								while($vetor = mysql_fetch_array($query_usu))
									$usuNome = $vetor['nome'];
					  	?>
					  <tr>
					  	<td><?php echo date('d/m/Y', strtotime($array['data']));   ?></td>
					    <td><?php echo $labNome; ?></td> 
					    <td><?php echo $array['hora_inicio']; ?></td>
					    <td><?php echo $array['hora_fim']; ?></td>
					    <td><?php echo $usuNome; ?></td> 
					  </tr>
					  <?php } ?>
					</table>
				</div>
			</div>
		</div>
		
    </body>
</html>
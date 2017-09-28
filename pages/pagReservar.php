<?php 
	require'conexao.php';
	session_start();
	if(IsSet($_SESSION['idLogado']))
		$idUsu=$_SESSION['idLogado'];
	$query = mysql_query("SELECT id_laboratorio,nome FROM tb_laboratorio WHERE status=1 ORDER BY nome ASC"); //Exibir no dropdonwlist 
	if(IsSet($_SESSION['tipo']))
		$idUsuTp=$_SESSION['tipo'];
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
			<div class=" col-lg-12">
				<h1 class="col-md-offset-1 page-titulo">Controle de Laboratórios</h1>	
			<ol class="col-md-offset-1  breadcrumb">
			  <li><a href="pagAdm.php">Principal</a></li>
			  <li class="active">Reservar Laboratório</li>
			</ol>
		</div>
		<?php
		
			$atual = new DateTime();
			$today = date("Y-m-d"); 
			$today = date('Y-m-d', strtotime("-1 days",strtotime($today))); 
			$daquidepois = date('Y-m-d', strtotime("+6 months",strtotime($today))); 
		?>
		<!--TABELDA DE EXIBIÇÃO-->
		<div class="cont-left col-md-6">
				<h2 class="titulo">Reservar Laboratório</h2>
					<form class="box-reserva fomr-signin"  action="salvaReserva.php" method="post">
						<span></span>
						<div class="form-group">
							<label for="basic-url">Data da Reserva</label>
							<input id="data" id="data" class="form-control" name="data" min="<?php echo $today; ?>" max="<?php echo $daquidepois; ?>"  type="date" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Data')" required />
						</div>
						<div class="form-group">
							<label for="basic-url">Hora Início</label>
							<select class="form-control" name="hinicio" required>
								<option value="" selected="true" disabled="disabled">Selecione...</option>
								<option value="07:40" name="hinicio">07:40</option>
								<option value="08:30" name="hinicio">08:30</option>
								<option value="09:20" name="hinicio">09:20</option>
								<option value="10:30" name="hinicio">10:30</option>
								<option value="11:20" name="hinicio">11:20</option>
								<option value="13:30" name="hinicio">13:30</option>
								<option value="14:20" name="hinicio">14:20</option>
								<option value="15:10" name="hinicio">15:10</option>
								<option value="16:20" name="hinicio">16:20</option>
								<option value="17:10" name="hinicio">17:10</option>
								<option value="19:00" name="hinicio">19:00</option>
								<option value="19:50" name="hinicio">19:50</option>
								<option value="20:50" name="hinicio">20:50</option>
								<option value="21:50" name="hinicio">21:50</option>
								<option value="22:30" name="hinicio">22:30</option>
							</select>
						</div>
						<div class="form-group">
							<label for="basic-url">Hora Fim</label>
							<select class="form-control" name="hfim" required >
								<option value=""  selected="true" disabled="disabled">Selecione...</option>
								<option value="08:30" name="hfim">08:30</option>
								<option value="09:20" name="hfim">09:20</option>
								<option value="10:30" name="hfim">10:30</option>
								<option value="11:20" name="hfim">11:20</option>
								<option value="13:30" name="hfim">13:30</option>
								<option value="14:20" name="hfim">14:20</option>
								<option value="15:10" name="hfim">15:10</option>
								<option value="16:20" name="hfim">16:20</option>
								<option value="17:10" name="hfim">17:10</option>
								<option value="19:00" name="hfim">19:00</option>
								<option value="19:50" name="hfim">19:50</option>
								<option value="20:50" name="hfim">20:50</option>
								<option value="21:50" name="hfim">21:50</option>
								<option value="22:30" name="hfim">22:30</option>
							</select>
						</div>
						<div class="form-group">
							<label for="basic-url">Disciplina</label>
							<input id="disciplina" class="form-control" name="disciplina" type="text" placeholder="Disciplina" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Disciplina')" required />
						</div>
						<div class="form-group">
						  <label for="comment">Finalidade</label>
						  <textarea class="form-control" name="finalidade" rows="5" id="comment" placeholder="Deixe um breve cometário..." oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Finalidade')" required></textarea>
						</div>
						<div class="form-group">
							<label for="basic-url">Laboratório</label>
							<select name="lab" class="form-control" required>
								<option value="" selected="true" disabled="disabled">Selecione...</option>
								
								<?php 
							
								while($labo = mysql_fetch_array($query)) { ?>
								 <option value="<?php echo $labo['id_laboratorio'] ?>"><?php echo $labo['nome'] ?></option>
								 <?php } ?>
							</select>
						</div>
						<input class="btn btn-lg btn-primary btn-block" name="reservar" type="submit" value="Reservar">
					</form>	
				</div>
		<div class="cont-left col-md-6">
			<h2 class="titulo">Laboratórios Reservados</h2>	
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
				$confirma = 0;
				$query = mysql_query("select tb_reserva.* from tb_tp_usuario inner join tb_usuario  on tb_tp_usuario.id_tp_usuario = '".$idUsuTp."' inner join tb_reserva on tb_usuario.id_usuario = tb_reserva.id_usuario WHERE tb_usuario.id_usuario='".$idUsu."' AND tb_reserva.confirmacao='".$confirm."' ORDER BY tb_reserva.data ASC ") or die (mysql_error());
				
					while ($array = mysql_fetch_array($query)){
						
						$data 				=$array['data'];
						$hinicio 			=$array['hinicio'];
						$hfim 				=$array['hfim'];
						$disciplina 		=$array['disciplina'];
						$finalidade 		=$array['finalidade'];
						$confirma 			= 1; /*1 para reservado e não confirmado*/
						$lab 				=$array['id_laboratorio'];
						//
						$query_lab = mysql_query("SELECT * FROM tb_laboratorio WHERE id_laboratorio='".$lab."'"  );
						while($vet = mysql_fetch_array($query_lab)){
							$labNome = $vet['nome'];
						}
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
					</tr> <?php }  ?>
			</table>
		</div>
    </body>
</html>
<?php
	require'conexao.php';
	session_start();
	if(IsSet($_SESSION['idLogado']))
		$idUsu=$_SESSION['idLogado'];
	$query = mysql_query("SELECT id_laboratorio,nome FROM tb_laboratorio WHERE status=1 ORDER BY nome ASC"); //Exibir no dropdonwlist 

	$atual = new DateTime();
	$today = date("Y-m-d"); 
	$today = date('Y-m-d', strtotime("-1 days",strtotime($today))); 
	$daquidepois = date('Y-m-d', strtotime("+15 days",strtotime($today))); 
		
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
				        <li><a href="pagUsuario.php">Principal <span class="sr-only">(current)</span></a></li>
				     </ul>
				     <ul class="nav navbar-nav">
				     	<li class="active"><a href="pagCadReservas.php">Solicitar Reservas</a></li>
				     </ul>
				     <ul class="nav navbar-nav navbar-right">
        				<li><a href="../index.php"><i class="fa fa-sign-out"></i>Sair</a></li>
        			</ul>
				     <ul class="nav navbar-nav navbar-right">
				     	<li><a href="#">Olá, <?php echo $_SESSION['nome'];?></span></a></li>
				     </ul>
			  	</div>
			</nav>
			<!--Conteudo lateral ESQUERDO-->
			<div class="col-md-offset-3 cont-left col-md-6 espaco">
				<h2 class="titulo">Reservar Laboratório</h2>
				<form class="box-reserva fomr-signin" action="salvaReserva.php" method="post">
					<div class="row">
						<div class="form-group margen">
							<label for="basic-url">Data da Reserva</label>
							<input id="data" id="data" class="form-control" name="data" type="date" min="<?php echo $today; ?>" max="<?php echo $daquidepois; ?>" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Data')" required />
						</div>
						<div class="form-group margen text-left">
							<label for="basic-url" class="text-left">Hora Início</label>
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
							</select>
						</div>
						<div class="form-group margen text-left">
							<label for="basic-url">Hora Fim</label>
							<select class="form-control" name="hfim" required>
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
						<div class="form-group margen text-left">
							<label for="basic-url">Laboratório</label>
							<select name="lab" class="form-control" required>
								<option value="" selected="true" disabled="disabled">Selecione...</option>
								
								<?php while($labo = mysql_fetch_array($query)) { ?>
								 <option value="<?php echo $labo['id_laboratorio'] ?>"><?php echo $labo['nome'] ?></option>
								 <?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group text-left">
						<label for="basic-url ">Disciplina</label>
						<input id="disciplina" class="form-control" name="disciplina" type="text" placeholder="Disciplina" oninput="setCustomValidity('')" 
						oninvalid="this.setCustomValidity('Preencha o campo Disciplina')" required />
					</div>
					<div class="form-group text-left">
					  <label for="comment">Finalidade</label>
					  <textarea class="form-control" name="finalidade" rows="5" id="comment" placeholder="Deixe um breve cometário..." oninput="setCustomValidity('')" 
						oninvalid="this.setCustomValidity('Preencha o campo Finalidade')" required></textarea>
					</div>
					
					<input class="btn btn-lg btn-primary btn-block" name="reservar" type="submit" value="Reservar">
				</form>	
			</div>
		</section>
	</body>
</html>
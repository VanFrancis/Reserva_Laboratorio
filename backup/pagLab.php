<?php 
	require'conexao.php';
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reserva - Adm</title>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<!-- LINK ESTERNO BOOTSTRAP-->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
		integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
		integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<!-- LINK ESTERNO JQUERY-->
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<!-- LINK ESTERNO FONT AWESOME-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>
    <body>
       <!--Nave topo-->
       <nav class="navbar navbar-inverse">
		 <div class="navbar-header">
        	<a class="navbar-brand" href="#">Administrador - 5à7</a>
    	</div>
		</nav>
		<!--Nave lateral-->
		<div>
		  <ul class="nav navbar-nav side-nav">
		    <li class="linha active"><a href="pagAdm.php">Pricipal</a></li>
		    <li class="linha"><a href="pagLab.php">Laboratórios</a></li>
		    <li class="linha"><a href="pagUser.php">Usuários</a></li>
		    <li class="linha"><a href="pagConfig.php">Configuração</a></li>
		  </ul>
		</div>
		<div id="page-wrapper">
			<div class="col-md-12">
				<div class="col-md-offset-1 col-lg-12">
					<h1 class="page-titulo">Controle de Laboratórios</h1>	
				</div>
				<!--FORMULÁRIO DE CADASTRO-->
				<div class="row">
					<div class="col-md-offset-1 cont-left col-md-5">
							<h2 class="titulo">Cadastrar Laboratórios</h2>
					<form class="boxreserva fomr-signin" action="salvalab.php" method="post">
						<div class="form-group">
							<label for="basic-url">Nome do Laboratório</label>
							<input id="nome" class="form-control" name="nome" type="text" placeholder="Nome do Laboratório" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Nome do Laboratório')" required />
						</div>
						<div class="form-group">
							<label for="basic-url">Quantidade de Computadores</label>
							<input id="qtd_pc" class="form-control" name="qtd_pc" type="number" placeholder="Quantidade de Computadores" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Quantidade de Computadores')" required />
						</div>
						<label for="basic-url">Multimídia</label>
						<div class="form-group">
				
							<label class="radio-inline">
						    	<input type="radio"  value="Datashow" name="multimidia">Datashow
						    </label>
						    <label class="radio-inline">
						      	<input type="radio" value="Televisão" name="multimidia">Televisão
						    </label>
						    <label class="radio-inline">
						      	<input type="radio" value="Tv/Datashow" name="multimidia" required>TV/Datashow
						    </label>
						</div>
						
						
						<input class="btn btn-lg btn-primary btn-block" name="cadastrar" type="submit" value="Cadastrar">
					</form>	
				</div>
				<!--TABELDA DE EXIBIÇÃO-->
				<div class="cont-left col-md-6">
						<h2 class="titulo">Lista de Laboratórios</h2>	
					<table class="table table-striped">
					  <tr>
					    <td><i class="fa fa-user" aria-hidden="true"></i></i> Nome</td>
					    <td><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i> Quantidade</td> 
					    <td><i class="fa fa-television" aria-hidden="true"></i> Multimídia</td>
					    <td></td>
					  </tr>
					  <?php 
						$query = mysql_query("SELECT * FROM tb_laboratorio ORDER BY nome ASC") or die (mysql_error());
							while ($array = mysql_fetch_array($query)){
									$qtd_pc = $_Post['qtd_pc'];
									$multi = $_Post['multimidia'];
									$nome = $_Post['nome'];
					 	?>
							<tr>
								<td>
									<?php echo $array['nome']; ?>
								</td>
								<td>
									<?php echo $array['qtd_pc']; ?>
								</td>
								<td>
									<?php echo $array['multimidia']; ?>
								</td>
								<td>
									<input class="btn btn-danger" name="excluir" type="submit" value="Excluir">
								</td>
								
							</tr> <?php  } ?>
					</table>
				</div>
					
				</div>
				
				</div>
			</div>
		</div>
 
    </body>
</html>
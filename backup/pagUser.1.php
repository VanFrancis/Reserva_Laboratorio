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
       <nav class="barra-topo navbar navbar-inverse">
		 <div class="navbar-header">
        	<a class="navbar-brand" href="pagAdm.php">Administrador - 5à7</a>
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
					<h1 class="page-titulo">Controle de Usuários</h1>	
				</div>
				<!--FORMULÁRIO DE CADASTRO-->
				<div class="row">
					<div class="col-md-offset-1 cont-left col-md-5">
							<h2 class="titulo">Cadastrar Usuários</h2>
						<form class="box-reserva fomr-signin" action="salvausuarios.php" method="post">
						<span></span>
						<div class="form-group">
							<label for="basic-url">Nome</label>
							<input id="email" class="form-control" name="nome" type="text" placeholder="Nome" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Nome')" required />
						</div>
						<div class="form-group">
							<label for="basic-url">E-mail</label>
							<input id="email" class="form-control" name="email" type="email" placeholder="E-mail" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo E-mail')" required />
						</div>
						<div class="form-group">
							<label for="basic-url">Siape</label>
							<input id="siape" class="form-control" name="siape" type="text" placeholder="Siape" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Siape')" required />
						</div>
						<div class="form-group">
							<label for="basic-url">Senha</label>
							<input id="senha" id="senha" class="form-control" name="senha" type="password" placeholder="Senha" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Senha')" required />
						</div>
						<input class="btn btn-lg btn-primary btn-block" name="cadastrar" type="submit" value="Cadastrar">
					</form>	
				</div>
				<!--TABELDA DE EXIBIÇÃO-->
				<div class="cont-left col-md-6">
						<h2 class="titulo">Lista de Usuários</h2>	
					<table class="table table-striped">
					  <tr>
					    <td><i class="fa fa-user" aria-hidden="true"></i></i> Nome</td>
					    <td><i class="fa fa-envelope-o" aria-hidden="true"></i> E-mail</td> 
					    <td><i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Siape</td>
					  </tr>
					  <?php 
						$query = mysql_query("SELECT * FROM tb_usuario WHERE id_tp_usuario=2 ORDER BY nome ASC") or die (mysql_error());
							while ($array = mysql_fetch_array($query)){
									$nome = $_Post['nome'];
									$email = $_Post['email'];
									$siape = $_Post['siape'];
									/*$senha = $_Post['senha'];
									$status = 1;
									$id_tp_usuario = 2;*/
					 	?>
							<tr>
								<td>
									<?php echo $array['nome']; ?>
								</td>
								<td>
									<?php echo $array['email']; ?>
								</td>
								<td>
									<?php echo $array['siape']; ?>
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
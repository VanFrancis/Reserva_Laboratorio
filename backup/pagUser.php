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
				<h1>PAGINA USUARIO</h1>
				<!--FORMULÁRIO DE CADASTRO-->
				<div class="cont-left col-md-5 col-md-offset-4">
							<h2 class="titulo">Cadastrar</h2>
					<form class="box-reserva fomr-signin" action="#" method="post">
						<span></span>
						<div class="form-group">
							<label for="basic-url">Nome</label>
							<input id="email" class="form-control" name="email" type="text" placeholder="Nome" oninput="setCustomValidity('')" 
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
							<input id="senha" id="senha" class="form-control" name="Senha" type="password" placeholder="Senha" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Senha')" required />
						</div>
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Cadastrar">
					</form>	
				</div>
					
				</div>
				<!--USUARIOS CADASTRADO-->
				<div class="cont-left col-md-5">
					<h1>Teste Direitos</h1>
									<h2 class="titulo">Laboratórios Reservados</h2>	
					<table class="table table-striped">
					  <tr>
					    <td><i class="fa fa-calendar"></i> Data</td>
					    <td><i class="fa fa-desktop"></i> Laboratório</td> 
					    <td><i class="fa fa-clock-o"></i> Horário</td>
					    <td> </td>
					  </tr>
					  <tr>
					    <td>05-04-16</td>
					    <td>Laboratório 1 </td> 
					    <td>19:00-20:40</td>
					    <td><i class="fa fa-times"></i></td>
					  </tr>
					  <tr>
					    <td>05-04-16</td>
					    <td>Laboratório 1 </td> 
					    <td>19:00-20:40</td>
					    <td><i class="fa fa-times"></i></td>
					  </tr>
					  <tr>
					   <td>05-04-16</td>
					    <td>Laboratório 1 </td> 
					    <td>19:00-20:40</td>
					    <td><i class="fa fa-times"></i></td>
					  </tr>
					  <tr>
					   <td>05-04-16</td>
					    <td>Laboratório 1 </td> 
					    <td>19:00-20:40</td>
					    <td><i class="fa fa-times"></i></td>
					  </tr>

					</table>
				</div>
			</div>
			
		</div>
 
    </body>
</html>
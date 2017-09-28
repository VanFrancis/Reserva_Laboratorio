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
		<div id="page-wrapper" class="col-md-12">
			<div class="col-md-offset-1 col-lg-8">
				<h1 class="page-titulo">Controle de Usuários</h1>	
				<ol class="breadcrumb">
				  <li><a href="pagAdm.php">Principal</a></li>
				  <li class="active">Cadastrar</li>
				</ol>
			</div>
			<!--FORMULÁRIO DE CADASTRO-->
			<div class="row">
				<div class="col-md-offset-1 cont-left col-md-8">
					<h2 class="titulo">Cadastrar Usuários</h2>
					<form class="box-reserva fomr-signin" action="salvausuarios.php" method="post">
						<div class="form-group">
							<label for="basic-url">Nome</label>
							<input id="nome" class="form-control"  name="nome" type="text" placeholder="Nome" oninput="setCustomValidity('')" 
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
						<div class="form-group">
							<label for="basic-url">Tipo de Usuário</label>
							<select class="form-control" name="tp_usuario" required>
								<option value="" selected="true" disabled="disabled">Selecione...</option>
								<option value="1">Administrador</option>
								<option value="2">Usuário</option>
							</select>
						</div>
						<input class="btn btn-lg btn-primary btn-block" name="cadastrar" type="submit" value="Cadastrar">
					</form>	
				</div>
			</div>
		</div>
    </body>
</html>
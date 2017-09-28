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
			<div class="col-md-offset-1 col-lg-12">
				<h1 class="page-titulo">Controle de Usuários</h1>	
				<ol class="breadcrumb">
				  <li><a href="pagAdm.php">Principal</a></li>
				  <li><a href="pagExibeUser.php">Lista Usuários</a></li>
				  <li class="active">Alterar</li>
				</ol>
			</div>
			<!--FORMULÁRIO DE CADASTRO-->
			<?php
			//GET id passada pela lista
			$id=$_GET["id"];
			//Faz consulta para achar os dados a partir do id
			$consulta1=mysql_query("SELECT *FROM tb_usuario where id_usuario='".$id."'") 
			or die (mysql_error());
			//Pegando os dados apartir da consulta
			$dados1 = mysql_fetch_array($consulta1);
			//	echo 
			?>
			<div class="row">
				<div class="col-md-offset-1 cont-left col-md-8">
					<h2 class="titulo">Alterar Usuário</h2>
					<form class="box-reserva fomr-signin" action="pagAltUser2.php" method="post">
						<div class="form-group">
							<label for="basic-url">Nome</label>
							
							<input id="nome" value="<?=($dados1['nome']);?>" class="form-control" name="nome" type="text"  oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Nome')" required />
						</div>
						<div class="form-group">
							<label for="basic-url">E-mail</label>
							<input id="email" class="form-control" name="email" value="<?=($dados1['email']);?>" type="email" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo E-mail')" required />
						</div>
						<div class="form-group">
							<label for="basic-url">Siape</label>
							<input id="siape" class="form-control" name="siape" value="<?=($dados1['siape']);?>" type="text" oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Siape')" required />
						</div>
						<div class="form-group">
							<label for="basic-url">Senha</label>
							<input id="senha" class="form-control" value="<?=($dados1['senha']);?>" name="senha" type="password"  oninput="setCustomValidity('')" 
							oninvalid="this.setCustomValidity('Preencha o campo Senha')" required />
						</div>
						<div class="form-group">
							<label for="basic-url">Tipo de Usuário</label>
							<select class="form-control" name="tp_usuario" required>
								<option disabled="disabled">Selecione...</option>
								<option value="1"<?php
									if($dados1['id_tp_usuario']==1){
										echo 'selected';
									}
								?> >Administrador</option>
								<option value="2" <?php
									if($dados1['id_tp_usuario']==2){
										echo 'selected';
									}?>
								>Usuário</option>
							</select>
						</div>
						<input type="hidden" id="id_usuario" name="id_usuario" value="<?=($dados1['id_usuario']);?>" />	
						<input class="btn btn-lg btn-primary btn-block" name="alterar" type="submit" value="Alterar">
					</form>	
				</div>
			</div>
			</div>
		</div>
    </body>
</html>
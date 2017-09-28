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
			  <li class="active">Lista Usuários</li>
			</ol>
			</div>

			<!--TABELDA DE EXIBIÇÃO-->
			<div class="col-md-offset-1 cont-left col-md-8">
				<h2 class="titulo">Lista de Usuários</h2>	
				<table class="table table-striped">
				  <tr>
				    <td><i class="fa fa-user" aria-hidden="true"></i></i><strong> Nome</strong></td>
				    <td><i class="fa fa-envelope-o" aria-hidden="true"></i><strong> E-mail</strong></td> 
				    <td><i class="fa fa-arrow-circle-down" aria-hidden="true"></i><strong> Siape</strong></td>
				    <td><i class="fa fa-user-secret" aria-hidden="true"></i><strong> Tipo Usuário</strong></td>
				    <td></td>
				  </tr>
				  	<?php 
					$query = mysql_query("SELECT * FROM tb_usuario WHERE id_tp_usuario=2 AND status=1 ORDER BY id_usuario ASC") or die (mysql_error());
						while ($array = mysql_fetch_array($query)){
							$tp_usuario =$array['id_tp_usuario'];
							$query_tp = mysql_query("SELECT descricao FROM tb_tp_usuario WHERE id_tp_usuario='".$tp_usuario."'" );
							while($vet = mysql_fetch_array($query_tp))
								$NomeTp = $vet['descricao'];
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
							<td>
								<?php echo $NomeTp; ?>
							</td>
							<td>
								<a class="btn btn-primary btn-sm" href="visualUser.php?id=<?=($array['id_usuario']);?>"
								OnClick="return confirm ('Desejar Visualizar?')"><i class="fa fa-search" aria-hidden="true"></i></a>
								<a class="btn btn-warning btn-sm" href="pagAltUser.php?id=<?=($array['id_usuario']);?>"
								OnClick="return confirm ('Deseja Alterar as informações do Usuário?')"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a class="btn btn-danger btn-sm" href="excluiUser.php?id=<?=($array['id_usuario']);?>"
								OnClick="return confirm ('Confirma exclusão?')"><i class="fa fa-trash"></i></a>
								
							</td>
						</tr> <?php  } ?>
				</table>
			</div>
			<div class="col-md-offset-1 cont-left col-md-8">
				<h2 class="titulo">Lista de Administradores</h2>	
				<table class="table table-striped">
				  <tr>
				    <td><i class="fa fa-user" aria-hidden="true"></i></i><strong> Nome</strong></td>
				    <td><i class="fa fa-envelope-o" aria-hidden="true"></i><strong> E-mail</strong></td> 
				    <td><i class="fa fa-arrow-circle-down" aria-hidden="true"></i><strong> Siape</strong></td>
				    <td><i class="fa fa-user-secret" aria-hidden="true"></i><strong> Tipo Usuário</strong></td>
				    <td></td>
				  </tr>
				  	<?php 
					$query = mysql_query("SELECT * FROM tb_usuario WHERE id_tp_usuario=1  ORDER BY id_usuario ASC") or die (mysql_error());
						while ($array = mysql_fetch_array($query)){
							$tp_usuario =$array['id_tp_usuario'];
							$query_tp = mysql_query("SELECT descricao FROM tb_tp_usuario WHERE id_tp_usuario='".$tp_usuario."'" );
							while($vet = mysql_fetch_array($query_tp))
								$NomeTp = $vet['descricao'];
							
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
							<td>
								<?php echo $NomeTp; ?>
							</td>
							<td>
								<a class="btn btn-primary btn-sm" href="visualUser.php?id=<?=($array['id_usuario']);?>"
								OnClick="return confirm ('Confirma exclusão?')"><i class="fa fa-search" aria-hidden="true"></i></a>
								<a class="btn btn-warning btn-sm" href="pagAltUser.php?id=<?=($array['id_usuario']);?>"
								OnClick="return confirm ('Deseja Alterar as informações do Usuário?')"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a class="btn btn-danger btn-sm" href="excluiUser.php?id=<?=($array['id_usuario']);?>"
								OnClick="return confirm ('Confirma exclusão?')"><i class="fa fa-trash"></i></a>
								
							</td>
						</tr> <?php  } ?>
				</table>
			</div>
		</div>
    </body>
</html>
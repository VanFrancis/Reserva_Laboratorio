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
			<div class="col-md-12">
				<div class="col-md-offset-1 col-lg-12">
					<h1 class="page-titulo">Controle de Laboratórios</h1>
					<ol class="breadcrumb">
					  <li><a href="pagAdm.php">Principal</a></li>
					  <li class="active">Laboratórios</li>
					</ol>
				</div>
				<!--FORMULÁRIO DE CADASTRO-->
				<div class="row">
					<div class="cont-left col-md-6">
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
						<input class="btn btn-lg btn-primary btn-block" name="cadastrar" type="submit" value="cadastrar">
					</form>	
				</div>
				<!--TABELDA DE EXIBIÇÃO-->
				<div class="cont-left col-md-6">
						<h2 class="titulo">Lista de Laboratórios</h2>	
					<table class="table table-striped">
					  <tr>
					    <td><i class="fa fa-desktop" aria-hidden="true"></i> Laboratório</td>
					    <td><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i> Quantidade</td> 
					    <td><i class="fa fa-television" aria-hidden="true"></i> Multimídia</td>
					    <td></td>
					  </tr>
					  <?php 
						$query = mysql_query("SELECT * FROM tb_laboratorio WHERE status=1 ORDER BY nome ASC") or die (mysql_error());
						
							while ($array = mysql_fetch_array($query)){
								$qtd_pc 	= $_Post['qtd_pc'];
								$multi 		= $_Post['multimidia'];
								$nome 		= $_Post['nome'];
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
									<a class="btn btn-warning btn-sm" href="alterLab.php?id=<?=($array['id_laboratorio']);?>"
									OnClick="return confirm ('Deseja Alterar as informações do Laboratório?')"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="btn btn-danger btn-sm" href="excluiLab.php?id=<?=($array['id_laboratorio']);?>"
									OnClick="return confirm ('Confirma exclusão do Laboratório?')"><i class="fa fa-trash"></i></a>
								</td>
								
							</tr> <?php  } ?>
					</table>
				</div>
			</div>
		</div>
 
    </body>
</html>
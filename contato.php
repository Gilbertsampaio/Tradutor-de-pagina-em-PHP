<?php
include('tradutor.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title><?php echo $trad['titulo'];?></title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css"/>
	</head>
	<body style="margin: 0; padding: 0">
		<?php include 'inc/idiomas.php'; ?>
		<?php include 'inc/menu.php'; ?>
		<div class="content">
			<h2><?php echo $trad['textocontato'];?></h2>
			
			<form>
			  <div class="form-group">
			    <label for="nome"><?php echo $trad['labelnome'];?></label>
			    <input type="email" class="form-control" id="nome" placeholder="<?php echo $trad['labelnome'];?>">
			  </div>
			  <div class="form-group">
			    <label for="email"><?php echo $trad['labelemail'];?></label>
			    <input type="email" class="form-control" id="email" placeholder="<?php echo $trad['labelemail'];?>">
			  </div>
			  <div class="form-group">
			    <label for="assunto"><?php echo $trad['labelassunto'];?></label>
			    <input type="text" class="form-control" id="assunto" placeholder="<?php echo $trad['labelassunto'];?>">
			  </div>
			  <div class="form-group">
			    <label for="mensagem"><?php echo $trad['labelmensagem'];?></label>
			    <textarea class="form-control" id="mensagem" rows="3" placeholder="<?php echo $trad['labelmensagem'];?>"></textarea>
			  </div>
			  <div class="form-group">
			    <button name="enviar" type="submit"  id="enviar" tabindex="5" class="btn btn-primary"><?php echo $trad['botaocontato'];?></button>
			  </div>
			</form>
		</div>
	</body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
</html>
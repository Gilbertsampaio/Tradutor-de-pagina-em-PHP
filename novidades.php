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
			<h2><?php echo $trad['textonovidades'];?></h2>
			<h3><?php echo $trad['titulonovidade'];?>: Aumento do combustível</h3>
			<p><?php echo $trad['textonovidade'];?>: Essa semana tivemos um aumento de 3.5% no valor da gasolina.</p>
			<?php echo $trad['datanovidade'];?>: 25/10/2019.
		</div>
	</body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
</html>
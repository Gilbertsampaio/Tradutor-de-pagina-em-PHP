<?php
ini_set('default_charset','UTF-8');
include "conexao.php";
include('tradutor.php');
include('inc/lista_new.php');
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
			<span class="pull-right"><a class="btn btn-primary" role="button" href="add.php">Adicionar Novidade</a></span>
			<h2><?php echo $trad['textonovidades'];?></h2>
<?php
$sql = mysqli_query($connect,"SELECT * FROM news ORDER BY ID DESC");
?>
<?php 
if(mysqli_num_rows($sql) > 0){
while($ln = mysqli_fetch_object($sql)):
?>
<div style="background-color: #d5d5d5; padding: 20px 20px 20px 20px">
			<a class="btn btn-primary pull-right" role="button" href="editar.php?ID=<?php echo $ln->ID; ?>">Alterar</a>

			<h3><?php echo $trad['titulonovidade'];?>: <?php echo $ln->$titulo; ?></h3>
			<p><?php echo $trad['textonovidade'];?>: <?php echo $ln->$texto; ?></p>
			<?php echo $trad['datanovidade'];?>: <?php echo $ln->data; ?>.

</div>			

<?php endwhile ?>  
<?php } else if(mysqli_num_rows($sql) == false){?>

Não há nenhum registro de Notícias. 

<?php } ?>


		</div>
	</body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
</html>
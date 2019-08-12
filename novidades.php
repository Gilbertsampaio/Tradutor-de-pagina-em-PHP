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
			
<?php if(!empty($_SESSION['success_msg'])){?>
<?php echo $_SESSION['success_msg'];?>											
<?php unset($_SESSION['success_msg']);}?>  

			<span class="pull-right"><a class="btn btn-success" role="button" href="add.php"><?php echo $trad['botaoadd'];?></a></span>
			<h2><?php echo $trad['textonovidades'];?></h2>
<?php
$sql = mysqli_query($connect,"SELECT * FROM novidade ORDER BY ID DESC");
?>
<?php 
if(mysqli_num_rows($sql) > 0){
while($ln = mysqli_fetch_object($sql)):
?>
<hr/>
<div style="background-color: rgba(0, 0, 0, 0.1); padding: 20px 20px 20px 20px">
			<a class="btn btn-danger pull-right" role="button" href="excluir.php?ID=<?php echo $ln->ID; ?>"><?php echo $trad['botaoexcluir'];?></a>
			<a class="btn btn-primary pull-right" role="button" href="editar.php?ID=<?php echo $ln->ID; ?>"><?php echo $trad['botaoalterar'];?></a>

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
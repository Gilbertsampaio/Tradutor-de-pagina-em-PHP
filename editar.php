<?php
include('tradutor.php');
?>
<?php
ini_set('default_charset','UTF-8');
include "conexao.php";
?>
<?php 
$ID = mysqli_real_escape_string($connect,$_GET['ID']);
$ln = mysqli_fetch_object(mysqli_query($connect,"SELECT * FROM novidade WHERE ID = '$ID'"));
?>	

 <?php 

if(isset($_POST["salvar"])){

		$titulo_br = mysqli_real_escape_string($connect,$_POST["titulo_br"]);
		$titulo_us = mysqli_real_escape_string($connect,$_POST["titulo_us"]);
		$titulo_es = mysqli_real_escape_string($connect,$_POST["titulo_es"]);
		$titulo_fr = mysqli_real_escape_string($connect,$_POST["titulo_fr"]);
		$texto_br = mysqli_real_escape_string($connect,$_POST["texto_br"]);
		$texto_us = mysqli_real_escape_string($connect,$_POST["texto_us"]);
		$texto_es = mysqli_real_escape_string($connect,$_POST["texto_es"]);
		$texto_fr = mysqli_real_escape_string($connect,$_POST["texto_fr"]);
			
	mysqli_query($connect,"UPDATE novidade SET titulo_br = '$titulo_br', titulo_us = '$titulo_us', titulo_es = '$titulo_es', titulo_fr = '$titulo_fr', texto_br = '$texto_br', texto_us = '$texto_us', texto_es = '$texto_es', texto_fr = '$texto_fr' WHERE ID = '$ID'");
	
		echo '<script language="JavaScript">window.location="novidades.php";</script>';

	$_SESSION['success_msg'] = "As Informações foram alteradas com sucesso!";

}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title><?php echo $trad['titulo'];?></title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css"/>
	</head>
	<body style="margin: 0; padding: 0">
		<?php include 'inc/idiomas_get.php'; ?>
		<?php include 'inc/menu.php'; ?>
		<div class="content">
			<h2><?php echo $trad['textoneweditar'];?></h2>
			<input type="hidden" name="session_idioma" id="session_idioma"  value="<?php echo $_SESSION['idioma']; ?>">
			<form class="clearfix" method="post" id="cad-adm">
			  <div class="form-group">
			    <label for="titulo"><?php echo $trad['labeltitulobr'];?> <span style="color: red" id="alertatitulo_br"></span></label>
			    <input type="text" class="form-control" name="titulo_br" id="titulo_br" placeholder="<?php echo $trad['labeltitulobr'];?>" value="<?php echo $ln->titulo_br; ?>">
			  </div>
			  <div class="form-group">
			    <label for="titulo_us"><?php echo $trad['labeltitulous'];?> <span style="color: red" id="alertatitulo_us"></span></label>
			    <input type="text" class="form-control" name="titulo_us" id="titulo_us" placeholder="<?php echo $trad['labeltitulous'];?>" value="<?php echo $ln->titulo_us; ?>">
			  </div>
			  <div class="form-group">
			    <label for="titulo_es"><?php echo $trad['labeltituloes'];?> <span style="color: red" id="alertatitulo_es"></span></label>
			    <input type="text" class="form-control" name="titulo_es" id="titulo_es" placeholder="<?php echo $trad['labeltituloes'];?>" value="<?php echo $ln->titulo_es; ?>">
			  </div>
			  <div class="form-group">
			    <label for="titulo_fr"><?php echo $trad['labeltitulofr'];?> <span style="color: red" id="alertatitulo_fr"></span></label>
			    <input type="text" class="form-control" name="titulo_fr" id="titulo_fr" placeholder="<?php echo $trad['labeltitulofr'];?>" value="<?php echo $ln->titulo_fr; ?>">
			  </div>
			  <div class="form-group">
			    <label for="texto"><?php echo $trad['labeltextobr'];?> <span style="color: red" id="alertatexto_br"></span></label>
			    <textarea type="text" name="texto_br" id="texto_br" tabindex="3" class="form-control" rows="3" placeholder="<?php echo $trad['labeltextobr'];?>"><?php echo $ln->texto_br; ?></textarea>
			  </div>
			  <div class="form-group">
			    <label for="texto_us"><?php echo $trad['labeltextous'];?> <span style="color: red" id="alertatexto_us"></span></label>
			    <textarea type="text" name="texto_us" id="texto_us" tabindex="3" class="form-control" rows="3" placeholder="<?php echo $trad['labeltextous'];?>"><?php echo $ln->texto_us; ?></textarea>
			  </div>
			  <div class="form-group">
			    <label for="texto_es"><?php echo $trad['labeltextoes'];?> <span style="color: red" id="alertatexto_es"></span></label>
			    <textarea type="text" name="texto_es" id="texto_es" tabindex="3" class="form-control" rows="3" placeholder="<?php echo $trad['labeltextoes'];?>"><?php echo $ln->texto_es; ?></textarea>
			  </div>
			  <div class="form-group">
			    <label for="texto_fr"><?php echo $trad['labeltextofr'];?> <span style="color: red" id="alertatexto_fr"></span></label>
			    <textarea type="text" name="texto_fr" id="texto_fr" tabindex="3" class="form-control" rows="3" placeholder="<?php echo $trad['labeltextofr'];?>"><?php echo $ln->texto_fr; ?></textarea>
			  </div>
			  <div class="form-group">
			    <button name="salvar" type="submit"  id="salvar" tabindex="5" class="btn btn-success"><?php echo $trad['botaoeditar'];?></button>
			  </div>
			  
			</form>
		</div>
	</body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
	<script src="js/valida.js"></script>
</html>
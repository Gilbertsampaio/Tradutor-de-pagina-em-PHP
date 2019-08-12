<?php
include('tradutor.php');
?>
<?php
ini_set('default_charset','UTF-8');
include "conexao.php";
?>
<?php 
if(isset($_POST["enviar"])){
	
require_once('config/imagem.php');
	
	$arquivo = $_FILES['foto'];
	$tipos = array('jpg','jpeg','png', 'gif', 'bmp'); //só permite imagens
	$arquivo_nome = md5(uniqid(time())); 
	$verifica = uploadFile($arquivo, 'uploads/', $tipos, $arquivo_nome);

	if(!isset($verifica['erro'])){
		
		$titulo = mysqli_real_escape_string($connect,$_POST["titulo_br"]);
		$texto = mysqli_real_escape_string($connect,$_POST["texto_br"]);
		$data = date('d/m/Y');
	
	$sql = mysqli_query($connect,"INSERT INTO news (data, titulo_br, titulo_us, titulo_es, titulo_fr, texto_br, texto_us, texto_es, texto_fr, foto, status) VALUES ('$data', '$titulo', '', '', '', '$texto', '', '', '', '$verifica[caminho]', 'Inativo')");


	echo '<script language="JavaScript">window.location="add.php";</script>';
	$_SESSION['success_msg'] = "As Informações da Notícia foram cadastradas com sucesso!";
}	

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
		<?php include 'inc/idiomas.php'; ?>
		<?php include 'inc/menu.php'; ?>
		<div class="content">
			<h2><?php echo $trad['textonewcadastro'];?></h2>
			
			<form class="clearfix" name="cadadm" method="post" enctype="multipart/form-data" id="cad-adm">
			  <input type="hidden" name="session_idioma" id="session_idioma"  value="<?php echo $_SESSION['idioma']; ?>">
			  <div class="form-group">
			    <label for="titulo_br"><?php echo $trad['labelnewtitulo'];?> <span style="color: red" id="alertatitulo_br"></span></label>
			    <input type="text" class="form-control" name="titulo_br" id="titulo_br" placeholder="<?php echo $trad['labelnewtitulo'];?>">
			  </div>
			  <div class="form-group">
			    <label for="foto"><?php echo $trad['labelnewfoto'];?> <span style="color: red" id="alertafoto"></span></label>
			    <input class="form-control" id="foto" name="foto" type="file" placeholder="Adicione a Imagem da Notícia" tabindex="2" accept="image/*"/>
			  </div>
			  <div class="form-group">
			    <label for="texto_br"><?php echo $trad['labelnewtexto'];?> <span style="color: red" id="alertatexto_br"></span></label>
			    <textarea type="text" name="texto_br" id="texto_br" tabindex="3" class="form-control" rows="3" placeholder="<?php echo $trad['labelnewtexto'];?>"></textarea>
			  </div>
			  <div class="form-group">
			    <button name="enviar" type="submit"  id="enviar" tabindex="5" class="btn btn-success btn-md"><?php echo $trad['botaonewcadastro'];?></button>
			  </div>
			  
			</form>
		</div>
	</body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
	<script src="js/valida.js"></script>
</html>
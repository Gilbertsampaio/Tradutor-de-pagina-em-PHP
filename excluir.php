<?php
ini_set('default_charset','UTF-8');
?>
<?php 
session_start();
include_once("conexao.php");
?>
<?php 

	$ID = mysqli_real_escape_string($connect,$_GET['ID']);	
	$del = mysqli_fetch_object(mysqli_query($connect,"SELECT * FROM novidade WHERE ID = '$ID'"));
	
	
	mysqli_query($connect,"DELETE FROM novidade WHERE ID = '$ID'");

	echo '<script language="JavaScript">window.location="novidades.php";</script>';
	$_SESSION['success_msg'] = "<div class='alert alert-success' role='alert'>A Novidade <b>foi excluída</b> com sucesso!</div>";
	
?>
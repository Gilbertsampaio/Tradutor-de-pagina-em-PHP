<?php
if(!isset($_GET['idioma']) && !isset($_SESSION['idioma'])){
			
	$titulo = 'titulo_br';
	$texto = 'texto_br';
	    
} else if(!isset($_GET['idioma']) && isset($_SESSION['idioma'])){

    $idioma = $_SESSION['idioma'];

	$titulo = 'titulo_'.$idioma;
	$texto = 'texto_'.$idioma;

} else if(isset($_GET['idioma'])){

	$idioma = $_GET['idioma'];

	$titulo = 'titulo_'.$idioma;
	$texto = 'texto_'.$idioma;
};
?>
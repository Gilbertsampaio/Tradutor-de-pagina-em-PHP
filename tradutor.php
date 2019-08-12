<?php
session_start();

if(!isset($_GET['idioma']) && !isset($_SESSION['idioma'])){

    $_SESSION['idioma'] = 'br';

    include 'idiomas/'.$_SESSION['idioma'].'.php';
    
} else if(!isset($_GET['idioma']) && isset($_SESSION['idioma'])){

    include 'idiomas/'.$_SESSION['idioma'].'.php';
    
} else if(isset($_GET['idioma'])){

	$_SESSION['idioma'] = $_GET['idioma'];
    include 'idiomas/'.$_GET['idioma'].'.php';
};

?>
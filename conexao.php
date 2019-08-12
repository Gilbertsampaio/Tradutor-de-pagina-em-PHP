<?php 
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1

$connect=mysqli_connect('localhost','root','','idiomas');

if ($connect) {
    mysqli_set_charset($connect, "UTF8");
}else{
    die("erro ao conectar o banco: " . mysqli_connect_error());
}

date_default_timezone_set("America/Sao_Paulo");
error_reporting(0);
?>
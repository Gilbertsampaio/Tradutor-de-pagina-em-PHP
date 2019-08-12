<?php 

$serverList = array('localhost', '127.0.0.1');

if(in_array($_SERVER['HTTP_HOST'], $serverList)) {

mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("gmelo") or die (mysql_error());

}


if(!in_array($_SERVER['HTTP_HOST'], $serverList)) {

mysql_connect("mysql.cfcequador.com.br","cfcequadorcombr","gmos7380") or die (mysql_error());
mysql_select_db("cfcequadorcombr") or die (mysql_error());
}



mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

date_default_timezone_set("America/Sao_Paulo");

function pega_ext($nome_arq){
  $ext = explode('.',$nome_arq);
  $ext = array_reverse($ext);
  return $ext[0];
}

  function manipulacao_img($nome_fotos, $thumb, $foto){
	  
	  //Copia e deleta a thumb enviada acima.
	  copy("uploads/".$thumb."", "uploads/".$nome_fotos."_thumb.jpg");
	  unlink("uploads/".$thumb."");
	  
	  //Copia e deleta a foto enviada acima.
	  copy("uploads/".$foto."", "uploads/".$nome_fotos.".jpg");
	  unlink("uploads/".$foto."");
	  
 } 
 function truncate($str, $len, $etc='') {
	$end = array(' ', '.', ',', ';', ':', '!', '?');

	if (strlen($str) <= $len)
		return $str;

	if (!in_array($str{$len - 1}, $end) && !in_array($str{$len}, $end))
		while (--$len && !in_array($str{$len - 1}, $end));

	return rtrim(substr($str, 0, $len)).$etc;
}
function inverteData($data, $separar = '-', $juntar = '-'){
	return implode($juntar, array_reverse(explode($separar, $data)));
}




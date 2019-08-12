<?php
require("class.upload.php");

function miniatura($caminho,$destino,$foto,$x){
//Tamanho da thumb, um valor inteiro, que corresponde  porcentagem.
$Tamanho = $x;

//Diretrio onde esto as imagens
$Fotos = $caminho;

//Diretrio onde sero criadas as Thumbs
$Thumbs = $destino;

//Seta qual tipo de arquivo ser usado, no caso Jpg, Gif ou PNG
$Ext = ".jpg";

//Seta a qualidade da Thumb
$Qualidade = 100;

//Vamos abrir o diretrio das imagens
$dh = opendir(($dir = "$Fotos"));

//Agora vamos varrer todo o diretrio  procura das imagens
while (false !== ($filename = readdir($dh))) {

if ($filename == $foto){
//Verificamos se o arquivo  uma imagem de extenso igual  setada em $Ext
if (strtoupper(substr($filename,-4)) != strtoupper($Ext)) {
continue;
}

//Verificamos aqui com que tipo de imagem vai trabalhar
if (strtoupper($Ext) == ".JPG") {
$ExtFunc = "Jpeg";
} elseif (strtoupper($Ext) == ".GIF") {
$ExtFunc = "Gif";
} elseif (strtoupper($Ext) == ".PNG") {
$ExtFunc = "Png";
}

//Criamos a imagem apartir da extenso setada em $ExtFunc
//Concatenamos o valor de $ExtFunc para termos a funo que criar a imagem
//Podendo ser "ImageCreateFromJpeg" , "ImageCreateFromGif" ou "ImageCreateFromPng"

$CriarImagemDe = "ImageCreateFrom" . $ExtFunc;
$img = $CriarImagemDe($dir . $filename);

//Aqui tiramos a proporo , o tamanho da thumb em relao  imagem

//Pega largura da imagem
$he = ImageSX($img);

//Pega altura da imagem
$wi = ImageSY($img);

//Seta valor da largura da thumb
$x = ($he / 100) * $Tamanho;

//Seta valor da altura da thumb
$y = ($wi / 100) * $Tamanho;

//Aqui  criada a nova imagem, a thumb
$img_nova = imagecreatetruecolor($x,$y); 

//Agora a nova imagem  redimencionada
imagecopyresampled($img_nova, $img, 0, 0, 0, 0, $x, $y, $he, $wi); 

//Agora salvamos a Thumb no diretrio especificado em $Thumbs, com a qualidade setada em $Qualidade
//Para salvar a nova imagem, usaremos a funo correspondente  extenso 
//Que pode ser "ImageJpeg" , "ImageGif" ou "ImagePng" , concatenando os valores Image + $ExtFunc
$Image = "Image" . $ExtFunc;
$Image($img_nova, $Thumbs . $filename , $Qualidade);

//Destruimos o cache da imagem para liberar uma nova thumb
ImageDestroy($img_nova);
ImageDestroY($img); 

}
}
}

//Funo Upload de Fotos
function upload($id,$foto_temp,$foto_name,$largura,$mini){
$foto = arruma_string($foto_name);

if ($id == "") $url = "uploads/";
   else $url = "uploads/$id/";
   
   $url_foto = $url.$foto;

	if(!copy($foto_temp, $url_foto)){
	  echo "Erro ao enviar Foto.";
	  return "Erro";
	}else{ 
	  $size = getimagesize($url_foto);
	  if ($largura < $size[0]){
	    //redimensiona a foto principal
		$porcentagem = ($largura*100)/$size[0];
		$caminho = $url;
		miniatura($caminho,$caminho,$foto,$porcentagem);
	  }
	  /*if ($mini != ""){
			//gera a miniatura
			$size = getimagesize($url_foto);
			$porcentagem = ($mini*100)/$size[0];
			$destino = $url."../uploads/";
			$caminho = $url;
			if ($porcentagem > 100) $porcentagem = 100;
			miniatura($caminho,$destino,$foto,$porcentagem);
	   }*/
	  
	 return $foto;
	}
}


/*
//Funo Upload de Fotos
function upload($id,$foto_temp,$foto_name,$percentual){


$foto = arruma_string($foto_name);

if(!copy($foto_temp, "fotos/$id/$foto")){
  echo "Erro ao enviar Foto.";
  return "Erro";
}else{ 
  if ($percentual != ""){
  $caminho = "fotos/$id/";
  miniatura($caminho,$foto,$percentual);
  }
 return $foto;
}
}*/

/*function upload_free($foto,$foto_name){
	$picture['foto'] = $foto;
	if ($foto_name != ""){
		$handle1m = new Upload($picture['foto'],'pt_BR');
		if ($handle1m->uploaded) {
			$handle1m->Process('../uploads/');
			$min = $handle1m->file_dst_name;
			if (!$handle1m->processed) {
				//alerta($handle1m->error);
				return "Erro";
			}
		}
		//$handle1m-> Clean();
		return $min;
	}
}*/

/*
upload_yfixed trava a altura e varia a largura
*/
function upload_yfixed($foto,$foto_name,$height){
	if ($foto_name != ""){
		$handle1 = new Upload($foto,'pt_BR');
		if ($handle1->uploaded) {
			$handle1->image_resize = true;
			$handle1->image_ratio_x = true;
			$handle1->image_y = $height;	
			$handle1->Process('uploads/');
			$orig = $handle1->file_dst_name;
			if (!$handle1->processed) {
				//alerta($handle1->error);
				return "Erro";
			}
		}
		//$handle1-> Clean();
		return $orig;
	}
}

/*
upload_y tem a altura até no máximo $height
*/
function upload_y($foto,$foto_name,$height){
	if ($foto_name != ""){
		$handle1 = new Upload($foto,'pt_BR');
		if ($handle1->uploaded) {
			if ($handle1->image_src_y > $height){
				$handle1->image_resize = true;
				$handle1->image_ratio_x = true;
				$handle1->image_y = $height;	
			}
		
			$handle1->Process('uploads/');
			$orig = $handle1->file_dst_name;
			if (!$handle1->processed) {
				//alerta($handle1->error);
				return "Erro";
			}
		}
		//$handle1-> Clean();
		return $orig;
	}
}

function upload_x($foto,$foto_name,$width){
	if ($foto_name != ""){
		$handle1 = new Upload($foto,'pt_BR');
		if ($handle1->uploaded) {
			if ($handle1->image_src_x > $width){
				$handle1->image_resize = true;
				$handle1->image_ratio_y = true;
				$handle1->image_x = $width;	
			}
		
			$handle1->Process('uploads/');
			$orig = $handle1->file_dst_name;
			if (!$handle1->processed) {
				//alerta($handle1->error);
				return "Erro";
			}
		}
		//$handle1-> Clean();
		return $orig;
	}
}

function upload_xy($foto,$foto_name,$width = 70,$height = 70){
	//$picture['fotoxy'] = $foto;
	if ($foto_name != ""){
		$handle1m = new Upload($foto,'pt_BR');
		if ($handle1m->uploaded) {
			$handle1m->image_resize = true;
			$handle1m->image_y = $height;
			$handle1m->image_x = $width;
			if ($handle1m->image_src_x < $handle1m->image_src_y){
				$handle1m->image_ratio_crop = 'T';
			}
			else{
				$handle1m->image_ratio_crop  = true;
			}
			$handle1m->file_name_body_add = '_thumb';
			$handle1m->Process('uploads/');
			$min = $handle1m->file_dst_name;
			if (!$handle1m->processed) {
				//alerta($handle1m->error);
				return "Erro";
			}
		}
		//$handle1m-> Clean();
		return $min;
	}
}

function upload_xfixed($foto,$foto_name,$width){
	$picture['foto'] = $foto;
	if ($foto_name != ""){
		$handle1 = new Upload($picture['foto'],'pt_BR');
		if ($handle1->uploaded) {
			$handle1->image_resize = true;
			$handle1->image_ratio_y = true;
			$handle1->image_x = $width;
			$handle1->Process('uploads/');
			$orig = $handle1->file_dst_name;
			if (!$handle1->processed) {
				//alerta($handle1->error);
				return "Erro";
			}
		}
		//$handle1-> Clean();
		return $orig;
	}
}

function datecheck($date, $sqlIn = false, $sqlOut = true){
   if ($sqlIn){
       $x = explode('-', $date);
       $d = $x[2];
       $m = $x[1];
       $y = $x[0];
   } else {
       $x = explode('/', $date);
       $d = $x[0];
       $m = $x[1];
       $y = $x[2];
   }
   if ( @checkdate($m, $d, $y) ){
       if ($sqlOut){
           return $y . "-" . $m . "-" . $d;
       } else {
           return $d . "/" . $m . "/" . $y;
       }
   } else {
       return date('Y-m-d');
   }

}

function upload_file($arquivo,$arquivo_tmp,$pasta){	
	$info = pathinfo($arquivo);
	$nome = rand(1, 999999999999999);
	$arquivo = substr(md5($nome), 0, 15).".".$info['extension'];
	$nome_arquivo = $arquivo;
	if (!(file_exists($arquivo))){
		move_uploaded_file($arquivo_tmp,$pasta.$arquivo);
	}
	return $nome_arquivo;
}
?>
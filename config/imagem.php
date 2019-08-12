<?php

/**
    * Função para fazer upload de arquivos
    * @author Rafael Wendel Pinheiro
    * @param File $arquivo Arquivo a ser salvo no servidor
    * @param String $pasta Local onde o arquivo será salvo
    * @param Array $tipos Extensões permitidas para o arquivo
    * @param String $nome Nome do arquivo. Null para manter o nome original
    * @return array
*/
function uploadFile($arquivo, $pasta, $tipos, $nome = null){
    if(isset($arquivo)){
        $infos = explode(".", $arquivo["name"]);
 
        if(!$nome){
            for($i = 0; $i < count($infos) - 1; $i++){
                $nomeOriginal = $nomeOriginal . $infos[$i] . ".";
            }
        }
        else{
            $nomeOriginal = $nome . ".";
        }
 
        $tipoArquivo = $infos[count($infos) - 1];
 
        $tipoPermitido = false;
        foreach($tipos as $tipo){
            if(strtolower($tipoArquivo) == strtolower($tipo)){
                $tipoPermitido = true;
            }
        }
        if(!$tipoPermitido){
            $retorno["erro"] = '<script> var segundos = 7; setTimeout(function(){ $("#upload").fadeOut();}, segundos*1000)</script><div id="upload" class="alert alert-block alert-4"><button class="close" data-dismiss="alert"><i class="close-icon fa fa-times"></i></button><div class="alert-icon"><i class="icon fa fa-times"></i></div><div class="alert__inner"><h3 class="alert-title"><span style="font-weight:bold">Erro: Tipo de arquivo inválido!</span></h3><div class="alert-text">O tipo de arquivo que você enviou não é permitido. Insira um documento em <span style="font-weight:bold">JPG, PNG, GIF ou BMP</span>.</div></div></div>';
        }
		
        else{
        $novo_nome = $nomeOriginal . $tipoArquivo;

            if(move_uploaded_file($arquivo['tmp_name'], $pasta . $novo_nome)){
                $retorno["caminho"] = $novo_nome;
                
            }
            else{
                $retorno["erro"] = '<script> var segundos = 7; setTimeout(function(){ $("#upload").fadeOut();}, segundos*1000)</script><div id="upload" class="alert alert-block alert-4"><button class="close" data-dismiss="alert"><i class="close-icon fa fa-times"></i></button><div class="alert-icon"><i class="icon fa fa-times"></i></div><div class="alert__inner"><h3 class="alert-title"><span style="font-weight:bold">Erro ao fazer upload!</span></h3><div class="alert-text">Aguarde alguns instantes para tentar novamente.</div></div></div>';
            }
        }
    }
    else{
        $retorno["erro"] = '<script> var segundos = 7; setTimeout(function(){ $("#upload").fadeOut();}, segundos*1000)</script><div id="upload" class="alert alert-block alert-4"><button class="close" data-dismiss="alert"><i class="close-icon fa fa-times"></i></button><div class="alert-icon"><i class="icon fa fa-times"></i></div><div class="alert__inner"><h3 class="alert-title"><span style="font-weight:bold">Arquivo não setado!</span></h3><div class="alert-text">Por favor, verifique o arquivo a ser enviado.</div></div></div>';
    }
    return $retorno;
}
?>
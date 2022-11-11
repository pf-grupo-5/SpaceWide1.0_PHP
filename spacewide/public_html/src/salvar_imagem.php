<?php

if (!empty($_GET['salvar_imagem'])) {

	$caminho_da_imagem = $_SERVER['DOCUMENT_ROOT'] . $_GET['salvar_imagem'];
	
    header("Cache-Control: public");
    header("Content-Description: FIle Transfer");
    header("Content-Disposition: attachment; filename=" . "SW_" . basename($caminho_da_imagem));
    header("Content-Type: application/zip");
    header("Content-Transfer-Emcoding: binary");

    readfile($caminho_da_imagem);
    exit;

}

if(!empty($_GET['file']))
{
	$caminho_da_imagem = $_SESSION['DOCUMENT_ROOT'] . $_GET['salvar_imagem'];

	if(!empty($caminho_da_imagem) && file_exists($caminho_da_imagem)){

//Define Headers
		header("Cache-Control: public");
		header("Content-Description: FIle Transfer");
		header("Content-Disposition: attachment; filename=" . basename($caminho_da_imagem));
		header("Content-Type: application/zip");
		header("Content-Transfer-Emcoding: binary");

		readfile($caminho_da_imagem);
		exit;

	}
	else{
		echo "This File Does not exist.";
	}
}

?>
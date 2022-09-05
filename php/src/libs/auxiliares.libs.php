<?php

/**
 * Exibir uma visualização (CONSERTAR DPS PQ FICOU MT VAGO)
 *
 * @param string $nome_do_arquivo
 * @param array $dados
 * @return void
 */
function visualizar($nome_do_arquivo, $dados = []) {
    foreach ($dados as $dado => $valor) {
        $dado = $valor;
    }
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/" . $nome_do_arquivo . ".php");
}


/**
 * Retorna true se o diretorio foi criado
 *
 * @return bool
 */
function criar_diretorio($caminho) {
  try {
        if (!file_exists($caminho)) {
            return (mkdir($caminho, 0777, true)) ? (true) : (false);
        }
        return false;

    } catch (Exception $erro) {
        registrar_log($erro);
    }
}


/**
 * Retorna true se a pasta for deletada com sucesso
 *
 * @param string $caminho
 * @return bool
 */
function deletar_diretorio($caminho) {
    try {
      if(is_dir($caminho)){
            $arquivos = array_diff(scandir($caminho), array('.', '..'));
        
            foreach( $arquivos as $arquivo){
                deletar_diretorio(realpath($caminho) . '/' . $arquivo);    
            }
            return rmdir($caminho);
            
        } else if (is_file($caminho)) {
            return (unlink($caminho)) ? (true) : (false);
        }
        return false;

    } catch (Exception $erro) {
        registrar_log($erro);
    }
}

/**
 * Retorna true se o arquivo for deletado com sucesso
 *
 * @return bool
 */
function deletar_arquivo($caminho) {
    return (is_file($camihno) && unlink($caminho)) ? (true) : (false);
}

?>

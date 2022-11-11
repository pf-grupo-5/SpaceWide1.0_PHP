<?php


/**
 * Retorna "true" se o diretorio foi criado
 *
 * @param $localizacao_no_sistema_de_arquivos
 * @return bool
 */
function criar_diretorio($localizacao_no_sistema_de_arquivos) {
  try {

        if (!file_exists($localizacao_no_sistema_de_arquivos)):
            return (mkdir($localizacao_no_sistema_de_arquivos, 0777, true)) ? (true) : (false);
        endif;

        return false;

    } catch (Exception $erro) {
        
        registrar_log($erro);
        return false;

    }
}


/**
 * Retorna "true" se o diretorio for deletado com sucesso
 *
 * @param string $localizacao_no_sistema_de_arquivos
 * @return bool
 */
function deletar_diretorio($localizacao_no_sistema_de_arquivos) {
    try {

        if(is_dir($localizacao_no_sistema_de_arquivos)):

            $arquivos = array_diff(scandir($localizacao_no_sistema_de_arquivos), array('.', '..'));
            foreach( $arquivos as $arquivo) {
                deletar_diretorio(realpath($localizacao_no_sistema_de_arquivos) . '/' . $arquivo);    
            }

            return rmdir($localizacao_no_sistema_de_arquivos);
            
        elseif (is_file($localizacao_no_sistema_de_arquivos)):
            return (unlink($localizacao_no_sistema_de_arquivos)) ? (true) : (false);
        endif;

        return false;

    } catch (Exception $erro) {
        
        registrar_log($erro);
        return false;
    }
}

/**
 * Retorna "true" se o arquivo for deletado com sucesso
 *
 * @param $localizacao_no_sistema_de_arquivos
 * @return bool
 */
function deletar_arquivo($localizacao_no_sistema_de_arquivos) {
    return (is_file($localizacao_no_sistema_de_arquivos) && unlink($localizacao_no_sistema_de_arquivos)) ? (true) : (false);
}

?>

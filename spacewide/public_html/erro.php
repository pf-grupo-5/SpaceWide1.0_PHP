<?php

$status = $_SERVER['REDIRECT_STATUS'];
$codigos = array(
       403 => array('Proibido', 'O servidor se recusou a atender sua solicitação.'),
       404 => array('Não encontrada', 'A pagina solicitada não foi encontrada :('),
       405 => array('Método não permitido', 'O método especificado na Request-Line não é permitido para o recurso especificado.'),
       408 => array('Solicitar tempo limite', 'O método especificado na Request-Line não é permitido para o recurso especificado.'),
       500 => array('Erro interno do servidor', 'A solicitação não foi bem-sucedida devido a uma condição inesperada encontrada pelo servidor.'),
       502 => array('Bad Gateway', 'O servidor recebeu uma resposta inválida do servidor upstream ao tentar atender à solicitação.'),
       504 => array('Gateway Timeout', 'O servidor upstream falhou ao enviar uma solicitação no tempo permitido pelo servidor.'),
);

$titulo = $codigos[$status][0];
$mensagem = $codigos[$status][1];
if ($titulo == false || strlen($status) != 3) {
       $mensagem = 'Forneça um código de status válido.';
}

?>
<!-- Fazer layout -->
<h1><?= $titulo ?></h1>
<p><?= $mensagem ?></p>

?>
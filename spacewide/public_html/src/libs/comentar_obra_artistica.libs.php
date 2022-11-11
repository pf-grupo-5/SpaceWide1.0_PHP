<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


function registrar_comentario($mysqli, $id_usuario, $id_obra_artistica, $comentario) {
    
    try {
        
        $sql = 'INSERT INTO comentario(id_usuario, id_obra_artistica, comentario) 
                VALUES (?,?,?)';
                
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('iis', $id_usuario, $id_obra_artistica, $comentario);
        $stmt->execute();
        
        registrar_log($sql);
        
        return ($stmt->num_rows > 0) ? (true) : (false);
    
    } catch (Exception $erro) {
        
        registrar_log($erro);
        return false;
    
    }
}

function deletar_comentario($mysqli, $id_obra_artistica, $id_usuario) {
    try {
        
        $sql = "DELETE FROM comentario 
                WHERE id_obra_artistica = ? AND id_usuario = ?";
                
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ii', $id_obra_artistica, $id_usuario);
        $stmt->execute();
        
        registrar_log($sql);
        
        return ($stmt->affected_rows > 0) ? (true) : (false);
        
    } catch (Exception $erro) {
        
        registrar_log($erro);
        return false;
        
    }
}
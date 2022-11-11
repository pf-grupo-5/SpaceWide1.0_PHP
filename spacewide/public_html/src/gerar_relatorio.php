<?php

include_once(__DIR__ . "/libs/fpdf/fpdf.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


$mysqli = conectar_bd();


class RelatorioPDF extends FPDF {
    
    function gerar_cabecalho($titulo, $assunto) {
        
        $this->Image($_SERVER['DOCUMENT_ROOT'].'/src/inc/assets/logo/logo.png', 10,6);
        $this->SetFont('Arial','B',15);
        $this->Cell(376,5, $titulo,0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','',12);
        $this->Cell(376,10, $assunto,0,0,'C');
        $this->Ln(20);
        
    }
    
    
    function gerar_cabecalho_da_tabela_de_usuarios() {
        
        $this->SetFont('Arial','B',11);
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(60,10,'Nome',1,0,'C');
        $this->Cell(60,10,'Nome artistico',1,0,'C');
        $this->Cell(60,10,'E-mail',1,0,'C');
        $this->Cell(40,10,'Acesso',1,0,'C');
        $this->Cell(40,10,'Estado',1,0,'C');
        $this->Cell(55,10,'Data de criacao',1,0,'C');
        $this->Cell(65,10,'Data da ultima modificacao',1,0,'C');
        $this->Ln();
        
    }
    
    function gerar_cabecalho_da_tabela_de_obras_artisticas() {
        
        $this->SetFont('Arial','B',11);
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(60,10,'Titulo',1,0,'C');
        $this->Cell(90,10,'Tag',1,0,'C');
        $this->Cell(60,10,'Artista',1,0,'C');
        $this->Cell(40,10,'Estado',1,0,'C');
        $this->Cell(55,10,'Data de criacao',1,0,'C');
        $this->Cell(65,10,'Data da ultima modificacao',1,0,'C');
        $this->Ln();
        
    }
    
    function gerar_tabela_de_usuarios($mysqli, $sql) {
        
        $this->SetFont('Arial','',11);
        
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        while ($row = $resultado->fetch_assoc()) {
        
            $this->Cell(20,10, $row['id'],1,0,'C');
            $this->Cell(60,10, $row['nome'],1,0,'C');
            $this->Cell(60,10, $row['nome_artistico'],1,0,'C');
            $this->Cell(60,10, $row['email'],1,0,'C');
            $this->Cell(40,10, $row['acesso'],1,0,'C');
            $this->Cell(40,10, $row['estado'],1,0,'C');
            $this->Cell(55,10, $row['data_de_criacao'],1,0,'C');
            $this->Cell(65,10, $row['data_da_ultima_modificacao'] ,1,0,'C');
            $this->Ln();
            
        }
    }
        
        function gerar_tabela_de_obras_artisticas($mysqli, $sql) {
        
        $this->SetFont('Arial','',11);
        
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        while ($row = $resultado->fetch_assoc()) {
        
            $this->Cell(20,10, $row['id'],1,0,'C');
            $this->Cell(60,10, $row['titulo'],1,0,'C');
            $this->Cell(90,10, $row['subtitulo'],1,0,'C');
            $this->Cell(60,10, $row['id_usuario'],1,0,'C');
            $this->Cell(40,10, $row['estado'],1,0,'C');
            $this->Cell(55,10, $row['data_de_criacao'],1,0,'C');
            $this->Cell(65,10, $row['data_da_ultima_modificacao'] ,1,0,'C');
            $this->Ln();
            
        }
    }
    
    function gerar_rodape() {
    
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    
    }
    
}

?>
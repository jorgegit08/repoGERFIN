
<?php
    
    require 'conexaoDB.php';
    require 'assets/fpdf/fpdf.php';
    require 'viwRelDistribuicaoLucro.class.php';
    require 'manipulacaoDatas.php';

    $vdl = new viwRelDistribuicaoLucro;

    $datInicial = addslashes($_POST['datInicial']);
    $datFinal = addslashes($_POST['datFinal']);

    $pdf= new FPDF();

    $pdf->AddPage();
    $pdf->Ln(60);

    $pdf->SetFont('Times','B',15);
    $pdf->Cell(190,10,"RECIBO",0,0,"C");
    $pdf->Ln(30);

    $pdf->SetFont('Times','',15);
    $pdf->Cell(165,10,"R$ 110.470,85",0,0,"R");
    $pdf->Ln(15);

    $text = "                         Recebi da empresa ALDE SANTOS JÚNIOR E ADVOGADOS ASSOCIADOS S/C, inscrita no CNPJ sob o nº 01.072.775/0001-35, a importância de R$ 110.470,85 (cento e dez mil, quatrocentos e setenta reais e oitenta centavos), referente a distribuição de lucros.";

    $pdf->SetLeftMargin(31);
    $pdf->SetFont('Times','',15);
    $pdf->MultiCell(144,10,$text,0,"J");

    $pdf->SetLeftMargin(31);
    $pdf->Ln(30);

    $pdf->Cell(144,10,$dataHojeExtenso,0,0,"C");
    $pdf->Ln(30);

    $pdf->SetLeftMargin(40);
    $pdf->Image('assets/imagens/assinatura.png',null,null,120);
    $pdf->SetLeftMargin(31);
    $pdf->Ln(8);

    $pdf->Cell(144,10,"ALDE DA COSTA SANTOS JUNIOR",0,0,"C");
    $pdf->Ln();
    $pdf->Cell(144,10,"CPF: 369.188.901-82",0,0,"C");
    $pdf->SetLeftMargin(31);
    
    $pdf->AddPage();
    $pdf->SetLeftMargin(5);
    $pdf->Image('assets/imagens/comprovante1.png',null,null);
    
/*
    $pdf->Cell(159,10,"ADVOGADOS ASSOCIADOS S/C, inscrita no CNPJ sob o nº",0,0,"J");
    $pdf->Ln(10);

    $pdf->Cell(159,10,"01.072.775/001-35, a importância de R$ 110.470,85",0,0,"J");
    $pdf->Ln(10);

    $pdf->Write(5,"Empresa: ");
    $pdf->SetFont('Times','B',12);
    $pdf->Write(5,"Alde Santos Junior e Advogados Associados");
    $pdf->SetFont('Times','',12);
    $pdf->Ln(10);

    $pdf->Write(5,"CONTROLE DE PAGAMENTOS DE NOTAS FISCAIS DE SERVIÇOS");
    $pdf->Ln(10);

    $pdf->SetFont('Times','B',11);
    $pdf->Write(5,"NOTAS PAGAS");
    $pdf->Ln(7);

    $pdf->AddPage();



    $pdf->SetFont("Times","",12);
    $pdf->Cell(190,10,"ALDE SANTOS JUNIOR ADVOGADOS ASSOCIADOS",0,0,"C");
    */

    $pdf->Output();

    
?>


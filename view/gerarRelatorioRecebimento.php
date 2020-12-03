<?php

    require '../assets/util/conexaoDB.php';
    require '../assets/fpdf/fpdf.php';
    require '../model/Recebimento.class.php';
    require '../assets/util/manipulacaoDatas.php';

    $r = new Recebimento;

    $pdf= new FPDF();
    
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,10,"Relatorio de Recebimentos",0,0,"C");
    $pdf->Ln(10);

    $datInicial = addslashes($_POST['datInicial']);
    $datFinal = addslashes($_POST['datFinal']);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(190,10,"Periodo de ".implode('/', array_reverse(explode('-',$datInicial))) ." até ".implode('/', array_reverse(explode('-',$datFinal))),0,0,"C");
    $pdf->Ln(15);
    
    $pdf->SetLeftMargin(10);
    $pdf->SetFont('Arial','',12);
    $pdf->Write(5,"À renovar contabilidade Ltda,");
    $pdf->Ln(10);

    $pdf->Write(5,"Empresa: ");
    $pdf->SetFont('Arial','B',12);
    $pdf->Write(5,"Alde Santos Junior e Advogados Associados");
    $pdf->SetFont('Arial','',12);
    $pdf->Ln(10);

    $pdf->Write(5,"CONTROLE DE PAGAMENTOS DE NOTAS FISCAIS DE SERVIÇOS");
    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',11);
    $pdf->Write(5,"NOTAS PAGAS");
    $pdf->Ln(7);

    $pdf->SetFont("Arial","",10);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(35,7,"Nota fiscal",1,0,"C",true);
    $pdf->Cell(35,7,"Valor bruto",1,0,"C",true);
    $pdf->Cell(35,7,"Valor líquido",1,0,"C",true);
    $pdf->Cell(35,7,"Data de pagamento",1,0,"C",true);
    $pdf->Cell(35,7,"Data de emissão",1,0,"C",true);
    $pdf->Ln();

    $registrosPagos = $r->listarRecebimentosPagosPorPeriodo($datInicial, $datFinal);
    if ( $registrosPagos ){
        foreach ($registrosPagos as $registroAtual){
            $pdf->Cell(35,7,"NF-e ". $registroAtual['numNFe'],1,0,"C");
            $pdf->Cell(35,7,$registroAtual['vlrBrutoFormatado'],1,0,"C");
            $pdf->Cell(35,7,$registroAtual['vlrLiquidoFormatado'],1,0,"C");
            $pdf->Cell(35,7,$registroAtual['datPagamento'],1,0,"C");
            $pdf->Cell(35,7,$registroAtual['datVencimento'],1,0,"C");
            $pdf->Ln();
        }
        $pdf->Ln(8);
    }else{
        $pdf->Cell(175,7,"Nenhum Recebimentos pago encontrado no período",1,0,"C");
        $pdf->Ln(14);
    }

    $pdf->SetFont('Arial','B',11);
    $pdf->Write(5,"NOTAS com PAGAMENTO PENDENTE");
    $pdf->Ln(7);

    $pdf->SetFont("Arial","",10);
    $pdf->Cell(35,7,"Nota fiscal",1,0,"C",true);
    $pdf->Cell(35,7,"Valor bruto",1,0,"C",true);
    $pdf->Cell(35,7,"Valor líquido",1,0,"C",true);
    $pdf->Cell(35,7,"Data de emissão",1,0,"C",true);
    $pdf->Ln();

    $registrosPendentes = $r->listarRecebimentosPendentesPorPeriodo($datInicial, $datFinal);
    if ( $registrosPendentes ){
        foreach ($registrosPendentes as $registroAtual){
            $pdf->Cell(35,7,"NF-e ". $registroAtual['numNFe'],1,0,"C");
            $pdf->Cell(35,7,$registroAtual['vlrBrutoFormatado'],1,0,"C");
            $pdf->Cell(35,7,$registroAtual['vlrLiquidoFormatado'],1,0,"C");
            $pdf->Cell(35,7,$registroAtual['datVencimento'],1,0,"C");
            $pdf->Ln();
        }
        $pdf->Ln(8);
    }else{
        $pdf->Cell(140,7,"Nenhum Recebimentos pendente encontrado no período",1,0,"C");
        $pdf->Ln(14);
    }

    $pdf->SetFont('Arial','B',11);
    $pdf->Write(5,"NOTAS CANCELADAS");
    $pdf->Ln(7);

    $pdf->SetFont("Arial","",10);
    $pdf->Cell(35,7,"Nota fiscal",1,0,"C",true);
    $pdf->Cell(35,7,"Valor bruto",1,0,"C",true);
    $pdf->Cell(35,7,"Valor líquido",1,0,"C",true);
    $pdf->Cell(35,7,"Data de emissão",1,0,"C",true);
    $pdf->Ln();

    $registrosCancelados = $r->listarNotasCanceladasPorPeriodo($datInicial, $datFinal);
    if ( $registrosCancelados ){
        foreach ($registrosCancelados as $registroAtual){
            $pdf->Cell(35,7,"NF-e ". $registroAtual['numNFe'],1,0,"C");
            $pdf->Cell(35,7,$registroAtual['vlrBrutoFormatado'],1,0,"C");
            $pdf->Cell(35,7,$registroAtual['vlrLiquidoFormatado'],1,0,"C");
            $pdf->Cell(35,7,$registroAtual['datVencimento'],1,0,"C");
            $pdf->Ln();
        }
        $pdf->Ln(8);
    }else{
        $pdf->Cell(140,7,"Nenhuma Nota Cancelada encontrada no período",1,0,"C");
        $pdf->Ln(14);
    }
    
    if(isset($_POST['txtObservacao']) && !empty($_POST['txtObservacao'])){
        $pdf->SetTextColor(255,0,0);
        $pdf->Write(5,"OBSERVAÇÕES:");
        $pdf->Ln(5);
        $pdf->Write(5,$_POST['txtObservacao']);
        $pdf->SetTextColor(0,0,0);
        $pdf->Ln(10);
    }

    $pdf->Cell(190,10,$dataHojeExtenso,0,0,"C");
    $pdf->Ln(10);
    
    $pdf->SetLeftMargin(40);
    $pdf->Image('../assets/imagens/assinaturaZuleika.png',null,null,120);
    $pdf->SetLeftMargin(10);
    $pdf->Ln(8);

    $pdf->SetFont("Arial","",12);
    $pdf->Cell(190,10,"ALDE SANTOS JUNIOR ADVOGADOS ASSOCIADOS",0,0,"C");
    
    $pdf->Output();
?>


<?php

    require '../assets/util/conexaoDB.php';
    require '../assets/fpdf/fpdf.php';
    require '../model/Pagamento.class.php';
    require '../assets/util/manipulacaoDatas.php';

    $p = new Pagamento;

    $pdf= new FPDF();
    
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,10,"Relatório de despesas mensais",0,0,"C");
    $pdf->Ln(10);

    $datInicial = addslashes($_POST['datInicial']);
    $datFinal = addslashes($_POST['datFinal']);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(190,10,"Periodo de ".implode('/', array_reverse(explode('-',$datInicial))) ." até ".implode('/', array_reverse(explode('-',$datFinal))),0,0,"C");
    $pdf->Ln(15);
    
    $pdf->SetFont("Arial","B",12);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(85,7,"OBJETO",1,0,"L",true);
    $pdf->Cell(35,7,"VENCIMENTO",1,0,"C",true);
    $pdf->Cell(35,7,"PAGAMENTO",1,0,"C",true);
    $pdf->Cell(35,7,"VALOR",1,0,"R",true);
    $pdf->SetFont("Arial","",10); 
    $pdf->Ln();

    $registrosPagos = $p->listarPagamentosPorPeriodo($datInicial, $datFinal);
    $vlrTotal = 0;

    if ( $registrosPagos ){
        foreach ($registrosPagos as $registroAtual){
            $vlrTotal = $vlrTotal + $registroAtual['vlrValorSemTratamento'];

            $pdf->Cell(85,7,utf8_encode($registroAtual['txtDescricao']),1,0,"L");
            $pdf->Cell(35,7,$registroAtual['datPagamento'],1,0,"C");
            $pdf->Cell(35,7,$registroAtual['datVencimento'],1,0,"C");
            $pdf->Cell(35,7,"R$ " . $registroAtual['vlrValor'],1,0,"R");
            $pdf->Ln();
        }

        $pdf->SetFillColor(255,255,0);
        $pdf->SetTextColor(255,0,0);
        $pdf->SetFont("Arial","B",10);
        $pdf->Cell(155,7,"TOTAL",1,0,"L",true);
        //$pdf->Cell(35,7,"",1,0,"C",true);
        //$pdf->Cell(35,7,"",1,0,"C",true);
        $pdf->Cell(35,7,"R$ " . str_replace(".", ",", $vlrTotal),1,0,"R",true);

        

        $pdf->Ln(8);
    }else{
        $pdf->Cell(175,7,"Nenhum pagamento encontrado no período",1,0,"C");
        $pdf->Ln(14);
    }
    
    $pdf->Output();
?>





<?php
require 'conexaoDB.php';
require 'assets/fpdf/fpdf.php';
require 'Recebimento.class.php';






    $r = new Recebimento;

    $pdf= new FPDF();
    
    
    $pdf->AddPage();
    $pdf->SetLeftMargin(60);
    $pdf->SetFont('Arial','B',16);
    $pdf->Write(5,"Relatorio de Recebimentos");
    $pdf->Ln(10);
    $pdf->SetLeftMargin(5);

    $pdf->SetFont('Arial','',16);
    $pdf->Ln(10);
    $pdf->Write(5,"À renovar contabilidade Ltda,");
    $pdf->Ln(10);
    $pdf->Write(5,"Empresa: Alde Satnos Junior e Advogados Associados,");
    $pdf->Ln(10);
    $pdf->Write(5,"CONTROLE DE PAGAMENTOS DE NOTAS FISCAIS DE SERVIÇOS - Outubro/2020");
    $pdf->Ln(10);
    $pdf->Write(5,"OBS: Mesmo que a nota fiscal não tenha sido paga, a mesma deverá ser enviada à contabilidade.");
    $pdf->Ln(10);
    $datInicial = addslashes($_POST['datInicial']);
    $datFinal = addslashes($_POST['datFinal']);
    $pdf->Write(5,"Periodo de ".implode('/', array_reverse(explode('-',$datInicial))) ." ate ".implode('/', array_reverse(explode('-',$datFinal))));
    $pdf->Ln(15);

    $pdf->SetFont('Arial','B',16);
    $pdf->Write(5,"Notas pagas");
    $pdf->Ln(10);

    $pdf-> SetFont("Arial","I",10);
    $pdf->Cell(35,7,"Nota fiscal",1,0,"C");
    $pdf->Cell(35,7,"Valor bruto",1,0,"C");
    $pdf->Cell(35,7,"valor Liquido",1,0,"C");
    $pdf->Cell(35,7,"Data de pagamento",1,0,"C");
    $pdf->Cell(35,7,"Data de vencimento",1,0,"C");
    $pdf->Ln();

    foreach ($r->listarRecebimentos() as $registroAtual){
        $pdf->Cell(35,7,$registroAtual['numNFe'],1,0,"C");
        $pdf->Cell(35,7,$registroAtual['vlrBruto'],1,0,"C");
        $pdf->Cell(35,7,$registroAtual['vlrLiquido'],1,0,"C");
        $pdf->Cell(35,7,$registroAtual['datPagamento'],1,0,"C");
        $pdf->Cell(35,7,$registroAtual['datVencimento'],1,0,"C");
        $pdf->Ln();
    }
    $pdf->Ln(20);
    $pdf->SetLeftMargin(70);
    $pdf->Write(5,"Brasília/DF, ".date('d/m/Y').".");
    $pdf->Output();
?>


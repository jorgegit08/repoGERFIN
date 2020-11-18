
<?php
require 'assets/fpdf/fpdf.php';

class PDF extends FPDF
{

function Justify($text, $w, $h)
{
    $tab_paragraphe = explode("\n", $text);
    $nb_paragraphe = count($tab_paragraphe);
    $j = 0;

    while ($j<$nb_paragraphe) {

        $paragraphe = $tab_paragraphe[$j];
        $tab_mot = explode(' ', $paragraphe);
        $nb_mot = count($tab_mot);

        // Handle strings longer than paragraph width
        $k=0;
        $l=0;
        while ($k<$nb_mot) {

            $len_mot = strlen ($tab_mot[$k]);
            if ($len_mot<($w-5) )
            {
                $tab_mot2[$l] = $tab_mot[$k];
                $l++;    
            } else {
                $m=0;
                $chaine_lettre='';
                while ($m<$len_mot) {

                    $lettre = substr($tab_mot[$k], $m, 1);
                    $len_chaine_lettre = $this->GetStringWidth($chaine_lettre.$lettre);

                    if ($len_chaine_lettre>($w-7)) {
                        $tab_mot2[$l] = $chaine_lettre . '-';
                        $chaine_lettre = $lettre;
                        $l++;
                    } else {
                        $chaine_lettre .= $lettre;
                    }
                    $m++;
                }
                if ($chaine_lettre) {
                    $tab_mot2[$l] = $chaine_lettre;
                    $l++;
                }

            }
            $k++;
        }

        // Justified lines
        $nb_mot = count($tab_mot2);
        $i=0;
        $ligne = '';
        while ($i<$nb_mot) {

            $mot = $tab_mot2[$i];
            $len_ligne = $this->GetStringWidth($ligne . ' ' . $mot);

            if ($len_ligne>($w-5)) {

                $len_ligne = $this->GetStringWidth($ligne);
                $nb_carac = strlen ($ligne);
                $ecart = (($w-2) - $len_ligne) / $nb_carac;
                $this->_out(sprintf('BT %.3F Tc ET',$ecart*$this->k));
                $this->MultiCell($w,$h,$ligne);
                $ligne = $mot;

            } else {

                if ($ligne)
                {
                    $ligne .= ' ' . $mot;
                } else {
                    $ligne = $mot;
                }

            }
            $i++;
        }

        // Last line
        $this->_out('BT 0 Tc ET');
        $this->MultiCell($w,$h,$ligne);
        $tab_mot = '';
        $tab_mot2 = '';
        $j++;
    }
}

}

/*
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$pdf->Cell(85,4,"EXAMPLE OF FUNCTION USAGE",1,1,'C');
$pdf->Write(4,"\nSource: http://www.swg-fr.com\n\n");
$text=file_get_contents('ex.txt');
$pdf->Justify($text,85,4);
$pdf->Output();
*/
$pdf = new PDF();
/*
$pdf->AddPage();
$pdf->SetFont('Arial','U',10);
$pdf->SetFillColor(250,180,200);
// Print 2 Cells
$pdf->Cell(190,8,'a short text which is left aligned',1,1,'L',1);
$pdf->Ln();
$pdf->Cell(190,8,'a short text which is forced justified',1,1,'FJ',1);
$pdf->Ln();
// Print 2 MultiCells
$y = $pdf->GetY();
$pdf->MultiCell(90,8,"It is a long text\nwhich is left aligned",1,'L',1);
$pdf->SetXY(110,$y);
$text = "           Recebi da empresa ALDE SANTOS JÚNIOR E\n ADVOGADOS ASSOCIADOS S/C, inscrita no CNPJ sob o nº\n 01.072.775/0001-35, a importância de R$ 110.470,85\n (cento e dez mil, quatrocentos e setenta reais e\n oitenta centavos), referente a distribuição\n de lucros.";
$pdf->MultiCell(146,50,$text,0,'FJ');
$pdf->Output();
    
    
    require 'conexaoDB.php';
    require 'assets/fpdf/fpdf.php';
    require 'Recebimento.class.php';
    require 'DistrLucro.class.php';
    require 'manipulacaoDatas.php';

    $r = new Recebimento;
    $dt = new DistrLucro;

    $datInicial = addslashes($_POST['datInicial']);
    $datFinal = addslashes($_POST['datFinal']);

    $pdf= new FPDF();
*/
    $pdf->AddPage();
    $pdf->Ln(60);

    $pdf->SetFont('Times','B',15);
    $pdf->Cell(190,10,"RECIBO",0,0,"C");
    $pdf->Ln(30);

    $pdf->SetFont('Times','',15);
    $pdf->Cell(165,10,"R$ 110.470,85",1,0,"R");
    $pdf->Ln(15);

    $text = "                         Recebi da empresa ALDE SANTOS JÚNIOR E ADVOGADOS ASSOCIADOS S/C, inscrita no CNPJ sob o nº 01.072.775/0001-35, a importância de R$ 110.470,85 (cento e dez mil, quatrocentos e setenta reais e oitenta centavos), referente a distribuição de lucros.";

    $pdf->SetLeftMargin(31);
    $pdf->SetFont('Times','',15);
    $pdf->MultiCell(144,10,$text,1,"J");

    $pdf->SetLeftMargin(31);
    $pdf->Ln();

    

$pdf->AddPage();
$pdf->SetFont('Arial','',9);
//$pdf->Cell(85,4,"EXAMPLE OF FUNCTION USAGE",1,1,'C');
//$pdf->Write(4,"\nSource: http://www.swg-fr.com\n\n");
//$text=file_get_contents('ex.txt');
$pdf->Justify($text,120,4);

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


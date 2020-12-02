<?php

	$dataHojeExtenso = "Brasília/DF, ". date('d');

		switch (date('m')) {
			case 1:
				$dataHojeExtenso .=  ' de janeiro de ';
				$mesAtual = 'janeiro';
				break;
			case 2:
				$dataHojeExtenso .=  ' de fevereiro de ';
				$mesAtual = 'fevereiro';
				break;
			case 3:
				$dataHojeExtenso .=  ' de março de ';
				$mesAtual = 'março';
				break;
			case 4:
				$dataHojeExtenso .=  ' de abril de ';
				$mesAtual = 'abril';
				break;
			case 5:
				$dataHojeExtenso .=  ' de maio de ';
				$mesAtual = 'maio';
				break;
			case 6:
				$dataHojeExtenso .=  ' de juho de ';
				$mesAtual = 'junho';
				break;
			case 7:
				$dataHojeExtenso .=  ' de julho de ';
				$mesAtual = 'julho';
				break;
			case 8:
				$dataHojeExtenso .=  ' de agosto de ';
				$mesAtual = 'agosto';
				break;
			case 9:
				$dataHojeExtenso .=  ' de setembro de ';
				$mesAtual = 'setembro';
				break;
			case 10:
				$dataHojeExtenso .=  ' de outubro de ';
				$mesAtual = 'outubro';
				break;
			case 11:
				$dataHojeExtenso .=  ' de novembro de ';
				$mesAtual = 'novembro';
				break;
			case 12:
				$dataHojeExtenso .=  ' de dezembro de ';
				$mesAtual = 'dezembro';
				break;
		}

		$dataHojeExtenso .= date('Y') . ".";
	
	?>
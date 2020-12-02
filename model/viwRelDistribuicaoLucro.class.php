<?php

  class viwRelDistribuicaoLucro{

    public function listarDistrLucroPeriodo($dataInicial, $dataFinal){
        global $pdo;

        $sql = "SELECT txtNome, vlrValor, vlrValorFormatado, imgAssinatura, txtCPF, imgComprovante ".
               "  FROM viwreldistribuicaolucro ".
               " WHERE r.datEmissao BETWEEN :datInicial AND :datFinal ";

        $sql = $pdo->prepare($sql);
        $sql->bindValue("datInicial",implode('-', array_reverse(explode('/',$dataInicial))));
        $sql->bindValue("datFinal",implode('-', array_reverse(explode('/',$dataFinal))));
        $sql->execute();

        $dado = $sql->fetchAll();

        return $dado;
    }

}
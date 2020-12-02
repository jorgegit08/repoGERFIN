<?php

echo ("  <html>
            <head></head>
            <body>

                <script src='/TCC/assets/jquery/sweetalert2/sweetalert2.js'></script>

                <style>
                    div.texto{
                        height: 400px; 
                        width: 860px; 
                        overflow: auto; 
                        text-indent: 3em; 
                        text-align: justify; 
                        border: 1px solid; 
                        padding: 0 20px;
                    }

                    li.lista{
                        margin-left: 3em;
                        margin-bottom: 10px;
                        text-indent: 0; 
                    }

                    p.par{
                        margin-bottom: 10px;
                    }
                </style>

                <script>
                    Swal.fire({            
                        title:              'Termo de Adesão do Usuário à Lei nº 13.709/2018<br>Lei Geral de Proteção De Dados Pessoais - LGPD<br>GERFIN/ASJ Advogados e Associados',
                        html:               '<div class=\'texto\'><p class=\'par\'>Estou ciente, compreendo e adiro na íntegra aos requisitos e obrigações da Lei Geral de Proteção de Dados Pessoais (Lei nº 13.709 de 14/08/2018, “LGPD”), a qual dispõe sobre o tratamento de dados pessoais, inclusive nos meios digitais, por pessoa natural ou por pessoa jurídica de direito público ou privado, com o objetivo de proteger os direitos fundamentais de liberdade e de privacidade e o livre desenvolvimento da personalidade da pessoa natural.</p><p class=\'par\'>Qualquer relação estabelecida com a ASJ e Advogados Associados e seus clientes, que implicar no acesso, recebimento, processamento, transmissão, tratamento e/ou transferência internacional de dados de caráter pessoal, o usuário do GERFIN – Gerenciador Financeiro, compromete-se por meio do presente Termo a:</p><ol class=\'ini\'><li class=\'lista\'>Cumprir as leis de privacidade de dados em relação ao tratamento de dados pessoais objeto da sua relação contratual com o Contratante, naquilo que for aplicável, bem como as disposições das Políticas de Privacidade e Segurança de Dados;</li><li class=\'lista\'>Tratar os dados de caráter pessoal a que tenha acesso, em razão dos prestadores de serviços, com a exclusiva finalidade de uso profissional, sempre em conformidade com os critérios, requisitos e especificações previstas no Contrato firmado com a ASJ e Advogados Associados e seus respectivos anexos (“Contrato”), sem a possibilidade de utilizar esses dados para finalidade distinta ou pessoal;</li><li class=\'lista\'>Não divulgar a terceiros os dados de caráter pessoal a que tenha tido acesso, salvo mediante prévia e expressa autorização do Contratante;</li><li class=\'lista\'>Não tratar dados pessoais em local diferente do estabelecido pela ASJ Advogados;</li><li class=\'lista\'>Não reter quaisquer Dados Pessoais de clientes ou outros usuários, que por qualquer causa rescindir o vínculo com o ASJ Advogados, deverá o mesmo apagar/destruir com segurança (mediante confirmação por escrito) todos os documentos que contenham dados de caráter pessoal, a que tenha tido acesso durante o vínculo profissional, bem como qualquer cópia destes, seja de forma documental ou magnética, a menos que a sua manutenção seja exigida ou assegurada pela legislação vigente;</li><li class=\'lista\'>Colaborar com o ASJ e Advogados Associados para que este garanta o integral cumprimento das disposições previstas nas leis de proteção de dados pessoais;</li><li class=\'lista\'>Notificar prontamente o ASJ e Advogados Associados por escrito sempre que souber ou suspeitar que ocorreu um incidente de segurança, ou uma violação à lei de proteção de dados pessoais.</li></ol><p class=\'par\' style=\'text-indent: 0\'><strong>Parágrafo único:</strong> Para os propósitos deste Termo de Adesão, “dados de caráter pessoal\' significam todas as informações acessadas ou recebidas pela ASJ e Advogados Associados em qualquer forma tangível ou intangível referente, ou que pessoalmente identifiquem ou tornem identificáveis, qualquer empregado, cliente, agente, usuário final, fornecedor, contato ou representante do Usuário.</p><p class=\'par\'>Por fim, o Fornecedor declara, neste ato, ter recebido os requisitos e obrigações a serem observados por ele, em conformidade com a legislação objeto do presente Termo.</p></div>',
                        input:              'checkbox',
                        inputPlaceholder:   'Eu li e aceito os termos',
                        confirmButtonText:  'Aceito',
                        width:              1000,
                        allowOutsideClick:  false,
                        inputValidator:     (result) => {
                            return !result && 'Para prosseguir com o cadastro, você precisa aceitar os termos da LGPD!'
                        }
                    })

                </script>

                
            </body>
        </html>
");
<link rel="stylesheet" type="text/css" href="formata_padrao.css" />

<center>

    <body bgcolor="mediumturquoise">

        <form method="POST" action="alterar_atendimento_backend.php">
            <p><br>

                ID Atendimento: <select size="1" name="idatendimento">
                    <?php
                    // Gera a lista 

                    include "conexao.php";

                    $res = mysql_query("select * from atendimento");
                    while ($registro = mysql_fetch_row($res)) {
                        $cod = $registro[0];
                        echo "<option value=\"$cod\">$cod</option>\n";
                    }
                    ?>
                </select><br><br>

                Pet: <select size="1" name="pet_idpet">
                    <?php
                    $res = mysql_query("select * from pet");
                    while ($registro = mysql_fetch_row($res)) {
                        $cod = $registro[0];
                        echo "<option value=\"$cod\">$cod</option>\n";
                    }
                    ?>
                </select><br><br>

                Cliente: <select size="1" name="idcliente">

                <option></option>

                <?php

                    $res=mysql_query("SELECT * FROM cliente INNER JOIN pessoa ON cliente.idpessoa = pessoa.idpessoa;");

                    while ($registro=mysql_fetch_row($res))
                    {
                        $cod=$registro[0];
                        $nome_pessoa=$registro[4];

                        echo "<option value=\"$cod\">$nome_pessoa</option>\n";
                    }

                ?>

                </select><br><br>

                Funcionário Veterinário: <select size="1" name="funcionario_veterinario">

                <option value=""><option>

                <?php

                    $res=mysql_query("SELECT * FROM funcionario 
                                        INNER JOIN pessoa ON funcionario.pessoa_idpessoa = pessoa.idpessoa 
                                        INNER JOIN funcionario_funcao ON funcionario_funcao.funcionario_matricula = funcionario.matricula
                                        INNER JOIN funcao ON funcao.idfuncao = funcionario_funcao.funcao_idfuncao
                                        WHERE funcao.idfuncao = 4;");

                    while ($registro=mysql_fetch_row($res))
                    {
                        $cod=$registro[0];
                        $nome_pessoa=$registro[6];

                        echo "<option value=\"$cod\">$nome_pessoa</option>\n";
                    }

                ?>
                </select><br><br> 

                Funcionário Entrada: <select size="1" name="funcionario_entrada">

                <option value=""></option>

                <?php

                $res=mysql_query("SELECT * FROM funcionario INNER JOIN pessoa ON funcionario.pessoa_idpessoa = pessoa.idpessoa;");

                while ($registro=mysql_fetch_row($res))
                {
                    $cod=$registro[0];
                    $nome_pessoa=$registro[6];

                    echo "<option value=\"$cod\">$nome_pessoa</option>\n";
                }

                ?>
                </select><br><br> 

                Funcionário Saída: <select size="1" name="funcionario_saida">

                <option value=""></option>

                <?php

                $res=mysql_query("SELECT * FROM funcionario INNER JOIN pessoa ON funcionario.pessoa_idpessoa = pessoa.idpessoa;");

                while ($registro=mysql_fetch_row($res))
                {
                    $cod=$registro[0];
                    $nome_pessoa=$registro[6];

                    echo "<option value=\"$cod\">$nome_pessoa</option>\n";
                }

                ?>
                </select><br><br>
                
                Data Hora Entrada: <input type="datetime-local" name="data_hora_entrada"><br><br>
                Data Hora Saída: <input type="datetime-local" name="data_hora_saida"><br><br>
                Descrição: <input type="text" name="descricao"><br><br>

                <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">

                <input type="submit" name="Submit" value="Alterar">
        </form>
</center>
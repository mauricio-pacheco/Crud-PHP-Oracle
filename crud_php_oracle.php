<?php
//CRUD PHP E ORACLE
//AUTOR: MAURÍCIO PACHECO

//CONECTA O BANCO DE DADOS
$string_conexao_banco ="(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1531))(CONNECT_DATA =(SID=ID_USUARIO)))";
if($conexao_banco = oci_connect('ID_USUARIO','SUA_SENHA', $string_conexao_banco, 'UTF8')):
    echo "Banco de Dados Conectado!";
else:
    echo "Não foi possível conectar o Banco de Dados.";
endif;

//EXEMPLO DE SELECT
$sql_selecao = "SELECT * FROM TABELA_SELECIONADA";
$rs_selecao = oci_parse($conexao_banco,$sql_selecao);
oci_execute($rs_selecao);

 while($row = oci_fetch_assoc($rs_selecao)):
 echo "ID: " . $row['ID'];
 echo "-";
 echo "NOME: " . $row['NOME'];
 echo "<br>";
 endwhile;

//EXEMPLO DE INSERT
$sql_insere = "INSERT INTO TABELA_SELECIONADA (ID, NOME) SELECT NVL(MAX(ID),0)+1,'MAURICIO' FROM TABELA_SELECIONADA";
$rs_insere = oci_parse($conexao_banco,$sql_insere);
oci_execute($rs_insere);

//EXEMPLO DE UPDATE
$sql_atualiza = "UPDATE TABELA_SELECIONADA SET NOME = 'MAURICIO' WHERE ID = '8'";
$rs_atualiza = oci_parse($conexao_banco,$sql_atualiza);
oci_execute($rs_atualiza);

//EXEMPLO DE DELETE
$sql_apagar = "DELETE FROM TABELA_SELECIONADA WHERE ID = '9'";
$rs_apagar = oci_parse($conexao_banco,$sql_apagar);
oci_execute($rs_apagar);

//FECHA CONEXÃO
oci_close($conexao_banco);

?>
<?php

//conexão com banco de dados
$conexao = mysqli_connect('localhost','root','ZYZF4YKO') or die ("Erro de conexão");
$banco = mysqli_select_db($conexao,'nachapaenoforno') or die ("Erro ao selecionar o banco de dados");


?>
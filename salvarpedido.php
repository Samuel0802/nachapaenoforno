<?php
 //verificar se usuario está longado

 include("phpbanco/conexao.php/");
 $con = mysqli_connect('localhost','root','ZYZF4YKO','db') or die('Erro ao conectar ao banco de dados');

 $name = mysqli_real_escape_string($conexao, trim($_POST['name']));
 $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
 $mail = mysqli_real_escape_string($conexao, trim($_POST['mail']));
 $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));


$sql = "INSERT INTO usuario (nome,telefone,mail,senha,data_cadastro) 
                    VALUES ('$nome','$telefone','$mail','$senha',NOW())";

if($conexao ->query($sql) == TRUE){
    header('location: pedido.php');
}

$conexao ->close();

header('location: pedido.php');


?>
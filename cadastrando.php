<?php
 session_start();
 include("conexao.php");
 $con = mysqli_connect('localhost','root','ZYZF4YKO','nachapaenoforno') or die('Erro ao conectar ao banco de dados');

 $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
 $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
 $mail = mysqli_real_escape_string($conexao, trim($_POST['mail']));
 $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "SELECT mail  from usuario where mail = '$mail'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_num_rows($result,$con);

if($row > 0){
    $_SESSION['usuario_existe'] = true;
    header('location: login.php');
    exit;
}

$sql = "INSERT INTO usuario (nome,telefone,mail,senha,data_cadastro) 
                    VALUES ('$nome','$telefone','$mail','$senha',NOW())";

if($conexao ->query($sql) == TRUE){
    $_SESSION['status_cadastro'] = true;
}

$conexao ->close();

header('location: pedido.php');

?>
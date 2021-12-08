
<?php
include('conexao.php');


# Validar os dados do usuário

function anti_sql_injection($string)
	{
		include('conexao.php');
		$string = stripslashes($string);
		$string = strip_tags($string);
		$string = mysqli_real_escape_string($conexao,$string);
		return $string;
	}
    $login = anti_sql_injection($_POST['mail']);
    $senha = anti_sql_injection($_POST['senha']);
    $senha = md5($senha);

    $tabela = "SELECT * FROM usuario WHERE mail='$login' and senha='$senha' limit 1";
    $sql = mysqli_query($conexao,$tabela) ;


    


$linhas = mysqli_num_rows($sql);
if($linhas == '')
	{
        session_start();
        $_SESSION['erro_login'] = 'Login ou Senha invalido';
        header("Location: login.php");
	}
else
	{
		$dados = mysqli_fetch_assoc($sql);
				session_start();
				$_SESSION['nome_usu_sessao'] = $dados['nome'];
				header("Location: pedido.php");
			
	}
?>
<?php
session_start();
include("conexao.php");

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email='$email' LIMIT 1";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            unset($usuario['senha']);
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php");
            exit;
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "E-mail não encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang='pt-BR'>
<head>
<meta charset='UTF-8'>
<title>Login - Creativa IA</title>
<link href='https://fonts.googleapis.com/css2?family=Mohave:wght@500&display=swap' rel='stylesheet'>
<style>
body {font-family:'Mohave',sans-serif;background:linear-gradient(135deg,#b9f3ff,#e0faff);
display:flex;align-items:center;justify-content:center;height:100vh;margin:0;}
form {background:rgba(255,255,255,0.85);padding:40px;border-radius:20px;box-shadow:0 0 15px rgba(0,0,0,0.2);}
input{display:block;width:100%;margin:10px 0;padding:10px;border-radius:8px;border:1px solid #ccc;}
button{background:linear-gradient(135deg,#00c6ff,#0072ff);border:none;padding:10px 20px;border-radius:8px;color:white;cursor:pointer;}
a{color:#0072ff;text-decoration:none;}
</style>
</head>
<body>
<form method='POST'>
<h2>🔐 Login - Creativa IA</h2>
<input type='email' name='email' placeholder='Seu e-mail' required>
<input type='password' name='senha' placeholder='Sua senha' required>
<button type='submit'>Entrar</button>
<p style='text-align:center;margin-top:10px;'>Ainda não tem conta? <a href='cadastro.php'>Cadastre-se</a></p>
<?php if(isset($_GET['msg']) && $_GET['msg']==='sucesso') echo "<p style='color:green;text-align:center;'>Cadastro realizado com sucesso!</p>"; ?>
<?php if(isset($erro)) echo "<p style='color:red;text-align:center;'>$erro</p>"; ?>
</form>
</body>
</html>

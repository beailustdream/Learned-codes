<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $conn->real_escape_string(trim($_POST["nome"]));
    $email = $conn->real_escape_string(trim($_POST["email"]));
    $senhaHash = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $fotoPadrao = "https://i.postimg.cc/fy3gBk7W/111-Sem-T-tulo-20251004161225.jpg";

    $verifica = $conn->query("SELECT id FROM usuarios WHERE email='$email'");
    if ($verifica && $verifica->num_rows > 0) {
        $erro = "❌ Este e-mail já está cadastrado!";
    } else {
        $sql = "INSERT INTO usuarios (nome, email, senha, foto) VALUES ('$nome', '$email', '$senhaHash', '$fotoPadrao')";
        if ($conn->query($sql)) {
            header("Location: login.php?msg=sucesso");
            exit;
        } else {
            $erro = "Erro ao cadastrar: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang='pt-BR'>
<head>
<meta charset='UTF-8'>
<title>Cadastro - Creativa IA</title>
<link href='https://fonts.googleapis.com/css2?family=Mohave:wght@500&display=swap' rel='stylesheet'>
<style>
body {font-family:'Mohave',sans-serif;background:linear-gradient(135deg,#b9f3ff,#e0faff);
display:flex;align-items:center;justify-content:center;height:100vh;margin:0;}
form {background:rgba(255,255,255,0.9);padding:40px;border-radius:20px;
box-shadow:0 0 15px rgba(0,0,0,0.2);width:350px;}
input{display:block;width:100%;margin:10px 0;padding:10px;border-radius:8px;border:1px solid #ccc;font-size:15px;}
button{background:linear-gradient(135deg,#00c6ff,#0072ff);border:none;padding:10px 20px;border-radius:8px;color:white;cursor:pointer;font-size:16px;}
a{color:#0072ff;text-decoration:none;}
h2{text-align:center;margin-bottom:10px;}
</style>
</head>
<body>
<form method='POST'>
<h2>📝 Criar Conta</h2>
<input type='text' name='nome' placeholder='Seu nome completo' required>
<input type='email' name='email' placeholder='Seu e-mail' required>
<input type='password' name='senha' placeholder='Crie uma senha' required>
<button type='submit'>Cadastrar</button>
<p style='text-align:center;margin-top:10px;'>Já tem conta? <a href='login.php'>Fazer login</a></p>
<?php if(isset($erro)) echo "<p style='color:red;text-align:center;'>$erro</p>"; ?>
</form>
</body>
</html>

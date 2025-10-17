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
            $_SESSION['bemvindo'] = "Bem-vindo(a), " . $usuario['nome'] . "!";
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
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Login - Creativa IA</title>
<link href="https://fonts.googleapis.com/css2?family=Mohave:wght@500&display=swap" rel="stylesheet">
<style>
:root {
    --bg-light: linear-gradient(135deg, #b9f3ff, #e0faff);
    --form-light: rgba(255, 255, 255, 0.25);
    --text-light: #003459;
    --button-light: linear-gradient(135deg, #00c6ff, #0072ff);

    --bg-dark: linear-gradient(135deg, #00111a, #002e45);
    --form-dark: rgba(10, 20, 30, 0.25);
    --text-dark: #e6f7ff;
    --button-dark: linear-gradient(135deg, #00b2ff, #005bb5);
}

body {
    font-family: 'Mohave', sans-serif;
    background: var(--bg-light);
    color: var(--text-light);
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    overflow: hidden;
    transition: background 0.8s ease, color 0.8s ease;
}

/* 🌙 Tema escuro automático */
@media (prefers-color-scheme: dark) {
    body {
        background: var(--bg-dark);
        color: var(--text-dark);
    }
    form {
        background: var(--form-dark);
        color: var(--text-dark);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(0, 140, 255, 0.2);
    }
    input {
        background: rgba(255,255,255,0.1);
        color: #e6f7ff;
        border: 1px solid #0072ff;
    }
    button {
        background: var(--button-dark);
    }
    a {
        color: #33aaff;
    }
}

/* ✨ Container central */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

/* ☀️ Formulário */
form {
    background: var(--form-light);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 40px 50px;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    width: 380px;
    text-align: center;
    transition: background 0.8s ease, color 0.8s ease;
}

/* 🔹 Logo */
#logo img {
    width: 180px;
    margin-bottom: 10px;
}

/* 🔹 Título */
h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #0072ff;
}

/* 🔹 Campos */
input {
    display: block;
    width: 100%;
    margin: 12px 0;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,0.3);
    background: rgba(255,255,255,0.7);
    font-size: 15px;
    text-align: center;
    transition: all 0.5s ease;
}

input:focus {
    border-color: #0072ff;
    box-shadow: 0 0 8px rgba(0, 114, 255, 0.3);
}

/* 🔹 Botão */
button {
    background: var(--button-light);
    border: none;
    padding: 12px 20px;
    border-radius: 10px;
    color: white;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    transition: all 0.3s ease;
}

button:hover {
    transform: scale(1.05);
}

/* 🔹 Rodapé */
p {
    margin-top: 14px;
    text-align: center;
}

a {
    color: #0072ff;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>

<div class="container">
<form method="POST">
    <!-- 🔹 Logo -->
    <div id="logo">
        <img src="https://i.postimg.cc/MpvTvGdG/creativa-logo.png" alt="Logo">
    </div>

    <!-- 🔹 Título -->
    <h2>Entrar</h2>

    <!-- 🔹 Campos -->
    <input type="email" name="email" placeholder="Seu e-mail" required>
    <input type="password" name="senha" placeholder="Sua senha" required>

    <!-- 🔹 Botão -->
    <button type="submit">Entrar</button>

    <!-- 🔹 Rodapé -->
    <p>Primeira vez? <a href="cadastro.php">Cadastre-se</a></p>

    <!-- 🔹 Mensagens -->
    <?php if(isset($_GET['msg']) && $_GET['msg']==='sucesso') echo "<p style='color:green;'>Cadastro realizado com sucesso!</p>"; ?>
    <?php if(isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
</form>
</div>

</body>
</html>

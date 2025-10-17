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

/* 🌈 Corpo */
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
    position: relative;
    transition: background 0.8s ease, color 0.8s ease;
}

/* 🌙 Tema escuro */
@media (prefers-color-scheme: dark) {
    body {
        background: var(--bg-dark);
        color: var(--text-dark);
    }
    form {
        background: var(--form-dark);
        color: var(--text-dark);
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

/* ✨ Bolhas de fundo */
.bubble {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(0,195,255,0.5), rgba(255,255,255,0.2));
    filter: blur(40px);
    animation: float 12s ease-in-out infinite;
    opacity: 0.8;
}

.bubble:nth-child(1) { width: 250px; height: 250px; top: 10%; left: 10%; animation-delay: 0s; }
.bubble:nth-child(2) { width: 300px; height: 300px; top: 60%; left: 70%; animation-delay: 2s; }
.bubble:nth-child(3) { width: 200px; height: 200px; top: 75%; left: 15%; animation-delay: 4s; }
.bubble:nth-child(4) { width: 150px; height: 150px; top: 20%; left: 75%; animation-delay: 6s; }

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-25px); }
}

/* ☀️ Formulário */
form {
    background: var(--form-light);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 40px 50px;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
    width: 380px;
    text-align: center;
    z-index: 10;
    transition: background 0.8s ease, color 0.8s ease;
}

/* 🔹 Logo */
#logo img {
    width: 180px;
    margin-bottom: 15px;
}

/* 🔹 Título */
h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #0072ff;
}

/* 🔹 Campos e botão com mesmo tamanho */
input, button {
    display: block;
    width: 100%;
    margin: 12px 0;
    padding: 12px 15px;
    border-radius: 10px;
    font-size: 16px;
    text-align: center;
    box-sizing: border-box;
    transition: all 0.4s ease;
}

input {
    border: 1px solid rgba(0,0,0,0.3);
    background: rgba(255,255,255,0.7);
}

input:focus {
    border-color: #0072ff;
    box-shadow: 0 0 8px rgba(0,114,255,0.4);
}

/* 🔹 Botão */
button {
    background: var(--button-light);
    color: white;
    border: none;
    cursor: pointer;
}

button:hover, input:hover {
    transform: scale(1.03);
    box-shadow: 0 0 15px rgba(0,114,255,0.3);
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

<!-- 🌈 Bolhas de fundo -->
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>

<form method="POST">
    <div id="logo">
        <img src="https://i.postimg.cc/MpvTvGdG/creativa-logo.png" alt="Logo">
    </div>

    <h2>Entrar</h2>

    <input type="email" name="email" placeholder="Seu e-mail" required>
    <input type="password" name="senha" placeholder="Sua senha" required>
    <button type="submit">Entrar</button>

    <p>Primeira vez? <a href="cadastro.php">Cadastre-se</a></p>

    <?php if(isset($_GET['msg']) && $_GET['msg']==='sucesso') echo "<p style='color:green;'>Cadastro realizado com sucesso!</p>"; ?>
    <?php if(isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
</form>

</body>
</html>

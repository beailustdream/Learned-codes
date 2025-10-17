<?php
session_start();
include("conexao.php");
if(!isset($_SESSION['usuario'])){ header("Location: login.php"); exit; }

$id = (int) $_SESSION['usuario']['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $conn->real_escape_string(trim($_POST['nome']));
    $foto = $conn->real_escape_string(trim($_POST['foto']));

    $sql = "UPDATE usuarios SET nome='$nome', foto='$foto' WHERE id=$id";
    if ($conn->query($sql)) {
        $_SESSION['usuario']['nome'] = $nome;
        $_SESSION['usuario']['foto'] = $foto;
        $sucesso = "Perfil atualizado com sucesso.";
    } else {
        $erro = "Erro ao atualizar: " . $conn->error;
    }
}

$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar Perfil - Creativa IA</title>
<link href="https://fonts.googleapis.com/css2?family=Mohave:wght@500&display=swap" rel="stylesheet">
<style>
body{font-family:'Mohave',sans-serif;background:linear-gradient(135deg,#b9f3ff,#e0faff);
display:flex;align-items:center;justify-content:center;height:100vh;margin:0;}
form{background:#fff;padding:30px;border-radius:15px;box-shadow:0 0 15px rgba(0,0,0,0.2);width:360px;}
input{width:100%;margin:10px 0;padding:10px;border-radius:8px;border:1px solid #ccc;}
button{background:linear-gradient(135deg,#00c6ff,#0072ff);border:none;padding:10px 20px;
border-radius:8px;color:white;cursor:pointer;}
.success{color:green;text-align:center;}
.error{color:red;text-align:center;}
</style>
</head>
<body>
<form method="POST">
  <h2>Editar Perfil</h2>
  <input type="text" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
  <input type="text" name="foto" value="<?php echo htmlspecialchars($usuario['foto']); ?>" placeholder="URL da nova foto">
  <button type="submit">Salvar alterações</button>
  <p style="text-align:center; margin-top:10px;"><a href="index.php">Voltar ao chat</a></p>
  <?php if(isset($sucesso)) echo "<p class='success'>$sucesso</p>"; ?>
  <?php if(isset($erro)) echo "<p class='error'>$erro</p>"; ?>
</form>
</body>
</html>

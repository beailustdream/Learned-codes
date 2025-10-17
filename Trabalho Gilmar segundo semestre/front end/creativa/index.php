<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location: login.php");
  exit;
}
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CREATIVA IA</title>
<link rel="icon" href="https://i.postimg.cc/GhNBPYBT/favicon-16x16.png" type="image/x-icon">
<link href="https://fonts.googleapis.com/css2?family=Mohave:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
/* (styles kept concise) */
:root { --bg-gradient-light: linear-gradient(135deg, #b9f3ff 0%, #e0faff 100%); --bg-gradient-dark: linear-gradient(135deg,#0b1e33 0%,#003459 100%); }
*{margin:0;padding:0;box-sizing:border-box;font-family:'Mohave',Arial,sans-serif;}
body{width:100vw;height:100vh;display:flex;background:var(--bg-gradient-light);color:#0a2540;overflow:hidden;}
body.dark{background:var(--bg-gradient-dark);color:#e0f2fe;}
#sidebar{position:fixed;top:0;left:0;height:100vh;width:250px;background:rgba(255,255,255,0.85);backdrop-filter:blur(12px);display:flex;flex-direction:column;z-index:2;padding-top:10px;}
body.dark #sidebar{background:rgba(30,41,59,0.85);}
#logo{text-align:center;padding:10px 0;border-bottom:1px solid rgba(0,0,0,0.1);}#logo img{max-width:100%;height:auto;}
#menuButtons{display:flex;flex-direction:column;margin-top:10px;}
#menuButtons button{padding:15px 20px;border:none;background:none;text-align:left;cursor:pointer;font-size:16px;position:relative;overflow:hidden;color:inherit;transition:0.3s;border-radius:10px;margin:5px 10px;}
#userProfile{display:flex;align-items:center;padding:20px;border-top:1px solid rgba(0,0,0,0.1);margin-top:auto;}
#userProfile img{width:50px;height:50px;border-radius:50%;object-fit:cover;margin-right:15px;border:2px solid #00c6ff;}
#mainContent{flex:1;margin-left:250px;display:flex;flex-direction:column;height:100vh;width:calc(100vw - 250px);overflow:hidden;}
header{position:sticky;top:0;z-index:3;padding:15px 20px;font-size:20px;font-weight:bold;display:flex;align-items:center;justify-content:space-between;backdrop-filter:blur(12px);border-bottom:1px solid rgba(255,255,255,0.2);}
main{flex:1;padding:20px;overflow-y:auto;display:flex;flex-direction:column;gap:15px;}
.message{max-width:70%;padding:14px 18px;border-radius:20px;line-height:1.5;word-wrap:break-word;font-size:15px;}
.bot{align-self:flex-start;background:rgba(255,255,255,0.9);}
.user{align-self:flex-end;background:rgba(0,128,255,0.8);color:#fff;}
footer{display:flex;align-items:center;padding:10px 15px;backdrop-filter:blur(10px);border-top:1px solid rgba(255,255,255,0.3);}
footer input{flex:1;padding:12px 15px;border-radius:25px;border:1px solid rgba(255,255,255,0.3);outline:none;font-size:15px;}
footer button{margin-left:10px;background:linear-gradient(135deg,#00c6ff,#0072ff);border:none;border-radius:50%;color:white;width:45px;height:45px;font-size:18px;cursor:pointer;}
.modal{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:rgba(255,255,255,0.95);backdrop-filter:blur(10px);border-radius:15px;padding:20px;width:400px;max-width:90%;display:none;z-index:10;flex-direction:column;}
</style>
</head>
<body class="light">
<div class="background" id="background"></div>

<!-- Menu lateral -->
<div id="sidebar">
  <div id="logo"><img src="https://i.postimg.cc/MpvTvGdG/creativa-logo.png" alt="Logo"></div>
  <div id="menuButtons">
    <button id="btnSearch">🔍 Pesquisa</button>
    <button id="btnSettings">⚙️ Configurações</button>
    <button onclick="newChat()">➕ Novo chat</button>
    <button id="btnHistory">🕑 Histórico</button>
    <button id="btnTutorial">📘 Tutorial</button>
    <button onclick="window.location='perfil.php'">👤 Editar Perfil</button>
    <button onclick="window.location='logout.php'">🚪 Sair</button>
  </div>
  <div id="userProfile">
    <img src="<?php echo htmlspecialchars($usuario['foto']); ?>" alt="Avatar do Usuário">
    <span><?php echo htmlspecialchars($usuario['nome']); ?></span>
  </div>
</div>

<!-- Conteúdo principal -->
<div id="mainContent">
<header>
  <div style="display:flex; align-items:center; gap:10px;">
    <button id="toggleSidebar" title="Mostrar/Esconder menu">☰</button>
    💠 <span>Yuri Sasaki</span>
  </div>
  <button id="themeToggle" title="Mudar tema">🌙</button>
</header>

<main id="chatMessages">
  <div class="message bot">Olá, sou Yuri!<br>Como posso te ajudar hoje? ☺️</div>
</main>

<footer>
  <input type="text" id="userInput" placeholder="Digite sua mensagem...">
  <button id="micButton" title="Falar">🎤</button>
  <button onclick="sendMessage()">➤</button>
</footer>

<!-- Tutorial Modal -->
<div id="modalTutorial" class="modal">
  <h3>📘 Tutorial Interativo</h3>
  <div id="tutorialContent" style="min-height:200px;"></div>
  <button id="nextStepBtn">➡️ Próximo</button>
  <button id="replayTutorialBtn" style="display:none;">🔄 Rever tutorial</button>
  <button onclick="closeModal('modalTutorial')">Fechar</button>
</div>

<script>
// JS reduzido para manter funcionalidade mínima: enviar mensagens, tema e sidebar
const body=document.body;
const themeToggle=document.getElementById("themeToggle");
const chatMessages=document.getElementById("chatMessages");
const userInput=document.getElementById("userInput");
const micButton=document.getElementById("micButton");
const toggleSidebar=document.getElementById("toggleSidebar");
const sidebar=document.getElementById("sidebar");
const mainContent=document.getElementById("mainContent");

themeToggle.addEventListener("click",()=>{
  if(body.classList.contains("light")){
    body.classList.replace("light","dark");
    themeToggle.textContent="🔆";
  } else {
    body.classList.replace("dark","light");
    themeToggle.textContent="🌙";
  }
});

toggleSidebar.addEventListener("click",()=>{
  sidebar.classList.toggle("hidden");
  mainContent.classList.toggle("fullWidth");
});

function sendMessage(){
  const text=userInput.value.trim(); if(!text) return;
  const userMsg=document.createElement("div"); userMsg.classList.add("message","user"); userMsg.textContent=text;
  chatMessages.appendChild(userMsg);
  const botMsg=document.createElement("div"); botMsg.classList.add("message","bot"); botMsg.innerHTML="💬 resposta automática!";
  setTimeout(()=>{ chatMessages.appendChild(botMsg); chatMessages.scrollTop=chatMessages.scrollHeight; },800);
  userInput.value="";
  chatMessages.scrollTop=chatMessages.scrollHeight;
}

function newChat(){ chatMessages.innerHTML='<div class="message bot">Olá, sou Yuri!<br>Como posso te ajudar hoje? ☺️</div>'; }
</script>
</body>
</html>

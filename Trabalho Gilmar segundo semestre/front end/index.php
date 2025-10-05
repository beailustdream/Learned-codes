<?php
// index.php

$dataFile = 'data.json';
if (!file_exists($dataFile)) file_put_contents($dataFile, json_encode([]));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $messages = json_decode(file_get_contents($dataFile), true);

    if ($action === 'send') {
        $userMsg = trim($_POST['message'] ?? '');
        if ($userMsg !== '') {
            $messages[] = ['type'=>'user','text'=>$userMsg,'time'=>date('Y-m-d H:i:s')];
            $respostas = [
                "Olá! Como posso te ajudar hoje?",
                "Adoro conversar sobre animes e tecnologia!",
                "Sim! Posso responder perguntas gerais ou específicas!",
                "Que bom te ver por aqui! 😊",
                "Vamos manter o chat limpo e divertido!"
            ];
            $botMsg = $respostas[array_rand($respostas)];
            $messages[] = ['type'=>'bot','text'=>$botMsg,'time'=>date('Y-m-d H:i:s')];
            file_put_contents($dataFile, json_encode($messages, JSON_PRETTY_PRINT));
            echo json_encode(['status'=>'ok','bot'=>$botMsg]);
            exit;
        }
    }

    if ($action === 'load') {
        echo json_encode($messages);
        exit;
    }

    if ($action === 'search') {
        $query = trim($_POST['query'] ?? '');
        $result = [];
        foreach ($messages as $msg) {
            if (stripos($msg['text'], $query) !== false) $result[] = $msg;
        }
        echo json_encode($result);
        exit;
    }

    if ($action === 'clear') {
        $messages = [];
        file_put_contents($dataFile, json_encode($messages, JSON_PRETTY_PRINT));
        echo json_encode(['status'=>'ok']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Creativa IA</title>
<link rel="icon" href="https://i.postimg.cc/GhNBPYBT/favicon-16x16.png" type="image/x-icon">
<link href="https://fonts.googleapis.com/css2?family=Mohave:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
:root{
  --bg-blur:rgba(255,255,255,0.25);
}
body{margin:0;padding:0;font-family:'Mohave',Arial,sans-serif;color:#fff;overflow:hidden;transition:0.4s;}
body.blue{background:linear-gradient(135deg,#00c6ff,#0072ff);}
body.pink{background:linear-gradient(135deg,#ff69b4,#ffb6c1);}
body.green{background:linear-gradient(135deg,#00ff7f,#32cd32);}
body.purple{background:linear-gradient(135deg,#9b30ff,#da70d6);}
body.black{background:linear-gradient(135deg,#1c1c1c,#333);}
body.yellow{background:linear-gradient(135deg,#ffd700,#fffacd);}
body.orange{background:linear-gradient(135deg,#ff8c00,#ffa500);}
body.gray{background:linear-gradient(135deg,#808080,#d3d3d3);}

/* Sidebar */
#sidebar{position:fixed;top:0;left:0;height:100vh;width:250px;background:var(--bg-blur);backdrop-filter:blur(12px);display:flex;flex-direction:column;z-index:2;padding-top:10px;}
#sidebar img{max-width:100%;}
#menuButtons{display:flex;flex-direction:column;margin-top:10px;}
#menuButtons button{padding:15px 20px;border:none;background:none;text-align:left;cursor:pointer;font-size:16px;margin:5px 10px;border-radius:10px;color:inherit;position:relative;overflow:hidden;transition:0.3s;}
#menuButtons button::before{content:"";position:absolute;top:0;left:-100%;width:100%;height:100%;background:rgba(255,255,255,0.2);transform:skewX(-20deg);transition:0.4s;border-radius:10px;}
#menuButtons button:hover::before{left:100%;}
#menuButtons button:hover{color:#fff;}
#themeSelector{margin:5px 10px;padding:8px;border-radius:8px;}

/* Main */
#mainContent{flex:1;margin-left:250px;display:flex;flex-direction:column;height:100vh;width:calc(100vw-250px);overflow:hidden;}
#mainContent.fullWidth{margin-left:0;width:100vw;transition:0.3s;}
header{position:sticky;top:0;z-index:3;padding:15px 20px;font-size:20px;font-weight:bold;display:flex;align-items:center;justify-content:space-between;backdrop-filter:blur(12px);}
main{flex:1;padding:20px;overflow-y:auto;display:flex;flex-direction:column;gap:15px;}
.message{max-width:70%;padding:14px 18px;border-radius:20px;line-height:1.5;word-wrap:break-word;font-size:15px;backdrop-filter:blur(8px);}
.bot{align-self:flex-start;background:rgba(255,255,255,0.2);}
.user{align-self:flex-end;background:rgba(0,0,0,0.3);}
.typing{display:inline-block;width:8px;height:8px;background:#fff;border-radius:50%;animation:blink 1s infinite;margin-left:5px;}
@keyframes blink{0%,50%,100%{opacity:0.3;}25%,75%{opacity:1;}}
footer{display:flex;align-items:center;padding:10px 15px;backdrop-filter:blur(10px);}
footer input{flex:1;padding:12px 15px;border-radius:25px;border:none;outline:none;font-size:15px;backdrop-filter:blur(6px);background:rgba(255,255,255,0.2);color:#fff;}
footer button{margin-left:10px;background:linear-gradient(135deg,#00c6ff,#0072ff);border:none;border-radius:50%;color:white;width:45px;height:45px;font-size:18px;cursor:pointer;box-shadow:0 4px 10px rgba(0,0,0,0.3);transition:0.3s;}
footer button:hover{transform:scale(1.1);}

/* Bolhas */
.background{position:absolute;width:100%;height:100%;overflow:hidden;top:0;left:0;z-index:0;}
.bubble{position:absolute;bottom:-150px;border-radius:50%;opacity:0.6;animation:floatUp linear infinite;}
@keyframes floatUp{0%{transform:translateY(0) scale(1);}100%{transform:translateY(-110vh) scale(1.3);}}

/* Modais */
.modal{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:rgba(255,255,255,0.95);backdrop-filter:blur(10px);border-radius:15px;padding:20px;width:400px;max-width:90%;display:none;z-index:10;flex-direction:column;color:#000;}
.modal h3{margin-bottom:10px;font-size:18px;}
.modal button{margin-top:10px;padding:8px 12px;border:none;border-radius:8px;cursor:pointer;background:linear-gradient(135deg,#00c6ff,#0072ff);color:white;}
.modal input{width:100%;padding:8px;margin:5px 0;border-radius:8px;border:1px solid #ccc;outline:none;}
</style>
</head>
<body class="blue">
<div class="background" id="background"></div>

<div id="sidebar">
  <div id="logo"><img src="https://i.postimg.cc/MpvTvGdG/creativa-logo.png" alt="Logo"></div>
  <select id="themeSelector">
    <option value="blue">🔵 Azul</option>
    <option value="pink">🌸 Rosa</option>
    <option value="green">🟢 Verde</option>
    <option value="purple">🟣 Roxo</option>
    <option value="black">⚫ Preto</option>
    <option value="yellow">🟡 Amarelo</option>
    <option value="orange">🟠 Laranja</option>
    <option value="gray">⚪ Cinza</option>
  </select>
  <div id="menuButtons">
    <button onclick="openModal('modalSearch')">🔍 Pesquisa</button>
    <button onclick="openModal('modalConfig')">⚙️ Configurações</button>
    <button onclick="newChat()">➕ Novo chat</button>
    <button onclick="openModal('modalHistory')">🕑 Histórico</button>
    <button onclick="openTutorial()">📘 Tutorial</button>
  </div>
</div>

<div id="mainContent">
<header>
  <div>💠 Yuri Sasaki</div>
</header>
<main id="chatMessages"></main>
<footer>
  <input type="text" id="userInput" placeholder="Digite sua mensagem...">
  <button onclick="sendMessage()">➤</button>
</footer>

<!-- Modais -->
<div id="modalSearch" class="modal">
  <h3>🔍 Pesquisar</h3>
  <input type="text" id="searchQuery" placeholder="Digite palavra-chave">
  <div id="searchResults" style="max-height:200px;overflow:auto;"></div>
  <button onclick="performSearch()">Pesquisar</button>
  <button onclick="closeModal('modalSearch')">Fechar</button>
</div>

<div id="modalHistory" class="modal">
  <h3>🕑 Histórico</h3>
  <div id="historyList" style="max-height:300px;overflow:auto;"></div>
  <button onclick="closeModal('modalHistory')">Fechar</button>
</div>

<div id="modalConfig" class="modal">
  <h3>⚙️ Configurações</h3>
  <button onclick="clearChat()">Limpar chat</button>
  <button onclick="closeModal('modalConfig')">Fechar</button>
</div>

<script>
// Bolhas
function criarBolhas(){for(let i=0;i<15;i++) criarUmaBolha();}
function criarUmaBolha(){
  const bubble=document.createElement("div");
  bubble.classList.add("bubble");
  const size=Math.random()*80+40;
  bubble.style.width=size+"px"; bubble.style.height=size+"px";
  bubble.style.left=Math.random()*100+"%";
  bubble.style.background=`rgba(255,255,255,0.2)`;
  bubble.style.animationDuration=10+Math.random()*15+"s";
  document.getElementById("background").appendChild(bubble);
  bubble.addEventListener("animationend",()=>{bubble.remove(); criarUmaBolha();});
}
criarBolhas();

// Chat
const chatMessages=document.getElementById("chatMessages");
const userInput=document.getElementById("userInput");

function loadChat(){
  fetch('',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'action=load'})
  .then(res=>res.json())
  .then(data=>{
    chatMessages.innerHTML='';
    data.forEach(m=>{
      const div=document.createElement('div');
      div.className='message '+m.type;
      div.textContent=m.text;
      chatMessages.appendChild(div);
    });
    chatMessages.scrollTop=chatMessages.scrollHeight;
    loadHistory();
  });
}

function sendMessage(){
  const text=userInput.value.trim();
  if(!text) return;
  fetch('',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'action=send&message='+encodeURIComponent(text)})
  .then(res=>res.json())
  .then(data=>{loadChat();});
  userInput.value='';
}

userInput.addEventListener('keypress',e=>{if(e.key==='Enter') sendMessage();});

// Novo chat
function newChat(){
  fetch('',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'action=clear'})
  .then(res=>res.json())
  .then(data=>{loadChat();});
}

// Modais
function openModal(id){document.getElementById(id).style.display='flex';}
function closeModal(id){document.getElementById(id).style.display='none';}

// Pesquisa
function performSearch(){
  const query=document.getElementById('searchQuery').value.trim();
  if(!query) return;
  fetch('',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'action=search&query='+encodeURIComponent(query)})
  .then(res=>res.json())
  .then(data=>{
    const container=document.getElementById('searchResults');
    container.innerHTML='';
    data.forEach(m=>{
      const div=document.createElement('div');
      div.textContent=`[${m.type}] ${m.text}`;
      container.appendChild(div);
    });
  });
}

// Histórico
function loadHistory(){
  fetch('',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'action=load'})
  .then(res=>res.json())
  .then(data=>{
    const container=document.getElementById('historyList');
    container.innerHTML='';
    data.forEach(m=>{
      const div=document.createElement('div');
      div.textContent=`[${m.time}] [${m.type}] ${m.text}`;
      container.appendChild(div);
    });
  });
}

// Configuração
function clearChat(){
  fetch('',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'action=clear'})
  .then(res=>res.json())
  .then(data=>{
    loadChat();
    closeModal('modalConfig');
  });
}

// Tema
const themeSelector=document.getElementById('themeSelector');
themeSelector.addEventListener('change',e=>{document.body.className=e.target.value;});

// Tutorial placeholder
function openTutorial(){alert('Tutorial interativo ainda a ser implementado!');}

// Inicializa
loadChat();
</script>
</body>
</html>

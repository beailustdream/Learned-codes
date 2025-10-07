<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function gerarAnalise($idade, $peso, $duracao, $frequencia) {
    $analise = "";
    $pontos = 0;

    // Frequência semanal
    if ($frequencia < 2) {
        $analise .= "📉 Frequência semanal insuficiente. Recomenda-se ao menos 3 sessões por semana.<br>";
        $pontos += 1;
    } elseif ($frequencia <= 4) {
        $analise .= "💪 Frequência adequada. Corpo em adaptação eficiente.<br>";
        $pontos += 2;
    } else {
        $analise .= "🔥 Frequência excelente! Atenção ao descanso e recuperação.<br>";
        $pontos += 3;
    }

    // Duração do treino
    if ($duracao < 30) {
        $analise .= "⏱️ Treinos curtos. Sugere-se aumentar a duração para melhores resultados.<br>";
        $pontos += 1;
    } elseif ($duracao <= 60) {
        $analise .= "✅ Duração adequada. Equilíbrio entre intensidade e eficiência.<br>";
        $pontos += 3;
    } else {
        $analise .= "⚠️ Treinos muito longos podem gerar fadiga. Monitore recuperação.<br>";
        $pontos += 2;
    }

    // Idade e recomendações
    if ($idade < 18) {
        $analise .= "🧒 Menor de 18 anos: treinos leves, foco em desenvolvimento saudável.<br>";
        $pontos += 2;
    } elseif ($idade <= 40) {
        $analise .= "🏃 Faixa etária ideal para treinos intensos e performance elevada.<br>";
        $pontos += 3;
    } else {
        $analise .= "👴 Priorize saúde cardiovascular e força funcional.<br>";
        $pontos += 2;
    }

    // Peso e combinações
    if ($peso > 90 && $duracao < 30) {
        $analise .= "📉 Aumentar a duração do treino pode otimizar controle de peso.<br>";
        $pontos -= 1;
    } elseif ($peso < 50 && $frequencia > 4) {
        $analise .= "🍽️ Intensificar nutrição devido à alta frequência de treinos.<br>";
        $pontos += 1;
    }

    // Resumo final
    $analise .= "<hr>";
    $analise .= "<h4>📊 Nível de Desempenho:</h4>";

    if ($pontos <= 5) {
        $analise .= "<div class='nivel ruim'>🟥 <strong>RUIM</strong> — Mudanças significativas na rotina recomendadas.</div>";
    } elseif ($pontos <= 8) {
        $analise .= "<div class='nivel regular'>🟧 <strong>REGULAR</strong> — Boa base, mas ajustes necessários.</div>";
    } elseif ($pontos <= 11) {
        $analise .= "<div class='nivel bom'>🟩 <strong>BOM</strong> — Rotina adequada, continue com pequenas melhorias.</div>";
    } else {
        $analise .= "<div class='nivel excelente'>🟦 <strong>EXCELENTE</strong> — Saúde e treino em ótimo equilíbrio.</div>";
    }

    return $analise;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>IA Profissional - Saúde e Treino</title>
<link href="https://fonts.googleapis.com/css2?family=Mohave:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Mohave', sans-serif;
        background: #eef2f7;
        display: flex;
        justify-content: center;
        padding: 40px;
    }
    .container {
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        width: 450px;
    }
    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }
    label {
        display: block;
        margin-top: 15px;
        font-weight: 500;
        color: #333;
    }
    input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-family: 'Mohave', sans-serif;
    }
    button {
        margin-top: 20px;
        width: 100%;
        background: #007bff;
        color: #fff;
        border: none;
        padding: 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 700;
        font-family: 'Mohave', sans-serif;
        transition: 0.3s;
    }
    button:hover {
        background: #0056b3;
    }
    .resultado {
        margin-top: 25px;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 12px;
        line-height: 1.6;
        font-family: 'Mohave', sans-serif;
    }
    .resultado h3 {
        margin-top: 0;
        color: #007bff;
    }

    /* Cores e estilos dos níveis */
    .nivel {
        padding: 10px;
        border-radius: 8px;
        font-weight: 700;
        margin-top: 10px;
        color: #fff;
    }
    .ruim { background-color: #e53935; }       /* vermelho */
    .regular { background-color: #fb8c00; }    /* laranja */
    .bom { background-color: #43a047; }        /* verde */
    .excelente { background-color: #1e88e5; }  /* azul */
</style>
</head>
<body>
    <div class="container">
        <h2>🤖 IA Profissional - Saúde e Treino</h2>
        <form method="POST">
            <label>Idade:</label>
            <input type="number" name="idade" required>

            <label>Peso (kg):</label>
            <input type="number" name="peso" step="0.1" required>

            <label>Duração do treino (min):</label>
            <input type="number" name="duracao" required>

            <label>Frequência semanal:</label>
            <input type="number" name="frequencia" required>

            <button type="submit">Analisar</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idade = $_POST['idade'];
            $peso = $_POST['peso'];
            $duracao = $_POST['duracao'];
            $frequencia = $_POST['frequencia'];

            echo "<div class='resultado'><h3>📈 Relatório de IA:</h3>";
            echo gerarAnalise($idade, $peso, $duracao, $frequencia);
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>

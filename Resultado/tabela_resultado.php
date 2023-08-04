<!DOCTYPE html>
<html lang="pt-BR" xml:lang="pt-BR">

<head>
    <title>Tabela de Formulários</title>
    <link rel="stylesheet" type="text/css" href="./estilo_tabela_resultado.css">
    <link rel="stylesheet" type="text/css" href="../index.css">

    <!-- Biblioteca para exportação em Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>

<header>
    <img src="../Imagens/logos/senai-logo-0.png" alt="Logo SENAI" class="senai">
    <h2 id="formulario">Formulário de Satisfação</h2>
    <div class="export-buttons">
        <button onclick="exportToExcel()">Exportar para Excel</button>
    </div>
</header>

<body>
    <?php
    // Define a constant for the closing </td> tag
    define('TD_CLOSE_TAG', '</td>');

    require_once '../Processamento/conexao.php';

    try {
        // Consulta SQL para selecionar os dados da tabela
        $sql = "SELECT nome, disponibilidade_de_livros, ambiente_de_estudo, atendimento_dos_funcionarios, organizacao_dos_materiais, local_acolhedor_para_estudos, acesso_a_internet, disponibilidade_de_computadores, variedade_de_eventos_e_atividades, horario_de_funcionamento, disponibilidade_de_espacos, satisfacao_geral, comentario_adicional FROM formulario";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Verifica se existem registros retornados
        if ($stmt->rowCount() > 0) {
            echo "<table class='formulario-table'>";
            echo "<tr><th>Nome</th><th>Disponibilidade de Livros</th><th>Ambiente de Estudo</th><th>Atendimento dos Funcionários</th><th>Organização dos Materiais</th><th>Local Acolhedor para Estudos</th><th>Acesso à Internet</th><th>Disponibilidade de Computadores</th><th>Variedade de Eventos e Atividades</th><th>Horário de Funcionamento</th><th>Disponibilidade de Espaços</th><th>Satisfação Geral</th><th>Comentário Adicional</th></tr>";

            // Loop através dos registros retornados
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['nome'] . TD_CLOSE_TAG;
                echo "<td>" . $row['disponibilidade_de_livros'] . TD_CLOSE_TAG;
                echo "<td>" . $row['ambiente_de_estudo'] . TD_CLOSE_TAG;
                echo "<td>" . $row['atendimento_dos_funcionarios'] . TD_CLOSE_TAG;
                echo "<td>" . $row['organizacao_dos_materiais'] . TD_CLOSE_TAG;
                echo "<td>" . $row['local_acolhedor_para_estudos'] . TD_CLOSE_TAG;
                echo "<td>" . $row['acesso_a_internet'] . TD_CLOSE_TAG;
                echo "<td>" . $row['disponibilidade_de_computadores'] . TD_CLOSE_TAG;
                echo "<td>" . $row['variedade_de_eventos_e_atividades'] . TD_CLOSE_TAG;
                echo "<td>" . $row['horario_de_funcionamento'] . TD_CLOSE_TAG;
                echo "<td>" . $row['disponibilidade_de_espacos'] . TD_CLOSE_TAG;
                echo "<td>" . $row['satisfacao_geral'] . TD_CLOSE_TAG;
                echo "<td>" . $row['comentario_adicional'] . TD_CLOSE_TAG;
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhum registro encontrado.";
        }
    } catch (PDOException $e) {
        die("Erro na consulta: " . $e->getMessage());
    }

    // Fechando a conexão com o banco de dados
    $conn = null;
    ?>
    <div id="tabela-container">
        <table>
            <h1>Disponibilidade de Livros</h1>
            <div id="availability-of-books-chart">
                <canvas id="availability-of-books-canvas" title="Disponibilidade de Livros"></canvas>
            </div>

            <h1>Ambiente de Estudo</h1>
            <div id="study-environment-chart">
                <canvas id="study-environment-canvas" title="Ambiente de Estudo"></canvas>
            </div>

            <h1>Atendimento dos Funcionários</h1>
            <div id="staff-service-chart">
                <canvas id="staff-service-canvas" title="Atendimento dos Funcionários"></canvas>
            </div>

            <h1>Organização dos Materiais</h1>
            <div id="material-organization-chart">
                <canvas id="material-organization-canvas" title="Organização dos Materiais"></canvas>
            </div>

            <h1>Local Acolhedor para Estudos</h1>
            <div id="welcoming-place-for-studies-chart">
                <canvas id="welcoming-place-for-studies-canvas" title="Local Acolhedor para Estudos"></canvas>
            </div>

            <h1>Acesso à Internet</h1>
            <div id="internet-access-chart">
                <canvas id="internet-access-canvas" title="Acesso à Internet"></canvas>
            </div>

            <h1>Disponibilidade de Computadores</h1>
            <div id="computer-availability-chart">
                <canvas id="computer-availability-canvas" title="Disponibilidade de Computadores"></canvas>
            </div>

            <h1>Variedade de Eventos e Atividades</h1>
            <div id="variety-of-events-and-activities-chart">
                <canvas id="variety-of-events-and-activities-canvas" title="Variedade de Eventos e Atividades"></canvas>
            </div>

            <h1>Horário de Funcionamento</h1>
            <div id="opening-hours-chart">
                <canvas id="opening-hours-canvas" title="Horário de Funcionamento"></canvas>
            </div>

            <h1>Disponibilidade de Espaços</h1>
            <div id="space-availability-chart">
                <canvas id="space-availability-canvas" title="Disponibilidade de Espaços"></canvas>
            </div>

            <h1>Satisfação Geral</h1>
            <div id="general-satisfaction-chart">
                <canvas id="general-satisfaction-canvas" title="Satisfação Geral"></canvas>
        </table>
    </div>
    </div>
    <footer>
        <ul>© 2023 Senai Uberaba | Instrutor: Lenon Yuri
    </footer>


    <script src="./graficos.js"></script>
</body>

</html>
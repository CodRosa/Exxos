<?php
// Configurações do banco de dados
$host = 'localhost'; // Endereço do servidor do banco de dados
$dbname = 'exxos'; // Nome do banco de dados
$user = 'root'; // Usuário do banco de dados
$password = ''; // Senha do banco de dados

try {
    // Conectar ao banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar todos os passageiros
    $sql = "SELECT * FROM passageiros";
    $stmt = $pdo->query($sql);
    $passageiros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Contar o número total de passageiros
    $totalPassageiros = count($passageiros);

} catch (PDOException $e) {
    // Exibir erro em caso de falha
    echo "Erro: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Passageiros</title>
    <style>
        /* Reseta as margens e o preenchimento */
        body, h1, p {
            margin: 0;
            padding: 0;
        }

        /* Centraliza o título */
        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 24px;
        }

        /* Título de contagem centralizado */
        p {
            text-align: center;
            margin: 10px;
            font-size: 18px;
        }

        /* Tabela Responsiva */
        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            font-size: 14px; /* Ajusta o tamanho da fonte para mobile */
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }

        /* Faz a tabela ser rolável horizontalmente em telas pequenas */
        .table-container {
            overflow-x: auto;
        }

        /* Melhorando o visual da tabela para dispositivos móveis */
        @media screen and (max-width: 600px) {
            th, td {
                font-size: 12px; /* Menor fonte em dispositivos pequenos */
                padding: 8px; /* Menor padding */
            }

            h1 {
                font-size: 20px; /* Ajusta o título para dispositivos pequenos */
            }

            p {
                font-size: 16px; /* Ajusta o texto de contagem para dispositivos pequenos */
            }
        }

    </style>
</head>
<body>
    <h1>Lista de Passageiros</h1>

    <!-- Exibir a contagem total -->
    <p>Total de passageiros cadastrados: <strong><?php echo $totalPassageiros; ?></strong></p>

    <!-- Tabela com rolagem para dispositivos móveis -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($passageiros): ?>
                    <?php foreach ($passageiros as $passageiro): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($passageiro['nome']); ?></td>
                            <td><?php echo htmlspecialchars($passageiro['email']); ?></td>
                            <td><?php echo htmlspecialchars($passageiro['telefone']); ?></td>
                            <td><?php echo htmlspecialchars($passageiro['estado']); ?></td>
                            <td><?php echo htmlspecialchars($passageiro['cidade']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Nenhum passageiro cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

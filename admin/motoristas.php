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
    $sql = "SELECT * FROM motoristas";
    $stmt = $pdo->query($sql);
    $motoristas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Contar o número total de passageiros
    $totalmotoristas = count($motoristas);

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
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
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
    <h1 style="text-align: center;">Lista de Motoristas</h1>

    <!-- Exibir a contagem total -->
    <p style="text-align: center;">Total de motoristas cadastrados: <strong><?php echo $totalmotoristas; ?></strong></p>

    <!-- Tabela para exibir os passageiros -->
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Plano escolhido</th>

            </tr>
        </thead>
        <tbody>
            <?php if ($motoristas): ?>
                <?php foreach ($motoristas as $motorista): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($motorista['nome']); ?></td>
                        <td><?php echo htmlspecialchars($motorista['email']); ?></td>
                        <td><?php echo htmlspecialchars($motorista['telefone']); ?></td>
                        <td><?php echo htmlspecialchars($motorista['estado']); ?></td>
                        <td><?php echo htmlspecialchars($motorista['cidade']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Nenhum passageiro cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

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

    // Verificar se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Coletar os dados do formulário e sanitizar
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
        $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);

        // Verificar se os campos foram preenchidos
        if ($name && $email && $phone && $estado && $cidade) {
            // Inserir os dados na tabela "passageiros"
            $sql = "INSERT INTO motoristas (nome, email, telefone, estado, cidade) 
                    VALUES (:name, :email, :phone, :estado, :cidade)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->execute();

            // Obter o número total de registros apenas uma vez, após a inserção
            $sqlCount = "SELECT COUNT(*) AS total FROM motoristas";
            $result = $pdo->query($sqlCount)->fetch(PDO::FETCH_ASSOC);
            $totalPassageiros = $result['total'];

            // Exibir mensagem de sucesso e contagem total
            
        } else {
            echo "<h1>Erro: Preencha todos os campos!</h1>";
        }
    }
} catch (PDOException $e) {
    // Exibir erro na conexão ou operação
    echo "Erro: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=375, initial-scale=1.0">
    <title>Exemplo Responsivo</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            background: url('../img/fundo.jpg') no-repeat center center fixed;
            background-size: cover;
        }

   
        /* Ajustes específicos para a resolução 375x667 */
        @media (max-width: 375px) {
             
        /* Estilo para o botão */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            font-size: 16px;
            color: #fff;
            background-color: purple;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: black;
        }

        }
    </style>
</head>
<body>
    <br>
    <br>
    <br>
    <br><br>
    <br><br>
    <br><br>
    <br>
    <br>
    <br>
    <br>
    <br><br>
    <center>
        <a href="https://exxomobilidade.com.br/" class="btn">Download</a>
    </center>
</body>
</html>

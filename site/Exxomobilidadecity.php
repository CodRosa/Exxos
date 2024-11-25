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
        // Coletar os dados do formulário
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
        $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);

        // Contar o número total de passageiros antes da inserção
        $sqlCount = "SELECT COUNT(*) AS total FROM passageiros";
        $result = $pdo->query($sqlCount)->fetch(PDO::FETCH_ASSOC);
        $totalPassageiros = $result['total'] + 1; // Incrementa o total

        // Inserir os dados na tabela "passageiros" com o total atualizado
        $sql = "INSERT INTO passageiros (nome, email, telefone, estado, cidade) 
                VALUES (:name, :email, :phone, :estado, :cidade)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->execute();

        // Mensagem de sucesso e contagem
        echo "<h1>Dados enviados com sucesso!</h1>";    }
} catch (PDOException $e) {
    // Erro na conexão ou operação
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagem Responsiva</title>
    <style>
        /* Garante que o corpo e o contêiner ocupem toda a tela */
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden; /* Evita rolagem */
        }

        .image-container {
            position: fixed; /* Garante que a imagem preencha a tela inteira */
            top: 0;
            left: 0;
            width: 100%; /* Preenche a largura da tela */
            height: 100%; /* Preenche a altura da tela */
            overflow: hidden; /* Evita que partes excedam o contêiner */
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Preenche o contêiner sem distorção */
        }

        /* Estilo para os campos de entrada (input) */
        input {
            position: absolute;
            background: transparent; /* Fundo transparente */
            border: none; /* Sem borda, somente a linha */
            color: white; /* Texto branco */
            font-size: 1rem; /* Tamanho de fonte ajustado */
            padding: 5px;
            width: 40%; /* Ajusta a largura dos campos */
            margin: 0;
        }

        /* Estilo e posicionamento dos campos */
        .input-name {
            top: 76%;
            left: 30%;
        }

        .input-email {
            top: 79%;
            left: 28%;
        }

        .input-phone {
            top: 82%;
            left: 45%;
        }

        .input-estado {
            top: 87%;
            left: 15%;
        }

        .input-cidade {
            top: 87%;
            left: 45%;
        }

        /* Estilo para o botão de submit invisível */
        input[type="submit"] {
            position: absolute;
            background: transparent;
            border: none;
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            width: 40%; /* Ajuste a largura do botão */
            top: 83%;
            left: 52%;
            cursor: pointer;
            opacity: 0; /* Torna o botão invisível */
        }

        /* Adiciona a linha sobre os campos */
        .input-name::before, 
        .input-email::before, 
        .input-phone::before,
        .input-estado::before,
        .input-cidade::before,
        input[type="submit"]::before {
            content: "";
            position: absolute;
            top: 0px; /* A linha aparece acima do campo */
            left: 0;
            width: 100%;
            border-top: 2px solid white; /* Linha fina e branca */
        }

        /* Contêiner para caixa de seleção e texto */
        .checkbox-container {
            position: absolute;
            top: 93%;
            left: 5%;
            display: flex;
            align-items: center; /* Alinha a caixa de seleção com o texto */
            gap: 10px; /* Espaço entre a caixa de seleção e o texto */
        }

        /* Estilo da caixa de seleção */
        .checkbox-terms {
            width: 20px; /* Aumenta a largura */
            height: 20px; /* Aumenta a altura */
            cursor: pointer; /* Cursor pointer para interatividade */
        }

        /* Estilo do texto do termo */
        .terms-label {
            color: white;
            font-size: 1rem;
            font-family: Arial, sans-serif;
        }

        .terms-label a {
            color: #00bfff; /* Cor para o link */
            text-decoration: underline;
        }

        .terms-label a:hover {
            color: #007bff; /* Muda a cor ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="image-container">
        <img src="../img/importante.jpg" alt="Imagem Responsiva">

        <!-- Formulário com os campos de entrada -->
        <form action="../site/inserirExxosMobilidadecity.php" method="post">
            <!-- Campos de entrada -->
            <input type="text" name="name" placeholder="Nome" class="input-name" required>
            <input type="email" name="email" placeholder="E-mail" class="input-email" required>
            <input type="tel" name="phone" placeholder="Telefone" class="input-phone" required>
            <input type="text" name="estado" placeholder="Estado" class="input-estado" required>
            <input type="text" name="cidade" placeholder="Cidade" class="input-cidade" required>

            <!-- Caixa de seleção para termos -->
            <div class="checkbox-container">
                <input type="checkbox" name="termos" class="checkbox-terms" id="termos" required>
                <label for="termos" class="terms-label" style="font-size: 13px;">
                    EU ACEITO OS TERMOS 
                    <a href="../DOC/EXXO _ TERMOS GERAIS DE USO - WEBSITE EXXO.pdf" target="_blank" style="font-size: 13px;">GERAIS DE USO DA EXXOS</a>
                </label>
            </div>

            <!-- Botão de submit invisível -->
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>

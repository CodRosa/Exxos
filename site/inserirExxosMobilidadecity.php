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

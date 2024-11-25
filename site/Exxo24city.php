<!DOCTYPE html>   
<html lang="en">
<head>
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

        /* Contêiner para texto e link */
        .terms-container {
            position: absolute;
            z-index: 2; /* Garante que fique acima da imagem de fundo */
            text-align: center; /* Centraliza o texto */
            margin-top: 20px;
            font-size: 14px;
            color: white;
            background: rgba(0, 0, 0, 0.6); /* Fundo semitransparente */
            padding: 10px;
            border-radius: 5px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            top: 200px; /* Distância do topo */
        }

        .terms-container a {
            color: #FFD700; /* Cor dourada para o link */
            text-decoration: none; /* Remove o sublinhado */
        }

        .terms-container a:hover {
            text-decoration: underline; /* Adiciona sublinhado ao passar o mouse */
        }

        /* Contêiner para imagens lado a lado */
        .overlay-container {
            position: absolute;
            top: 50%; /* Ajuste a posição vertical */
            left: 50%; /* Ajuste a posição horizontal */
            transform: translate(-50%, -50%); /* Centraliza o contêiner */
            display: flex; /* Coloca as imagens lado a lado */
            gap: 20px; /* Espaço entre as imagens */
            z-index: 2; /* Garante que fique acima da imagem de fundo */
            align-items: center; /* Alinha verticalmente os elementos */
        }

        /* Estilo das imagens */
        .overlay-container img {
            width: 130px; /* Ajuste o tamanho das imagens */
            height: auto; /* Mantém a proporção */
            border: 2px solid white; /* Opcional: adicione uma borda para destaque */
            cursor: pointer; /* Cursor muda ao passar o mouse */
            transition: transform 0.3s; /* Adiciona uma animação suave ao hover */
        }

        .overlay-container img:hover {
            transform: scale(1.1); /* Aumenta ligeiramente o tamanho no hover */
        }

        /* Estilo do botão */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            color: #fff;
            background-color: purple;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .btn:hover {
            background-color: black;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abrir PDF</title>
</head>
<body>
    <div class="image-container">
        <!-- Imagem de fundo -->
        <img src="../img/valores.jpg" alt="Imagem Responsiva">
    </div>
    
    <!-- Contêiner de termos -->
    <div class="terms-container"> 
    <a href="../../DOC/VALORES E PAGAMENTOS.pdf" target="_blank">TERMOS DE VALORES E PAGAMENTOS DA EXXOS</a>
    </div>

    <!-- Contêiner das imagens e links -->
    <div class="overlay-container">
        <!-- Links com as imagens lado a lado -->
        <a href="https://pay.infinitepay.io/exxo/Ri1D-4OKe5x2Ls9-3600,00">
            <img src="../img/black.jpg" alt="Imagem Black">
        </a>
        <a href="https://pay.infinitepay.io/exxo/Ri1D-1659JPNCpD-2400,00">
            <img src="../img/line.jpeg" alt="Imagem Line">
        </a>
        
        <!-- Link de seta -->
        <a href="formExxo24city.php">
            <img src="../icon/arrow-right.svg" width="30px" height="30px" style="margin-top:250px;margin-left:-200px;">
        </a>
    </div>

    <!-- Botão de download ou ação -->
    <a href="https://seusite.com/downloads/app.apk" class="btn" download>Baixar APK</a>
</body>
</html>

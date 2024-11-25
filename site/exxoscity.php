<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Layout para iPhone</title>
    <style>
        /* Reset básico */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: black;
        }

        header {
            width: 100%;
            overflow: hidden; /* Garante que nada extravase o limite */
        }

        header img {
            width: 100%;
            height: auto;
            display: block; /* Remove espaçamento em torno da imagem */
        }

        #image-below-logo {
            width: 100%;
            height: auto;
            display: block; /* Remove espaçamento em torno da imagem */
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 50px;
            background-color: black;
            display: flex;
            justify-content: space-around;
            align-items: center;
            z-index: 900;
            font-size: 0.9rem;
        }

        nav a {
            text-decoration: none;
            color: #fff;
        }

        main {
            margin-top: 60px;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8); /* Fundo translúcido */
            overflow-y: auto;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: Indigo;
            color: white;
            text-align: center;
            line-height: 60px;
            font-size: 0.8rem;
            z-index: 800;
        }

        @media (max-width: 480px) {
            nav {
                height: 40px;
                font-size: 0.8rem;
            }

            main {
                margin-top: 50px;
            }

            footer {
                font-size: 0.7rem;
            }
        }

        .image-container {
    position: relative;
    display: inline-block;
    width: 100%; /* Garante que a imagem ocupe toda a largura */
}

.image-container img {
    width: 100%; /* Imagem se ajusta ao contêiner */
    height: auto;
    display: block; /* Remove espaçamento em torno da imagem */
}

.invisible-box {
    position: absolute;
    background-color: rgba(255, 255, 255, 0); /* Invisível */
    cursor: pointer; /* Mostra que é clicável */
}

/* Ajuste de posições das caixas invisíveis */
.box1 {
    top: 50%; /* Posição relativa ao topo da imagem */
    left: 10%; /* Posição relativa ao lado esquerdo */
    width: 30%; /* Largura da área clicável */
    height: 20%; /* Altura da área clicável */
}

.box2 {
    top: 50%; /* Mesmo alinhamento vertical da primeira caixa */
    right: 10%; /* Posição relativa ao lado direito */
    width: 30%; /* Largura da área clicável */
    height: 20%; /* Altura da área clicável */
}


    </style>
</head>
<body>
    <header>
        <!-- Imagem do logo -->
        <img src="../img/logo.jpg" alt="Logo do site">
        <img src = "../img/fundo.jpg">

        <!-- Imagem obrg.jpg logo abaixo -->
        <div class="image-container">
            <img id="../img/image-below-logo" src="../img/obrg.jpg" alt="Imagem abaixo do logo">
            <a href="../site/Exxo24city.php" class="invisible-box box1"></a>
            <a href="../site/Exxomobilidadecity.php" class="invisible-box box2"></a>
        </div>
        
    </header>

    <nav>
        <a href="#home"><img src="../icon/home.svg" alt="Home"></a>
        <a href="#sobre"><img src="../icon/facebook.svg" alt="Facebook"></a>
        <a href="#instagram"><img src="../icon/instagram.svg" alt="Instagram"></a>
        <a href="#contato"><img src="../icon/smartphone.svg" alt="Contato"></a>
    </nav>

    <footer>
        <p>&copy; 2024 Exxos - Gerenciamento de mobilidade urbana</p>
    </footer>
</body>
</html>
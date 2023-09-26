<?php
    $id = $_SESSION['id'];

    if (!isset($_SESSION['id'])) {
        header("Location: ../../../ParadiseMusic/login.php");
        exit;
    }
?>
<head>
    <link rel="stylesheet" href="assets/styles/dropdown.css">
</head>
<body>
    

<header class="header1">
            <a href="#" class="header__logo">Paradise</a>
            <i class='bx bx-menu header__toggle' id="header-toggle"></i>
    <nav class="nav1" id="nav-menu">
        
        <div class="nav__content bd-grid">
            <a href="../../../ParadiseMusic/painel/index.php" class="nav__perfil">
                <div class="nav__img">
                    <img src="../assets/img/logo.png" alt="">
                </div>
                
                <div>
                    <span class="nav__name">Paradise Music</span>
                </div>
            </a>

            <div class="nav__menu">
                <ul class="nav__list">

                    <li class="nav__item dropdown">
                        <a href="#" class="nav__link dropdown__link">Categorias<i class='bx bx-chevron-down dropdown__icon'></i></a>   

                        <ul class="dropdown__menu">
                            <li class="dropdown__item"><a href="../painel/CadastrarProdutos.php" class="nav__link">Cadastrar produtos</a></li>
                        </ul>
                    </li>
                        
                    <li class="nav__item dropdown">
                        <a href="#" class="nav__link dropdown__link">Instrumentos<i class='bx bx-chevron-down dropdown__icon'></i></a>
                                    
                        <ul class="dropdown__menu">
                            <li class="dropdown__item"><a href="../painel/carrinho.php" class="nav__link">Seu carro pequeno</a></li>
                        <li class="dropdown__item"><a href="#" class="nav__link">Work Awards</a></li>
                        </ul>
                    </li>

                    <li class="nav__item"><a href="#" class="nav__link active">Sobre Nós</a></li>
                    <li class="nav__item dropdown">
                        <a href="#" class="nav__link dropdown__link"><i class="bi bi-person-circle" style="font-style: normal;"><?php echo $_SESSION['nome'];?></i> 
                        </a>

                        <ul class="dropdown__menu">
                            <li class="dropdown__item"><a href="../painel/CadastrarDados.php" class="nav__link">Meus Dados</a></li>
                            <li class="dropdown__item"><a href="../assets/function/logout.php" class="nav__link">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<script src="../assets/js/dropdown.js"></script>
</body>
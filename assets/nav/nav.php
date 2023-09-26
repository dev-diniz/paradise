<head>
    <link rel="stylesheet" href="assets/styles/dropdown.css">
</head>
<header class="header1">
    <a href="#" class="header__logo">Paradise</a>
    <i class='bx bx-menu header__toggle' id="header-toggle"></i>
    <nav class="nav1" id="nav-menu">
        
        <div class="nav__content bd-grid">
            <a href="../../../ParadiseMusic/index.php" class="nav__perfil">
                <div class="nav__img">
                    <img src="assets/img/logo.png" alt="">
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
                            <li class="dropdown__item"><a href="carrinho.php" class="nav__link">Seu carro pequeno</a></li>
                            <li class="dropdown__item"><a href="#" class="nav__link">Da</a></li>
                            <li class="dropdown__item"><a href="#" class="nav__link">Gama</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav__item dropdown">
                        <a href="#" class="nav__link dropdown__link">Instrumentos<i class='bx bx-chevron-down dropdown__icon'></i></a>
                        
                        
                        <ul class="dropdown__menu">
                            <li class="dropdown__item"><a href="#" class="nav__link">Recent jobs</a></li>
                            <li class="dropdown__item"><a href="#" class="nav__link">Better jobs</a></li>
                            <li class="dropdown__item"><a href="#" class="nav__link">Work Awards</a></li>
                        </ul>
                    </li>

                    <li class="nav__item"><a href="#" class="nav__link active">Sobre Nós</a></li>
                    
                    <li class="nav__item"><a href="login.php" class="nav__link"><i class="bi bi-person-circle"></i> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<script src="./assets/js/dropdown.js"></script>
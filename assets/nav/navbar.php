<?php

if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 4) {
    NavLogado();
} elseif (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1) {
    NavAdm();
} elseif (empty($_SESSION['tipo'])) {
    NavInicial();
}

function NavInicial()
{
    print '
    <header class="header1">
    <a href="#" class="header__logo">Paradise</a>
    <i class="bx bx-menu header__toggle" id="header-toggle"></i>
    <nav class="nav1" id="nav-menu">
        <div class="nav__content bd-grid">
        <a href="index.php" class="nav__perfil">
            <div class="nav__img">
                <img src="./assets/img/logo.png" alt="logo">
            </div>
            <div>
                <span class="nav__name">Paradise Music</span>
                
            </div>
        </a>
        <div class="nav__menu">
            <ul class="nav__list">
        <li class="nav__item dropdown">
        <a href="#" class="nav__link dropdown__link">Categorias<i class="bx bx-chevron-down dropdown__icon"></i></a>   

        <ul class="dropdown__menu">
            <li class="dropdown__item"><a href="carrinho.php" class="nav__link">Seu carro pequeno</a></li>
            <li class="dropdown__item"><a href="#" class="nav__link">Da</a></li>
            <li class="dropdown__item"><a href="#" class="nav__link">Gama</a></li>
        </ul>
    </li>

    <li class="nav__item dropdown">
        <a href="#" class="nav__link dropdown__link">Instrumentos<i class="bx bx-chevron-down dropdown__icon"></i></a>
        
        
        <ul class="dropdown__menu">
            <li class="dropdown__item"><a href="#" class="nav__link">Recent jobs</a></li>
            <li class="dropdown__item"><a href="#" class="nav__link">Better jobs</a></li>
            <li class="dropdown__item"><a href="#" class="nav__link">Work Awards</a></li>
        </ul>
    </li>

    <li class="nav__item"><a href="sobre-nos.php" class="nav__link active">Sobre Nós</a></li>

    <li class="nav__item"><a href="login.php" class="nav__link"><i class="bi bi-person-circle"></i> Login</a></li>
    ';
}

function NavAdm()
{
    print '
    <header class="header1">
    <a href="#" class="header__logo">Paradise</a>
    <i class="bx bx-menu header__toggle" id="header-toggle"></i>
    <nav class="nav1" id="nav-menu">
        <div class="nav__content bd-grid">
        <a href="../painel/index.php" class="nav__perfil">
            <div class="nav__img">
                <img src="../../../paradise/assets/img/logo.png" alt="logo">
            </div>
            <div>
                <span class="nav__name">Paradise Music</span>
                
            </div>
        </a>
        <div class="nav__menu">
            <ul class="nav__list">
        <li class="nav__item dropdown">
        <a href="#" class="nav__link dropdown__link">Cadastros<i class="bx bx-chevron-down dropdown__icon"></i></a>   

        <ul class="dropdown__menu">
            <li class="dropdown__item"><a href="../painel/CadastrarProdutos.php" class="nav__link">Cadastrar produtos</a>
            </li>
            <li class="dropdown__item"><a href="../painel/CadastrarUsuario.php" class="nav__link">Cadastrar usuario</a>

        </ul>
    </li>
        
    <li class="nav__item dropdown">
        <a href="#" class="nav__link dropdown__link">Dados do usuario<i class="bx bx-chevron-down dropdown__icon"></i></a>
                    
        <ul class="dropdown__menu">
            <li class="dropdown__item">
                <a href="../painel/carrinho.php" class="nav__link">Seu carro pequeno</a>
            </li>
            <li class="dropdown__item">
                <a href="../painel/CadastrarDados.php" class="nav__link">Meus Dados</a>
            </li>
        <li class="dropdown__item">
            <a href="#" class="nav__link">Work Awards</a>
        </li>
        </ul>
    </li>

    <li class="nav__item"><a href="sobre-nos.php" class="nav__link active">Sobre Nós</a></li>
    <li class="nav__item dropdown">

        <a href="#" class="nav__link dropdown__link"><i class="bi bi-person-circle" style="font-style: normal;"> ' . $_SESSION['nome'] . '</i> <i class="bx bx-chevron-down dropdown__icon"></i>
        </a>

        <ul class="dropdown__menu">
            <li class="dropdown__item"><a href="../painel/CadastrarDados.php" class="nav__link">Meus Dados</a></li>
            <li class="dropdown__item"><a href="../assets/function/logout.php" class="nav__link">Sair</a></li>
        </ul>
    </li>
    ';
}
function NavLogado()
{
    print '
    <header class="header1">
    <a href="#" class="header__logo">Paradise</a>
    <i class="bx bx-menu header__toggle" id="header-toggle"></i>
    <nav class="nav1" id="nav-menu">
        <div class="nav__content bd-grid">
        <a href="../painel/index.php" class="nav__perfil">
            <div class="nav__img">
                <img src="../../../paradise/assets/img/logo.png" alt="logo">
            </div>
            <div>
                <span class="nav__name">Paradise Music</span>
                
            </div>
        </a>
        <div class="nav__menu">
            <ul class="nav__list">
        <li class="nav__item dropdown">
        <a href="#" class="nav__link dropdown__link">Categorias<i class="bx bx-chevron-down dropdown__icon"></i></a>   
    </li>
        
    <li class="nav__item dropdown">
        <a href="#" class="nav__link dropdown__link">Instrumentos<i class="bx bx-chevron-down dropdown__icon"></i></a>
                    
        <ul class="dropdown__menu">
            <li class="dropdown__item"><a href="../painel/carrinho.php" class="nav__link">Seu carro pequeno</a></li>
        <li class="dropdown__item"><a href="#" class="nav__link">Work Awards</a></li>
        </ul>
    </li>

    <li class="nav__item"><a href="sobre-nos.php" class="nav__link active">Sobre Nós</a></li>
    <li class="nav__item dropdown">
        <a href="#" class="nav__link dropdown__link"><i class="bi bi-person-circle" style="font-style: normal;"> ' . $_SESSION['nome'] . '</i> 
        </a>

        <ul class="dropdown__menu">
            <li class="dropdown__item"><a href="../painel/CadastrarDados.php" class="nav__link">Meus Dados</a>
            </li>
            <li class="dropdown__item"><a href="../assets/function/logout.php" class="nav__link">Sair</a></li>
        </ul>
    </li>
    ';
}

?>

</ul>
</div>
</div>
</nav>
</header>
<script src="../../../paradise/assets/js/dropdown.js"></script>
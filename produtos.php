<?php
require_once './header.php';

$cd = $_GET['produto'];

require_once 'assets/function/carrinho.php';

$pagina = "produtos.php?produto=$cd";

$ip = $_SERVER['REMOTE_ADDR'];
?>
<link rel="stylesheet" href="assets/css/dropdown.css">
<link rel="stylesheet" href="assets/css/pg-produto.css">
<style>
    body {
        margin-top: 64px;
    }
</style>
<body>
    <!-- ======= Navbar ======= -->
    <?php require_once 'assets/nav/navbar.php'; ?>
    <div class="container">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <?php
                $sql = 'select cd_produto, nm_produto from tb_produto where cd_produto = ' . $_GET['produto'];
                $res = $GLOBALS['con']->query($sql);
                if ($res->num_rows > 0) {
                    while ($e = $res->fetch_array()) {
                ?>
                <div class="d-flex justify-content-between align-items-center">
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </section><!-- End Breadcrumbs -->
 
        <!-- ======= Portfolio Details Section ======= -->
        <section style="box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.137);" id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-7">
                        <div id="carouselExampleControls<?php echo $cd; ?>" class="carousel slide"
                            data-ride="carousel">
                            <div class="carousel-inner">
                                <!-- Mostrar imagens -->
                                <?php
                                $sql = 'select cd_produto,
                                    if(url_produto != "", concat(id_produto,"/",url_produto), "noimg.png") as imagem,
                                    if(cd_imagem_produto = (select min(cd_imagem_produto)
                                    from tb_imagem_produto
                                    where id_produto = '.$cd.'), "active", "") as active
                                    from tb_produto
                                    left join tb_imagem_produto on id_produto = cd_produto
                                    where
                                    cd_produto = '.$cd;
                                $result = $GLOBALS['con']->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($ver = $result->fetch_array()) {
                                        if ($ver['imagem'] == "noimg.png") {
                                            $active = "active";
                                        } else {
                                            $active = $ver['active'];
                                        }
                                ?>
                                <div class="carousel-item caroseul-prod <?php echo $active; ?>">
                                    <?php echo "<img src='assets/img/produtos/{$ver['imagem']}' class='card-img img-fluid' id='foto-produto'>"; ?>
                                </div>
                                <?php
                                    }
                                }
                                ?>
                                <button class="carousel-control-prev" type="button"
                                    data-target="#carouselExampleControls<?php echo $cd; ?>"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-target="#carouselExampleControls<?php echo $cd; ?>"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql = 'select cd_produto, nm_produto, vl_produto, ds_produto,
                            pr.id_categoria, nm_categoria, nm_marca
                            from tb_produto as pr
                            inner join tb_categoria as ca on pr.id_categoria = ca.cd_categoria
                            inner join tb_marca as ma on pr.id_marca = ma.cd_marca
                            where
                            cd_produto =' . $_GET['produto'];
                    $res = $GLOBALS['con']->query($sql);
                    if ($res->num_rows > 0) {
                        while ($e = $res->fetch_array()) {
                    ?>
                    <div class="col-lg-5">
                        <div class="portfolio-info">
                            <h2 style="font-weight: bolder;" class="text-capitalize"><?php echo $e['nm_produto']; ?></h2>
                            <br>
                            <ul>
                                <li><strong>Marca</strong>: <?php echo $e['nm_marca']; ?></li>
                            </ul>
                            <br>
                            <ul>
                                <li><strong>Descrição</strong>: <?php echo $e['ds_produto']; ?></li>
                            </ul>
                            <hr>
                            <h3 class="preco float-right">
                                <b>R$ <?php echo number_format(($e['vl_produto']), 2, ",", "."); ?></b>
                            </h3>
                            <form method="post">
                               
                                <input type="hidden" value="<?php echo $cd ?>">
                                <input type="hidden" value="<?php echo $ip; ?>">
                                <input type="submit" name="acao" class="btn btn-color" value="AdicionarCarrinho">
                            </form>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <br>
    </div><!-- End #main -->
 
    <!-- ======= Footer ======= -->
    <?php require_once 'footer.php'; ?>
    <?php
        if(!empty($_POST)){
            if($_POST['acao'] == "AdicionarCarrinho"){
                if(!empty($_SESSION['id'])){
                    $id = $_SESSION['id'];
                }
                else{
                    $id = "null";
                }
                AdicionarCarrinho(
                    $cd,
                    $id,
                    $ip,
                    $pagina
                );
            }
        }
    ?>
</body>
</html>
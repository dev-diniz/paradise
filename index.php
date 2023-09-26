<?php   
    include_once 'header.php';
    include 'assets/nav/navbar.php'; 
?>

<head>
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/dropdown.css">
    <link rel="stylesheet" href="assets/css/produtos.css">
    <style>
        body{
            margin-top: 64px;
        }
    </style>
</head>
<body>
    <!-- carrosel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="assets/img/slide1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="assets/img/slide2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="assets/img/slide3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>



    <!-- Produtos -->

    <section class="item-index">
        <div class="titulo">
            <h1>PRODUTOS</h1>
        </div>
            <?php  
        $sql = 'select distinct cd_produto, nm_produto,vl_produto, id_categoria,st_produto
            from tb_produto
            WHERE st_produto = "1"
            limit 12';
        $res = $GLOBALS['con']->query($sql);
        if($res->num_rows > 0){
            while($e = $res->fetch_array()){
        ?>
        <a class="card-index" href="produtos.php?produto=<?php echo $e['cd_produto']; ?>"
            <div class="card" style="   width: 300px;
                                        margin: 22px;                                      
                                        text-decoration: none;
                                        color: black;">
        <?php
            $sql = 'select distinct id_produto, url_produto,
                    if(url_produto != "", concat("assets/img/produtos/",id_produto,"/",url_produto), "noimg.png") as imagem
                    from tb_imagem_produto
                    where
                    id_produto = '.$e['cd_produto'].'
                    limit 1';
                    $resu = $GLOBALS['con']->query($sql);
                    if($resu->num_rows > 0){
                    while($ex = $resu->fetch_array()){
        ?>
            <img src="<?php echo $ex['imagem']; ?>" class="img-fluid" alt="" id="img-portfolio" style="height: 300px;">
        <?php
                    }
                }
        ?>
            <div class="card-body">
                <h4 style="text-align: left; margin: 2px; font-weight: bolder;" class="card-title"><?php echo $e['nm_produto']; ?></h4>
            
                    <h5 style="margin-bottom: 10px;" class="float-left">
                        <b>R$ <?php echo number_format(($e['vl_produto']), 2, ",", "."); ?></b>
                    </h5>
            </div>
        </div>
        </a>
        <?php  
            }
        }
        ?>
    </section>
        <?php
            include 'footer.php'
        ?>
</body>

<?php
    include_once './header.php';
    include_once './conect.php';
    // Nav
    include_once 'assets/nav/navbar.php';
    //Modal
    include_once 'assets/modals/carrinho.php';
    //Function
    include_once 'assets/function/carrinho.php';
    include_once 'assets/function/atualizar_quantidade.php';
    
    $ip = $_SERVER['REMOTE_ADDR'];
    $pagina = "carrinho.php";
?>
<head>
    <link rel="stylesheet" href="assets/css/dropdown.css">
    <link rel="stylesheet" href="assets/css/carrinho.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <!-- CARRINHO -->
    <div class="container">
            <div class="table-responsive">
            <table class="table table-hover bg-white">
                <thead>
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col"></th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
    <?php 
        $sql =  'select
        cd_item_carrinho,
        nm_produto as produto,
        vl_produto as valor,
        qt_produto as quantidade,
        (vl_produto * qt_produto) as total,
        car.id_usuario as usuario,
        ic.id_carrinho as carrinho,
        ic.id_produto as id_produto from tb_carrinho as car
        inner join tb_item_carrinho as ic on ic.id_carrinho = car.cd_carrinho
        inner join tb_produto as pr on ic.id_produto = pr.cd_produto
        where car.nr_ip = "'.$ip.'"';
        $res = $GLOBALS['con']->query($sql);
        if($res->num_rows > 0){
         while($e = $res->fetch_array()){
    ?>  

                <tbody>
                    <tr>
                    <?php
                        $sql = 'select distinct id_produto, url_produto,
                                if(url_produto != "", concat("assets/img/produtos/",id_produto,"/",url_produto), "noimg.png") as imagem
                                from tb_imagem_produto
                                where
                                id_produto = '.$e['id_produto'].'
                                limit 1';
                                $resu = $GLOBALS['con']->query($sql);
                                if($resu->num_rows > 0){
                                while($ex = $resu->fetch_array()){
                    ?>
                        <th scope="row"><img src="<?php echo $ex['imagem']; ?>" class="img-fluid" alt="" id="img-portfolio" style="height:100px;"></th>
                    <?php
                                }
                            }
                    ?>
                        
                        <th><?php echo $e['produto']; ?></th>
                        <td>
                            <span id="preco-<?php echo $e['cd_item_carrinho'];?>">
                                <?php echo number_format(($e['valor']), 2, ",", "."); ?>    
                            </span>
                        </td>
                        <td>
                            <div class="quant">
                                
                                <button class="btn" id="diminuir" name="menos" onclick="diminuirQuantidade(<?php echo $e['cd_item_carrinho']; ?>)">-</button>
                                <div class="quantidade" id="quantidade">
                                    <span id="quantidade-<?php echo $e['cd_item_carrinho'];?>"><?php echo $e['quantidade']; ?></span>
                                </div>
                                <button class="btn" id="aumentar" name="mais" onclick="aumentarQuantidade(<?php echo $e['cd_item_carrinho']; ?>)">+</button>
                            </div>
                        </td>
                        <td>
                            <span id="total-<?php echo $e['cd_item_carrinho'];?>">
                                <?php echo number_format(($e['total']), 2, ",", "."); ?>
                            </span>
                        </td>
                        <td>
                            <button 
                                class="btn excluir_item btn-end" 
                                data-toggle="modal" 
                                data-target="#excluir_item" 
                                title="Excluir item"
                                item="<?php echo $e['cd_item_carrinho'];?>">
                                <i style="color: gray;"class="fa fa-trash"><?php echo $e['cd_item_carrinho'];?></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
    <?php
         }
        }
    ?>
            </table>
        </div>
    </div>
    <?php include './footer.php'; 
        if(!empty($_POST)){
            if($_POST['acao'] == "Remover"){
                Remover(
                    $_POST["item"],
                    $pagina
                    );
            }
        }
    ?>
    <script src="assets/js/carrinho.js"></script>
</body>
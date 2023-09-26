<head>
    <?php
        // header
        include_once './header.php';
        // NavBar
        include_once '../assets/nav/navbar.php';
        // funções
        include_once '../assets/function/categoria.php'; 
        include_once '../assets/function/produtos.php'; 
        include_once '../assets/function/Listar.php';
        include_once '../assets/function/marca.php';
        // Modais
        include_once '../assets/modals/produtos.php';
        include_once '../assets/modals/categoria.php';
        include_once '../assets/modals/marca.php';
        // footer
        
        ?>
    <link rel="stylesheet" href="../assets/css/produtos.css">
    <link rel="stylesheet" href="../assets/css/dropdown.css">
</head>
<style>
    body{
        margin-top: 75px;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <!-- Botão cadastro categoria -->
            
            <div class="col-sm-8 offset-sm-2">
                <button data-toggle="modal" data-target="#cadastrar_categoria" class="btn btn-color vasco">
                    <i class="bi bi-plus">Cadastrar categoria</i>
                </button>
                <button data-toggle="modal" data-target="#cadastrar_marca" class="btn btn-color vasco">
                    <i class="bi bi-plus">Cadastrar marca</i>
                </button>
                <button data-toggle="modal" data-target="#adicionar_produto" class="btn btn-color vasco">
                    <i class="bi bi-plus">Cadastrar produto</i>
                </button>
            </div>
        </div>
    </div>
    <?php  
    $sql = 'select distinct cd_categoria, nm_categoria from tb_categoria
            inner join tb_produto as p on p.id_categoria = cd_categoria
            order by nm_categoria';
    $res = $GLOBALS['con']->query($sql);
    if($res->num_rows > 0){
        while($e = $res->fetch_array()){
    ?>
        <div class="row">
            <div class="col-sm-11">
                <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header bg-color" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-color btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $e['cd_categoria']; ?>" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo $e['nm_categoria'] ?>
                            </button>
                        </h2>
                        </div>

                        <div id="collapse<?php echo $e['cd_categoria']; ?>" class="fundo-collapse collapse">
                            <div class="row">
    <!-- Mostrar Produtos -->
    <?php  
    $sql = 'select distinct cd_produto, nm_produto, vl_produto, ds_produto, st_produto, nm_tag_pesquisa,
            p.id_categoria, p.id_marca, nm_categoria 
            from tb_produto as p
            inner join tb_categoria on p.id_categoria = cd_categoria
            inner join tb_marca on p.id_marca = cd_marca
            left join tb_imagem_produto on id_produto = cd_produto
            where 
            p.id_categoria = '.$e['cd_categoria'];
    $mos = $GLOBALS['con']->query($sql);
    if($mos->num_rows > 0){
        while($m = $mos->fetch_array()){
            if ($m['st_produto'] == "1") {
                $color = "badge-success";
                $badge = "Ativo";
            }
            else if($m['st_produto'] == "0"){
                $color = "badge-danger";
                $badge = "Inativo";
            }
    ?>
                            <div class="col-sm-3 produto">
                                <div class="card card-produto">
                                    <div id="carouselExampleControls<?php echo $m['cd_produto']; ?>" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                    
    <!-- Mostrar imagens -->
    <?php  
        $sql = 'select cd_produto, 
                if(url_produto != "", concat(id_produto,"/",url_produto), "noimg.png") as imagem,
                if(cd_imagem_produto = (select min(cd_imagem_produto) 
                from tb_imagem_produto 
                where id_produto = '.$m['cd_produto'].'), "active", "") as active
                from tb_produto
                left join tb_imagem_produto on id_produto = cd_produto
                where 
                cd_produto = '.$m['cd_produto'];
        $result = $GLOBALS['con']->query($sql);
        if($result->num_rows > 0){
            while($ver = $result->fetch_array()){
                if($ver['imagem'] == "noimg.png"){
                    $active = "active";
                }
                else{
                    $active = $ver['active'];
                }
    ?>                                    
                                            <div class="carousel-item caroseul-prod <?php echo $active; ?>">
                                                <?php echo "<img src='../assets/img/produtos/{$ver['imagem']}' class='card-img img-fluid' id='foto-produto'>"; ?>
                                            </div>
    <?php
            }
        }
    ?>
                                            <button class="carousel-control-prev" 
                                                type="button" data-target="#carouselExampleControls<?php echo $m['cd_produto']; ?>" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" 
                                                type="button" data-target="#carouselExampleControls<?php echo $m['cd_produto']; ?>" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tr>
                                                    <th>Produto</th>
                                                    <td><?php echo $m['nm_produto']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Valor</th>
                                                    <td>R$ <?php echo number_format($m['vl_produto'], 2,",","."); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Descrição</th>
                                                    <td> <?php echo $m['ds_produto']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>
                                                        <span class="badge <?php echo $color; ?>">
                                                            <?php echo $badge; ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>	
                                    </div>
                                    <div class="card-footer text-center">
                                        <button 
                                            class="btn btn-primary adicionar_imagem" 
                                            data-toggle="modal" 
                                            data-target="#adicionar_imagem" 
                                            title="imagem"
                                            cd="<?php echo $m['cd_produto']; ?>">
                                            <i class="bi bi-image"></i>
                                        </button>
                                        <button 
                                            class="btn btn-info editar_produto" 
                                            data-toggle="modal" 
                                            data-target="#editar_produto" 
                                            title="editar"
                                            produto="<?php echo $m['nm_produto']; ?>"
                                            valor="<?php echo $m['vl_produto']; ?>"
                                            categoria="<?php echo $m['id_categoria']; ?>"
                                            marca="<?php echo $m['id_marca']; ?>"
                                            tags="<?php echo $m['nm_tag_pesquisa']; ?>"
                                            descricao="<?php echo $m['ds_produto']; ?>"
                                            cd="<?php echo $m['cd_produto']; ?>"
                                            ><i class="bi bi-pencil"></i>
                                        </button>
                                        <button 
                                            class="btn btn-warning status_produto" 
                                            data-toggle="modal" 
                                            data-target="#status_produto" 
                                            title="alterar status"
                                            status="<?php echo $m['st_produto']; ?>"										
                                            cd="<?php echo $m['cd_produto']; ?>"
                                            >
                                            <i class="bi bi-arrow-clockwise"></i>
                                        </button>
                                        <button 
                                            class="btn btn-danger excluir_produto" 
                                            data-toggle="modal" 
                                            data-target="#excluir_produto" 
                                            title="excluir"
                                            cd=" <?php echo $m['cd_produto']; ?>">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                

    <?php
        }
    }
    ?>								
                            </div>			
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    <?php
        }
    }
    ?>
<!-- categoria  -->
<?php
    if(!empty($_POST)){
        if($_POST['acao'] == "+ Categoria"){
            if(empty($_POST['id_categoria'])){
                $id_categoria = "Null";
            }
            else{
                $id_categoria = $_POST['id_categoria'];
            }
            CadastrarCategoria(
                $_POST['categoria'], 
                $id_categoria,
                $id,
                $pagina
            );
        }
    }
?>
<!-- Produtos -->
<?php
    if(!empty($_POST)){
        if($_POST['acao'] == "+ Produto"){
            CadastrarProduto(
                $_POST['produto'], 
                $_POST['valor'], 
                $_POST['categoria'],
                $_POST['marca'],
                $_POST['tags'], 
                $_POST['descricao'], 
                $id,
                $pagina
            );
        }
        else if($_POST['acao'] == "EditarProduto"){
            EditarProduto(
                $_POST['produto'],
                $_POST['valor'],
                $_POST['categoria'],
                $_POST['marca'],
                $_POST['tags'],
                $_POST['descricao'],
                $id,
                $_POST['cd'],
                $pagina
            );
        }
        else if($_POST['acao'] == "AlterarStatus"){
            AlterarStatus(
                $_POST['status'],
                $_POST['cd'],
                $pagina
            );
        }
        else if($_POST['acao'] == "AdicionarImagem"){
            $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            if($extensao == "png" || $extensao == "jpg" || $extensao == "jpeg" || $extensao == "jfif" || $extensao == "webp"){
                $cd = $_POST['cd'];
                $uploaddir = "../assets/img/produtos/$cd/";
                if($extensao == "jpeg"){
                    $ext = strtolower(substr($_FILES['imagem']['name'],-5));
                }
                else if($extensao == "jfif"){
                    $ext = strtolower(substr($_FILES['imagem']['name'],-5));
                }
                else if($extensao == "webp"){
                    $ext = strtolower(substr($_FILES['imagem']['name'],-5));
                }
                else{
                    $ext = strtolower(substr($_FILES['imagem']['name'],-4));
                }
                $imagem = md5(date("d-m-y-h-i-s").$_FILES['imagem']['name']).$ext;
                $uploadfile = $uploaddir . basename($imagem);
                move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile);

                $sql = 'insert into tb_imagem_produto set 
                        url_produto = "'.$imagem.'",
                        id_produto = '.$_POST['cd'];
                $res = $GLOBALS['con']->query($sql);
                if($res){
                    Mensagem("Imagem salva com sucesso!", $pagina);
                }
                else{
                    Erro("Ops! Essa imagem não foi salva!",$pagina);
                }
            }
        }
        else if($_POST['acao'] == "ExcluirProduto"){
            ExcluirProduto(
                $_POST["cd"],
                $pagina
                );
        }
    }
?>
<!-- Marca -->
<?php
    if(!empty($_POST)){
        if($_POST['acao'] == "+ Marca"){
            CadastrarMarca(
                $_POST['marca'], 
                $id,
                $pagina
            );
        }
    }
?>

</div>
</body>
<?php
include 'mensagem.php';
include 'conect.php';

function Remover($item, $pagina){
    //verifica se existe produto para ser deletado
    $sql = "delete from tb_item_carrinho where cd_item_carrinho = $item";
    $res = $GLOBALS['con']->query($sql);
    if ($res) {
        Mensagem("Excluido com sucesso", $pagina);
    } else {
        Erro("Falha ao retirar do carrinho");
    }
}

function AdicionarCarrinho($cd, $id, $ip, $pagina)
{
    //verifica se tem carrinho
    $sql = 'select cd_carrinho, id_usuario from tb_carrinho as car where id_usuario =' . $id . ' or nr_ip = "' . $ip . '"';
    $res = $GLOBALS['con']->query($sql);


    // se tiver põe o item no carrinho
    if ($res->num_rows > 0) {
        while ($e = $res->fetch_array()) {
            $sql = 'insert into tb_item_carrinho set
            qt_produto = 1,
            dt_registro_item = now(),
            id_carrinho = ' . $e['cd_carrinho'] . ',
            id_produto = ' . $cd;
            $res = $GLOBALS['con']->query($sql);
            if ($res) {
                Mensagem("Produto adicionado ao carrinho", $pagina);
            } else {
                Erro("Erro ao colocar no carrinho");
            }
        }


        // se não tiver cria um carrinho
    } else if ($res->num_rows == 0) {
        $sql = 'insert into tb_carrinho set
            st_carrinho = 1,
            id_usuario = ' . $id . ',
            dt_registro_carrinho = now(),
            nr_ip ="' . $ip . '"';
        $res = $GLOBALS['con']->query($sql);

        //seleciona o carrinho criado
        $sql = 'select cd_carrinho, id_usuario from tb_carrinho as car where id_usuario =' . $id . ' or nr_ip = "' . $ip . '"';
        $res = $GLOBALS['con']->query($sql);


        // insere o item no carrinho
        if ($res->num_rows > 0) {
            // insere no carrinho criado
            while ($e = $res->fetch_array()) {
                $sql = 'insert into tb_item_carrinho set
                    qt_produto = 1,
                    dt_registro_item = now(),
                    id_carrinho = ' . $e['cd_carrinho'] . ',
                    id_produto = ' . $cd;
                $res = $GLOBALS['con']->query($sql);
                Mensagem("Produto adicionado ao carrinho", $pagina);
            }
        } else {
            Erro("ERRO");
        }
        //Cria um carrinho com ip
    } else {
        while ($e = $res->fetch_array()) {
            $sql = 'insert into tb_carrinho set
            nr_ip = "' . $ip . '",
            st_carrinho = 1,
            dt_registro_carrinho = now()';
            $res = $GLOBALS['con']->query($sql);

            //seleciona o carrinho criado
            $sql = 'select cd_carrinho, id_usuario from tb_carrinho as car where id_usuario =' . $id . ' or nr_ip = "' . $ip . '"';
            $res = $GLOBALS['con']->query($sql);

            if ($res->num_rows > 0) {
                while ($e = $res->fetch_array()) {
                    $sql = 'insert into tb_item_carrinho set
                    qt_produto = 1,
                    dt_registro_item = now(),
                    id_carrinho = ' . $e['cd_carrinho'] . ',
                    id_produto = ' . $cd;
                    $res = $GLOBALS['con']->query($sql);
                    Mensagem("Produto adicionado ao carrinho", $pagina);
                }
            } else {
                Erro("Falha ao adicionar ao carrinho");
            }
        }
    }
}

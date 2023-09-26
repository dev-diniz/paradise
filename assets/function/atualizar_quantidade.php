<?php
require_once 'conect.php';
require_once 'mensagem.php';
// Conecte-se ao banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST)){
        if($_POST['mais'] || $_POST['menos']){
            $itemId = $_POST["itemId"];
            $novaQuantidade = $_POST["novaQuantidade"];

            // Execute uma consulta SQL para atualizar a quantidade no banco de dados
            $sql = "update tb_item_carrinho set qt_produto = $novaQuantidade where cd_item_carrinho = $itemId";
            $res = $GLOBALS['con']->query($sql);
        }
    }
}
?>

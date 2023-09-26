<?php
$pagina = "CadastrarProdutos.php";
include_once 'mensagem.php';
// Função cadastrar marca de instrumentos
function CadastrarMarca ($marca, $id, $pagina){
    $sql = 'insert into tb_marca set
        nm_marca        ="'.$marca.'",
        id_usuario          ='.$id;
        $res = $GLOBALS['con']->query($sql);
            if($res){
                Mensagem("Cadastro de marca realizado com sucesso!", $pagina);
            }
            else{
                Erro($sql);
            }
}
?>
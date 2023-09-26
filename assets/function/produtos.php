<?php
include_once 'mensagem.php';
$id = $_SESSION['id'];
$pagina = 'CadastrarProdutos.php';
// Cadastro de produtos
function CadastrarProduto ($produto, $valor, $categoria, $marca, $tag, $descricao, $id, $pagina){
	$sql = 'select * from tb_produto where nm_produto = "'.$produto.'"';
	$retorna = $GLOBALS['con']->query($sql);
			if($retorna->num_rows == 0){
				$sql = 'insert into tb_produto set
				nm_produto			="'.$produto.'",
				vl_produto			="'.$valor.'",
				id_categoria		='.$categoria.',
				id_marca			='.$marca.',
				nm_tag_pesquisa		="'.$tag.'",
				ds_produto			="'.$descricao .'",
				dt_registro_produto = now(),
				st_produto			="1",
				id_usuario			='.$id;
				$res = $GLOBALS['con']->query($sql);
					if($res){
						$sql = 'select cd_produto from tb_produto where nm_produto = "'.$produto.'"';
						$busca = $GLOBALS['con']->query($sql);
						if($busca->num_rows > 0){
							$e = $busca->fetch_array();
							$dir = $e['cd_produto'];
							$diretorio = "../assets/img/produtos/$dir";
							mkdir($diretorio);
							Mensagem("Cadastro do produto realizado com sucesso!", $pagina);
						}
					}
				} else {
					Erro("Produto já existente");
				}
}
// Editar os produtos desejados
function EditarProduto ($produto, $valor,$categoria, $marca, $tags, $descricao , $id, $cd,  $pagina){
	$sql = 'update tb_produto set
		nm_produto			="'.$produto.'",
		vl_produto			="'.$valor.'",
		id_categoria		='.$categoria.',
		id_marca 		    ='.$marca.',
		nm_tag_pesquisa		="'.$tags.'",
		ds_produto			="'.$descricao.'",
		id_usuario			='.$id.'
		where 
		cd_produto = '.$cd;
        $res = $GLOBALS['con']->query($sql);
			if($res){
				Mensagem("Edição dos dados realizado com sucesso!", $pagina);
			}
			else{
				Erro($sql);
			}
}

// Altera o status do produto (Ativo ou inativo)
function AlterarStatus ($st_produto, $cd, $pagina){
	$sql = 'update tb_produto set
		st_produto = '.$st_produto.'
		where
		cd_produto ='.$cd;
		$res = $GLOBALS['con']->query($sql);
		if($res){
			Mensagem("Status alternado com sucesso!", $pagina);
		}
		else{
			Erro($sql);
		}
}
// Exclui os produtos 
function ExcluirProduto($cd, $pagina){
	$sql = 'delete from tb_item_carrinho where id_produto ='.$cd;
	$resu = $GLOBALS['con']->query($sql);

    $sql ='select cd_imagem_produto, url_produto, id_produto from tb_imagem_produto where id_produto = '.$cd;
    $res = $GLOBALS['con']->query($sql);
    if($res->num_rows > 0){
        while($e = $res->fetch_array()){
            $dir ="../assets/img/produtos/{$e['id_produto']}/{$e['url_produto']}";
            unlink($dir);
            $sql = 'delete from tb_imagem_produto
            where url_produto = "'.$e['url_produto'].'"';
            $mos = $GLOBALS['con']->query($sql);
            }  
        }
    $sql = 'delete from tb_produto
     where cd_produto = '.$cd;
    $res = $GLOBALS['con']->query($sql);
    if($res){
        Mensagem("Produto excluido com sucesso!",$pagina);
    }
    else{
        Erro($sql);
    }
}
?>
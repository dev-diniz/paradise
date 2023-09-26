<?php
$pagina = "CadastrarProdutos.php";
include_once 'mensagem.php';
// Função listar categoria de instrumentos 
function ListarCategoria(){
	$sql = 'select cd_categoria, nm_categoria from tb_categoria order by nm_categoria asc';
	$res = $GLOBALS['con']->query($sql);
	if($res->num_rows > 0){
		while($exibe = $res->fetch_array()){
			print'
				<option value="'.$exibe['cd_categoria'].'">'.$exibe['nm_categoria'].'</option>
			';
		} 
	}
}

function CadastrarCategoria ($categoria, $id_categoria, $id, $pagina){
	$sql = 'insert into tb_categoria set
		nm_categoria		="'.$categoria.'",
		id_categoria		='.$id_categoria.',
		id_usuario			='.$id;
        $res = $GLOBALS['con']->query($sql);
			if($res){
				Mensagem("Cadastro de categoria realizado com sucesso!", $pagina);
			}
			else{
				Erro($sql);
			}
}
?>

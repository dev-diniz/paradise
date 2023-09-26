<?php
$id = $_SESSION['id'];
include_once 'mensagem.php';
// Edita os dados do usuario
function EditarDados ($nome, $sobrenome, $nascimento, $cd, $pagina){
	$sql = 'update tb_usuario set
	nm_usuario              ="'.$nome.'",
	nm_sobrenome_usuario    ="'.$sobrenome.'",
	dt_nascimento           ="'.$nascimento.'" 
	where cd_usuario        ='.$cd;
	$res = $GLOBALS['con']->query($sql);
	if($res){
		Mensagem("Edição de dados realizada com sucesso!", $pagina);       
	}       
	else{        
		Erro($sql); 
	}
}
// Cadastra o endereço do usuario
function AdicionarEndereço ($postal,$endereco,$numero,$bairro,$cidade,$estado,$complemento,$id,$pagina){
	$sql = 'insert into tb_endereco_usuario set
		cd_postal			="'.$postal.'",
		nm_logradouro		="'.$endereco.'",
		nr_logradouro		='.$numero.',
		nm_bairro			="'.$bairro.'",
		nm_cidade			="'.$cidade.'",
		nm_estado			="'.$estado.'",
		nm_complemento		="'.$complemento.'",
		st_endereco			="1",
		id_usuario			='.$id;
		$res = $GLOBALS['con']->query($sql);
			if($res){
				Mensagem("Cadastro de endereço realizado com sucesso!", $pagina);
			}
			else{
				Erro($sql);
			}
}
// Edita o endereço do usuario
function EditarEndereço ($postal,$logradouro, $numero, $bairro, $cidade, $estado,  $complemento, $id, $pagina){
	$sql = 'update tb_endereco_usuario set
			cd_postal		        ="'.$postal.'",
			nm_logradouro 			="'.$logradouro.'",
			nr_logradouro			='.$numero.',
			nm_bairro 				="'.$bairro.'",
			nm_cidade 				="'.$cidade.'",
			nm_estado 				="'.$estado.'",
			nm_complemento		    ="'.$complemento.'"
			where id_usuario		='.$id;
			$res = $GLOBALS['con']->query($sql);
			if($res){
				Mensagem("Edição do endereço realizado com sucesso!", $pagina);       
			}       
			else{        
				Erro($sql); 
			}

}
?>
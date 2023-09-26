<?php
include_once 'mensagem.php'; 		
// Cadastrar usuario		
function CadastrarUser ($nome, $email, $cpf_cnpj, $senha, $tipo_usuario, $pagina){
	$sql = 'insert into tb_usuario set 
	nm_usuario 				= "'.$nome.'",
	nm_email 				= "'.$email.'",
	cd_cpf_cnpj 			= "'.$cpf_cnpj.'",
	cd_senha 				= md5("'.$senha.'"),
	id_tipo_usuario 		= '.$tipo_usuario;
	$res = $GLOBALS['con']->query($sql);
	if($res){
		Mensagem("Cadastro realizado com sucesso!", $pagina);
	}
	else{
		Erro("Algo de errado aconteceu!".mysqli_error($GLOBALS['con']));
	}
}
?>

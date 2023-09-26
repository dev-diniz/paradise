
<?php
include_once 'header.php';
function Mensagem($msg, $pagina){
	print'
	<div class="modal fade" id="myModal" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<h5 class="modal-title" id="staticBackdropLabel">Confirmação:</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
			      </div>
			      <div class="modal-body">
				  '.$msg.'
			      </div>
			      <div class="modal-footer">
				  <button class="btn btn-secondary" onclick="redirecionar()">
				  OK
				  </button>
			      </div>
				  </div>
				  </div>
				  </div>
				  <script>
				  function redirecionar(){
					  location.href = "'.$pagina.'";
					}
					</script>
					';
				}
				
				function Erro($msg){
					print'
					<div class="modal fade" id="myModal" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
			        <h5 class="modal-title" id="staticBackdropLabel">Ops!!! Algo deu errado:</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
				  '.$msg.'
			      </div>
			      <div class="modal-footer">
				  <button class="btn btn-secondary" onclick="redirecionar()">
				  OK
				  </button>
			      </div>
				  </div>
				  </div>
				  </div>
				  <script>
				  function redirecionar(){
					  history.go(-1);
					}
					</script>
					';
				}
				
				function CadastrarUser ($nome, $email, $cpf_cnpj, $senha, $tipo_usuario){
					$sql = 'insert into tb_usuario set 
					nm_usuario 				= "'.$nome.'",
					nm_email 				= "'.$email.'",
					cd_cpf_cnpj 			= "'.$cpf_cnpj.'",
					cd_senha 				= md5("'.$senha.'"),
					id_tipo_usuario 		= '.$tipo_usuario;
					$res = $GLOBALS['con']->query($sql);
					if($res){
						Mensagem("Cadastro realizado com sucesso!", "login.php");
					}
					else{
						Erro("Algo de errado aconteceu!".mysqli_error($GLOBALS['con']));
					}
				}

				function CadastrarEndereco ($tipo,$endereco,$numero,$complemento,$postal,$bairro,$cidade,$estado,$usuario,$pagina){
					$sql = 'insert into tb_endereco_usuario set
						nm_tipo_logradouro	="'.$tipo.'",
						nm_logradouro		="'.$endereco.'",
						nr_logradouro		="'.$numero.'",
						nm_complemento		="'.$complemento.'",
						cd_postal			="'.$postal.'",
						nm_bairro			="'.$bairro.'",
						st_endereco			="1",
						nm_cidade			="'.$cidade.'",
						id_estado			='.$estado.',
						id_usuario			='.$usuario;
						$res = $GLOBALS['con']->query($sql);
							if($res){
								Mensagem("Cadastro de dados realizado com sucesso!", $pagina);
							}
							else{
								Erro($sql);
							}
				}
?>
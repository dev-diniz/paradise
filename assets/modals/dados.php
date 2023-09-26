<head>
    <?php 
        $id = $_SESSION['id'];
        $pagina = 'CadastrarDados.php';
        include '../assets/function/Listar.php';
    ?>
    <style>
        .btn-color{
            color: white;
            background-color: gray;
        }
    </style>
</head>
<body>
    <!-- modal editar dados -->
    <div class="modal fade" id="editar_dados" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-group was-validated" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Editar dados</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nome">Nome: </label>
                            <input type="text" name="nome" id="nome" class="form-control">
                        </div>                    
                        <div class="form-group">
                            <label for="nome">Sobrenome: </label>
                            <input type="text" name="sobrenome" id="sobrenome" class="form-control">
                        </div>                    
                        <div class="form-group">
                            <label for="nome">Data de nascimento: </label>
                            <input type="date" name="nascimento" id="nascimento" class="form-control">
                        </div>                    
                        <fieldset disabled="disabled">
                            <label for="nome">E-mail: </label>
                            <input type="email" name="email" id="email" class="form-control">
                        </fieldset>                    
                        <fieldset disabled="disabled">
                            <label for="CPF">CPF: </label>
                            <input type="text" name="cpf" id="cpf" class="form-control">
                        </fieldset>        
                        <fieldset hidden>
                            <label for="id_usuario">ID do usuário:</label><br/>
                            <?php echo "<input type='text' value='$id' readonly='readonly' size='10' maxlength" ?>

                        </fieldset>         
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="acao" class="btn btn-color" value="EditarDados">
                    </div>
                </form>
            </div>  
        </div>  
    </div> 
    <style>
    /* Media query para dispositivos com largura de tela maior que 566px */
    @media screen and (min-width: 566px) {
        #verificador {
            margin-top: 32px; /* Margem superior para dispositivos maiores */
        }
    }
</style>

    <!-- modal adicionar endereço -->
    <div class="modal fade" id="adicionar_endereco" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-group was-validated" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Adicionar endereço</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-sm-8">
                                <label for="CEP">CEP: </label>
                                <input type="number" name="cep" id="cep" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <button class="btn btn-color" onclick="verificaCep()" name="verificaCEP" id="verificador" >Verificar CEP</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logradouro">Logradouro: </label>
                            <input type="text" name="logradouro" id="logradouro" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="numero">Numero: </label>
                            <input type="number" name="numero" id="numero" class="form-control" required>
                        </div>                
                        <div class="form-group">
                            <label for="bairro">Bairro: </label>
                            <input type="text" name="bairro" id="bairro" class="form-control" required>
                        </div> 
                        <div class="form-row"> 
                            <div class="form-group col-sm-8">
                                <label for="cidade">Cidade: </label>
                                <input type="text" name="cidade" id="cidade" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Estado:</label>
                                <input type="text" name="estado" id="estado" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento: </label>
                            <input type="text" name="complemento" id="complemento" class="form-control">
                        </div>
                        <fieldset hidden>
                            <label for="usuario_id">Usuario ID:</label><br/>
                            <?php echo "<input type='hidden' name='usuario_id' value='$id'>"?>;
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="acao" class="btn btn-color" value="AdicionarEndereço">
                    </div>
                </form>
            </div>  
        </div>  
    </div>
    <!-- Modal para edição de endereço -->
    <div class="modal fade" id="editar_endereco" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-group was-validated" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Editar dados</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-sm-8">
                                <label for="CEP">CEP: </label>
                                <input type="number" name="cep" id="cep" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <button class="btn btn-color" onclick="verificaCep()" id="verificador" >Verificar CEP</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logradouro">Logradouro: </label>
                            <input type="text" name="logradouro" id="logradouro" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="numero">Numero: </label>
                            <input type="number" name="numero" id="numero" class="form-control" required>
                        </div>                
                        <div class="form-group">
                            <label for="bairro">Bairro: </label>
                            <input type="text" name="bairro" id="bairro" class="form-control" required>
                        </div>
                        <div class="form-row"> 
                            <div class="form-group col-sm-8">
                                <label for="cidade">Cidade: </label>
                                <input type="text" name="cidade" id="cidade" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-label">Estado:</label>
                                <input type="text" name="estado" id="estado" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento: </label>
                            <input type="text" name="complemento" id="complemento" class="form-control">
                        </div>
                        <fieldset hidden>
                            <label for="usuario_id">Usuario ID:</label><br/>
                            <?php echo "<input type='hidden' name='usuario_id' value='$id'>"?>;
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="acao" class="btn btn-color" value="EditarEndereço">
                    </div>
                </form>
            </div>  
        </div>  
    </div>
    <script src="../assets/js/cep.js"></script>
</body>

<!-- Modals de  atribuição -->
<script>
      // atribuir valores p/ modal de dados
    	$(document).on('click', '.editar_dados', function(){
        var nome = $(this).attr('nome');
        var sobrenome = $(this).attr('sobrenome');
        var nascimento = $(this).attr('nascimento');
        var email = $(this).attr('email');
        var cpf = $(this).attr('cpf');
        var cd = $(this).attr('cd');
        $('.modal #nome').val(nome);
        $('.modal #sobrenome').val(sobrenome);
        $('.modal #nascimento').val(nascimento);
        $('.modal #email').val(email);
        $('.modal #cpf').val(cpf);
        $('.modal #cd').val(cd);
  	});
    // atribuir valores p/ modal de endereco
    	$(document).on('click', '.editar_endereco', function(){
		var id = $(this).attr('id');
        var cep = $(this).attr('cep');
  		var logradouro = $(this).attr('logradouro');
		var numero = $(this).attr('numero');
  		var bairro = $(this).attr('bairro');
  		var cidade = $(this).attr('cidade');
        var estado = $(this).attr('estado');
  		var complemento = $(this).attr('complemento');
  		$('.modal #id').val(id);
  		$('.modal #cep').val(cep);
  		$('.modal #logradouro').val(logradouro);
  		$('.modal #numero').val(numero);
  		$('.modal #bairro').val(bairro);
  		$('.modal #cidade').val(cidade);
        $('.modal #estado').val(estado);
        $('.modal #estado').val(estado);
        $('.modal #complemento').val(complemento);
  	});
        
</script>



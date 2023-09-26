<!-- Modal para Adicionar produto -->
<div class="modal fade" id="adicionar_produto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="produto" class="form-label">Nome do produto:</label>
                        <input type="text" name="produto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor do produto: </label>
                        <input type="number" name="valor" id="valor" class="form-control" required>
                    </div>
                    <!-- LISTAGEM -->
                    <div class="form-group">
                        <label for="categoria">Categoria: </label>
                        <select name="categoria" id="categoria" class="form-control">
                            <option disabled selected>Selecione a categoria principal</option>
                            <?php ListarCategoria(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Marca: </label>
                        <select name="marca" id="marca" class="form-control">
                            <option disabled selected>Selecione a marca</option>
                            <?php ListarMarca(); ?>
                        </select>
                    </div>
                    <!-- FIM LISTAGEM -->
                    <div class="form-group">
                        <label for="tags">Tag de pesquisa: </label>
                        <input type="text" class="form-control" name="tags" placeholder="Separar tags com ','">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição: </label>
                        <textarea name="descricao" id="descricao" rows="5" class="form-control"></textarea>
                    </div>
                    
                    <fieldset hidden>
                        <label for="id">Usuario ID:</label><br/>
                        <?php echo "<input type='text' name='id' value='$id'>"?>;
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="acao" class="btn btn-color" value="+ Produto">
                </div>
            </form>
        </div>  
    </div>  
</div>
<!-- Fim adicionar produto -->

<!-- Modal editar produto -->
<div class="modal fade" id="editar_produto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="produto" class="form-label">Nome do produto:</label>
                        <input type="text" name="produto" id="produto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor do produto: </label>
                        <input type="number" name="valor" id="valor" class="form-control" required>
                    </div>
                    <!-- LISTAGEM -->
                    <div class="form-group">
                        <label for="categoria">Categoria: </label>
                        <select name="categoria" id="categoria" class="form-control">
                            <option disabled selected>Selecione a categoria principal</option>
                            <?php ListarCategoria(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Marca: </label>
                        <select name="marca" id="marca" class="form-control">
                            <option disabled selected>Selecione a marca</option>
                            <?php ListarMarca(); ?>
                        </select>
                    </div>
                    <!-- FIM LISTAGEM -->
                    <div class="form-group">
                        <label for="tags">Tag de pesquisa: </label>
                        <input type="text" class="form-control" name="tags" id="tags" placeholder="Separar tags com ','">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição: </label>
                        <textarea name="descricao" id="descricao" rows="5" class="form-control"></textarea>
                    </div>
                    <fieldset hidden>
                        <label for="cd">Codigo do produto:</label><br/>
                        <?php echo "<input type='text' name='cd' id='cd'>"?>;
                    </fieldset> 
                    <fieldset hidden>
                        <label for="id">Usuario ID:</label><br/>
                        <?php echo "<input type='text' name='id' value='$id'>"?>;
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="acao" class="btn btn-color" value="EditarProduto">
                </div>
            </form>
        </div>  
    </div>  
</div>
<!-- Fim editar produto -->
<!-- Modal Ativo/Inativo -->
<div class="modal fade" id="status_produto" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
	    <div class="modal-content">
	    	<form method="post" class="form-group">
			    <div class="modal-header">
			        <h5 class="modal-title" id="staticBackdropLabel">Alterar Status:</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				    </button>
				</div>
				<div class="modal-body">
				<select name="status" id="status" class="form-control">
					<option value="1">Ativo</option>
					<option value="0">inativo</option>
				</select>
                <fieldset hidden>
                    <label for="cd">Codigo do produto:</label><br/>
                    <?php echo "<input type='text' name='cd' id='cd'>"?>;
                </fieldset> 
				</div>
			    <div class="modal-footer">
			    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			     	<input type="submit" class="btn btn-primary" name="acao" value="AlterarStatus">
			    </div>
			</form>
		</div>
	</div>
</div>
<!-- Modal add imagem -->
<div class="modal fade" id="adicionar_imagem" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<form action="#" method="post" enctype="multipart/form-data">
		    <div class="modal-header">
		    	<h5 class="modal-title" id="staticBackdropLabel">adicionar Imagem</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		    </div>
		    <div class="modal-body">
                <label for="img"><strong>Coloque imagem de 600 de largura</strong></label>
		    	<input type="file" class="form-control" name="imagem">
                <fieldset hidden>
                    <label for="cd">Código do produto</label>
                    <?php echo "<input type='text' name='cd' id='cd'>"?>;
                </fieldset>
		    </div>
		    <div class="modal-footer">
		    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		      <input type="submit" class="btn btn-primary" name="acao" value="AdicionarImagem">
		    </div>
	  	</form>
    </div>
  </div>
</div>
<!-- Fim modal add imagem -->

<!-- Modal Exluir Produto -->
<div class="modal fade" id="excluir_produto" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="post" class="form-group">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Excluir Produto:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <strong>Deseja mesmo excluir este produto?</strong>
                <fieldset hidden>
                    <?php echo "<input type='text' name='cd' id='cd'>";?>
                </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-danger" name="acao" value="ExcluirProduto">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fim modal de excluir -->
<script>
    // atribuir valores p/ edição de produtos
    $(document).on('click', '.editar_produto', function(){
		var produto = $(this).attr('produto');
		var valor = $(this).attr('valor');
		var categoria = $(this).attr('categoria');
		var marca = $(this).attr('marca');
		var tags = $(this).attr('tags');
		var descricao = $(this).attr('descricao');
		var cd = $(this).attr('cd');
		var id = $(this).attr('id');
  		$('.modal #produto').val(produto);
  		$('.modal #valor').val(valor);
  		$('.modal #categoria').val(categoria);
  		$('.modal #marca').val(marca);
  		$('.modal #tags').val(tags);
  		$('.modal #descricao').val(descricao);
  		$('.modal #cd').val(cd);
  		$('.modal #id').val(id);

  	});
    // atribuir valores p/ alternar status
    $(document).on('click', '.status_produto', function(){
        var status = $(this).attr('status');
        var cd = $(this).attr('cd');
        $('.modal #status').val(status);
        $('.modal #cd').val(cd);
    });
    // atribuir valores p/ adicionar imagem
    $(document).on('click', '.adicionar_imagem', function(){
        var cd = $(this).attr('cd');
        $('.modal #cd').val(cd);
    });
    $(document).on('click', '.excluir_produto', function(){
        var cd = $(this).attr('cd');
        $('.modal #cd').val(cd);
    });

</script>

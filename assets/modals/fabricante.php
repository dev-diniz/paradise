<div class="modal fade" id="cadastrar_fabricante" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group was-validated" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastro de fabricante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Fabricante</label>
                        <input type="text" class="form-control" name="fabricante" required>
                        <br>
                    </div>
                    <fieldset hidden>
                        <label for="id_usuario">ID do usuário:</label>
                        <?php echo "<input type='text' value='$id' readonly='readonly' size='10' maxlength" ?>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="acao" class="btn btn-color" value="+ Fabricante">
                </div>
            </form>
        </div>  
    </div>  
</div>
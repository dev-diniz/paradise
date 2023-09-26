<div class="modal fade" id="excluir_item" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="post" class="form-group">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Remover?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <strong>Deseja mesmo remover o item do carrinho?</strong>
                <input type='hidden' name='item' id='item'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-danger" name="acao" value="Remover">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).on('click', '.excluir_item', function(){
    var item = $(this).attr('item');
    $('.modal #item').val(item);
});
</script>
<?php
    
?>
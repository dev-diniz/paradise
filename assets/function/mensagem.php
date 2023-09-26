<?php
//Mensagem de sucesso
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
                    <button class="btn btn-color" onclick="redirecionar()">
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
// Mensagem de erro
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
                    <button class="btn btn-color" onclick="redirecionar()">
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

?>
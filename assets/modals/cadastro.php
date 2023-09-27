<div class="modal fade" id="cadastrar_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="container">
				<div class="box form-box">

					<header>
						Criar Conta
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</header>
					<form method="post">

						<div class="field input">
							<label for="username">Nome</label>
							<input type="text" class="form-control" name="nome" id="nome" autocomplete="off" maxlength="60" required>
						</div>

						<div class="field input">
							<label for="email">E-mail</label>
							<input type="text" class="form-control" name="email" id="email" autocomplete="off" maxlength="60" required>
						</div>

						<div class="field input">
							<label for="age">CPF/CNPJ</label>
							<input type="text" class="form-control" name="cd_cpf_cnpj" id="cpf" autocomplete="off" maxlength="14" required>
						</div>

						<div class="field input">
							<label for="password">Senha</label>
							<input type="password" class="form-control" name="senha" id="senha" autocomplete="off" maxlength="50" minlength="4" required>
						</div>

						<fieldset hidden>
						<input type="text" name="tipo_usuario" value="4" readonly="readonly">
						</fieldset>

						<div class="field">
							<input type="submit" class="btn btn-color" name="acao" value="Cadastrar">
						</div>

					</form>
				</div>
			</div>
        </div>
    </div>
</div>

<!-- Mascara CPF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $("#cpf").mask("000.000.000-00")
</script>
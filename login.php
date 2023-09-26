<head>
    <?php
        include './header.php';
        include './conect.php';
        include './assets/modals/cadastro.php';
        include './assets/function/cadastro.php';
    ?>
    <link rel="stylesheet" href="./assets/css/login.css">

    <style>
        body {
            background-image:url("./assets/img/imgfundo1.png")
        }
    </style>
</head>
<body>
    <div class="index">
        <div class="branco">
            <div class="index-content">
                <a href="index.php" class="merica">Paradise Music</a>
            </div>
        </div>
    </div>

    <div class="container-login">
        <div class="box form-box form-login">
            <header>Fazer Login</header>
            <form action="" method="post">

                <div class="field input">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" maxlength="60">
                </div>

                <div class="field input">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" maxlength="50">
                </div>

                <div class="field">    
                    <input type="submit" class="btn btn-color" name="acao" value="Entrar">
                </div>
                
                <div class="links">
                Ainda não é cadastrado? <a href="#"  data-toggle="modal" data-target="#cadastrar_user" >Cadastre-se</a>
                </div>

            </form>
        </div>
    </div>
</body>
</html>

<?php
if(!empty($_POST)){
	if($_POST['acao'] == "Cadastrar"){
		CadastrarUser(
			$_POST['nome'], 
			$_POST['email'],
            $_POST['cd_cpf_cnpj'], 
			$_POST['senha'],
			$_POST['tipo_usuario'],
            $pagina
		);
	}
	else if ($_POST['acao'] == "Entrar"){
		$sql = 'select cd_usuario, nm_usuario, id_tipo_usuario from tb_usuario
			where 
			nm_email = "'.$_POST['email'].'" and
			cd_senha = md5("'.$_POST['senha'].'") and 
			st_usuario = "1"';
			$res = $GLOBALS['con']->query($sql);
		if($res->num_rows > 0){
			$exibe = $res->fetch_array();
			$_SESSION['id'] = $exibe['cd_usuario'];
			$_SESSION['nome'] = $exibe['nm_usuario'];
            $_SESSION['tipo'] = $exibe['id_tipo_usuario'];
			Mensagem("Bem vindo!", "painel/index.php");

		}
		else{
			Mensagem("Usuàrio ou senha inválidos", "login.php");
		}
	}
}
?>
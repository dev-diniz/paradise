<?php 
	require './header.php';
  $id = $_SESSION['id'];
  require_once './conect.php';
  require_once '../assets/function/dados.php';
  require '../assets/modals/dados.php';
	$pagina = 'CadastrarDados.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../assets/css/dados.css">
  <link rel="stylesheet" href="../assets/css/dropdown.css">
<style>
  body {
    margin-top: 75px;
    background-image:url("../assets/img/imgfundo1.png")
    }
</style>
</head>
<body>
	<?php
		include '../assets/nav/navbar.php'; 

    $sql =  'select distinct
            cd_usuario,
            nm_usuario,
            nm_sobrenome_usuario,
            dt_nascimento,
            nm_email, 
            cd_cpf_cnpj
            from tb_usuario
            where cd_usuario =' .$id;
            $res = $GLOBALS['con']->query($sql);
            if($res->num_rows > 0){
              while($e = $res->fetch_array()){  
              $cpf = $e['cd_cpf_cnpj'];
	?>


<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <h3>Meus dados</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <td>Nome: </td>
                <td><?php echo $e['nm_usuario']; ?></td>
              </tr>
              <tr>
                <td>Sobrenome: </td>
                <td><?php echo $e['nm_sobrenome_usuario']; ?></td>
              </tr>
              <tr>
                <th>Data de nascimento: </th>
                <td><?php echo date("d/m/Y", strtotime($e['dt_nascimento'])); ?></td>
              </tr>
              <tr>
                <th>Email: </th>
                <td><?php echo $e['nm_email']; ?></td>
              </tr>
              <tr>
                <th>CPF: </th>
                <td><?php echo $e['cd_cpf_cnpj'];  ?></td>
              </tr>
              <tr hidden>
                <td>ID: </td>
                <td><?php echo $e['cd_usuario']; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="card-footer text-center">
        <button 
            class="btn btn-color editar_dados" 
            data-toggle="modal" 
            data-target="#editar_dados" 
            title="editar"
            nome="<?php echo $e['nm_usuario']; ?>"
            sobrenome="<?php echo $e['nm_sobrenome_usuario']; ?>"
            nascimento="<?php echo $e['dt_nascimento']; ?>"
            email="<?php echo $e['nm_email']; ?>"
            cpf ="<?php echo $e['cd_cpf_cnpj']; ?>"
            cd="<?php echo $e['cd_usuario']; ?>"
          ><i class="bi bi-pencil">Editar dados</i>
        </button>
        </div>
      </div>
    </div>
    <?php
    }
   }
   $sql =  'select distinct
   nm_logradouro,
   nr_logradouro,
   nm_bairro,
   nm_estado,
   nm_cidade,
   cd_postal,
   nm_complemento,
   id_usuario
   from tb_endereco_usuario 
   where id_usuario =' .$id;
   $res = $GLOBALS['con']->query($sql);
   if($res->num_rows > 0){
    while($ex = $res->fetch_array()){
?>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <h3>Endereço</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
                <tr hidden>
                  <td>ID: </td>
                  <td>Sua rua: <?php echo $ex['id_usuario']; ?></td>
                </tr>
                <tr>
                  <th>CEP: </th>
                  <td><?php echo $ex['cd_postal']; ?></td>
                </tr>
                <tr>
                  <td>Logradouro: </td>
                  <td><?php echo $ex['nm_logradouro']; ?></td>
                </tr>
                <tr>
                  <td>Número: </td>
                  <td><?php echo $ex['nr_logradouro']; ?></td>
                </tr>
                <tr>
                  <td>Bairro: </td>
                  <td><?php echo $ex['nm_bairro']; ?></td>
                </tr>
                <tr>
                  <th>Cidade: </th>
                  <td><?php echo $ex['nm_cidade']; ?></td>
                </tr>
                <tr>
                  <th>Estado: </th>
                  <td><?php echo $ex['nm_estado']; ?></td>
                </tr>
                <tr>
                  <th>Complemento: </th>
                  <td><?php echo $ex['nm_complemento']; ?></td>
                </tr>
            </table>
          </div>
        </div>
        <div class="card-footer text-center">
        <button 
            class="btn btn-color editar_endereco" 
            data-toggle="modal" 
            data-target="#editar_endereco" 
            title="editar endereço"
            id="<?php echo $ex['id_usuario']; ?>"
            cep="<?php echo $ex['cd_postal']; ?>"
            logradouro="<?php echo $ex['nm_logradouro']; ?>"
            numero="<?php echo $ex['nr_logradouro']; ?>"
            bairro="<?php echo $ex['nm_bairro']; ?>"
            cidade="<?php echo $ex['nm_cidade']; ?>"
            estado="<?php echo $ex['nm_estado'];?>"
            complemento="<?php echo $ex['nm_complemento'];?>"
          ><i class="bi bi-pencil">Editar endereço</i>
        </button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    }
  }
  else{
    ?>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          Endereços não cadastrados para esse usuário. Clique no botão abaixo
        </div>
        <div class="card-body">
          <br>
          <h6><strong>
                Adicionar novo endereço: 
                <button class="btn btn-color btn-end" data-toggle="modal" data-target="#adicionar_endereco" title="editar endereço">
                  Adicionar endereço
                </button>
              </strong>
          </h6>
      </div>
    </div>
    
<?php
  }
?> 
<?php
if(!empty($_POST)){
    if($_POST['acao'] == "EditarDados"){
        EditarDados(
            $_POST['nome'],
            $_POST['sobrenome'],
            $_POST['nascimento'],
            $id,
            $pagina

        );
    }
    else if ($_POST['acao'] == "AdicionarEndereço"){
        AdicionarEndereço(
            $_POST['cep'],
            $_POST['logradouro'],
            $_POST['numero'],
            $_POST['bairro'],
            $_POST['cidade'],
            $_POST['estado'],
            $_POST['complemento'],
            $id,
            $pagina 
        );
    }
    else if($_POST['acao'] == "EditarEndereço"){
        EditarEndereço(
            $_POST['cep'],
            $_POST['logradouro'],
            $_POST['numero'],
            $_POST['bairro'],
            $_POST['cidade'],
            $_POST['estado'],
            $_POST['complemento'],
            $id,
            $pagina

        );
    } else {

    }
}
?>

</div>
</body>
</html>
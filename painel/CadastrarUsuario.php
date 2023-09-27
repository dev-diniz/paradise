<?php
$pagina = "CadastrarUsuario.php";

include_once 'header.php';
// navbar
include_once '../assets/nav/navbar.php';
// funções
include_once '../assets/function/cadastro.php';
// modals
include_once '../assets/modals/cadastro.php';
// conect
include_once 'conect.php';
?>

<head>
  <link rel="stylesheet" href="../assets/css/dropdown.css">
  <link rel="stylesheet" href="../assets/css/login.css">
  <style>
    body {
      margin-top: 75px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <button data-toggle="modal" data-target="#cadastrar_user" class="btn btn-color">
        <i class="bi bi-plus">Cadastrar usuario</i>
      </button>
    </div>
    <div class="row" id="penis">
      <table class="table table-striped bg-white">
        <thead>
          <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">tipo usuario</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $sql = 'select * from tb_usuario order by cd_usuario asc';
        $res = $GLOBALS['con']->query($sql);
        if ($res->num_rows > 0) {
          while ($e = $res->fetch_array()) {
        ?>
            
              <tr>
                <th scope="row"><?php echo $e['cd_usuario']; ?></th>
                <th><?php echo $e['nm_usuario']; ?></th>
                <th><?php echo $e['nm_email']; ?></th>
                <th><?php echo $e['id_tipo_usuario']; ?></th>
              </tr>

  <?php
          }
        }
  ?>
              </tbody>
      </table>
    </div>
    </div>
    <footer>
      <?php include 'footer.php';?>
    </footer>
</body>
# README - TCC (Trabalho de Conclusão de Curso)
### Introdução
Este repositório contém o código fonte e os recursos necessários para o desenvolvimento do meu Trabalho de Conclusão de Curso (TCC) em informática para Internet. O TCC se baseia em tecnologias web, incluindo HTML5, CSS3, PHP, JavaScript, Bootstrap e MySQL.

### Pré-requisitos
Antes de iniciar a instalação e execução deste projeto, certifique-se de que o seguinte software esteja instalado em sua máquina:

Servidor Web - Você pode usar Apache, Nginx ou qualquer outro de sua escolha.
PHP - Versão 7.0 ou superior.
MySQL - Versão 5.6 ou superior.
Navegador Web - Recomendamos o uso de Google Chrome, Mozilla Firefox ou Microsoft Edge.

### Instalação
Siga estas etapas para configurar e executar o projeto em sua máquina local:

1- Clone o repositório para o seu sistema:

git clone https://github.com/dev-diniz/paradise.git

2- Navegue até a pasta do projeto:

cd paradise

3- Importe o banco de dados MySQL. Você pode usar a linha de comando ou uma ferramenta de gerenciamento de banco de dados como o phpMyAdmin (Para o projeto foi usado XAMPP como servidor web).

mysql -u root -p soft_paradise < soft_paradise.sql

4- Configure as informações de conexão com o banco de dados no arquivo "conect.php".
<?php
// conect.php

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "soft_paradise";
?>

5- Inicie seu servidor web.

6- Abra o projeto em seu navegador, acessando http://localhost/paradise.

### Uso
O projeto ainda está em fase de desenvolvimento podendo conter alguns erros e bugs.
para a liberação de todas as funcionalidades é necessario fazer login com as seguintes credenciais:
email: <diniz25@gmail.com> / senha: <1234>.
Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests com melhorias, correções de bugs, ou novos recursos.


### Contato
Se você tiver alguma dúvida ou precisar entrar em contato, você pode me encontrar em dinizgustavo25@gmail.com ou através do meu perfil no GitHub: https://github.com/dev-diniz.
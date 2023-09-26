function verificaCep() {
    // pega o cep para ser usado
    var cep = document.getElementById('cep').value;
    // verificação de erro 1 (quantidade numerica)
    if (cep.length !== 8) {
        alert("Digite um CEP válido");
        return;
    } else {
        // abre conexão com a API
        var url = `https://viacep.com.br/ws/${cep}/json/`;

        // envia solicitação para a API
        fetch(url)
            .then(function(response) {
                // verificação de erro 2 (caso de erro no cep)
                if (response.erro) {
                    alert("Verifique o CEP digitado.");
                }
                
                return response.json();
            })
            // CEP inexistente no Banco de dados da API
            .then(mostrarEndereco)
            .catch(function() {
                alert("Digite um CEP válido");
            });

        function mostrarEndereco(dados) {
            if (dados.erro) {
                alert("Digite um CEP válido");
            } else {
                var ilogradouro = document.querySelector('#logradouro');
                var ibairro = document.querySelector('#bairro');
                var icidade = document.querySelector('#cidade');
                var iestado = document.querySelector('#estado');
                

                // Coloca os dados da API
                ilogradouro.value   = dados.logradouro;
                ibairro.value       = dados.bairro;
                icidade.value       = dados.localidade;
                iestado.value       = dados.uf;
                return;
            }
        }
    }
}
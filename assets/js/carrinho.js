function aumentarQuantidade(itemId) {
    var quantidadeSpan = document.getElementById("quantidade-" + itemId);
    var precoSpan = document.getElementById("preco-"+itemId);
    var totalSpan = document.getElementById("total-"+itemId);
    var quantidade = parseInt(quantidadeSpan.textContent);
    var preco = parseFloat(precoSpan.textContent);
    var novoTotal = (quantidade * preco).toFixed(2).replace(".",",");
    // Não funciona para preços alem de 1000 **Corrigir**
    quantidade++;
    totalSpan.textContent = novoTotal;
    quantidadeSpan.textContent = quantidade;


    // Enviar a nova quantidade para o servidor
    atualizarQuantidadeNoBanco(itemId, quantidade);
}

function diminuirQuantidade(itemId) {
    var quantidadeSpan = document.getElementById("quantidade-" + itemId);
    var precoSpan = document.getElementById("preco-"+itemId);
    var totalSpan = document.getElementById("total-"+itemId);
    var quantidade = parseInt(quantidadeSpan.textContent);
    var preco = parseFloat(precoSpan.textContent);
    if (quantidade > 1) {
        quantidade--;
        var novoTotal = (quantidade * preco);
        totalSpan.textContent = novoTotal;
        quantidadeSpan.textContent = quantidade;

        // Enviar a nova quantidade para o servidor
        atualizarQuantidadeNoBanco(itemId, quantidade);
    }
}

function atualizarQuantidadeNoBanco(itemId, novaQuantidade) {
    // Usar AJAX para enviar a nova quantidade para o servidor (PHP)
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "atualizar_quantidade.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Atualização no banco de dados concluída
        }
    };
    xhr.send("itemId=" + itemId + "&novaQuantidade=" + novaQuantidade);
}

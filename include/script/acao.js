numerosEscolhidos = [];
function escolhaNumero(numero){
    console.clear();
    console.log(numerosEscolhidos.indexOf(numero));

    if(numerosEscolhidos.indexOf(numero) != -1){  
        var index = numerosEscolhidos.indexOf(numero);
        numerosEscolhidos.splice(index, 1);
        $("#numerosdacartela_"+numero).css( "backgroundColor", "grey" );
        console.log("Entrou no if");
    }else if (numerosEscolhidos.push(numero)){
        $("#numerosdacartela_"+numero).css( "backgroundColor", "#209869" );
        console.log("Entrou no (else if) numero: "+numero);
    }
    $("#numeroParaProximoJogo").html("<h3>"+numerosEscolhidos+"</h3> ");
    if(numerosEscolhidos.length == 6){
        alert("Você já escolheu 6 numeros");
    }
    console.log(numerosEscolhidos);
}

function salvarNumeros() {
    var formData = new FormData($("#formJogo")[0]);
    formData.append("acao", "incluirNumeros");
    formData.append("numeros", numerosEscolhidos);

    $.ajax({
        type: 'POST',
        mimeType: "multipart/form-data",
        url: 'model/acao.php',
        dataType: 'json',
        data: formData,
        contentType: false,
        processData: false
    }).done(function (html) {
        if (html === "ok") {
            alert("Salvo com sucesso");
        } else {
        }

    });
    
}

//Rua jesus alfredo n82 setor sul
//040 712 881 67
//telefone 106 11

function ocultarView() {
    $("#view").hide();

}
function mostrarView() {
    $("#view").show();
}
function ocultarForm() {
    $("#form").hide();
    mostrarView();

}
function mostrarForm() {
    $("#form").show();
}
function ocultarFormAlterar() {
    $("#formAlterar").hide();
    mostrarView();
}
function mostrarFormAlterar() {
    $("#formAlterar").show();
}
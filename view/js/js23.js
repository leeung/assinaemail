
var imagem = new Image();
var nome = '';
var funcao = '';
var contato = '';
var email = '';

function validaContato(contato){
    var valor = contato.value;
    if(valor.length==1) valor = "("+valor;
    if(valor.length==3) valor = valor+ ") ";
    if(valor.length==9) valor = valor+ "-";
    
    contato.value = valor;
}

 function drawAssinatura(){

              nome = document.getElementById('nome').value;
              funcao = document.getElementById('funcao').value;
              contato = document.getElementById('contato').value;
              email = document.getElementById('email').value;
              
              var assinatura = document.getElementById('assinatura');
              
              
              if(assinatura.getContext){
                  var ctx = assinatura.getContext('2d');
                  imagem.src = 'assinaturas/assinaturaModelo05.jpg';
                  imagem.onload = function(){
                      
                    
                      var largura = 800;
                      var altura = 162;
                      ctx.drawImage(imagem,0,0,largura,altura);
                      ctx.font ="40px PadraoAssinatura5";
                      ctx.fillStyle = "#003366";
                      ctx.fillText(nome, 430,40);
                      
                      ctx.font ="28px PadraoAssinatura5";
                      ctx.fillText(funcao, 430,80); 
                      ctx.fillText(contato, 430,110); 
                      ctx.font ="25px PadraoAssinatura5";
                      ctx.fillText(email, 430,140); 

                  }

              }else{
                  alert('NAO SUPORTA CANVAS');
              }

          }

function baixar(link){
    link.href = document.getElementById("assinatura").toDataURL();
    var file = nome.replace(" ","");
    file = file.trim();
    link.download = file + ".jpg";
}

function salvar(link){
    
    var assinatura = document.getElementById('assinatura');
    var dataURL = assinatura.toDataURL();
    
    var request = $.ajax({
                    type: "POST",
                    url: "salvar.php",
                    data: {image: dataURL}
                });
    
        //funcao executada com o sucesso da chamada
        request.done(function(resposta) {
           alert(resposta);
        });

        //methodo chamado caso a requisição falhe
        request.fail(function(jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });

        
        //chama quando a requisição estiver completa
        request.always(function() {
          //alert("completou");
        });

}

function limpar(){
    document.getElementById('nome').value = "";
    document.getElementById('funcao').value = "";
    //document.getElementById('contato').value = "";
    document.getElementById('email').value = "";
    nome = '';
    funcao = '';
    contato = '';
    email = '';

    
    drawAssinatura();
}
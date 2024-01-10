

var imagem = new Image();
var nome = '';
var funcao = '';
//var setor = '';
var contato1 = '';
//var contato2 = '';
var email = '';
var layout = getLayout();
var corFonte = "#003366";
var fonteNome = "40";
var fonteSetor = "28";
var fonteDemais = "25";



function listarAssinaturas(){
	
	 var request = $.ajax({
         type: "POST",
         url: "index.php?entidade=assinatura&acao=listarAjax",
         data: ""
     });

        //funcao executada com o sucesso da chamada
        request.done(function(resposta) {
         //document.getElementById("link").href = resposta;
         document.getElementById("listaAssinaturas").innerHTML = resposta;

        //alert(resposta);
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


function validaAssinatura(){
    var validacao = true;
    if(document.getElementById('nome').value.length == 0) validacao = false;
    if(document.getElementById('funcao').value.length == 0) validacao = false;
    if(document.getElementById('funcao').value.length == 0) validacao = false;
    if(document.getElementById('contato1').value.length == 0) validacao = false;
    if(document.getElementById('email').value.length == 0) validacao = false;
    return validacao
}

function getLayout(){
    
                if(document.getElementById('layout1').checked){
                    layout = document.getElementById('layout1').value;
                    document.getElementById("labelLayout1").className = "labelLayout";
                    document.getElementById("labelLayout2").className = "";
                    corFonte = "#003366";
                }else if(document.getElementById('layout2').checked){
                    layout = document.getElementById('layout2').value;
                    document.getElementById("labelLayout2").className= "labelLayout";
                    document.getElementById("labelLayout1").className = "";
                    corFonte = "#996633";
                    
                }else{
                    alert("Selecione o layout");
                    return false;
                }
    
                if(nome.length > 20) fonteNome = "30";
                if(funcao.length > 30) fonteSetor = "18";
                if(contato1.length > 29) fonteDemais = "18";
                if(email.length > 29) fonteDemais = "18";
                
}

 function drawAssinatura(){


              nome = document.getElementById('nome').value;
              funcao = document.getElementById('funcao').value;
             // setor = document.getElementById('setor').value;
              contato1 = document.getElementById('contato1').value;
              //contato2 = document.getElementById('contato2').value;
              email = document.getElementById('email').value;
     
              var assinatura = document.getElementById('assinatura');
     
              getLayout();
              
              if(assinatura.getContext){
                  var ctx = assinatura.getContext('2d');
                  imagem.src = layout;
                  imagem.onload = function(){
                      
                    
                      var largura = 800;
                      var altura = 162;
                      ctx.drawImage(imagem,0,0,largura,altura);
                      ctx.font = fonteNome+"px PadraoAssinatura5";
                      ctx.fillStyle = corFonte;
                      ctx.fillText(nome, 430,40);
                      
                      ctx.font =fonteSetor+"px PadraoAssinatura5";
                      ctx.fillText(funcao, 430,80); 
                      ctx.font =fonteDemais+"px PadraoAssinatura5";
                      ctx.fillText(contato1, 430,110); 
                      ctx.font =fonteDemais+"px PadraoAssinatura5";
                      ctx.fillText(email, 430,140); 

                  }

              }else{
                  alert('NAO SUPORTA CANVAS');
              }

          }

function baixar(link){
    if(!validaAssinatura()){
        alert('Faltam dados obrigatorios');
        return false;
    }
    link.href = document.getElementById("assinatura").toDataURL();
    var file = nome.replace(" ","");
    file = file.trim();
    link.download = file + ".jpg";
}

function salvar(link){
    if(!validaAssinatura()){
        alert('Faltam dados obrigatorios');
        return false;
    }
    var assinatura = document.getElementById('assinatura');
    var dataURL = assinatura.toDataURL();
    
    var request = $.ajax({
                    type: "POST",
                    url: "index.php?entidade=assinatura&acao=inserir",
                    data: {image: dataURL, funcao: funcao, nome: nome, contato: contato1, email: email}
                });
    
        //funcao executada com o sucesso da chamada
        request.done(function(resposta) {
           document.getElementById("link").href = resposta;
           document.getElementById("link").innerHTML = resposta;
            
           	alert("requisição processada");
            listarAssinaturas();
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
    document.getElementById('contato1').value = "";
    document.getElementById('email').value = "";
    nome = '';
    funcao = '';
    contato = '';
    email = '';

    
    drawAssinatura();
}


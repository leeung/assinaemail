
var dir = 'view/arquivos/';
var imagens = [dir+'passo1.jpg',dir+'passo2.jpg',dir+'passo3.jpg',dir+'passo4.jpg',dir+'passo5.jpg',dir+'passo6.jpg'];

var painel = document.getElementById('slideShow');
var slide = document.getElementById('slide');
var slideControl = document.getElementById('slideControl');
var li ="";

for(i=0; i<imagens.length;i++){
    li = li + "<li><button value='"+i+"' onclick='getImagem(this.value);'>"+(i+1)+"</button></li>";
}

slideControl.innerHTML = "<ul>"+li+"</ul>";

getImagem(0);

function getImagem(i){
   // alert(i);
   slide.src = imagens[i];
}

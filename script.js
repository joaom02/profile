function mail(){
    document.getElementById("form").style.display = "block";
    document.getElementById("botao").style.visibility = "hidden";
}

function cancelar(){
    document.getElementById("form").style.display = "none";
    document.getElementById("botao").style.visibility = "visible";
}

function enviar(){
    document.getElementById("form").style.display = "none";
    document.getElementById("botao").style.visibility = "visible";
}

let mybutton = document.getElementById("btn-back-to-top");

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function changeColor(){
  var elementos = document.getElementsByClassName("lightI");
  for(var i = 0; i < elementos.length; i++){
    elementos[i].classList.toggle("darkI");
  }
  var elementos2 = document.getElementsByClassName("light");
  for(var i = 0; i < elementos2.length; i++){
    elementos2[i].classList.toggle("dark");
  }
  var elementos3 = document.getElementsByClassName("lightHr");
  for(var i = 0; i < elementos3.length; i++){
    elementos3[i].classList.toggle("darkHr");
  }
}
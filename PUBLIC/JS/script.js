var feuille = document.getElementById("feuille");
var message = document.getElementById("message");

feuille.addEventListener("click", function() {
    message.style.transition = "1s";
    message.style.top = "-25px";
});
message.addEventListener("click", function() {
    message.style.transition = "1s";
    message.style.top = "-190px";
});


var clickMe = document.getElementById("clickMe");
clickMe.addEventListener("mouseover", function(){
    var top = Math.floor(Math.random()*1000);
    var left = Math.floor(Math.random()*1000);

    if (left > window.innerWidth)
        clickMe.style.top = window.innerHeight + "px";
    else 
        clickMe.style.top = top +"px";
    if (top > window.innerHeight)
        clickMe.style.left = window.innerWidth + "px";
    else 
    clickMe.style.left = left+"px";
});



var boutonAjouter = document.getElementById('btnAjouterAuPanier');
//var boutonAjouter = document.getElementById('monbouton');
var boutonPanier = document.getElementById('panier');

boutonAjouter.addEventListener("mouseover", function(){
    boutonPanier.style.animation = "animate-panier 0.1s";
});
boutonAjouter.addEventListener("mouseout", function() {
    boutonPanier.style.animation = "";
});






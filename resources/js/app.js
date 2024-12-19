import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Récupérez l'élément du menu
const nav = document.getElementById("nav");
window.addEventListener("scroll", () => {
  if (window.scrollY > 100) { // Si le défilement dépasse 50px
    nav.classList.remove("nav-container"); // Retirer la classe par défaut
    nav.classList.add("nav-fixed"); // Ajouter la classe de défilement
  } else {
    nav.classList.remove("nav-fixed"); // Retirer la classe de défilement
    nav.classList.add("nav-container"); // Ajouter la classe par défaut
  }
});

//ouverture et fermeture du menu burger
const burgermenu = document.getElementById("burger-menu");
const burgerbutton = document.getElementById("burger-button");
let classes = burgermenu.classList;
burgerbutton.addEventListener("click", function(){
  classes.toggle("burger-menu-open");
  classes.toggle("burger-menu-close");
});



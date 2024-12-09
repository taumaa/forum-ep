import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Récupérez l'élément du menu
const nav = document.getElementById("nav");

// Ajoutez un gestionnaire d'événements pour le défilement
window.addEventListener("scroll", () => {
  if (window.scrollY > 100) { // Si le défilement dépasse 50px
    nav.classList.remove("nav-container"); // Retirer la classe par défaut
    nav.classList.add("nav-fixed"); // Ajouter la classe de défilement
  } else {
    nav.classList.remove("nav-fixed"); // Retirer la classe de défilement
    nav.classList.add("nav-container"); // Ajouter la classe par défaut
  }
});
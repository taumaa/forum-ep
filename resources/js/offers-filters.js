import './bootstrap';
import Alpine from 'alpinejs';

// FILTRES
document.addEventListener('DOMContentLoaded', () => {
    // Sélectionner les éléments de filtre
    const pathSelect = document.getElementById('paths');
    const levelSelect = document.getElementById('levels');
    const monthSelect = document.getElementById('months');
    const searchInput = document.getElementById('offers-search');
    // Fonction de filtrage des offres
    function filterOffres() {
        // Récupérer les valeurs sélectionnées
        const pathValue = pathSelect.value;
        const levelValue = levelSelect.value;
        const monthValue = monthSelect.value;
        const searchValue = searchInput.value.toLowerCase();
        // Sélectionner toutes les offres
        const offers = document.querySelectorAll('.company');
        const offersContainer = document.querySelector('.container');
        // Tableaux pour gérer la priorité
        const prioritizedsearchOffers = [];
        const prioritizedOffers = []; //path & level ok
        const secondprioritizedOffers = []; // path ok
        const otherOffers = []; // level ok
        console.log('coucou')
        // Filtrer chaque offre en fonction des critères
        offers.forEach(offer => {
            console.log('coucou')
            const paths = offer.getAttribute('data-paths').split(',');
            const levels = offer.getAttribute('data-levels').split(',');
            const month = offer.getAttribute('data-month');
            const title = offer.getAttribute('data-title').toLowerCase(); 
            // Vérifier si l'offre correspond aux filtres sélectionnés
            const matchesPath = !pathValue || paths.includes(pathValue);
            const matchesLevel = !levelValue || levels.includes(levelValue);
            const matchesMonth = !monthValue || month.includes(monthValue);
            const matchesSearch = (!searchValue || title.includes(searchValue)) && searchValue.trim() != '';
            
            if (matchesPath || matchesLevel || matchesMonth || matchesSearch) {
                if (matchesSearch){
                    prioritizedsearchOffers.push(offer);
                }else if (matchesPath && matchesLevel){
                    prioritizedOffers.push(offer);
                }else if (matchesPath){
                    secondprioritizedOffers.push(offer);
                }else {
                    otherOffers.push(offer);
                }
                // Afficher d'abord les offres prioritaires, puis les autres
                prioritizedsearchOffers.forEach(offer => {
                    offer.style.display = 'flex';
                    if (offersContainer.contains(offer)) {
                        offersContainer.appendChild(offer);
                    };
                });
                prioritizedOffers.forEach(offer => {
                    offer.style.display = 'flex';
                    if (offersContainer.contains(offer)) {
                        offersContainer.appendChild(offer);
                    };
                });
                secondprioritizedOffers.forEach(offer => {
                    offer.style.display = 'flex';
                    if (offersContainer.contains(offer)) {
                        offersContainer.appendChild(offer);
                    };
                });
                otherOffers.forEach(offer => {
                    offer.style.display = 'flex';
                    if (offersContainer.contains(offer)) {
                        offersContainer.appendChild(offer);
                    };
                });
            } else {
                // Retirer l'offre du DOM si elle ne correspond pas
                offer.style.display = 'none';
                if (!offersContainer.contains(offer)) {
                    offersContainer.removeChild(offer);
            }}
        });
    }

    // Ajouter des écouteurs d'événements aux filtres
    pathSelect.addEventListener('change', filterOffres);
    levelSelect.addEventListener('change', filterOffres);
    monthSelect.addEventListener('change', filterOffres);
    searchInput.addEventListener('input', filterOffres);

    // Initialiser le filtre
    filterOffres();
});




// PERMET DE FIXED LA BARRRE DES FILTRES
window.Alpine = Alpine;
Alpine.start();
// Récupérez l'élément du menu
const filter = document.getElementById("filters-container");
// Ajoutez un gestionnaire d'événements pour le défilement
window.addEventListener("scroll", () => {
    if (window.innerWidth > 1130 ){
        if (window.scrollY > 100) { // Si le défilement dépasse 50px
            filter.classList.remove("filters-container"); // Retirer la classe par défaut
            filter.classList.add("filters-fixed"); // Ajouter la classe de défilement
        } else {
            filter.classList.remove("filters-fixed"); // Retirer la classe de défilement
            filter.classList.add("filters-container"); // Ajouter la classe par défaut
        }
    }else{
        filter.classList.remove("filters-fixed"); 
        filter.classList.add("filters-container");
    }
});



// SCROLL JUSQU'EN HAUT DE LA PAGE QUAND ON FAIT UN NOUVEAU FILTRE
const search = document.getElementById('offers-search');
const paths = document.getElementById('paths');
const levels = document.getElementById('levels');
const months = document.getElementById('months');
const targetDiv = document.getElementById('offers-list');
search.addEventListener('change', () => {
    if (window.scrollY > 100) { // Si le défilement dépasse 50px
        const targetPosition = targetDiv.offsetTop;
        // Faire défiler jusqu'à cette position
        window.scrollTo({ top: targetPosition, behavior: 'smooth' });
    } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
});
paths.addEventListener('change', () => {
    if (window.scrollY > 100) { // Si le défilement dépasse 50px
        const targetPosition = targetDiv.offsetTop;
        // Faire défiler jusqu'à cette position
        window.scrollTo({ top: targetPosition, behavior: 'smooth' });
    } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
});
levels.addEventListener('change', () => {
    if (window.scrollY > 100) { // Si le défilement dépasse 50px
        const targetPosition = targetDiv.offsetTop;
        // Faire défiler jusqu'à cette position
        window.scrollTo({ top: targetPosition, behavior: 'smooth' });
    } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
});
months.addEventListener('change', () => {
    if (window.scrollY > 100) { // Si le défilement dépasse 50px
        const targetPosition = targetDiv.offsetTop;
        // Faire défiler jusqu'à cette position
        window.scrollTo({ top: targetPosition, behavior: 'smooth' });
    } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
});
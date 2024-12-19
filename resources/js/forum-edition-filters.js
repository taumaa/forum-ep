import './bootstrap';
import Alpine from 'alpinejs';


document.addEventListener('DOMContentLoaded', () => {
    // Sélectionner les éléments de filtre
    const pathSelect = document.getElementById('paths');
    const sectorSelect = document.getElementById('sectors');
    const searchInput = document.getElementById('companies-search');

    // Fonction de filtrage des offres
    function filterOffres() {
        // Récupérer les valeurs sélectionnées
        const pathValue = pathSelect.value;
        const sectorValue = sectorSelect.value;
        const searchValue = searchInput.value.toLowerCase();

        // Sélectionner toutes les offres
        const companies = document.querySelectorAll('.company');
        const companiesContainer = document.querySelector('.container');

        // Tableaux pour gérer la priorité
        const prioritizedsearchOffers = [];
        const prioritizedOffers = []; //path & sector ok
        const secondprioritizedOffers = []; // path ok
        const otherOffers = []; //sector ok

        // Filtrer chaque offre en fonction des critères
        companies.forEach(company => {
            const paths = company.getAttribute('data-paths').split(',');
            const sectors = company.getAttribute('data-sectors');
            const title = company.getAttribute('data-name').toLowerCase(); 

            // Vérifier si l'offre correspond aux filtres sélectionnés
            const matchesPath = !pathValue || paths.includes(pathValue);
            const matchesSector = !sectorValue || sectors.includes(sectorValue);
            const matchesSearch = (!searchValue || title.includes(searchValue)) && searchValue.trim() != '';

            // Afficher ou cacher l'offre en fonction du résultat du filtre
            if (matchesPath || matchesSector || matchesSearch) {
                if (matchesSearch){
                    prioritizedsearchOffers.push(company);
                }else if (matchesPath && matchesSector){
                    prioritizedOffers.push(company);
                }else if (matchesPath){
                    secondprioritizedOffers.push(company);
                }else {
                    otherOffers.push(company);
                }
                // Ajouter l'offre au DOM si elle correspond
                // Afficher d'abord les offres prioritaires, puis les autres
                prioritizedsearchOffers.forEach(company => {
                    company.style.display = 'flex';
                    if (companiesContainer.contains(company)) {
                        companiesContainer.appendChild(company);
                    };
                });
                prioritizedOffers.forEach(company => {
                    company.style.display = 'flex';
                    if (companiesContainer.contains(company)) {
                        companiesContainer.appendChild(company);
                    };
                });
                secondprioritizedOffers.forEach(company => {
                    company.style.display = 'flex';
                    if (companiesContainer.contains(company)) {
                        companiesContainer.appendChild(company);
                    };
                });
                otherOffers.forEach(company => {
                    company.style.display = 'flex';
                    if (companiesContainer.contains(company)) {
                        companiesContainer.appendChild(company);
                    };
                });
            } else {
                // Retirer l'offre du DOM si elle ne correspond pas
                company.style.display = 'none';
                if (!companiesContainer.contains(company)) {
                    companiesContainer.removeChild(company);
            }}
        });
    }

    // Ajouter des écouteurs d'événements aux filtres
    pathSelect.addEventListener('change', filterOffres);
    sectorSelect.addEventListener('change', filterOffres);
    searchInput.addEventListener('input', filterOffres);

    // Initialiser le filtre
    filterOffres();
});


window.Alpine = Alpine;
Alpine.start();


// Récupérez l'élément du menu
const filter = document.getElementById("filters-container");

// Ajoutez un gestionnaire d'événements pour le défilement
window.addEventListener("scroll", () => {
    if (window.innerWidth > 1130 ){
        if (window.scrollY > 900) { // Si le défilement dépasse 50px
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
const search = document.getElementById('companies-search');
const paths = document.getElementById('paths');
const sectors = document.getElementById('sectors');
const targetDiv = document.getElementById('companies-list');
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
sectors.addEventListener('change', () => {
    if (window.scrollY > 100) { // Si le défilement dépasse 50px
        const targetPosition = targetDiv.offsetTop;
        // Faire défiler jusqu'à cette position
        window.scrollTo({ top: targetPosition, behavior: 'smooth' });
    } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
});
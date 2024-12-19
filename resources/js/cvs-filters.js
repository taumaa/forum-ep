import './bootstrap';
import Alpine from 'alpinejs';


// FILTRES
document.addEventListener('DOMContentLoaded', () => {
    // Sélectionner les éléments de filtre
    const pathSelect = document.getElementById('paths');
    const levelSelect = document.getElementById('levels');
    const searchInput = document.getElementById('cvs-search');

    // Fonction de filtrage des offres
    function filterOffres() {
        // Récupérer les valeurs sélectionnées
        const pathValue = pathSelect.value.toLowerCase();
        const levelValue = levelSelect.value.toLowerCase();
        const searchValue = searchInput.value.toLowerCase();

        // Sélectionner toutes les offres
        const cvsContainer = document.getElementById('cv-container');
        const cvs = document.querySelectorAll('.cv-block');

        // Tableau contenant les cvs à afficher
        const cvList = [];

        // Filtrer chaque offre en fonction des critères
        cvs.forEach(cv => {
            const paths = cv.getAttribute('data-path').toLowerCase();
            const levels = cv.getAttribute('data-level').toLowerCase();
            const studentName = cv.getAttribute('data-name').toLowerCase(); 

            // Vérifier si l'offre correspond aux filtres sélectionnés
            const matchesPath = !pathValue || paths.includes(pathValue);
            const matchesLevel = !levelValue || levels == levelValue;
            const matchesSearch = !searchValue || studentName.includes(searchValue);
            
            if (matchesPath && matchesLevel && matchesSearch) {
                if (matchesSearch){
                    cvList.push(cv);
                }
                // Afficher d'abord les offres prioritaires, puis les autres
                cvList.forEach(cv => {
                    cv.style.display = 'flex';
                    if (cvsContainer.contains(cv)) {
                        cvsContainer.appendChild(cv);
                    };
                });
            } else {
                // Retirer l'offre du DOM si elle ne correspond pas
                cv.style.display = 'none';
                if (!cvsContainer.contains(cv)) {
                    cvsContainer.removeChild(cv);
            }}
        });
    }

    // Ajouter des écouteurs d'événements aux filtres
    pathSelect.addEventListener('change', filterOffres);
    levelSelect.addEventListener('change', filterOffres);
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
const search = document.getElementById('cvs-search');
const paths = document.getElementById('paths');
const levels = document.getElementById('levels');
const targetDiv = document.getElementById('cvs-list');
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
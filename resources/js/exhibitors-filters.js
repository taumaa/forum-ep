document.addEventListener('DOMContentLoaded', () => {
    // Sélectionner les éléments de filtre
    const filiereSelect = document.getElementById('paths');
    const sectorSelect = document.getElementById('sectors');

    // Fonction de filtrage des offres
    function filterOffres() {
        // Récupérer les valeurs sélectionnées
        const filiereValue = filiereSelect.value;
        const sectorValue = sectorSelect.value;

        // Sélectionner toutes les offres
        const offers = document.querySelectorAll('.company');
        const offersContainer = document.querySelector('.container');

        // Filtrer chaque offre en fonction des critères
        offers.forEach(offer => {
            const paths = offer.getAttribute('data-paths').split(',');
            const sectors = offer.getAttribute('data-sectors');

            // Vérifier si l'offre correspond aux filtres sélectionnés
            const matchesFiliere = !filiereValue || paths.includes(filiereValue);
            const matchesSector = !sectorValue || sectors.includes(sectorValue);

            // Afficher ou cacher l'offre en fonction du résultat du filtre
            console.log('totoooooo');
            if (matchesFiliere || matchesSector) {
                offer.style.display = 'flex';
                // Ajouter l'offre au DOM si elle correspond
                if (offersContainer.contains(offer)) {
                    offersContainer.appendChild(offer);
            }} else {
                // Retirer l'offre du DOM si elle ne correspond pas
                offer.style.display = 'none';
                if (!offersContainer.contains(offer)) {
                    offersContainer.removeChild(offer);
            }}
        });
    }

    // Ajouter des écouteurs d'événements aux filtres
    filiereSelect.addEventListener('change', filterOffres);
    sectorSelect.addEventListener('change', filterOffres);

    // Initialiser le filtre
    filterOffres();
});

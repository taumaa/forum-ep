document.addEventListener('DOMContentLoaded', () => {
    // Sélectionner les éléments de filtre
    const filiereSelect = document.getElementById('paths');
    const niveauSelect = document.getElementById('sectors');

    // Fonction de filtrage des offres
    function filterOffres() {
        // Récupérer les valeurs sélectionnées
        const filiereValue = filiereSelect.value;
        const niveauValue = niveauSelect.value;

        // Sélectionner toutes les offres
        const offers = document.querySelectorAll('.company');

        // Filtrer chaque offre en fonction des critères
        offers.forEach(offer => {
            const paths = offer.getAttribute('data-paths').split(',');
            const levels = offer.getAttribute('data-levels').split(',');

            // Vérifier si l'offre correspond aux filtres sélectionnés
            const matchesFiliere = !filiereValue || paths.includes(filiereValue);
            const matchesNiveau = !niveauValue || levels.includes(niveauValue);

            // Afficher ou cacher l'offre en fonction du résultat du filtre
            if (matchesFiliere || matchesNiveau) {
                offer.style.display = 'flex';
            } else {
                offer.style.display = 'none';
            }
        });
    }

    // Ajouter des écouteurs d'événements aux filtres
    filiereSelect.addEventListener('change', filterOffres);
    niveauSelect.addEventListener('change', filterOffres);

    // Initialiser le filtre
    filterOffres();
});

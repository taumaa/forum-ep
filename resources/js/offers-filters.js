document.addEventListener('DOMContentLoaded', () => {
    // Sélectionner les éléments de filtre
    const pathSelect = document.getElementById('paths');
    const levelSelect = document.getElementById('levels');
    const monthSelect = document.getElementById('months');

    // Fonction de filtrage des offres
    function filterOffres() {
        // Récupérer les valeurs sélectionnées
        const pathValue = pathSelect.value;
        const levelValue = levelSelect.value;
        const monthValue = monthSelect.value;

        // Sélectionner toutes les offres
        const offers = document.querySelectorAll('.offer-container');
        const offersContainer = document.querySelector('.container');

        // Filtrer chaque offre en fonction des critères
        offers.forEach(offer => {
            const paths = offer.getAttribute('data-paths').split(',');
            const levels = offer.getAttribute('data-levels').split(',');
            const month = offer.getAttribute('data-month');

            // Vérifier si l'offre correspond aux filtres sélectionnés
            const matchesPath = !pathValue || paths.includes(pathValue);
            const matchesLevel = !levelValue || levels.includes(levelValue);
            const matchesMonth = !monthValue || month.includes(monthValue);

            // Afficher ou cacher l'offre en fonction du résultat du filtre
            if (matchesPath || matchesLevel || matchesMonth) {
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
    pathSelect.addEventListener('change', filterOffres);
    levelSelect.addEventListener('change', filterOffres);
    monthSelect.addEventListener('change', filterOffres);

    // Initialiser le filtre
    filterOffres();
});


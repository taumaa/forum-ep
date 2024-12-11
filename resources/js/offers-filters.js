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
        const offers = document.querySelectorAll('.offer-container');
        const offersContainer = document.querySelector('.container');

        // Tableaux pour gérer la priorité
        const prioritizedsearchOffers = [];
        const prioritizedOffers = []; //path & level ok
        const secondprioritizedOffers = []; // path ok
        const otherOffers = []; // level ok

        // Filtrer chaque offre en fonction des critères
        offers.forEach(offer => {
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


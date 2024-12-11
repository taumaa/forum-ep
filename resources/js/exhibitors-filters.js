document.addEventListener('DOMContentLoaded', () => {
    // Sélectionner les éléments de filtre
    const pathSelect = document.getElementById('paths');
    const sectorSelect = document.getElementById('sectors');

    // Fonction de filtrage des offres
    function filterOffres() {
        // Récupérer les valeurs sélectionnées
        const pathValue = pathSelect.value;
        const sectorValue = sectorSelect.value;

        // Sélectionner toutes les offres
        const companies = document.querySelectorAll('.company');
        const companiesContainer = document.querySelector('.container');

        // Tableaux pour gérer la priorité
        const prioritizedOffers = []; //path & sector ok
        const secondprioritizedOffers = []; // path ok
        const otherOffers = []; //sector ok

        // Filtrer chaque offre en fonction des critères
        companies.forEach(company => {
            const paths = company.getAttribute('data-paths').split(',');
            const sectors = company.getAttribute('data-sectors');

            // Vérifier si l'offre correspond aux filtres sélectionnés
            const matchesPath = !pathValue || paths.includes(pathValue);
            const matchesSector = !sectorValue || sectors.includes(sectorValue);

            // Afficher ou cacher l'offre en fonction du résultat du filtre
            if (matchesPath || matchesSector) {
                if (matchesPath && matchesSector){
                    prioritizedOffers.push(company);
                } else if (matchesPath){
                    secondprioritizedOffers.push(company);
                } else {
                    otherOffers.push(company);
                }
                // Ajouter l'offre au DOM si elle correspond
                // Afficher d'abord les offres prioritaires, puis les autres
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

    // Initialiser le filtre
    filterOffres();
});

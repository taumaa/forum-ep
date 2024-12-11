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

        // Filtrer chaque offre en fonction des critères
        companies.forEach(company => {
            const paths = company.getAttribute('data-paths').split(',');
            const sectors = company.getAttribute('data-sectors');

            // Vérifier si l'offre correspond aux filtres sélectionnés
            const matchesPath = !pathValue || paths.includes(pathValue);
            const matchesSector = !sectorValue || sectors.includes(sectorValue);

            // Afficher ou cacher l'offre en fonction du résultat du filtre
            console.log('totoooooo');
            if (matchesPath || matchesSector) {
                company.style.display = 'flex';
                // Ajouter l'offre au DOM si elle correspond
                if (companiesContainer.contains(company)) {
                    companiesContainer.appendChild(company);
            }} else {
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

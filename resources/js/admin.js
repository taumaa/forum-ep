function switchTab(tabId) {
    // Cacher tous les contenus
    let allTabs = document.querySelectorAll('.tab-content');
    allTabs.forEach(tab => tab.classList.remove('active'));

    // Retirer la classe active des onglets
    let allTabTitles = document.querySelectorAll('.tab-title');
    allTabTitles.forEach(tab => tab.classList.remove('active'));

    // Afficher le contenu de l'onglet sélectionné
    document.getElementById('content' + tabId.charAt(tabId.length - 1)).classList.add('active');

    // Ajouter la classe active à l'onglet sélectionné
    document.getElementById(tabId).classList.add('active');
}

document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab-title');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            switchTab(tab.id);
        });
    });

    function switchTab(tabId) {
        // Cacher tous les contenus
        let allTabs = document.querySelectorAll('.tab-content');
        allTabs.forEach(tab => tab.classList.remove('active'));

        // Retirer la classe active des onglets
        let allTabTitles = document.querySelectorAll('.tab-title');
        allTabTitles.forEach(tab => tab.classList.remove('active'));

        // Afficher le contenu de l'onglet sélectionné
        document.getElementById('content' + tabId.charAt(tabId.length - 1)).classList.add('active');

        // Ajouter la classe active à l'onglet sélectionné
        document.getElementById(tabId).classList.add('active');
    }

    // Initialisation par défaut
    switchTab('tab0');
});


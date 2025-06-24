// Affichage dynamique selon l'onglet
function showOrders(status) {
  // Réinitialiser les classes de tous les onglets
  document.querySelectorAll(".order-tab").forEach(tab => {
    tab.classList.remove("text-blue-600", "border-b-2", "border-blue-600");
    tab.classList.add("text-gray-500");

    // Appliquer les classes actives à l'onglet correspondant
    if (tab.dataset.status === status) {
      tab.classList.remove("text-gray-500");
      tab.classList.add("text-blue-600", "border-b-2", "border-blue-600");
    }
  });

  // Filtrer les lignes du tableau
  document.querySelectorAll("tbody .order-row").forEach(row => {
    row.classList.remove("hidden");
    if (status !== "all" && !row.classList.contains(status)) {
      row.classList.add("hidden");
    }
  });

  // Fermer tous les tableaux masqués ouverts
  document.querySelectorAll(".details-row").forEach(row => {
    row.classList.add("hidden");
  });
}


// Ouvrir/fermer la ligne de détails au clic
function toggleDetails(row) {
  const next = row.nextElementSibling;
  if (next && next.classList.contains("details-row")) {
    next.classList.toggle("hidden");
  }
}
document.addEventListener("DOMContentLoaded", () => showOrders('all'));
window.showOrders = showOrders;
window.toggleDetails = toggleDetails;
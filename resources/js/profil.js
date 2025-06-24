function showTab(tab) {
  // Stocke le choix dans localStorage
  localStorage.setItem("ongletActif", tab);

  // Masque tous les onglets
  document.getElementById("profil-general").classList.add("hidden");
  document.getElementById("profil-commandes").classList.add("hidden");

  // Affiche l'onglet cliqué
  document.getElementById("profil-" + tab).classList.remove("hidden");

  // Réinitialise les styles des boutons
  document.querySelectorAll(".tab-link").forEach(btn => {
    btn.classList.remove("text-black", "border-b-2", "border-black");
    btn.classList.add("text-gray-500");
  });

  // Active le bon bouton
  const btnToActivate = [...document.querySelectorAll(".tab-link")].find(btn =>
    btn.textContent.toLowerCase().includes(tab === "general" ? "général" : "détails")
  );

  if (btnToActivate) {
    btnToActivate.classList.remove("text-gray-500");
    btnToActivate.classList.add("text-black", "border-b-2", "border-black");
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const onglet = localStorage.getItem("ongletActif") || "general";
  showTab(onglet);
});

// Pour l'appeler depuis le HTML
window.showTab = showTab;

// Optionnel pour filtrer le tableau
function filterStatus(status) {
  document.querySelectorAll(".status-btn").forEach(btn => btn.classList.remove("active-status"));
  event.target.classList.add("active-status");

  const rows = document.querySelectorAll("#orderTable tr");
  rows.forEach(row => {
    const text = row.innerText;
    if (status === "all" || text.includes(status)) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
}
window.filterStatus = filterStatus;

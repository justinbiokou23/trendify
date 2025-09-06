// helpers
function norm(s) {
  return (s || "")
    .toLowerCase()
    .normalize("NFD")
    .replace(/\p{Diacritic}/gu, "") // enlève accents
    .trim();
}

// mappage statuts -> étiquettes "normalisées"
const LABELS = {
  en_attente: "en attente",
  confirme: "confirme",
  traitement: "traitement",
  rembourse: "rembourse",
  expedie: "expedie",
  livre: "livre",
  annule: "annule",
};

document.addEventListener("DOMContentLoaded", () => {
  const DEFAULT = "en_attente";
  const saved = localStorage.getItem("commandeStatutActif") || DEFAULT;

  // clics sur les onglets (évite onclick=... en HTML)
  document.querySelectorAll(".tab-link").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      filterStatus(btn.dataset.status);
    });
  });

  // 1er affichage
  filterStatus(saved);
});

function filterStatus(status) {
  localStorage.setItem("commandeStatutActif", status);

  // UI onglets
  document.querySelectorAll(".tab-link").forEach((tab) => {
    tab.classList.remove("text-blue-600", "border-b-2", "border-blue-600");
    tab.classList.add("text-gray-500");
    if (tab.dataset.status === status) {
      tab.classList.add("text-blue-600", "border-b-2", "border-blue-600");
      tab.classList.remove("text-gray-500");
    }
  });

  const wantedNorm = norm(LABELS[status] || "");

  // Filtrage lignes
  document.querySelectorAll("tbody tr").forEach((row) => {
    // Priorité: <tr data-status="confirme"> si tu peux l’ajouter côté Blade
    let rowStatus = row.dataset.status;

    // Fallback: lit la 5e colonne (span ou pas)
    if (!rowStatus) {
      const cell = row.querySelector("td:nth-child(5) span, td:nth-child(5)");
      rowStatus = cell ? cell.textContent : "";
    }

    const show = norm(rowStatus).includes(wantedNorm);
    row.style.display = show ? "" : "none";
  });
}

// si tu tiens à onclick en HTML:
window.filterStatus = filterStatus;

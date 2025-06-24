
  document.addEventListener("DOMContentLoaded", () => {
    // Par défaut : afficher tous
    filterStatus("en_attente");

    // Réactive l’onglet si l'utilisateur revient
    const savedStatus = localStorage.getItem("commandeStatutActif");
    if (savedStatus) filterStatus(savedStatus);
  });

  function filterStatus(status) {
    // Sauvegarde le statut actif
    localStorage.setItem("commandeStatutActif", status);

    // Met à jour l’UI des onglets
    document.querySelectorAll(".tab-link").forEach(tab => {
      tab.classList.remove("text-blue-600", "border-b-2", "border-blue-600");
      tab.classList.add("text-gray-500");
    });

    const activeTab = [...document.querySelectorAll(".tab-link")].find(tab =>
      tab.textContent.toLowerCase().includes(
        status === "en_attente" ? "en attente" :
        status === "confirme" ? "confirmé" :
        status === "traitement" ? "traitement" :
        status === "rembourse" ? "remboursé" :
        status === "expedie" ? "expédié" :
        status === "livre" ? "livré" :
        status === "annule" ? "annulé" : ""
      )
    );

    if (activeTab) {
      activeTab.classList.add("text-blue-600", "border-b-2", "border-blue-600");
    }

    // Affiche les lignes correspondantes
    document.querySelectorAll("tbody tr").forEach(row => {
      const statutCell = row.querySelector("td:nth-child(5) span");
      if (!statutCell) return; // Ignore les lignes sans statut
      const text = statutCell.textContent.toLowerCase();

      const match =
        (status === "en_attente" && text.includes("en attente")) ||
        (status === "confirme" && text.includes("confirmé")) ||
        (status === "traitement" && text.includes("traitement")) ||
        (status === "rembourse" && text.includes("remboursé")) ||
        (status === "expedie" && text.includes("expédié")) ||
        (status === "livre" && text.includes("livré")) ||
        (status === "annule" && text.includes("annulé"));

      row.style.display = match ? "" : "none";
    });
  }
  window.filterStatus = filterStatus;

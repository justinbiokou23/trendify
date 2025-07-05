// ------------------------
// Onglet général / commandes
// ------------------------
function showTab(tab) {
  // Stocke l'onglet actif dans localStorage
  localStorage.setItem("ongletActif", tab);

  // Onglet cible (par défaut 'general')
  const onglets = ['general', 'commandes'];
  onglets.forEach(name => {
    const section = document.getElementById("profil-" + name);
    if (section) {
      section.classList.add("hidden");
    }
  });
  // Affiche l'onglet choisi
  const activeSection = document.getElementById("profil-" + tab);
  if (activeSection) activeSection.classList.remove("hidden");

  // Réinitialise styles des boutons
  document.querySelectorAll(".tab-link").forEach(btn => {
    btn.classList.remove("text-black", "border-b-2", "border-black");
    btn.classList.add("text-gray-500");
  });

  // Active le bouton qui correspond au tab sélectionné
  document.querySelectorAll(".tab-link").forEach(btn => {
    // On cherche sur 'general' ou 'commandes'
    if ((tab === "general" && btn.textContent.toLowerCase().includes("général"))
      || (tab === "commandes" && btn.textContent.toLowerCase().includes("commandes"))) {
      btn.classList.remove("text-gray-500");
      btn.classList.add("text-black", "border-b-2", "border-black");
    }
  });
}

// Accessible partout
window.showTab = showTab;

document.addEventListener("DOMContentLoaded", () => {
  // Si l'onglet n'existe pas en localStorage, on met 'general'
  let onglet = localStorage.getItem("ongletActif");
  if (!onglet || !['general','commandes'].includes(onglet)) {
    onglet = "general";
    localStorage.setItem("ongletActif", "general");
  }
  showTab(onglet);

  // ------------------------
  // Filtrage statut commandes
  // ------------------------
  window.filterStatus = function(status) {
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
  };

  // ------------------------
  // Preview photo (édition)
  // ------------------------
  const photoInput = document.getElementById('photoInput');
  if (photoInput) {
    photoInput.addEventListener('change', function(e) {
      if (e.target.files && e.target.files[0]) {
        let reader = new FileReader();
        reader.onload = function(ev) {
          document.getElementById('previewImage').src = ev.target.result;
        };
        reader.readAsDataURL(e.target.files[0]);
      }
    });
  }
});

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import './main.js';
import './profil.js';
import './commandes.js';
import './dashboard.js';
import './details_produit.js';
import './orders-script.js';
import './paiement.js';
import './adresse.js';
// etc.

/* ==== STABILISEUR ONGLET PRODUITS (à coller tout EN BAS du fichier) ==== */

// 1) forcer le type button pour éviter tout submit involontaire (sans changer l'HTML)
document.querySelectorAll(".tab-link").forEach(b => { try { b.type = "button"; } catch(_){} });

// 2) version canonique de showTab qui garde ta structure et tes classes
(function () {
  const tabNames = ["materiel", "ordinateurs", "smartphones"];

  function applyActiveStyles(btn) {
    if (!btn) return;
    btn.classList.add("text-primary", "border-b-2", "border-primary", "pb-1", "active-tab");
    btn.classList.remove("text-gray-600");
  }
  function resetTabs() {
    document.querySelectorAll(".tab-content").forEach(t => t.classList.add("hidden"));
    document.querySelectorAll(".tab-link").forEach(l => {
      l.classList.remove("text-primary","border-b-2","border-primary","pb-1","active-tab");
      l.classList.add("text-gray-600");
    });
  }

  function stableShowTab(tabName, evt) {
    // empêcher un submit si jamais le bouton est dans un <form>
    if (evt && typeof evt.preventDefault === "function") evt.preventDefault();

    resetTabs();

    const wrapper = document.getElementById(`tab-${tabName}`);
    if (wrapper) wrapper.classList.remove("hidden");

    // préférer le bouton passé par event, sinon retrouve-le via ton onclick existant
    let btn = evt?.target || document.querySelector(`.tab-link[onclick*="${tabName}"]`);
    applyActiveStyles(btn);

    localStorage.setItem("produitsTabActif", tabName);
    return false;
  }

  // 3) exposer (et ECRASER d'éventuelles anciennes définitions)
  window.showTab = stableShowTab;

  // 4) flèches → réutilisent ta structure sans la changer
  let currentTabIndex = 0;
  function setIndexFrom(name){ const i = tabNames.indexOf(name); if(i>=0) currentTabIndex = i; }
  window.nextTab = function() {
    currentTabIndex = (currentTabIndex + 1) % tabNames.length;
    const name = tabNames[currentTabIndex];
    const btn = document.querySelector(`.tab-link[onclick*="${name}"]`);
    stableShowTab(name, { target: btn, preventDefault(){/*noop*/} });
  };
  window.prevTab = function() {
    currentTabIndex = (currentTabIndex - 1 + tabNames.length) % tabNames.length;
    const name = tabNames[currentTabIndex];
    const btn = document.querySelector(`.tab-link[onclick*="${name}"]`);
    stableShowTab(name, { target: btn, preventDefault(){/*noop*/} });
  };

  // 5) init au chargement : onglet sauvegardé ou "materiel"
  document.addEventListener("DOMContentLoaded", () => {
    const saved = localStorage.getItem("produitsTabActif") || "materiel";
    setIndexFrom(saved);
    stableShowTab(saved);
  });

  // 6) sécurité : si un autre script réécrit window.showTab après coup, on le remet
  setTimeout(() => { window.showTab = stableShowTab; }, 0);
})();


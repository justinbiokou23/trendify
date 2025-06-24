// 🔍 Recherche dynamique
function handleSearch(value) {
  const results = document.getElementById("searchResults");
  results.classList.toggle("hidden", value.trim() === "");
}

// 🛒 Panier
function toggleCart() {
  document.getElementById("cartDropdown").classList.toggle("hidden");
  document.getElementById("profileDropdown").classList.add("hidden");
}

// 👤 Profil
function toggleProfile() {
  document.getElementById("profileDropdown").classList.toggle("hidden");
  document.getElementById("cartDropdown").classList.add("hidden");
}

// 📱 Menu mobile
function toggleMobileMenu() {
  document.getElementById("mobileMenu").classList.toggle("hidden");
}

// 🚫 Fermer les dropdowns si clic en dehors
window.addEventListener("click", function (e) {
  if (
    !e.target.closest("button") &&
    !e.target.closest("input") &&
    !e.target.closest("#cartDropdown") &&
    !e.target.closest("#profileDropdown") &&
    !e.target.closest("#searchResults")
  ) {
    document.getElementById("cartDropdown").classList.add("hidden");
    document.getElementById("profileDropdown").classList.add("hidden");
    document.getElementById("searchResults").classList.add("hidden");
  }
});


// 🔁 Toggle individuel
document.querySelectorAll('[data-toggle="section"]').forEach(toggle => {
  toggle.addEventListener('click', () => {
    const section = toggle.closest('[data-section]');
    const content = section.querySelector('[data-content]');
    const arrow = section.querySelector('.arrow');

    content.classList.toggle('hidden');
    arrow.classList.toggle('rotate-180');
  });
});

// 🔁 Toggle global
document.getElementById("toggle-all-filters")?.addEventListener("click", () => {
  document.querySelectorAll('[data-section]').forEach(section => {
    const content = section.querySelector('[data-content]');
    const arrow = section.querySelector('.arrow');

    const isHidden = content.classList.contains('hidden');
    content.classList.toggle('hidden');
    arrow.classList.toggle('rotate-180', isHidden);
  });
});

// 🎯 Slider de prix
const minThumb = document.getElementById("minThumb");
const maxThumb = document.getElementById("maxThumb");
const rangeTrack = document.getElementById("rangeTrack");
const minLabel = document.getElementById("minPrice");
const maxLabel = document.getElementById("maxPrice");

let isDraggingMin = false;
let isDraggingMax = false;

minThumb?.addEventListener("mousedown", () => isDraggingMin = true);
maxThumb?.addEventListener("mousedown", () => isDraggingMax = true);
document.addEventListener("mouseup", () => {
  isDraggingMin = false;
  isDraggingMax = false;
});

document.addEventListener("mousemove", (e) => {
  const track = rangeTrack?.parentElement;
  if (!track) return;
  const rect = track.getBoundingClientRect();
  const minX = rect.left;
  const totalWidth = rect.width;
  const posX = e.clientX;

  const percent = Math.max(0, Math.min(100, ((posX - minX) / totalWidth) * 100));

  if (isDraggingMin && percent < parseFloat(maxThumb.style.left)) {
    minThumb.style.left = `${percent}%`;
    rangeTrack.style.left = `${percent}%`;
    updatePrices();
  }

  if (isDraggingMax && percent > parseFloat(minThumb.style.left)) {
    maxThumb.style.left = `${percent}%`;
    rangeTrack.style.right = `${100 - percent}%`;
    updatePrices();
  }
});

function updatePrices() {
  const min = Math.round(mapRange(parseFloat(minThumb.style.left || "25"), 0, 100, 50000, 200000));
  const max = Math.round(mapRange(parseFloat(maxThumb.style.left || "75"), 0, 100, 50000, 200000));
  minLabel.textContent = `XOF ${min.toLocaleString('fr-FR')}`;
  maxLabel.textContent = `XOF ${max.toLocaleString('fr-FR')}`;
}

function mapRange(value, inMin, inMax, outMin, outMax) {
  return outMin + ((value - inMin) * (outMax - outMin)) / (inMax - inMin);
}

// ✅ Scroll Nouveaux Arrivages
function scrollNewArrivals(direction) {
  const slider = document.getElementById("newArrivalsSlider");
  const scrollAmount = 300;
  if (direction === "left") {
    slider.scrollLeft -= scrollAmount;
  } else if (direction === "right") {
    slider.scrollLeft += scrollAmount;
  }
}

// ✅ Onglets "Nos Produits"
function showTab(tabName, event = null) {
  const tabs = document.querySelectorAll(".tab-content");
  const links = document.querySelectorAll(".tab-link");
  tabs.forEach(tab => tab.classList.add("hidden"));
  links.forEach(link => {
    link.classList.remove("text-primary", "border-b-2", "border-primary", "pb-1", "active-tab");
  });
  document.getElementById(`tab-${tabName}`)?.classList.remove("hidden");
  if (event?.target) {
    event.target.classList.add("text-primary", "border-b-2", "border-primary", "pb-1", "active-tab");
  }
}

let currentTabIndex = 0;
const tabNames = ["maison", "cuisine", "quotidien"];

function nextTab() {
  currentTabIndex = (currentTabIndex + 1) % tabNames.length;
  const tab = tabNames[currentTabIndex];
  const button = document.querySelector(`.tab-link[onclick*="${tab}"]`);
  showTab(tab, { target: button });
}

function prevTab() {
  currentTabIndex = (currentTabIndex - 1 + tabNames.length) % tabNames.length;
  const tab = tabNames[currentTabIndex];
  const button = document.querySelector(`.tab-link[onclick*="${tab}"]`);
  showTab(tab, { target: button });
}


window.handleSearch = handleSearch;
window.toggleCart = toggleCart;
window.toggleProfile = toggleProfile;
window.toggleMobileMenu = toggleMobileMenu;
window.scrollNewArrivals = scrollNewArrivals;
window.showTab = showTab;
window.nextTab = nextTab;
window.prevTab = prevTab;

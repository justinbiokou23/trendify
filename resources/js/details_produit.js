const images = [
  "assets/image/image_nos_produit/details_p.png",
  "assets/image/image_nos_produit/details_p1.png",
  "assets/image/image_nos_produit/details_p2.png",
  "assets/image/image_nos_produit/details_p3.png"
];

let currentImageIndex = 0;

function updateImageDisplay() {
  const main = document.getElementById("mainImage");
  const indexLabel = document.getElementById("imageIndex");

  if (!main || !indexLabel) return;

  main.src = images[currentImageIndex];
  indexLabel.textContent = String(currentImageIndex + 1).padStart(2, '0');

  // Mettre à jour les bordures des miniatures
  const thumbnails = document.querySelectorAll(".thumbnail");
  thumbnails.forEach((thumb, i) => {
    thumb.classList.toggle("border-primary", i === currentImageIndex);
    thumb.classList.toggle("border", i !== currentImageIndex);
  });
}

function changeImage(index) {
  currentImageIndex = index;
  updateImageDisplay();
}

function prevImage() {
  currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
  updateImageDisplay();
}

function nextImage() {
  currentImageIndex = (currentImageIndex + 1) % images.length;
  updateImageDisplay();
}

function updateQty(amount) {
  const input = document.getElementById("quantity");
  let value = parseInt(input.value) || 1;
  value = Math.max(1, value + amount);
  input.value = value;
}

document.addEventListener("DOMContentLoaded", () => {
  updateImageDisplay();
});


function showTabSection(tab, event) {
  const sections = document.querySelectorAll('.tab-section');
  const buttons = document.querySelectorAll('.tab-btn');

  // Masquer toutes les sections
  sections.forEach(section => section.classList.add('hidden'));

  // Réinitialiser les styles de tous les boutons
  buttons.forEach(button => {
    button.classList.remove('text-black', 'font-semibold', 'border-b-2', 'border-black', 'active-tab');
    button.classList.add('text-gray-500');
  });

  // Activer uniquement le bouton cliqué (utiliser currentTarget !)
  const clickedButton = event.currentTarget;
  clickedButton.classList.remove('text-gray-500');
  clickedButton.classList.add('text-black', 'font-semibold', 'border-b-2', 'border-black', 'active-tab');

  // Afficher le bon contenu
  document.getElementById(`tab-${tab}`).classList.remove('hidden');
}

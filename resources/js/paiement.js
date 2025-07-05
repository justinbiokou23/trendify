// Active visuellement l'étape "Paiement"
function activateStep(stepName) {
  document.querySelectorAll('#checkout-steps .step').forEach(step => {
    step.classList.remove('active-step');
    if (step.dataset.step === stepName) {
      step.classList.add('active-step');
    }
  });
}
activateStep('payment');

// Dynamise la sélection de méthode de paiement
const paymentRadios = document.querySelectorAll('input[name="paiement"]');
paymentRadios.forEach(radio => {
  radio.addEventListener('change', () => {
    paymentRadios.forEach(el => el.closest('label').classList.remove('ring-2', 'ring-green_p'));
    radio.closest('label').classList.add('ring-2', 'ring-green_p');
  });
});

// Affiche le modal de paiement réussi
function showPaymentSuccessModal() {
  document.getElementById('paymentSuccessModal').classList.remove('hidden');
}
// Ferme le modal
function closePaymentModal() {
  document.getElementById('paymentSuccessModal').classList.add('hidden');
}

// Pour utiliser dans le HTML
window.showPaymentSuccessModal = showPaymentSuccessModal;
window.closePaymentModal = closePaymentModal;

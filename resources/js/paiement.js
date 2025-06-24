
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
      document.querySelectorAll('label[for]').forEach(label => label.classList.remove('ring-2', 'ring-green_p'));
      paymentRadios.forEach(el => el.closest('label').classList.remove('ring-2', 'ring-green_p'));
      radio.closest('label').classList.add('ring-2', 'ring-green_p');
    });
  });

   function showPaymentSuccessModal() {
    document.getElementById('paymentSuccessModal').classList.remove('hidden');
  }

  function closePaymentModal() {
    document.getElementById('paymentSuccessModal').classList.add('hidden');
  }

  // Appelle cette fonction après un paiement réussi
  // Exemple : showPaymentSuccessModal();

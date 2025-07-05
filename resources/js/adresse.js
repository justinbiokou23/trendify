document.addEventListener("DOMContentLoaded", () => {
  // Sélectionne l’adresse radio
  const addressOptions = document.querySelectorAll('.address-option input[type="radio"]');
  addressOptions.forEach(input => {
    input.addEventListener('change', () => {
      addressOptions.forEach(el => el.closest('.address-option').classList.remove('ring-2', 'ring-primary'));
      input.closest('.address-option').classList.add('ring-2', 'ring-primary');
    });
  });

  // Active l’étape visuelle
  function activateStep(stepName) {
    document.querySelectorAll('#checkout-steps .step').forEach(step => {
      step.classList.remove('active-step');
      if (step.dataset.step === stepName) {
        step.classList.add('active-step');
      }
    });
  }
  window.activateStep = activateStep;
  activateStep('address');
});
  // Assure que la fonction existe
  function activateStep(stepName) {
    document.querySelectorAll('#checkout-steps .step').forEach(step => {
      step.classList.remove('active-step');
      if (step.dataset.step === stepName) {
        step.classList.add('active-step');
      }
    });
  }
   window.activateStep = activateStep;

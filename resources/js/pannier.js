function updateQty(button, delta) {
  const container = button.parentElement;
  const span = container.querySelector('span');
  let qty = parseInt(span.textContent);
  qty = Math.max(1, qty + delta);
  span.textContent = qty;
}
window.updateQty = updateQty;

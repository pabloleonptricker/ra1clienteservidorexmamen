document.addEventListener('DOMContentLoaded', () => {
  const contenedor = document.getElementById('carrito');
  const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

  if (carrito.length === 0) {
    contenedor.innerHTML = '<div class="alert alert-info text-center">No hay productos en el carrito.</div>';
  } else {
    let total = 0;
    let cantidadProductos = 0;
    carrito.forEach(() => cantidadProductos++);
    document.getElementById('carritoParentesis').textContent = `Carrito (${cantidadProductos})`;
    carrito.forEach(p => {
      total += p.precio;
      contenedor.innerHTML += `
        <div class="card mb-3 p-3 shadow-sm">
          <h5>${p.nombre}</h5>
          <p>${p.precio.toFixed(2)} €</p>
        </div>
      `;
    });

    contenedor.innerHTML += `
      <div class="alert alert-success fw-bold text-center">
        Total: ${total.toFixed(2)} €
      </div>
    `;
  }

  document.getElementById('vaciar').addEventListener('click', () => {
    localStorage.removeItem('carrito');
    window.location.reload();
  });
});

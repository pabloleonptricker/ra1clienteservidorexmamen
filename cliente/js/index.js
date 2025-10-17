document.addEventListener('DOMContentLoaded', async () => {
  const contenedor = document.getElementById('contenedor-productos');
  const productos = await obtenerProductos();
  
    let contador = 0;   
  productos.forEach(p => {
    if(contador >=3) return;
    const card = document.createElement('div');
    card.className = "col-md-4";
    card.innerHTML = `
      <div class="card h-100 shadow-sm" style="background-color: #f8f9fa; border: 2px solid #007bff;">
        <div class="card-body text-center">
          <h5 class="card-title" style="color: #c0392b; font-size: 1.5rem;">${p.nombre}</h5>
          <p class="card-text" style="font-style: italic;">${p.descripcion}</p>
          <p class="fw-bold">${p.precio.toFixed(2)} €</p>
          <a href="producto.html?id=${p.id}" class="btn btn-primary">Ver detalle</a>
          <img src="${p.img}" class="img-fluid mt-3" alt="${p.nombre}">
          <p class="card-text" style="font-style: italic;">${p.categoria}</p>
        </div>
      </div>
    `;
    contenedor.appendChild(card);
    contador++;
  });
});

    
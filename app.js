console.log('correcto');
let datos;

document.querySelector('#boton').addEventListener('click', function () {
    const filtro = document.getElementById('filtro').value;
    buscarProductos(filtro);
});

traerDatos();

function traerDatos() {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'productos.json', true);

    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            datos = JSON.parse(this.responseText);
            mostrarProductos(datos);
        }
    };
}

function mostrarProductos(productos) {
    let res = document.querySelector('#res');
    res.innerHTML = '';

    for (let item of productos) {
        res.innerHTML += `
            <div class="col-md-4 text-center producto">
                <div class="card" style="margin: 10px;">
                    <h3 class="text-center text-primary text-dark">
                        ${item.nombre}
                    </h3>
                    <a href="${item.link}">
                        <img class="text-center" src="${item.foto}" alt=""
                            style="height:150px; width: auto; position: relative; margin: auto;">
                    </a>
                    <h5 class="text-center text-dark">
                        ${item.marca}
                    </h5>
                    <h5 class="text-center text-dark">
                        ${item.descripcion}
                    </h5>
                    <h4 class="text-left text-dark">
                        ${item.precio}
                    </h4>
                    <a href="${item.link}" type="button" class="btn btn-success">
                        Ver Más
                    </a>
                </div>
            </div>
        `;
    }
}

function buscarProductos(filtro) {
    const productosFiltrados = datos.filter(item =>
        item.nombre.toLowerCase().includes(filtro.toLowerCase()) ||
        item.categoria.toLowerCase().includes(filtro.toLowerCase())
    );
    mostrarProductos(productosFiltrados);
}

    function ordenarProductos() {
        const selector = document.getElementById('ordenar');
        const orden = selector.value;
        let productosOrdenados;

        if (orden === 'precioAlto') {
            productosOrdenados = datos.slice().sort((a, b) => b.precio - a.precio);
        } else if (orden === 'precioBajo') {
            productosOrdenados = datos.slice().sort((a, b) => a.precio - b.precio);
        } else {
            productosOrdenados = datos.slice();
        }

        mostrarProductos(productosOrdenados);
    }

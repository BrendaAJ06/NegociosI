console.log('correcto');
let datos;

document.querySelector('#buscar').addEventListener('click', function () {
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
                    <a href="#">
                        <img src="${item.imagen}" class="img-fluid">
                    </a>
                    <h5 class="text-center text-primary text-dark">$ ${item.precio}</h5>
                    <p class="text-primary text-dark">${item.descripcion}</p>
                </div>
            </div>
        `;
    }
}

function ordenarProductos() {
    const select = document.getElementById('ordenar');
    const valorSeleccionado = select.options[select.selectedIndex].value;

    if (valorSeleccionado == 'ascendente') {
        datos.sort(function (a, b) {
            return parseFloat(a.precio) - parseFloat(b.precio);
        });
    } else if (valorSeleccionado == 'descendente') {
        datos.sort(function (a, b) {
            return parseFloat(b.precio) - parseFloat(a.precio);
        });
    }

    mostrarProductos(datos);
}

function buscarProductos(filtro) {
    const productosFiltrados = datos.filter(function (item) {
        return (
            item.nombre.toLowerCase().includes(filtro.toLowerCase()) ||
            item.categoria.toLowerCase().includes(filtro.toLowerCase())
        );
    });

    mostrarProductos(productosFiltrados);
}

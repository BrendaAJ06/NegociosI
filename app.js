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

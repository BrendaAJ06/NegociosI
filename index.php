
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CRUD PRODUCTOS</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="admin-style.css">
</head>

<body>
<nav>
    <ul>
      <li><a href="paneldecontrol.html">Inicio</a></li>
      <li><a href="index.php">Productos</a></li>
    </ul>
  </nav>

    <div class="container">
        <h1 class="page-header text-center">CRUD (Create Read Update and Delete) DE PRODUCTOS</h1>
        <div class="row">
            <div class="col-12">
                <a href="add.php" class="btn btn-primary">Add</a>
                <table class="table table-bordered table-striped" style="margin-top:20px;">
                    <thead>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Link</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        //fetch data from json
                        $data = file_get_contents('productos.json');
                        //decode into php array
                        $data = json_decode($data);

                        $index = 0;
                        foreach ($data as $row) {
                            echo "
                                <tr>
                                    <td>" . $row->id . "</td>
                                    <td>" . $row->foto . "</td>
                                    <td>" . $row->nombre . "</td>
                                    <td>" . $row->marca . "</td>
                                    <td>" . $row->categoria . "</td>
                                    <td>" . $row->descripcion . "</td>
                                    <td>" . $row->precio . "</td>
                                    <td>" . $row->link . "</td>
                                    <td>
                                        <a href='edit.php?index=" . $index . "' class='btn btn-success btn-sm'>Edit</a>
                                        <a href='delete.php?index=" . $index . "' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>
                            ";

                            $index++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
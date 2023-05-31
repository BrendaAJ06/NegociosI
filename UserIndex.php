
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PHP JSON File CRUD (Create Read Update and Delete)</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="admin-style.css">  
</head>

<body>
<nav>
    <ul>
      <li><a href="">Inicio</a></li>
      <li><a href="UserIndex.php">Usuarios</a></li>
      <li><a href="index.php">Productos</a></li>
    </ul>
  </nav>
    <div class="container">
        <h1 class="page-header text-center">PHP JSON File CRUD (Create Read Update and Delete)</h1>
        <div class="row">
            <div class="col-12">
                <a href="UserAdd.php" class="btn btn-primary">Add</a>
                <table class="table table-bordered table-striped" style="margin-top:20px;">
                    <thead>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>E-Mail</th>
                        <th>Contraseña</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        //fetch data from json
                        $data = file_get_contents('User.json');
                        //decode into php array
                        $data = json_decode($data);

                        $index = 0;
                        foreach ($data as $row) {
                            echo "
                                <tr>
                                    <td>" . $row->id . "</td>
                                    <td>" . $row->nombres . "</td>
                                    <td>" . $row->apellidos . "</td>
                                    <td>" . $row->email . "</td>
                                    <td>" . $row->contrasena . "</td>
                                    <td>
                                        <a href='UserEdit.php?index=" . $index . "' class='btn btn-success btn-sm'>Edit</a>
                                        <a href='UserDelete.php?index=" . $index . "' class='btn btn-danger btn-sm'>Delete</a>
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
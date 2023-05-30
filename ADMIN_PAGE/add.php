
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP JSON File CRUD (Create Read Update and Delete)</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">PHP JSON File CRUD (Create Read Update and Delete)</h1>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8"><a href="index.php">Back</a>
        <form method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Producto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="producto" name="producto">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Marca</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="marca" name="marca">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Categoria</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="categoria" name="categoria">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="precio" name="precio">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="descripcion" name="descripcion">
                </div>
            </div>    
 
            <input type="submit" name="save" value="Save" class="btn btn-primary">
        </form>
        </div>
        <div class="col-5"></div>
    </div>
</div>    
<?php
    if(isset($_POST['save'])){
        //open the json file
        $data = file_get_contents('products.json');
        $data = json_decode($data);
 
        //data in out POST
        $input = array(
            'id' => $_POST['id'],
            'producto' => $_POST['producto'],
            'marca' => $_POST['marca'],
            'categoria' => $_POST['categoria'],
            'precio' => $_POST['precio'],
            'descripcion' => $_POST['descripcion']
        );
 
        //append the input to our array
        $data[] = $input;
        //encode back to json
        $data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('products.json', $data);
 
        header('location: index.php');
    }
?>
</body>
</html>
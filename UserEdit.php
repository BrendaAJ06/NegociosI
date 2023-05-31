
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP JSON File CRUD (Create Read Update and Delete)</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php
    //get id from URL
    $index = $_GET['index'];
 
    //get json data
    $data = file_get_contents('User.json');
    $data_array = json_decode($data);
 
    //assign the data to selected index
    $row = $data_array[$index];
 
    if(isset($_POST['save'])){
        $input = array(
            'id' => $_POST['id'],
            'nombres' => $_POST['nombres'],
            'apellidos' => $_POST['apellidos'],
            'email' => $_POST['email'],
            'contrasena' => $_POST['contrasena']
        );
 
        //update the selected index
        $data_array[$index] = $input;
 
        //encode back to json
        $data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents('User.json', $data);
 
        header('location: UserIndex.php');
    }
?>
<div class="container">
    <h1 class="page-header text-center">PHP JSON File CRUD (Create Read Update and Delete)</h1>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8"><a href="UserIndex.php">Back</a>
        <form method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $row->id; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nombres</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $row->nombres; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Apellidos</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $row->apellidos; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $row->email; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Contrasena</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="contrasena" name="contrasena" value="<?php echo $row->contrasena; ?>">
                </div>
            </div>
            <input type="submit" name="save" value="Save" class="btn btn-primary">
        </form>
        </div>
        <div class="col-5"></div>
    </div>
</div>    
</body>
</html>
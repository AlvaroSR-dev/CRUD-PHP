<?php
    include 'connect.php';
    $id=$_GET['updateid'];
    $sql="SELECT * FROM usuarios WHERE id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $nombre=$row['nombre'];
    $apellido1 =$row['apellido1'];
    $apellido2 =$row['apellido2'];
    $edad =$row['edad'];

    if(isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $edad = $_POST['edad'];

        $sql = "UPDATE usuarios SET id='$id', nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2', edad='$edad' WHERE id=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            header('location:index.php');
        }
    }
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD</title>
    <link rel="icon" type="image/x-icon" href="icon.png" sizes="64x64">
</head>

<body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="font-size: 40px"><img src="icon.png" alt="ICON" width="80"> CRUD</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">

            <!-- Formulario -->

            <div class="col-md-3 mx-auto">
                <h2>Modificar usuario</h2>
                <hr/>
                <form action="" method="POST">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control mb-3" value=<?php echo $nombre ?>>
                    <label for="apellido1" class="form-label">Apellidos</label>
                    <input type="text" name="apellido1" id="apellido1" placeholder="Primero" class="form-control mb-3" value=<?php echo $apellido1 ?>>
                    <input type="text" name="apellido2" id="apellido2" placeholder="Segundo" class="form-control mb-3" value=<?php echo $apellido2 ?>>
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" name="edad" id="edad" placeholder="Edad" class="form-control mb-3" value=<?php echo $edad ?>>
                    <input type="submit" name="enviar" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>
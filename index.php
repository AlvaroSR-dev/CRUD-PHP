<?php
    include 'connect.php';

    if(isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $edad = $_POST['edad'];

        $sql = "INSERT INTO usuarios (nombre,apellido1,apellido2,edad) values('$nombre','$apellido1','$apellido2','$edad')";
        $result=mysqli_query($con,$sql);
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
            <a class="navbar-brand" href="#" style="font-size: 40px"><img src="icon.png" alt="ICON" width="80"> CRUD</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">

            <!-- Formulario -->

            <div class="col-md-3">
                <h2>Agregar usuario</h2>
                <hr/>
                <form action="" method="POST" autocomplete="off">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control mb-3">
                    <label for="apellido1" class="form-label">Apellidos</label>
                    <input type="text" name="apellido1" id="apellido1" placeholder="Primero" class="form-control mb-3">
                    <input type="text" name="apellido2" id="apellido2" placeholder="Segundo" class="form-control mb-3">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" name="edad" id="edad" placeholder="Edad" class="form-control mb-3">
                    <input type="submit" name="enviar" class="btn btn-primary">
                </form>
            </div>

            <!-- BBDD -->

            <div class="col-md-8">
                <h2>Usuarios</h2>
                <hr/>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th colspan="2">Apellidos</th>
                            <th>Edad</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Tabla -->

                        <?php
                            $sql="SELECT * FROM usuarios";
                            $result=mysqli_query($con,$sql);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    $nombre=$row['nombre'];
                                    $apellido1=$row['apellido1'];
                                    $apellido2=$row['apellido2'];
                                    $edad=$row['edad'];

                                    echo ' 
                                        <tr>
                                            <th scope="row">'.$id.'</th>
                                            <td>'.$nombre.'</td>
                                            <td>'.$apellido1.'</td>
                                            <td>'.$apellido2.'</td>
                                            <td>'.$edad.'</td>
                                            <td>
                                                <button class="btn btn-info"><a href="modificar.php?updateid='.$id.'" class="text-light" style="text-decoration: none">Modifcar</a></button>
                                                <button class="btn btn-danger"><a href="eliminar.php?deleteid='.$id.'" class="text-light" style="text-decoration: none">Eliminar</a></button>
                                            </td>
                                        </tr>
                                    ';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>
<?php
$server = "localhost";
$user = "root";
$pass= "";
$bd= "persona";

$conex= mysqli_connect($server, $user, $pass, $bd);

if(!$conex){
    echo"Error";
}else{
    echo"conexion a base de datos establecida";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Usuario</title>
    
</head>
<body>
    
    <form action="" class="form form group p-4" method= "POST">
        <h1>Persona</h1><br>
        <input type="number" placeholder="Cedula" name="cedula" class=" form-control"><br>
        <input type="text" placeholder="Nombre" name="nombre" class=" form-control"><br>   
        <input type="text"placeholder="apellido"  name="apellido" class=" form-control"><br>
        <input type="number" placeholder="Telefono" name="telefono" class=" form-control"><br>
        <input type="number"placeholder="horas"  name="horas" class=" form-control"><br>
        <input type="number"placeholder="valor hora" name="valor-hora" class=" form-control"><br>
        <br><br>
        <input type="submit" name="btnGuardar" class="btn btn-success btn-block" value="Guardar">
              
    </form>

    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Horas</th>
                    <th>Valor horas</th>
                    <th>Acciones</th>

                </tr>
            </thead>

            <tbody>
                <?php
                $query = "SELECT * FROM usuario";
                $resultado= mysqli_query($conex, $query);
                while($row= mysqli_fetch_array($resultado)){?> 
                  <tr>
                    <td><?php echo $row['Cedula']?> </td>
                    <td><?php echo $row['Nombre']?> </td>
                    <td><?php echo $row['Apellido']?> </td>
                    <td><?php echo $row['Telefono']?> </td>
                    <td><?php echo $row['Horas']?> </td>
                    <td><?php echo $row['ValorHoras']?> </td>
                    <td>
                    <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                       Editar
                    </a>
                    <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                        Eliminar
                    </a>
                    </td>
                    
                  </tr>
                    <?php } ?>     
                
                
            </tbody>

        </table> 

    </div>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>

<?php

if(isset($_POST['btnGuardar'])){

    $cedula= $_POST[('cedula')];
    $Nombre= $_POST[('nombre')]; 
    $Apellido= $_POST[('apellido')];
    $Telefono= $_POST[('telefono')];
    $Horas= $_POST[('horas')];
    $Valor_hora= $_POST[('valor-hora')];

    $insert_bd= "INSERT INTO usuario(Cedula, Nombre,Apellido,Telefono,Horas,ValorHoras) VALUES ('$cedula','$Nombre','$Apellido','$Telefono','$Horas','$Valor_hora')"; 
    
    $enviar = mysqli_query($conex, $insert_bd);
     
    if(!$enviar){

        echo"fallo al cargar los datos";
    }
} 
?>
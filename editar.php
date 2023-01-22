<?php
include("index.php");
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $query= "SELECT * FROM usuario WHERE id= $id";
    $resultado= mysqli_query($conex, $query);
    // para comprobar cuantas filas tiene la variable resultado
    if(mysqli_num_rows($resultado)==1){ 
        // el mysqli_fetch_array devuelve un array de cadenas que se corresponde con la fila obtenida o null si no hay más filas en el conjunto de resultados
        $row= mysqli_fetch_array($resultado);
        $cedula= $row['Cedula'];
        $nombre= $row['Nombre'];
        $apellido= $row['Apellido'];
        $telefono= $row['Telefono'];
        $horas= $row['Horas'];
        $valorHoras= $row['ValorHoras'];
    }


}

if(isset($_POST['update'])){
    $id=$_GET['id'];
    $cedula=$_POST['Cedula'];
    $nombre=$_POST['Nombre'];
    $apellido=$_POST['Apellido'];
    $telefono=$_POST['Telefono'];
    $horas =$_POST['Horas'];
    $valorHoras= $_POST['ValorHoras'];

    $query= "UPDATE usuario set Cedula= '$cedula', Nombre = '$nombre', Apellido = '$apellido', Telefono = '$telefono', Horas = '$horas', ValorHoras = '$valorHoras' WHERE id= '$id'";
    $resultado= mysqli_query($conex, $query);

    // header("location: index.php");

}
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group"> 
                        <input type="text" name="Cedula" value="<?php  echo $cedula; ?>" placeholder="actualiza la cedula">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Nombre" value="<?php  echo $nombre; ?>" placeholder="actualiza nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Apellido" value="<?php  echo $apellido; ?>" placeholder="actualiza apellido">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Telefono" value="<?php  echo $telefono; ?>" placeholder="actualiza telefono">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Horas" value="<?php  echo $horas; ?>" placeholder="actualiza horas">
                    </div>
                    <div class="form-group">
                        <input type="text" name="ValorHoras" value="<?php  echo $valorHoras; ?>" placeholder="actualiza valor de horas">
                    </div>
                    <button class="btn btn-success" name="update">Actualizar</button>
                </form>
            </div>

        </div>
    </div>

</div>
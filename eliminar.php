<?php
include("index.php");
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $query= "DELETE FROM usuario WHERE id= $id";
    $resultado= mysqli_query($conex, $query);
    if(!$resultado){
        die("Query failed");
    }
    
    header("Location: index.php");


}
?>
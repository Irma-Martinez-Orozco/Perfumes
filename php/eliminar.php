<?php
include("conexion.php");
$id=$_GET["id"];
$query="delete From perfume where id=$id";
$resultado=mysqli_query($cnn,$query);
if ($resultado)
{
    $msg="Se elimino el Camionero";
}
else
 {
     $msg="No se pudo eliminar";
}
header("Location: index.php?msg=$msg");

?>
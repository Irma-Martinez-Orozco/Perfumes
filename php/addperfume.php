<?php
include("Conexion.php");
/*recibir los valores del formulario*/
$id=$_REQUEST['txtid'];
$nombre=$_REQUEST['txtnombre'];
$descripcion=$_REQUEST['txtdescripcion'];
$precio=$_REQUEST['txtprecio'];
/*Creamos la instruccion de sql para insertar*/
$query="Insert into perfume values('$id','$nombre','$descripcion',$precio);";
$resultado=mysqli_query($cnn,$query);
if($resultado)
{ $msg="Perfume registrado";}
else{
    $msg="No se pudo agregar";
}

header("Location: index.php?msg=$msg");

?>  
<?php
include("conexion.php");
$id=$_REQUEST["txtid"];
$nombre=$_REQUEST["txtnombre"];
$descripcion=$_REQUEST["txtdescripcion"];
$precio=$_REQUEST["txtprecio"];

$query="Update perfume set nombre='$nombre',descripcion='$descripcion',precio='$precio' where id=$id";
$resultado=mysqli_query($cnn,$query);
if ($resultado){$msg="Se actualizo";}

else{$msg="Error!";}

header("Location: index.php?msg=$msg" );

?>
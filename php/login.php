
<?php
include("conexion.php");
$user=$_REQUEST['txtuser'];
$pas=$_REQUEST['txtpass'];
$query="Select username,clave From usuarios where username='$user' and clave='$pas'";
//die($query);
$resultado=mysqli_query($cnn,$query);
//die($resultado);
if ($reg=mysqli_fetch_array($resultado))
{
   session_start();
   $_SESSION['nombre']=$reg['username'];
   header("Location: index.php");
}
else
{
   die("Debe iniciar sesion");
}
// header("Location: principal.php?msg=$msg");

?>
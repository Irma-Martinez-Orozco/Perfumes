<?php
include("conexion.php");
$id=$_GET['id'];
$query="Select * From perfume where id=$id";
$resultado=mysqli_query($cnn,$query);
if ($reg=mysqli_fetch_array($resultado))
{
$nombre=$reg["nombre"];
$descripcion=$reg["descripcion"];
$precio=$reg["precio"];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/frm.css">
    <title>Document</title>
</head>
<body>

<div class="contenedor">
<center>
<img src="../imagenes/logo.png" width="400px" height="250px"alt="">
</center>

<form method="post" action="update.php">


<div class="form-group">
<input type="text" name="txtid" placeholder="Id"  class="input__text"
value=<?php echo("$id"); ?> readonly />
<input type="text" name="txtnombre"  placeholder="Nombre"  class="input__text" 
 value="<?php echo("$nombre"); ?>" />
 </div>

 
<div class="form-group">
<input type="text" name="txtdescripcion" placeholder="Descripcion"  class="input__text"
 value="<?php echo("$descripcion"); ?>" />
<input type="number" name="txtprecio"  placeholder="Precio"  class="input__text" 
 value="<?php echo("$precio"); ?>" />
 </div>

<div class="btn__group"> 
<input type="submit" value="Editar"  class="btn btn__primary"  />

</div>

</form>
</div>

</body>
</html>

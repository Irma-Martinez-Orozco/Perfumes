<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/frm.css">
    <link href="https://fonts.googleapis.com/css?family=Jomolhari&display=swap" rel="stylesheet">
    <title>Perfumes</title>
</head>
<body>

<div class="contenedor">
<center>
<img src="../imagenes/logo.png" width="400px" height="250px"alt="">
</center>

<form method="post" action="addperfume.php">

<div class="form-group">
<input type="text" name="txtid"  placeholder="Id" class="input__text"/>
<input type="text" name="txtnombre" placeholder="Nombre" class="input__text"/>
</div>

<div class="form-group">
<input type="text" name="txtdescripcion"   placeholder="Descripcion"class="input__text"/>
<input type="number" name="txtprecio"  placeholder="Precio" class="input__text"/>
</div>


<div class="btn__group"> 
<input type="submit" value="Agregar"  class="btn btn__primary"  />
<input type="reset" value="Limpiar Campos" class="btn btn__danger" />
</div>

</form> 
</div>
</body>
</html>
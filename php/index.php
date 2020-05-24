<?php
include("Conexion.php");
$query="Select * From perfume";
$resultado=mysqli_query($cnn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body>
<header class="container">

        <figure class="logo">
            <img src="../imagenes/logo.png" alt="Logo">
          
        </figure>
      
        <?php
session_start();
if(isset($_SESSION["nombre"]))
{
    echo("Bienvenid@ $_SESSION[nombre]");
    echo("<a href=logout.php>Salir</a>");
}
else
{
    $smg="Debe Registrarse";
    header("Location: ../html/login.html?msg=$msg");
}
?>
     
    
    </header>
  <center><img src="../imagenes/logo.png" width="300px" height="230px"alt=""></center>


 <center><a href="frmperfume.php" class="btn btn__nuevo">Agregar un Nuevo Perfume</a></center> <br>
 <center><a href="../datatable/index.php" class="btn btn__nuevo">Data Table</a></center>
    <table>
<thead >

<th>ID</th>
<th>Nombre</th>
<th>Descripcion</th>
<th>Precio</th>
<th colspan="2">Accion</th>
</thead> 

<?php
while($row = mysqli_fetch_array($resultado)) { ?>

    <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['descripcion']; ?></td>
    <td><?php echo $row['precio']; ?></td>
    <td>
		<a href="editar.php?id=<?php echo $row['id']; ?>" class="edit_btn">Editar</a>
			</td>
    <td>
       <a href= "eliminar.php?id=<?php echo $row['id'] ; ?>" class="del_btn">Eliminar</a>
       </td>
    

</tr>
	<?php } ?>
</table>

</body>
</html>
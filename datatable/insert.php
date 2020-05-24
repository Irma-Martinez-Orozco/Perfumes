<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO perfu (nombre, descripcion, precio, image) 
			VALUES (:nombre,  :descripcion, :precio,  :image)
		");
		$result = $statement->execute(
			array(
				':nombre'	=>	$_POST["nombre"],
				':descripcion'	=>	$_POST["descripcion"],
				':precio'	=>	$_POST["precio"],
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Producto Ingresado';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE perfu 
			SET nombre = :nombre, descripcion = :descripcion, precio = :precio, image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':nombre'	=>	$_POST["nombre"],
				':descripcion'	=>	$_POST["descripcion"],
				':precio'	=>	$_POST["precio"],
				':image'		=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Base de Datos Actualizada';
		}
	}
}

?>
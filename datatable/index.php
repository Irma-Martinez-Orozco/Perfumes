<html>

<head>
	<title>Perfumeria</title>

	<link rel="stylesheet" href="css.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<style>
			body
			{
				margin:0;
				padding:0;
				background-color:white;
				font-family: 'Poppins';
			}
			.box
			{
				padding:20px;			
				border-radius:5px;
				margin-top:25px;
			}
			.btnw{
				background: rgb(209, 157, 166);

			}
			.fonfo{
				background-color:white;
			}
			.tab{
				background-color: palevioletred;
			}
			</style>
</head>

<body>


	<div class="container box">
	<center><img src="parfumerie.png" alt=""></center>	
		<div class="table-responsive">
			<br />
			<div align="right">
				<button type="button" id="add_button" data-toggle="modal" data-target="#userModal"
				class="btn " >Agregar</button>
			</div>
	
			<center><a href="../php/index.php" class="btn">Regresar</a></center>
			
			<table id="user_data" class="table  fonfo">
				<thead>
					<tr>
						<th width="10%" class="tab" >Imagen</th>
						<th width="35%" class="tab">Nombre</th>
						<th width="35%" class="tab">Descripcion</th>
						<th width="35%" class="tab">Precio $</th>

						<th width="10%" class="tab">Editar</th>
						<th width="10%"class="tab" >Eliminar</th>

					</tr>
				</thead>
			</table>

		</div>
	</div>

</body>

</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">

		<form method="post" id="user_form" enctype="multipart/form-data">
		
			<div class="form-register">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
		<center>		<h1>Registrar un Perfume</h1> </center>
				<hr>
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre del Producto">

				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" id="descripcion" placeholder="Descripcion ">


				<label for="precio">Precio</label>
				<input type="text" name="precio" id="precio" placeholder="Precio">


				<label>Selecciona una Imagen</label>
				<input type="file" name="user_image" id="user_image" />
				<span id="user_uploaded_image"></span>
			</div>

			<div class="modal-footer">
				<input type="hidden" name="user_id" id="user_id" />
				<input type="hidden" name="operation" id="operation" />
				<center>
					<button type="submit" name="action" id="action" class="btn_save"><i
							class="far fa-save fa-lg"></i>Guardar Producto</button>
				</center>
			</div>
	</div>
	</form>

</div>
</div>

<script type="text/javascript" language="javascript">
	$(document).ready(function () {
		$('#add_button').click(function () {
			$('#user_form')[0].reset();
			$('.modal-title').text("Add User");
			$('#action').val("Add");
			$('#operation').val("Add");
			$('#user_uploaded_image').html('');
		});

		
   

		var dataTable = $('#user_data').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "fetch.php",
				type: "POST"
			},
			"columnDefs": [
				{
					"targets": [0, 3, 4],
					"orderable": false,
				},
			],
			"responsive": true,
				"language": {	
                url: 'js.json' //Ubicacion del archivo con el json del idioma.
            }
		});

		$(document).on('submit', '#user_form', function (event) {
			event.preventDefault();
			var nombre = $('#nombre').val();
			var descripcion = $('#descripcion').val();
			var precio = $('#precio').val();

			var extension = $('#user_image').val().split('.').pop().toLowerCase();
			if (extension != '') {
				if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert("Imagen invalida");
					$('#user_image').val('');
					return false;
				}
			}
			if (nombre != '' && precio != '' && descripcion != '' ) {
				$.ajax({
					url: "insert.php",
					method: 'POST',
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function (data) {
						alert(data);
						$('#user_form')[0].reset();
						$('#userModal').modal('hide');
						dataTable.ajax.reload();
					}
				});
			}
			else {
				alert("Se Requiere");
			}
		});

		$(document).on('click', '.update', function () {
			var user_id = $(this).attr("id");
			$.ajax({
				url: "fetch_single.php",
				method: "POST",
				data: { user_id: user_id },
				dataType: "json",
				success: function (data) {
					$('#userModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#descripcion').val(data.descripcion);
					$('#precio').val(data.precio);		
					$('.modal-title').text("Editar Producto");
					$('#user_id').val(user_id);
					$('#user_uploaded_image').html(data.user_image);
					$('#action').val("Edit");
				$('#operation').val("Edit");
			}
			})
		});

		$(document).on('click', '.delete', function () {
			var user_id = $(this).attr("id");
			if (confirm("Seguro de Eliminar este producto?")) {
				$.ajax({
					url: "delete.php",
					method: "POST",
					data: { user_id: user_id },
					success: function (data) {
						alert(data);
						dataTable.ajax.reload();
					}
				});
			}
			else {
				return false;
			}
		});


	});
</script>
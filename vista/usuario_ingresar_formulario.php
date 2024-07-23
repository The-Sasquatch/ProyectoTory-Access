<div class='flex flex-col mx-auto justify-center min-h-screen' style="width:40%; ">
	<div class="p-4">
		<h1 class="text-2xl text-center font-bold"><?php echo strtoupper($titulo); ?></h1>
	</div>
	<div class='p-4'>
		<div class='w3-container w3-indigo'>
			<p class='text-center text-xl'>Ingrese los datos en el formulario y presione Aceptar</p>
		</div>
	</div>

	<form name='usuario_ingresar' method='post' action="UsuarioIngresar.php">
		<input name='opcion' type='hidden' value='1'>
		<input name='id_usuario' type='hidden' value='<?php echo $id_usuario; ?>'>

		<div class='mb-6'>
			<label class="text-sm font-medium text-gray-900 block mb-2">Nombre del Usuario</label>
			<input name='nombre' maxlength='50' type='text' class='bg-indigo-100 border border-indigo-300 text-indigo-600 sm:text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5'>
		</div>

		<div class='mb-6'>
			<label class="text-sm font-medium text-gray-900 block mb-2">Apellido del Usuario</label>
			<input name='apellido' maxlength='50' type='text' class='bg-indigo-100 border border-indigo-300 text-indigo-600 sm:text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5'>
		</div>

		<div class='mb-6'>
			<label class="text-sm font-medium text-gray-900 block mb-2">Correo</label>
			<input name='correo' maxlength='50' type='email' class='bg-indigo-100 border border-indigo-300 text-indigo-600 sm:text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5'>
		</div>

		<div class='mb-6'>
			<label class="text-sm font-medium text-gray-900 block mb-2">Contraseña</label>
			<input name='password' maxlength='15' type='password' class='bg-indigo-100 border border-indigo-300 text-indigo-600 sm:text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5'>
		</div>

		<div class='text-center'>
			<input name='aceptar' value='Aceptar' type='button' class='cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center' onClick='validar(document.usuario_ingresar)'>
		</div>

	</form>

	<p class='w3-center'>
		<?php
		if (isset($mensaje)) {
			echo $mensaje;
		}
		?>
	</p>

</div>
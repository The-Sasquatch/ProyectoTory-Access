<div class="antialiased bg-gray-100 dark-mode:bg-gray-900 drop-shadow-lg">
  <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div x-data="{ open: true }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
      <div class="flex flex-row items-center justify-between p-4">
        <a href="../controlador/ControladorIndex.php" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">BASE DE DATOS IV </a>
        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
        <?php

        if (isset($_SESSION['id_usuario'])) {

        ?>

          <a href='../controlador/ControladorCompra.php' class='w3-bar-item w3-button w3-hover-blue w3-right'>Compra</a>
          <a href='../controlador/ControladorCarrito.php' class='w3-bar-item w3-button w3-hover-blue w3-right'>Carrito</a>
          <span class="w3-bar-item w3-padding-16">
            Cliente: <b><?php echo $_SESSION['nombre']; ?></b>
          </span>
          <a href='../controlador/ControladorLogout.php' class='px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"'>Cerrar sesion</a>
        <?php

        } else {
        ?>
          <button class="flex flex-row text-indigo-600 bg-transparent items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left  rounded-lg  dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-indigo-400 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <a href="../controlador/ControladorLogin.php">Iniciar sesion</a>
          </button>
          <button class="flex flex-row text-white bg-indigo-600 items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left  rounded-lg  dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-indigo-400 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <a href="../controlador/UsuarioIngresar.php">Registrarse</a>
          </button>
        <?php
        }

        ?>

      </nav>
    </div>
  </div>
</div>

<div class='p-4 bg-indigo-600 text-center'>

  <a href='../controlador/ControladorCatalogo.php' class='text-white font-bold'>Cat&aacute;logo</a>

  <?php
  if (isset($_SESSION['nombre'])) {
  ?>

    <a href='../controlador/ControladorCompra.php' class='w3-bar-item w3-button w3-hover-blue w3-right'><img src="../imagenes/bag.svg" class="w3-image" style="height:40px;"></a>
    <a href='../controlador/ControladorCarrito.php' class='w3-bar-item w3-button w3-hover-blue w3-right'><img src="../imagenes/carrito.png" class="w3-image" style="height:40px;"></a>
    <span class="w3-bar-item w3-padding-16">
      Cliente: <b><?php echo $_SESSION['nombre']; ?></b>
    </span>
    <a href='../controlador/ControladorLogout.php' class='w3-bar-item w3-button w3-hover-red w3-right'><img src="../imagenes/logout.png" class="w3-image" style="height:40px;"></a>

  <?php
  }
  ?>


</div>
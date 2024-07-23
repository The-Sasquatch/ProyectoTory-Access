
  <div class="antialiased bg-gray-100 dark-mode:bg-gray-900 drop-shadow-lg">
  <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div x-data="{ open: true }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
      <div class="flex flex-row items-center justify-between p-4">
        <a href="../controlador/ControladorIndex.php" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">BASE DE DATOS IV</a>
        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
	  <?php

if(isset($_SESSION['id_usuario'])){

?>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Ver Compras</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Carrito de Compras</a>
        
		<a class="btn px-4 py-2 mt-2 text-sm font-semibold bg-error rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Desconectarse</a>
        
		<?php

}else{
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

<div class="bg-white h-screen font-sans flex flex-col items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="lg:grid lg:grid-cols-12 lg:gap-8 pt-12 lg:pt-0">
        <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left lg:flex lg:items-center">
          <div class="">
            <div class="flex flex-col items-center justify-center">
              <a class="inline-flex px-1 py-1 gap-x-2 rounded-xl border border-gray-400 border-2 hover:border-indigo-500 items-center text-sm font-semibold text-gray-600 space-x-1"
                href="#">
                <span
                  class="bg-indigo-600 flex items-center justify-center gap-2 text-orange-800 text-sm font-semibold px-2.5 py-0.5 rounded-lg dark:bg-blue-900 dark:text-blue-300">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="h-6 w-6 text-orange-400">
                    <path d="m3 11 18-5v12L3 14v-3z"></path>
                    <path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path>
                  </svg>
                  Nuevo</span>
                <span>Un importante anuncio</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="h-4 w-4">
                  <path d="M5 12h14"></path>
                  <path d="m12 5 7 7-7 7"></path>
                </svg></a>
              <h1
                class="mt-4 text-4xl tracking-tight font-extrabold text-gray-900 sm:mt-5 sm:leading-none lg:mt-6 lg:text-5xl xl:text-6xl">
                <p class="sm:block">Aquí está tu</p><span class="text-zinc-500 md:block">nuevo,
                  todo-en-uno</span>
                <p class="text-indigo-600 md:block">Sistema Farmaceutico.</p>
              </h1>
            </div>
            <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
              <button
                class="inline-flex items-center text-white bg-indigo-500 justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full sm:w-auto">
                Comienza ahora</button>
            </div>
          </div>
        </div>
        <div class="mt-16 ml-6 sm:mt-24 lg:mt-0 lg:col-span-5">
          <p class="text-base ml-12 text-gray-600 sm:text-xl lg:text-lg xl:text-xl">
		  Gestiona, distribuye y optimiza tus productos farmacéuticos.
          </p>
          <div class="mt-12 ml-8">
            <div class="grid grid-cols-3 gap-6 sm:gap-6 xl:gap-8">
              <div class="text-center sm:flex sm:items-center sm:justify-center">
                <div class="sm:flex-shrink-0">
                  <div class="flow-root">
                    <div
                      class="border w-fit transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-primary/80 inline-flex items-center justify-center px-3 py-0.5 text-sm font-medium leading-5 text-indigo-600 bg-indigo-100 rounded-full">
                      Medicamentos
                    </div>
                    <p class="text-4xl font-bold text-gray-900">16K+</p>
                  </div>
                </div>
                <!-- <div class="mt-3 sm:mt-0 sm:ml-3">
                  </div> -->
              </div>
              <div class="text-center sm:flex sm:items-center sm:justify-center">
                <div class="sm:flex-shrink-0">
                  <div class="flow-root">
                    <div
                      class="border w-fit transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-primary/80 inline-flex items-center justify-center px-3 py-0.5 text-sm font-medium leading-5 text-indigo-600 bg-indigo-100 rounded-full">
                      Ventas
                    </div>
                    <p class="text-4xl font-bold ml-4 text-gray-900">28K+</p>
                  </div>
                </div>
                <!-- <div class="mt-3 sm:mt-0 sm:ml-3">
                </div> -->
              </div>
              <div class="text-center sm:flex sm:items-center sm:justify-center">
                <div class="sm:flex-shrink-0">
                  <div class="flow-root">
                    <div
                      class="border w-fit transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-primary/80 inline-flex items-center justify-center px-3 py-0.5 text-sm font-medium leading-5 text-indigo-600 bg-indigo-100 rounded-full">
                      Usuarios activos
                    </div>
                    <p class="text-4xl font-bold ml-4 text-gray-900">18+</p>
                  </div>
                </div>
                <!-- <div class="mt-3 sm:mt-0 sm:ml-3">
                </div> -->
              </div>
            </div>
          </div>
          <div class="mt-12 flex justify-center space-x-3">
            <span class="relative flex h-14 w-14 shrink-0 overflow-hidden rounded-full"><img
                class="aspect-square h-full w-full" alt="User 1"
                src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;width=40" /></span><span
              class="relative flex h-14 w-14 shrink-0 overflow-hidden rounded-full"><img
                class="aspect-square h-full w-full" alt="User 2"
                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;width=40" /></span><span
              class="relative flex h-14 w-14 shrink-0 overflow-hidden rounded-full"><img
                class="aspect-square h-full w-full" alt="User 3"
                src="https://images.unsplash.com/photo-1548142813-c348350df52b?q=80&w=1889&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;width=40" /></span><span
              class="relative flex h-14 w-14 shrink-0 overflow-hidden rounded-full"><img
                class="aspect-square h-full w-full" alt="User 4"
                src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?q=80&w=1889&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;width=40" /></span>
            <img class="relative flex h-14 w-14 shrink-0 overflow-hidden rounded-full"
              src="https://images.unsplash.com/photo-1527718641255-324f8e2d0421?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
              alt="5">
          </div>
        </div>
      </div>
    </div>
  </div>

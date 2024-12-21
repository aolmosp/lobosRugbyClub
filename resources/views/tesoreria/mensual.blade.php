<x-app-layout>
  <div class="min-h-full"  x-data="data" x-cloak >
      <nav class="sticky top-0 z-40 bg-sky-800">
        <div class="px-4 mx-auto sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="w-8" src="logo_min.png" alt="Your Company">
              </div>
              <div class="hidden md:block">
                <div class="flex items-baseline ml-10 space-x-4">
                      {{--MENU--}}
                </div>
              </div>
            </div>  
            <div> 
              <a href="{{ route('register') }}" type="button" class="relative inline-flex items-center px-3 py-2 mr-8 text-sm font-semibold text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">Nuevo Usuario</a>
              <a href="{{ route('logout') }}" type="button" class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">Cerrar sesion</a>
            </div>
          </div>
        </div>
        <header class="bg-white shadow">
          <div class="flex flex-row gap-24 p-4 mx-auto sm:px-6 lg:px-8">
            <h1 class="text-xl font-bold tracking-tight text-gray-900">Mensual</h1>
    
            <nav class="flex items-end space-x-8 align-baseline" aria-label="Tabs">
              <button x-on:click="show_m = true; show_f = false; show_j = false;" :class="show_m ? 'text-blue-500 border-blue-500 border-b-2' : 'text-gray-500 border-b-0' " class="px-1 text-sm font-medium whitespace-nowrap hover:border-blue-500 hover:text-blue-600">Masculino</button>
              <button x-on:click="show_f = true; show_m = false; show_j = false;" :class="show_f ? 'text-blue-500 border-blue-500 border-b-2' : 'text-gray-500 border-b-0' " class="px-1 text-sm font-medium whitespace-nowrap hover:border-blue-500 hover:text-blue-600">Femenino</button>
              <button x-on:click="show_j = true; show_f = false; show_m = false;" :class="show_j ? 'text-blue-500 border-blue-500 border-b-2' : 'text-gray-500 border-b-0' " class="px-1 text-sm font-medium whitespace-nowrap hover:border-blue-500 hover:text-blue-600">Juvenil</button>
            </nav>
          </div>
        </header>
      </nav>

      {{--TAB EQUIPO MASCULINO--}}
      <div x-show="show_m" class="absolute top-0 flex items-start w-screen h-screen overflow-auto pt-31">
          <div class="grid w-full pb-8 grid-cols-17">
              <span class="sticky top-0 left-0 col-span-2 bg-white px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-30">Nombre</span>
              <span class="sticky top-0 z-10 col-span-2 col-start-3 bg-white ">
                <button x-on:click="getActionsPlayers()" class="p-4 m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Crear Pago pendiente</button>
              </span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Enero</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Febrero</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Marzo</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Abril</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Mayo</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Junio</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Julio</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Agosto</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Septiembre</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Octubre</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Noviembre</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Diciembre</span>
              <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white"></span>

              <template x-for="player in masculino">
                <div class="grid col-span-17 grid-cols-17" style="">
                  <span x-text="player.name" class="z-20 sticky left-0 h-14 col-span-2 px-3 py-3.5 bg-white"></span>
                  <button disabled type="button" x-on:click="" class="m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:bg-gray-100 disabled:disabled:cursor-not-allowed">Eliminar</button>
                  <button type="button" x-on:click="getDataPlayer(player.id)" class="m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Registrar Pago</button>
                  
                  <template x-for="registro in player.data">
                    <div class="flex flex-row-reverse items-center px-2 m-1 text-xs font-medium text-white align-middle rounded-md"
                    :class="!registro.status ? 'justify-center' : (registro.status == 2 ? 'bg-green-50 ring-1 ring-inset ring-green-600/20 !text-gray-800 justify-between' : 'justify-between bg-red-400 ring-1 ring-inset ring-red-600/20')">
                      
                      <button x-show="registro.status == 1" x-on:click="showAllPending(registro.month , player.id)">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                      </button>

                      <button x-show="registro.status == 2" x-on:click="showAllPending(registro.month , player.id)">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607ZM10.5 7.5v6m3-3h-6" />
                        </svg>
                        
                      </button>

                      <span x-text="!registro.status ? '' : (registro.status == 2 ? 'Pagado' : registro.amount)" ></span>
                    </div>
                  </template>
                  
                  <span x-text="player.order_deuda > 0 ? player.deuda_total : '' " 
                  class="content-center m-1 text-xs font-medium text-center text-white align-middle rounded-md"
                  :class="player.order_deuda > 0 ? 'bg-red-400 ring-1 ring-inset ring-red-600/20' : ''">

                <div>
              </template>

          </div>        
      </div>

      {{--TAB EQUIPO FEMENINO--}}
      <div x-show="show_f" class="absolute top-0 flex items-start w-screen h-screen overflow-auto pt-31">
        <div class="grid w-full pb-8 grid-cols-17">
            <span class="sticky top-0 left-0 col-span-2 bg-white px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-30">Nombre</span>
            <span class="sticky top-0 z-10 col-span-2 col-start-3 bg-white ">
              <button x-on:click="getActionsPlayers()" class="p-4 m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Crear Pago pendiente</button>
            </span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Enero</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Febrero</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Marzo</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Abril</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Mayo</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Junio</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Julio</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Agosto</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Septiembre</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Octubre</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Noviembre</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Diciembre</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white"></span>


            <template x-for="player in femenino">
              <div class="grid col-span-17 grid-cols-17" style="">
                <span x-text="player.name" class="z-20 sticky left-0 h-14 col-span-2 px-3 py-3.5 bg-white"></span>
                <button disabled type="button" x-on:click="" class="m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:bg-gray-100 disabled:disabled:cursor-not-allowed">Eliminar</button>
                <button type="button" x-on:click="getDataPlayer(player.id)" class="m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Registrar Pago</button>
                
                <template x-for="registro in player.data">
                  <div class="flex flex-row-reverse items-center px-2 m-1 text-xs font-medium text-white align-middle rounded-md"
                  :class="!registro.status ? 'justify-center' : (registro.status == 2 ? 'bg-green-50 ring-1 ring-inset ring-green-600/20 !text-gray-800 justify-between' : 'justify-between bg-red-400 ring-1 ring-inset ring-red-600/20')">
                    
                    <button x-show="registro.status == 1" x-on:click="showAllPending(registro.month , player.id)">
                      <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>
                    </button>

                    <button x-show="registro.status == 2" x-on:click="showAllPending(registro.month , player.id)">
                      <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607ZM10.5 7.5v6m3-3h-6" />
                      </svg>
                      
                    </button>

                    <span x-text="!registro.status ? '' : (registro.status == 2 ? 'Pagado' : registro.amount)" ></span>
                  </div>
                </template>
                
                <span x-text="player.order_deuda > 0 ? player.deuda_total : '' " 
                class="content-center m-1 text-xs font-medium text-center text-white align-middle rounded-md"
                :class="player.order_deuda > 0 ? 'bg-red-400 ring-1 ring-inset ring-red-600/20' : ''">

              <div>
            </template>

        </div>        
      </div>


      {{--TAB EQUIPO JUVENIL--}}
      <div x-show="show_j" class="absolute top-0 flex items-start w-screen h-screen overflow-auto pt-31">
        <div class="grid w-full pb-8 grid-cols-17">
            <span class="sticky top-0 left-0 col-span-2 bg-white px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-30">Nombre</span>
            <span class="sticky top-0 z-10 col-span-2 col-start-3 bg-white ">
              <button x-on:click="getActionsPlayers()" class="p-4 m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Crear Pago pendiente</button>
            </span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Enero</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Febrero</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Marzo</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Abril</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Mayo</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Junio</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Julio</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Agosto</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Septiembre</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Octubre</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Noviembre</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white">Diciembre</span>
            <span class="sticky top-0 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-10 bg-white"></span>


            <template x-for="player in juvenil">
              <div class="grid col-span-17 grid-cols-17" style="">
                <span x-text="player.name" class="z-20 sticky left-0 h-14 col-span-2 px-3 py-3.5 bg-white"></span>
                <button disabled type="button" x-on:click="" class="m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:bg-gray-100 disabled:disabled:cursor-not-allowed">Eliminar</button>
                <button type="button" x-on:click="getDataPlayer(player.id)" class="m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Registrar Pago</button>
                
                <template x-for="registro in player.data">
                  <div class="flex flex-row-reverse items-center px-2 m-1 text-xs font-medium text-white align-middle rounded-md"
                  :class="!registro.status ? 'justify-center' : (registro.status == 2 ? 'bg-green-50 ring-1 ring-inset ring-green-600/20 !text-gray-800 justify-between' : 'justify-between bg-red-400 ring-1 ring-inset ring-red-600/20')">
                    
                    <button x-show="registro.status == 1" x-on:click="showAllPending(registro.month , player.id)">
                      <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>
                    </button>

                    <button x-show="registro.status == 2" x-on:click="showAllPending(registro.month , player.id)">
                      <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607ZM10.5 7.5v6m3-3h-6" />
                      </svg>
                      
                    </button>

                    <span x-text="!registro.status ? '' : (registro.status == 2 ? 'Pagado' : registro.amount)" ></span>
                  </div>
                </template>
                
                <span x-text="player.order_deuda > 0 ? player.deuda_total : '' " 
                class="content-center m-1 text-xs font-medium text-center text-white align-middle rounded-md"
                :class="player.order_deuda > 0 ? 'bg-red-400 ring-1 ring-inset ring-red-600/20' : ''">

              <div>
            </template>

        </div>        
      </div>


      <div x-show="open" tabindex="-1" class="fixed z-50 items-center justify-center w-full h-full max-h-full overflow-x-hidden overflow-y-auto bg-gray-400 bg-opacity-75 md:inset-0">
        <div class="relative w-full max-w-2xl max-h-full p-4 mx-auto">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                    <h3 class="text-lg font-semibold">
                      <span x-text="player_selected?.name"></span>
                    </h3>
                    <button type="button" x-on:click="toggle" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 space-y-4 md:p-5">
                  <div class="field">
                    <label>Selecciona uno o mas pagos pendientes</label>
                    <div class="control">
                        <select class="form-control" name="pendingpayments"
                            id="pendingpayments" placeholder="This is a placeholder"
                            multiple>
                        </select>
                    </div>
                  </div>
                  <div>
                    <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Monto del pago</label>
                    <label class="inline-flex items-center mt-1 cursor-pointer">
                      <span class="mr-2 text-sm font-medium text-gray-900">Beca</span>
                      <input x-on:change="paymentBeca()" type="checkbox" value="true" x-model="beca" class="sr-only peer">
                      <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>                    
                    <div class="relative mt-2 rounded-md shadow-sm" :class="beca ? 'text-gray-400' : 'text-gray-900'">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="sm:text-sm">$</span>
                      </div>
                      <input x-bind:disabled="beca" x-on:keyup.debounce="validPayMonto($event)" type="number" x-model="payment_monto" name="price" id="price" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-12 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 disabled:cursor-not-allowed" >
                    </div>
                  </div>
                  <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Pagador</label>
                    <div class="flex mt-2 rounded-md shadow-sm">
                      <div class="relative flex items-stretch flex-grow focus-within:z-10">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                          </svg>
                        </div>
                        <select x-bind:disabled="block_payer" x-model="payer_selected" id="location" name="location" class="block w-full rounded-none rounded-l-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          <template x-for="player in masculino">
                            <option :value="player.id" x-text="player.name"></option>
                          </template>
                          <template x-for="player in femenino">
                              <option :value="player.id" x-text="player.name"></option>
                          </template>
                          <template x-for="player in juvenil">
                            <option :value="player.id" x-text="player.name"></option>
                        </template>
                        </select>
                      </div>
                      <button x-on:click="tooglePayer" type="button" class="relative -ml-px inline-flex items-center gap-x-1.5 rounded-r-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        cambiar
                      </button>
                    </div>
                  </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 ">
                    <button x-on:click="savePayment()" type="button" class="w-full px-8 py-3 text-white transition-all duration-500 bg-blue-600 rounded hover:bg-blue-700 disabled:text-gray-300 disabled:bg-gray-100 disabled:cursor-not-allowed">
                        Registrar Pago
                    </button>
                </div>
            </div>
        </div>
      </div>

      <div x-show="open_edit" tabindex="-1" class="fixed z-50 items-center justify-center w-full h-full max-h-full overflow-x-hidden overflow-y-auto bg-gray-400 bg-opacity-75 md:inset-0">
        <div class="relative w-full max-w-2xl max-h-full p-4 mx-auto mt-16">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                    <h3 class="text-lg font-semibold">
                      <span x-text="player_selected?.name"></span>
                    </h3>
                    <button type="button" x-on:click="closeEdit()" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <div class="space-y-4 md:p-5">

                  <ul role="list" class="flex flex-col px-2 space-y-4 overflow-auto lg:px-6 grayScroll h-96">
                    <template x-for="pending in player_selected?.pendingpayments">

                      <li class="w-full col-span-1 bg-white border divide-y divide-gray-200 rounded-lg shadow">
                        <div class="flex items-center justify-between w-full px-2 py-4 space-x-6 lg:p-6">
                          <div class="flex-1 truncate">

                            <template x-if="pending.status == 2">
                              <div>
                                <span class="inline-flex items-center flex-shrink-0 p-2 mb-2 text-sm font-medium text-green-700 rounded-xl bg-green-50 ring-1 ring-inset ring-green-600/20">Pagado</span>
                                <span class="inline-flex items-center flex-shrink-0 p-2 mb-2 text-sm font-medium text-gray-800" x-text="pending.payment.fechaFormat"></span>
                              </div>
                            </template>
                            
                            <div class="flex items-center space-x-3">
                              <span class="text-sm font-medium text-gray-900 truncate" x-text="pending.tipodesc"></span>
                              <span> - </span>
                              <span class="text-sm font-medium text-gray-900 truncate" x-text="pending.month"></span>
                              <span x-text="pending.montoFormat" class="inline-flex flex-shrink-0 items-center rounded-full bg-green-50 px-1.5 py-0.5 text-sm font-medium text-green-700 ring-1 ring-inset ring-green-600/20"></span>
                            </div>

                              {{-- Dividir cupón --}}
                              <template x-if="pending.status == 1">
                                <div x-show="divide_cupon == pending.id">
                                  <label for="monto" class="block text-sm font-medium leading-6 text-gray-900">Nuevo monto</label>
                                  <div class="relative mt-2 rounded-md shadow-sm">
                                    <input x-on:keyup.debounce="validPendingMonto($event)" x-model="divide_cupon_2" type="number" name="monto" id="monto" :class="divide_cupon_error ? 'text-red-900 focus:ring-red-500' : 'text-gray-800 focus:ring-blue-600' " class="block w-full rounded-md border-0 py-1.5 pr-10  ring-1 ring-inset  focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                                    <div x-show="divide_cupon_error" class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                      <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                      </svg>
                                    </div>
                                  </div>
                                  <p x-show="divide_cupon_error" class="mt-2 text-sm text-red-600" id="monto-error">El monto no puede ser igual o superior al monto actual</p>
                                  <p class="mt-2 text-sm text-gray-600" id="monto-error">El cupón se dividirá en dos cupones de <span x-text="divide_cupon_1_format"></span> y <span x-text="divide_cupon_2_format"></span></p>
                                  <div class="pt-2">
                                  <button x-on:click="divide_cupon = null" type="button" class="w-auto px-4 py-2 text-sm text-white transition-all duration-500 bg-blue-600 rounded hover:bg-blue-700 disabled:text-gray-300 disabled:bg-gray-100">
                                    cancelar
                                  </button> 
                                  <button x-on:click="saveDividePending(pending.id)" type="button" class="w-auto px-4 py-2 text-sm text-white transition-all duration-500 bg-blue-600 rounded hover:bg-blue-700 disabled:text-gray-300 disabled:bg-gray-100">
                                    guardar
                                  </button> 
                                  </div>
                                </div>
                              </template>
                              
                              {{-- Editar cupón --}}
                              <template x-if="pending.status == 1">
                                <div x-show="edit_cupon == pending.id">
                                  <label for="monto" class="block text-sm font-medium leading-6 text-gray-900">Nuevo monto</label>
                                  <div class="relative mt-2 rounded-md shadow-sm">
                                    <input x-bind:value="pending.monto" x-model="edit_pending_monto" type="number" name="monto" id="monto" class="block w-full rounded-md border-0 py-1.5 text-gray-800 ring-1 ring-inset ring-blue-300 focus:ring-2 focus:ring-inset focus:ring-blue-500">
                                  </div>
                                  <div class="pt-2">
                                  <button x-on:click="edit_cupon = null" type="button" class="w-auto px-4 py-2 text-sm text-white transition-all duration-500 bg-blue-600 rounded hover:bg-blue-700 disabled:text-gray-300 disabled:bg-gray-100">
                                    cancelar
                                  </button> 
                                  <button x-on:click="saveEditPending(pending.id, player_selected?.id)" type="button" class="w-auto px-4 py-2 text-sm text-white transition-all duration-500 bg-blue-600 rounded hover:bg-blue-700 disabled:text-gray-300 disabled:bg-gray-100">
                                    guardar
                                  </button> 
                                  </div>
                                </div>
                              </template>

                          </div>
                        </div>
                        <div>
                          <template x-if="pending.status == 1">
                            <div class="flex -mt-px text-white divide-x divide-gray-400">
                              <div class="flex flex-1">
                                <button x-on:click="editCupon(pending.id)" x-bind:disabled="divide_cupon != null" class="relative inline-flex items-center justify-center flex-1 py-4 text-sm font-semibold bg-blue-500 border border-transparent rounded-bl-lg gap-x-3 disabled:cursor-not-allowed">
                                  <svg class="w-5 h-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                  </svg>
                                  Editar
                                </button>
                              </div>
                              <div class="flex flex-1">
                                <button x-on:click="divideCupon(pending.id)" x-bind:disabled="edit_cupon != null" class="relative inline-flex items-center justify-center flex-1 py-4 text-sm font-semibold bg-blue-500 border border-transparent gap-x-3 disabled:cursor-not-allowed">
                                  <svg class="w-5 h-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                  </svg>
                                  Dividir
                                </button>
                              </div>
                              <div class="flex flex-1 ">
                                <button x-on:click="eliminaCupon(pending.id)" x-bind:disabled="edit_cupon != null || divide_cupon != null" class="relative inline-flex items-center justify-center flex-1 py-4 text-sm font-semibold bg-red-500 border border-transparent rounded-br-lg gap-x-3 disabled:cursor-not-allowed">
                                  <svg class="w-5 h-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                  </svg>
                                  Eliminar
                                </button>
                              </div>
                            </div>
                          </template>
                        </div>
                      </li>

                    </template>
                  </ul>
                </div>
                <!-- Modal footer -->
                <div class="flex flex-row-reverse items-center p-4 space-x-8 border-t border-gray-200 rounded-b md:p-5">
                  <button x-on:click="closeEdit()" type="button" class="px-6 py-3 text-white transition-all duration-500 bg-blue-600 rounded hover:bg-blue-700 disabled:text-gray-300 disabled:bg-gray-100 disabled:cursor-not-allowed">
                   cerrar
                  </button>  
                </div>
            </div>
        </div>
      </div>

      <div x-show="actions" tabindex="-1" class="fixed z-50 items-center justify-center w-full h-full max-h-full overflow-x-hidden overflow-y-auto bg-gray-400 bg-opacity-75 md:inset-0">
        <div class="relative w-full max-w-2xl max-h-full p-4 mx-auto">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                    <h3 class="text-lg font-semibold">
                      <span >Crear pagos pendientes</span>
                    </h3>
                    <button type="button" x-on:click="actions = false" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="space-y-4 md:p-5">
                  <div class="p-4 space-y-4 md:p-5">
                    <div class="field">
                      <label>Selecciona uno o mas players</label>
                      <div class="control">
                          <select class="form-control" name="players"
                              id="players"
                              multiple>
                          </select>
                      </div>
                    </div>
                    <div>
                      <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Tipo de cobro</label>
                      <div class="flex mt-2 rounded-md shadow-sm">
                        <div class="relative flex items-stretch flex-grow max-w-md focus-within:z-10">
                          <select x-model="tipo_pago" id="type" name="type" class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <template x-for="tipo_pago in enumTipoPagos">
                              <option :value="tipo_pago.id" x-text="tipo_pago.desc"></option>
                            </template>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div>
                      <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Monto del cobro</label>
                      <div class="relative max-w-md mt-2 text-gray-900 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <span class="sm:text-sm">$</span>
                        </div>
                        <input type="number" x-model="new_pending_payment_monto" name="price" id="price" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-12 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 disabled:cursor-not-allowed" >
                      </div>
                    </div>
                    <div>
                      <label class="block text-sm font-medium leading-6 text-gray-900">Fecha Cobro</label>
                      <div class="flex mt-2 rounded-md shadow-sm">
                        
                        <div class="relative w-full max-w-md">
                          <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                          </div>
                          <input id="date_pending" x-model="date_new_pending" type="text" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 ">
                    <button  type="button" x-on:click="savePendingPayments()" class="w-full px-8 py-3 text-white transition-all duration-500 bg-blue-600 rounded hover:bg-blue-700 disabled:text-gray-300 disabled:bg-gray-100 disabled:cursor-not-allowed">
                        Crear pagos
                    </button>
                </div>
            </div>
        </div>
      </div>
  </div>


  <script>
    function data() {
          return {
              open: false,
              open_edit: false,
              actions: false,
              player_selected: null,
              month_selected: null,
              payer_selected: null,
              masculino: [],
              femenino: [],
              juvenil: [],
              enumTipoPagos: [],
              show_m: true,
              show_f: false,
              show_j: false,
              choices: null,
              choicesPlayers: null,
              block_payer: true,
              divide_cupon: null,
              edit_cupon: null,
              edit_pending_monto: 0,
              divide_pending_monto: 0,
              divide_cupon_error: false,
              divide_cupon_1: 0,
              divide_cupon_2: 0,
              divide_cupon_1_format: 0,
              divide_cupon_2_format: 0,
              payment_monto: null,
              tipo_pago: null,
              new_pending_payment_monto: null,
              date_new_pending: null,
              beca: false,
              async init(){
                    this.choices = new Choices('#pendingpayments', {
                        allowHTML: true,
                        loadingText: 'Cargando...',
                        noChoicesText: 'No hay más opciones para elegir',
                        shouldSort: false,
                    });

                    this.choicesPlayers = new Choices('#players', {
                        allowHTML: true,
                        loadingText: 'Cargando...',
                        noChoicesText: 'No hay más opciones para elegir',
                        shouldSort: false,
                    });

                    this.getPlayersData()
                    this.getTipoPagos()

                    flatpickr("#date_pending", {});
              },
              async getPlayersData(){
                $this = this
                await axios({
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    method: 'get',
                    url: `/players`,
                  })
                  .then(function (response) {
                    $this.masculino = response.data.masculino
                    $this.femenino = response.data.femenino
                    $this.juvenil = response.data.juvenil

                    choices_data_m = response.data.masculino.map(function({id, name }){
                        return { value: id, label: name }
                    });

                    choices_data_f = response.data.femenino.map(function({id, name }){
                        return { value: id, label: name }
                    });

                    choices_data_j = response.data.juvenil.map(function({id, name }){
                        return { value: id, label: name }
                    });

                    choices_data = choices_data_m.concat(choices_data_f).concat(choices_data_j);

                    $this.choicesPlayers.clearStore();
                    $this.choicesPlayers.setChoices(
                      choices_data,
                      'value',
                      'label',
                      false,
                    );


                  });
              },
              async getTipoPagos(){
                $this = this
                await axios({
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    method: 'get',
                    url: `/tipo_pagos`,
                  })
                  .then(function (response) {
                    $this.enumTipoPagos = response.data.tipo_pagos
                    console.log($this.enumTipoPagos)
                  });
              },
              async getActionsPlayers(){
                  this.actions = true;
  
              },
              async getDataPlayer(player_id){
                  
                await this.getPendingPayments(player_id);

                choices_data = this.player_selected.pendingpayments.map(function({id, month, montoFormat, tipodesc }){
                    return { value: id, label: `${month} - ${montoFormat} - ${tipodesc}` }
                });

                this.choices.clearStore();
                this.choices.setChoices(
                  choices_data,
                  'value',
                  'label',
                  false,
                );

                this.payer_selected = player_id
                this.toggle();

              },
              async toggle() {
                  this.open = ! this.open
                  if(!this.open) this.block_payer = true
                  this.beca = false
                  this.payment_monto = 0
              },
              tooglePayer(){
                this.block_payer = false
              },
              async savePayment(){

                pending = this.choices.getValue(true);
                if(pending.length < 1){
                  Toast.fire({
                      icon: 'error',
                      iconColor: 'red',
                      title: 'Selecciona al menos un cupón de pago',
                    })
                }else{
                  pending = this.player_selected.pendingpayments.filter((p) => pending.includes(p.id));
                  total_pending = 0;
                  total_pending = pending.map((p) => total_pending += p.monto).slice(-1);

                  if(this.beca || this.payment_monto >= total_pending){
                    $this = this
                    await axios({
                        headers: {
                            "Content-Type": "application/json",
                            Accept: "application/json",
                        },
                        method: 'put',
                        url: `/player/payment/${this.player_selected.id}`,
                        data: {
                          pending: pending.map((p) => p.id),
                          payer: this.payer_selected,
                          monto: this.payment_monto
                        }
                      })
                      .then(function (response) {
                        if(response.data.error){
                          Toast.fire({
                                        icon: 'error',
                                        iconColor: 'red',
                                        title: response.data.error,
                                      })
                        }else{
                          Toast.fire({
                              icon: 'success',
                              iconColor: 'green',
                              title: response.data.message,
                              timer: 2000,
                            })
                          $this.getPlayersData()
                          $this.toggle()
                        }
                      });
                  }else{
                    Toast.fire({
                        icon: 'error',
                        iconColor: 'red',
                        title: 'El monto del pago es inferior al total de pagos seleccionados',
                      })
                  }
                }
              },
              async savePendingPayments(){

                players = this.choicesPlayers.getValue(true);
                if(players.length < 1 ){
                  Toast.fire({
                      icon: 'error',
                      iconColor: 'red',
                      title: 'Selecciona al menos un jugador/a',
                    })
                }else if(this.new_pending_payment_monto == null){    
                  Toast.fire({
                      icon: 'error',
                      iconColor: 'red',
                      title: 'Ingresa un monto para los pagos pendientes',
                    })
                }else if(this.date_new_pending == null){    
                  Toast.fire({
                      icon: 'error',
                      iconColor: 'red',
                      title: 'Ingresa una fecha para los pagos pendientes',
                    })
                }else{
                  await axios({
                        headers: {
                            "Content-Type": "application/json",
                            Accept: "application/json",
                        },
                        method: 'put',
                        url: `/player/pending_payments`,
                        data: {
                          players: players.map((p) => p),
                          monto: this.new_pending_payment_monto,
                          fecha: this.date_new_pending,
                          tipo: this.tipo_pago,
                          publico: 0,
                        }
                      })
                      .then(function (response) {
                        if(response.data.error){
                          Toast.fire({
                                        icon: 'error',
                                        iconColor: 'red',
                                        title: response.data.error,
                                      })
                        }else{
                          Toast.fire({
                              icon: 'success',
                              iconColor: 'green',
                              title: response.data.message,
                              timer: 2000,
                            })
                          $this.getPlayersData()
                        }
                      });
                  
                  this.actions = false;

                }
              },
              async showAllPending(month, player_id){
                await this.getPendingPayments(player_id, true);
                this.month_selected = month
                this.player_selected.pendingpayments = this.player_selected.pendingpayments.filter((pending) => pending.month == this.month_selected);
                
                this.open_edit = true
              },
              async getPendingPayments(player_id, all = null){

                  url = `/player/pending/${player_id}`
                  if(all == null){
                    url += '/1'
                  }
                  
                  this.player_selected = await axios({
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    method: 'get',
                    url: url,
                  })
                  .then(function (response) {
                     return response.data.data
                  });
              },
              editCupon (pending_id){
                this.edit_cupon = pending_id;
                this.divide_cupon = null;
              },
              divideCupon (pending_id){
                this.divide_cupon = pending_id;
                this.edit_cupon = null;

                this.divide_pending_monto = this.player_selected.pendingpayments.filter((pending) => pending.id == pending_id)[0];

                this.divide_cupon_1 = this.monto
                this.divide_cupon_2 = 0

                this.divide_cupon_1_format = this.divide_pending_monto.montoFormat
                this.divide_cupon_2_format = '$ 0'

              },
              closeEdit(){
                this.open_edit = false
                this.edit_cupon = null;
                this.divide_cupon = null;
              },
              async saveEditPending (pending_id, player_id){
                if(this.edit_pending_monto > 0){
                  $this = this
                  await axios({
                      headers: {
                          "Content-Type": "application/json",
                          Accept: "application/json",
                      },
                      method: 'put',
                      url: `/player/pending/edit/${pending_id}`,
                      data: {
                        monto: this.edit_pending_monto,
                      }
                    })
                    .then(function (response) {
                        if(response.data.error){
                          Toast.fire({
                                        icon: 'error',
                                        iconColor: 'red',
                                        title: response.data.error,
                                      })
                        }else{
                          Toast.fire({
                                        icon: 'success',
                                        iconColor: 'green',
                                        title: response.data.message,
                                        timer: 2000,
                                      })
                        }
                        $this.getPlayersData()
                        $this.showAllPending($this.month_selected, player_id)
                        $this.edit_cupon = null;
                    });
                  }
                },
              validPendingMonto(){

                  this.divide_cupon_error = false
                  if(this.divide_cupon_2 >= this.divide_pending_monto.monto ){
                    this.divide_cupon_error = true
                    this.divide_cupon_2 = this.divide_pending_monto.monto;
                    this.divide_cupon_1 = 0;
                  }else{
                    this.divide_cupon_1 = this.divide_pending_monto.monto - this.divide_cupon_2;
                  }
                  
                  this.divide_cupon_1_format = this.divide_cupon_1.toLocaleString('es-CL', { style: 'currency', currency: 'CLP' });
                  this.divide_cupon_2_format = this.divide_cupon_2.toLocaleString('es-CL', { style: 'currency', currency: 'CLP' });
              },
              async saveDividePending(pending_id){
                  if(!this.divide_cupon_error){
                    $this = this
                    await axios({
                      headers: {
                          "Content-Type": "application/json",
                          Accept: "application/json",
                      },
                      method: 'put',
                      url: `/player/pending/divide/${pending_id}`,
                      data: {
                        monto: this.divide_cupon_2,
                      }
                    })
                    .then(function (response) {
                        if(response.data.error){
                          Toast.fire({
                                        icon: 'error',
                                        iconColor: 'red',
                                        title: response.data.error,
                                      })
                        }else{
                          Toast.fire({
                                        icon: 'success',
                                        iconColor: 'green',
                                        title: response.data.message,
                                        timer: 2000,
                                      })
                        }
                        $this.getPlayersData()
                        $this.showAllPending($this.month_selected, $this.player_selected?.id)
                        $this.divide_cupon = null;
                    });
                  }
              },
              validPayMonto (){
                  this.payment_monto = Number(this.payment_monto)
              },
              paymentBeca(){
                  console.log(this.beca)
                  if(this.beca) this.payment_monto = 0;
              },
              async eliminaCupon(pending_id){
                  $this = this
                  pending = this.player_selected.pendingpayments.filter((pending) => pending.id == pending_id)[0];
                  Swal.fire({
                    title: "¿Estas seguro?",
                    html: `<p>Se eliminará el cupón de ${$this.player_selected?.name}</p> <p> ${pending.tipodesc} - ${pending.montoFormat}</p>`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar"
                  }).then((result) => {
                    if (result.isConfirmed) {
                      axios({
                        headers: {
                            "Content-Type": "application/json",
                            Accept: "application/json",
                        },
                        method: 'delete',
                        url: `/player/pending/delete/${pending_id}`,
                      })
                      .then(function (response) {
                        if(response.data.error){
                          Toast.fire({
                                        icon: 'error',
                                        iconColor: 'red',
                                        title: response.data.error,
                                      })
                        }else{
                          Toast.fire({
                              icon: 'success',
                              iconColor: 'green',
                              title: response.data.message,
                              timer: 2000,
                            })
                            
                            $this.getPlayersData()
                            $this.showAllPending($this.month_selected, $this.player_selected?.id)
                        }
                      });
                    }
                  });
              }
          }
    }
  </script>
</x-app-layout>

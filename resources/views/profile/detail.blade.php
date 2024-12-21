<x-app-layout>
  <div class="min-h-full"  x-data="data" x-cloak >
      <nav class="sticky top-0 z-40 bg-sky-800">
        <div class="relative px-4 mx-auto sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="w-8" src="logo_min.png" alt="Your Company">
              </div>
            </div>
            <div class="absolute hidden h-full ml-32 lg:flex lg:space-x-8">
              <a href="#" x-on:click="show_m = true; show_p = false; show_a = false;" :class="show_m ? ' text-white border-sky-600' : 'text-gray-800 border-transparent hover:border-gray-300 hover:text-white' " class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2">Mis pagos</a>
              <a href="#" x-on:click="show_p = true; show_m = false; show_a = false;" :class="show_p ? ' text-white border-sky-600' : 'text-gray-800 border-transparent hover:border-gray-300 hover:text-white' " class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 ">Pagos publicos</a>
              @can('show-dashboard')
              <a href="#" x-on:click="show_a = true; show_m = false; show_p = false;" :class="show_a ? ' text-white border-sky-600' : 'text-gray-800 border-transparent hover:border-gray-300 hover:text-white' " class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 ">Dashboard</a>
              @endcan
            </div>
            <div> 
              <a href="{{ route('logout') }}" type="button" class="relative items-center hidden px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md lg:inline-flex ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">Cerrar sesión</a>
            </div>
              <button x-on:click="menu_mobile = !menu_mobile" class="text-white lg:hidden" >
                <svg class="block w-6 h-6" :class="{ 'block': !(menu_mobile), 'hidden': menu_mobile }" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                </svg>
                <svg class="block w-6 h-6" :class="{ 'block': menu_mobile, 'hidden': !(menu_mobile) }" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
              </button>
          </div>
        </div>
      </nav>

      <div x-show="menu_mobile" class="absolute z-50 w-full bg-white lg:hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
          <a href="#" x-on:click="show_m = true; show_p = false; show_a = false; menu_mobile = false" :class="show_m ? 'text-indigo-700 border-indigo-500 bg-indigo-50' : 'text-gray-600 border-transparent hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800' " class="block py-2 pl-3 pr-4 text-base font-medium border-l-4">Mis pagos</a>
          <a href="#" x-on:click="show_p = true; show_m = false; show_a = false; menu_mobile = false" :class="show_p ? 'text-indigo-700 border-indigo-500 bg-indigo-50' : 'text-gray-600 border-transparent hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800' " class="block py-2 pl-3 pr-4 text-base font-medium border-l-4">Deuda Pública</a>
          @can('show-dashboard')
          <a href="#" x-on:click="show_a = true; show_m = false; show_p = false; menu_mobile = false" :class="show_a ? 'text-indigo-700 border-indigo-500 bg-indigo-50' : 'text-gray-600 border-transparent hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800' " class="block py-2 pl-3 pr-4 text-base font-medium border-l-4">Dashboard</a>
          @endcan
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
          <div class="mt-3 space-y-1">
            <a href="{{ route('logout') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Cerrar sesión</a>
          </div>
        </div>
      </div>

      <div x-show="show_m" class="absolute z-40 w-full bg-white shadow">
        <div class="flex flex-col gap-4 p-4 mx-auto lg:gap-24 lg:flex-row sm:px-6 lg:px-8">
          <h1 class="text-xl font-bold tracking-tight text-gray-900">Perfil de Pagos: {{$player->name}}</h1>
        </div>
      </div>
      <div x-show="show_p" class="absolute z-40 w-full bg-white shadow">
        <div class="flex flex-col gap-4 p-4 mx-auto lg:gap-24 lg:flex-row sm:px-6 lg:px-8">
          <h1 class="text-xl font-bold tracking-tight text-gray-900">Deuda Pública</h1>
        </div>
      </div>
      @can('show-dashboard')
        <div x-show="show_a" class="absolute z-40 w-full bg-white shadow">
          <div class="flex flex-row items-center gap-2 px-4 py-2 mx-auto lg:gap-4 lg:flex-row sm:px-6 lg:px-8">
            <h1 class="text-xl font-bold tracking-tight text-gray-900">Dashboard</h1>
            <label :class="equipo == '1' ? 'ring-0 bg-sky-600 text-white hover:bg-sky-500' : 'bg-white ring-1 ring-gray-300 hover:bg-gray-50' " class="flex items-center justify-center px-3 py-3 text-sm font-semibold uppercase rounded-md cursor-pointer focus:outline-none">
              <input x-model="equipo" type="radio" name="equipo" value="1" class="sr-only">
              <span>Masculino</span>
            </label>
            <label :class="equipo == '2' ? 'ring-0 bg-sky-600 text-white hover:bg-sky-500' : 'bg-white ring-1 ring-gray-300 hover:bg-gray-50' " class="flex items-center justify-center px-3 py-3 text-sm font-semibold uppercase rounded-md cursor-pointer focus:outline-none">
              <input x-model="equipo" type="radio" name="equipo" value="2" class="sr-only">
              <span>Femenino</span>
            </label>
          </div>
        </div>
      @endcan

      {{--TAB MIS PAGOS--}}
      <div x-show="show_m" class="absolute top-0 z-10 flex items-start w-screen h-screen overflow-auto pt-31">
        <div class="w-full mx-auto">
          <div class="">
              <div class="flow-root">
                <div class="overflow-x-auto">
                  <div class="inline-block min-w-full px-4 py-6 align-middle lg:px-10">
                    <div>
                      <dl class="grid grid-cols-1 gap-5 my-5 lg:grid-cols-3">
                        <div :class="player.deuda > player.deuda_maxima ? 'bg-red-200' : 'bg-white' " class="px-4 py-5 overflow-hidden rounded-lg shadow sm:p-6">
                          <dt class="text-sm font-medium text-gray-800 truncate">Deuda actual</dt>
                          <dd x-text="player.deuda_format" class="mt-1 text-xl font-semibold tracking-tight text-gray-800"></dd>
                        </div>
                        <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                          <dt class="text-sm font-medium text-gray-800 truncate">Partido Siguiente</dt>
                          <template x-if="next_game == null">
                            <dd class="mt-1 text-lg font-semibold tracking-tight text-gray-800">----</dd>
                          </template>
                          <template x-if="next_game != null">
                            <dd class="flex flex-col mt-1 text-base font-semibold tracking-tight text-gray-800 xl:text-lg lg:flex-row">
                            <span x-text="next_game.rival"></span>
                            <span x-text="next_game.fechaFormat" class="xl:mx-1"></span>
                            <span x-text="next_game.hora" class="xl:mx-1"></span>
                            <span x-text="next_game.lugar"></span>
                            </dd>
                          </template>
                        </div>
                        <div :class="player.status != 1 ? 'bg-yellow-100' : (player.deuda > player.deuda_maxima ? 'bg-red-200' : 'bg-white')" class="px-4 py-5 overflow-hidden rounded-lg shadow sm:p-6">
                          <dt class="text-sm font-medium text-gray-800 truncate">Habilitado para jugar</dt>
                          <template x-if="player.equipo_id == 1 ">
                            <dd class="mt-1 text-xl font-semibold tracking-tight text-gray-800">
                              <span x-text="player.status != 1 ? 'INHABILITADO' : (player.deuda > player.deuda_maxima ? 'INHABILITADO POR DEUDA' : 'HABILITADO') "></span>
                            </dd>
                          </template>
                          <template x-if="player.equipo_id == 2 ">
                            <dd class="mt-1 text-xl font-semibold tracking-tight text-gray-800">
                              <span x-text="player.status != 1 ? 'INHABILITADA' : (player.deuda > player.deuda_maxima ? 'INHABILITADA POR DEUDA' : 'HABILITADA') "></span>
                            </dd>
                          </template>
                        </div>
                      </dl>
                    </div>

                    <ul role="list" class="grid grid-cols-1 gap-6 lg:grid-cols-3 xl:grid-cols-4">
                      @foreach ($player->pendingPayments as $pending)
                        <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
                          <div class="flex items-center justify-between w-full p-6 space-x-6">
                            <div class="flex-1 truncate">
                              <div class="flex items-center space-x-3">
                                <h3 class="text-sm font-medium text-gray-800 truncate">{{ strtoupper($pending->month) }}</h3>
                              </div>
                              <p class="hidden mt-1 text-sm text-gray-500 truncate lg:block">{{ $pending->tipoDesc }} {{ $pending->montoFormat }}</p>
                              <p class="block mt-1 text-sm text-gray-500 truncate lg:hidden">{{ $pending->tipoDesc }} </p>
                              <p class="block mt-1 text-sm text-gray-500 truncate lg:hidden">
                                {{ $pending->montoFormat }}</p>
                            </div>
                            @if ($pending->status == 2)
                              <span class="inline-flex items-center flex-shrink-0 px-3 py-2 text-sm font-medium text-green-700 rounded-md bg-green-50 ring-1 ring-inset ring-green-600/20">{{ $pending->statusDesc }}</span>  
                            @else
                              <span class="inline-flex items-center flex-shrink-0 px-3 py-2 text-sm font-medium text-white bg-red-500 rounded-md ring-1 ring-inset ring-red-600/20">{{ $pending->statusDesc }}</span>  
                            @endif
                          </div>
                          <div>
                            <div class="flex -mt-px divide-x divide-gray-200">
                              <div class="flex flex-col flex-1 w-0 p-4 align-middle">
                                @if ($pending->status == 2)
                                <div class="flex flex-row space-x-2">
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                      <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-sm"> transferencia: ID <span class="font-bold">{{ $pending->payment->id}}</span> - {{ $pending->payment->montoFormat }} el {{ $pending->payment->fechaFormat }} <p>  
                                  </div>
                                  <span class="text-xs"> por: {{ $pending->payment->player->name }} </span>
                                @endif
                              </div>
                            </div>
                          </div>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>              
        </div>
      </div>

      {{--TAB PAGOS PUBLICOS--}}
      <div x-show="show_p" class="absolute top-0 w-screen h-screen overflow-auto pt-31">
        <template x-if="pagos_publicos_count > 0">
          <ul role="list" class="w-full">
            <template x-for="(month, key) in pagos_publicos">
              <li class="">
                  <div class="flex w-full px-4 mt-6 lg:px-10">
                    <div class="flex-auto w-full text-sm leading-6 bg-white rounded-md shadow-lg ring-1 ring-gray-900/5">
                      <div class="">
                        <div class="relative flex justify-between p-4 rounded-lg cursor-pointer group gap-x-6" @click="toggleExpanded(key)">
                          <p class="text-lg capitalize" x-text="key"></p>
                          <svg x-show="expanded[key]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                          </svg>
                          <svg x-show="!expanded[key]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                          </svg>
                        </div>
                      </div>
                      <div class="p-3 bg-gray-50" x-show="expanded[key]" x-collapse>
                        <template x-if="pagos_publicos_count > 0 ">
                          <div class="w-full mx-auto">
                            <div class="">
                                <div class="flow-root">
                                  <div class="overflow-x-auto">
                                    <div class="inline-block min-w-full align-middle">
                                      <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-3 lg:grid-cols-4">

                                        <template x-for="(pending, key) in month">
                                          <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
                                            <div class="flex items-center justify-between w-full p-6 space-x-6">
                                              <div class="flex-1 truncate">
                                                <div class="flex items-center space-x-3">
                                                    <h3 class="text-sm font-medium text-gray-800 capitalize truncate" x-text="pending.player.name"></h3>
                                                </div>
                                                <div class="flex flex-col lg:flex-row">
                                                  <span class="mt-1 text-sm text-gray-500 truncate" x-text="pending.tipoDesc"></span>
                                                  <span class="mt-1 text-sm text-gray-500 truncate" x-text="pending.montoFormat"></span>
                                                </div>
                                              </div>
                                                <span :class="pending.status == 2 ? 'text-green-700 bg-green-50 ring-green-600/20' : 'text-white bg-red-500  ring-red-600/20' " x-text="pending.statusDesc" class="inline-flex items-center flex-shrink-0 px-3 py-2 text-sm font-medium rounded-md ring-1 ring-inset "></span>  
                                            </div>
                                            <div>
                                              <div class="flex -mt-px divide-x divide-gray-200">
                                                <div class="flex flex-col flex-1 w-0 p-4 align-middle">
                                                  <template x-if="pending.status == 2">
                                                    <div class="flex flex-row space-x-2">
                                                      <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                                                      </svg>
                                                      <p class="text-sm"> transferencia: ID <span class="font-bold" x-text="pending.payment.id"></span> <span> - </span><span x-text="pending.payment.montoFormat"></span><span> el </span><span x-text="pending.payment.fechaFormat"></span> <p>
                                                    </div>
                                                    <span class="text-xs"> por </span><span x-text="pending.payment.player.name"></span>
                                                  </template>                                                  
                                                </div>
                                              </div>
                                            </div>
                                          </li>
                                        </template>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>              
                          </div>
                        </template>
                      </div>
                    </div>
                  </div>
              </li>
            </template>
          </ul>
        </template>

        <template x-if="pagos_publicos_count == 0" x-cloak>
          <div>  
          <p>No hay pagos publicos para mostrar</p>
            <p x-text="pagos_publicos_count"></p>
          </div>
        </template>

      </div>


      @can('show-dashboard')
        {{--TAB ADMIN--}}
        <div x-show="show_a" class="absolute top-0 w-screen h-screen overflow-auto pt-31">
          
          <div class="grid w-full pb-8 grid-cols-17">
            <span class="sticky top-0 left-0 col-span-2 bg-white px-3 py-3.5 text-left text-sm font-semibold text-gray-900 z-30">Nombre</span>
            <span class="sticky top-0 z-10 col-span-2 col-start-3 bg-white "></span>
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
              <div class="grid col-span-17 grid-cols-17" x-show="equipo == 1">
                <span x-text="player.name" class="z-20 sticky left-0 h-14 col-span-2 px-3 py-3.5 bg-white"></span>
                <button disabled type="button" class="m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:bg-gray-100 disabled:disabled:cursor-not-allowed">Acciones</button>
                <button disabled type="button" class="m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:bg-gray-100 disabled:disabled:cursor-not-allowed">Registrar Pago</button>

                <template x-for="registro in player.data">
                  <div class="flex items-center justify-center px-2 m-1 text-xs font-medium text-white align-middle rounded-md"
                  :class="!registro.status ? '' : (registro.status == 2 ? 'bg-green-50 ring-1 ring-inset ring-green-600/20 !text-gray-800 ' : 'bg-red-400 ring-1 ring-inset ring-red-600/20')">
                    <span x-text="!registro.status ? '' : (registro.status == 2 ? 'Pagado' : registro.amount)" ></span>
                  </div>
                </template>
                
                <span x-text="player.order_deuda > 0 ? player.deuda_total : '' " 
                class="content-center m-1 text-xs font-medium text-center text-white align-middle rounded-md"
                :class="player.order_deuda > 0 ? 'bg-red-400 ring-1 ring-inset ring-red-600/20' : ''">

              <div>
            </template>
            <template x-for="player in femenino">
              <div class="grid col-span-17 grid-cols-17" style="" x-show="equipo == 2">
                <span x-text="player.name" class="z-20 sticky left-0 h-14 col-span-2 px-3 py-3.5 bg-white"></span>
                <button disabled type="button" class="m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:bg-gray-100 disabled:disabled:cursor-not-allowed">Acciones</button>
                <button disabled type="button" class="m-1 text-xs font-semibold text-center text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:bg-gray-100 disabled:disabled:cursor-not-allowed">Registrar Pago</button>

                <template x-for="registro in player.data">
                  <div class="flex items-center justify-center px-2 m-1 text-xs font-medium text-white align-middle rounded-md"
                  :class="!registro.status ? '' : (registro.status == 2 ? 'bg-green-50 ring-1 ring-inset ring-green-600/20 !text-gray-800 ' : 'bg-red-400 ring-1 ring-inset ring-red-600/20')">
                    <span x-text="!registro.status ? '' : (registro.status == 2 ? 'Pagado' : registro.amount)" ></span>
                  </div>
                </template>
                
                <span x-text="player.order_deuda > 0 ? player.deuda_total : '' " 
                class="content-center m-1 text-xs font-medium text-center text-white align-middle rounded-md"
                :class="player.order_deuda > 0 ? 'bg-red-400 ring-1 ring-inset ring-red-600/20' : ''">

              <div>
            </template>


        </div>  
      @endcan
 


      </div>



 </div>


  <script>

    function data() {
      return {
          player: <?=json_encode($player);?>,
          next_game: null,
          show_m: true,
          show_p: false,
          show_a: false,
          expanded: [],
          pagos_publicos: [],
          masculino: [],
          femenino: [],
          menu_mobile: false,
          pagos_publicos_count: 0,
          equipo: 1,
          async init(){
            if(this.player.games){
              this.next_game = this.player.games[0]
            }
            this.public_pending()
            this.getPlayersData()
          },
          async public_pending(){
                  $this = this
                  await axios({
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    method: 'get',
                    url: `/public/pending`,
                  })
                  .then(function (response) {
                    $this.pagos_publicos = response.data.data
                    $this.pagos_publicos_count = response.data.count
                    for (const key of Object.keys($this.pagos_publicos)) {
                      $this.expanded[key] = false;
                    }                        
                    
                  });
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

                    console.log($this.masculino)
                    console.log($this.femenino)
                  });
              },
          toggleExpanded(key){
            this.expanded[key] = !this.expanded[key];
          }
      }
    }
  </script>


</x-app-layout>

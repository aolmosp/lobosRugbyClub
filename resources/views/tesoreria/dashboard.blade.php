<x-app-layout>
    <div class="min-h-full">
        <nav class="bg-sky-800">
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
                <a href="{{ route('logout') }}" type="button" class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">Cerrar sesion</a>
              </div>
            </div>
          </div>
        </nav>
        <header class="bg-white shadow">
          <div class="px-4 py-6 mx-auto sm:px-6 lg:px-8">
            <h1 class="text-xl font-bold tracking-tight text-gray-900">Dashboard</h1>
          </div>
        </header>
        <main>
          <div class="w-full mx-auto">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flow-root mt-8">
                  <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                      <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                          <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Nombre</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Estado</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Último pago</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Acciones</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          @foreach ( $players as $player)
                            <tr>
                              <td class="py-5 pl-4 pr-3 text-sm whitespace-nowrap sm:pl-0">
                                <div class="flex items-center">
                                  <div class="flex-shrink-0 h-11 w-11">
                                    <img class="rounded-full h-11" src="@if (is_null($player->img_profile)) logo_min.png @else {{$player->img_profile}} @endif" alt="">
                                  </div>
                                  <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{$player->nombre}}</div>
                                    <div class="mt-1 text-gray-500">{{$player->email}}</div>
                                  </div>
                                </div>
                              </td>
                              <td class="px-3 py-5 text-sm text-gray-500 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-700 rounded-md bg-green-50 ring-1 ring-inset ring-green-600/20">Pagado</span>
                              </td>
                              <td class="px-3 py-5 text-sm text-gray-500 whitespace-nowrap">
                                  <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-700 rounded-md bg-green-50 ring-1 ring-inset ring-green-600/20">10/08/2024</span>
                              </td>
                              <td class="px-3 py-5 text-sm text-gray-500 whitespace-nowrap">Jugador</td>
                              <td class="px-3 py-5 text-sm text-gray-500 whitespace-nowrap">
                                  <div class="flex flex-row w-full space-x-6">
                                      <span class="inline-flex rounded-md shadow-sm isolate">
                                          <button type="button" class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">Registrar pago</button>
                                      </span>                                  
                                  </div>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>              
          </div>
        </main>
      </div>
</x-app-layout>

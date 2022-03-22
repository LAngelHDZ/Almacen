<div>

   {{-- <----- Este fragmento de código es el modal -----> --}}
   <div wire:ignore.self  class="modal fade" id="formedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar proveedor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- <--- Fin cabecera modal ---> --}}

        {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
        <div class="modal-body">
            <div class="mb-3">
              {{-- {{ $infoproveedor }} --}}
                <label for="text-rfc" class="form-label">RFC</label>
                <input wire:model='rfc'  type="text" class="form-control" id="rfc">
                @error('rfc') <span class="error">{{ $message }}</span> @enderror
              </div>
            <div class="mb-3">
                <label for="text-empresa" class="form-label">Empresa</label>
                <input wire:model='empresa' type="text" class="form-control" id="name-empresa">
                @error('empresa') <span class="error">{{ $message }}</span> @enderror
            </div>
                <div class="mb-3">
                  <label for="text-area-direccion" class="form-label">Dirección</label>
                  <textarea wire:model='direccion' class="form-control" id="direccion" rows="3"></textarea>
                  @error('direccion') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="tetx-email" class="form-label">Email</label>
                    <input wire:model='email' type="email" class="form-control" id="email" placeholder="name@example.com">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="tetx-" class="form-label">Telefono</label>
                    <input wire:model='telefono' type="tel" class="form-control" id="tel">
                    @error('telefono') <span class="error">{{ $message }}</span> @enderror
              </div>
        </div>
        {{-- <-- Fin cuerpo modal --> --}}

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <span x-on:click="on = false">
          <button wire:click.prevent="updateProveedor" type="button" class="btn btn-primary">Actualizar</button>
          </span>
        </div>

      </div>
    </div>
  </div>
  {{-- <----- Fin fragmento de código modal -----> --}}

  {{-- <--- Data table de poveedores ---> --}}
  <table class="table bg-white border shadow-sm rounded-2">
    <thead class="">
      <div class="bg-primary bg-gradient p-1  " style="--bs-bg-opacity: .5;">
        <tr>
          <th scope="col" class="text-center text-uppercase">#</th>
          <th scope="col" class="text-center text-uppercase">RFC</th>
          <th scope="col" class="text-center text-uppercase">Empresa</th>
          <th scope="col" class=" text-uppercase">Direción</th>
          <th scope="col" class="text-uppercase">Email</th>
          <th scope="col" class="text-center text-uppercase">Telefono</th>
          <th scope="col" class="text-center text-uppercase">Acciones</th>
        </tr>
      </div>
    </thead>
    
    <tbody>
    @if($proveedor->count()==0)

    <tr>
      <td ><span class="text-center text-gray">No hay registros</span> </td>
    </tr>
      @endif
      @php
          $int=1;
        @endphp
        @foreach ($proveedor as $item )
        @if($proveedor->count()==0 )

        <tr>
          <td ><span class="text-center text-gray">No hay registros</span> </td>
        </tr>
          @endif
        @if($item->active ==1)
        <tr class="">
          <th class="pt-3 font-weight-normal text-decoration-underline text-center">{{ $int++ }}</th>
          <th class="pt-3 font-weight-normal text-center">{{ $item->rfc }}</th>
          <th class="pt-3 font-weight-normal text-center">{{ $item->empresa }}</th>
          <th class="pt-3 font-weight-normal ">{{ $item->direccion }}</th>
          <th class="pt-3 font-weight-normal ">{{ $item->email }}</th>
          <th class="pt-3 font-weight-normal text-center">{{ $item->telefono }}</th>
          
          <td class="text-center">
            <button  wire:click='edit({{$item->id}})' type="button" class="btn btn-outline-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg>
            </button>
            
            <button wire:click='delete({{ $item->id }})' type="button" class="btn btn-outline-danger" >
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square " viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </button>
          </td>
        </tr>
        @endif
        @endforeach
      </tbody>

    </table>
    {{ $proveedor->links('vendor.livewire.bootstrap') }}

    
    {{-- <div class=""> 
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block  sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200 ">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-black-500 uppercase tracking-wider">Id</th>
                        <th scope="col" class="mx-2 px-6 py-3 text-left text-xs font-bold text-black-500 uppercase tracking-wider">RFC</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Empresa</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Direccion</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Telefono</th>
                        <th scope="col" class="  px-6 py-3 text-center">
                          <div class="mx-3">Acciones</div>
                        </th>
                      </tr>
                    </thead>
        
                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="">
                              <div class="text-sm font-medium text-gray-900">03254365</div>
        
                            </div>
                          </div>
                        </td>
                        <td class="  px-6 py-4 whitespace-nowrap">
                          <div class=" mx-2 text-sm text-gray-900">16YS8145WD</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap flex">
                          <div class=" ">
                            <p class="px-2 inline-flex text-sm leading-5 font-semibold">Vitavic DC.CA. </p>
        
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap  text-left">Calle Maria de la O Col. La libertad CP. 93780, Acapulco de Juarez, </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right  font-medium">
                          <p class="text-black">vitavice_interprisse@gmail.com</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm ">
                            <p class="text-black font-bold">7445512746</p>
                          </td>
        
                          <td class="px-3">
                            <div class="flex">
                              <button class=" px-3 py-2 mx-3 bg-green-700 rounded-lg text-white hover:bg-green-500"  >Editar</button>
                              <button class=" px-2 py-2 mx-3 bg-red-700 rounded-lg text-white hover:bg-red-500"> Eliminar</button>
                            </div>
                          </td>
                      </tr>
          
                      <!-- More people... -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
</div>

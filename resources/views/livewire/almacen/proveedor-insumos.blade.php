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
        <div class="modal-body bg-gray-50">
            <div class="mb-3">
              {{-- {{ $infoproveedor }} --}}
                <label for="text-rfc" class="form-label">RFC</label>
                <input wire:model='rfc'  type="text" class="form-input w-100 rounded-lg hover:border-blue-700" id="rfc">
                @error('rfc') <span class="error">{{ $message }}</span> @enderror
              </div>
            <div class="mb-3">
                <label for="text-empresa" class="form-label">Empresa</label>
                <input wire:model='empresa' type="text" class="form-input w-100 rounded-lg hover:border-blue-700" id="name-empresa">
                @error('empresa') <span class="error">{{ $message }}</span> @enderror
            </div>
                <div class="mb-3">
                  <label for="text-area-direccion" class="form-label">Dirección</label>
                  <textarea wire:model='direccion' class="form-input w-100 rounded-lg hover:border-blue-700" id="direccion" rows="3"></textarea>
                  @error('direccion') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="tetx-email" class="form-label">Email</label>
                    <input wire:model='email' type="email" class="form-input w-100 rounded-lg hover:border-blue-700" id="email" placeholder="name@example.com">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="tetx-" class="form-label">Telefono</label>
                    <input wire:model='telefono' type="tel" class="form-input w-100 rounded-lg hover:border-blue-700" id="tel">
                    @error('telefono') <span class="error">{{ $message }}</span> @enderror
              </div>
        </div>
        {{-- <-- Fin cuerpo modal --> --}}

        <div class="modal-footer">
          <a class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
          <span x-on:click="on = false">
          <a wire:click.prevent="updateProveedor"  class="btn btn-primary">Actualizar</a>
          </span>
        </div>

      </div>
    </div>
  </div>
  {{-- <----- Fin fragmento de código modal -----> --}}

  <div class="mb-2 d-flex justify-content-between">
    <div class=" ml-2">
      <label for="" class="h5 pr-2">Filtro de busqueda:</label>
      <select wire:model="campo" name="" id="" class="form-select mr-4 w-64 rounded-lg hover:border-blue-700">
        <option value="empresa">Empresa</option>
        <option value="rfc">RFC</option>
      </select>
         <i class="fa fa-search mr-2"> </i>
         <input wire:model="search" type="text" class=" w-64 form-input rounded-lg hover:border-blue-700"  placeholder="Buscar">
    </div> 
    <div class="">
      @livewire('almacen.proveedor.create-proveedor')
    </div>
</div>
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
            <button  wire:click='edit({{$item->id}})' type="button" class="text-blue mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg>
            </button>
            
            <button wire:click='delete({{ $item->id }})' type="button" class="text-red" >
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eraser-fill text-red" viewBox="0 0 16 16">
                <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
              </svg>
            </button>
          </td>
        </tr>
        @endif
        @endforeach
      </tbody>

    </table>
    {{ $proveedor->links() }}
</div>

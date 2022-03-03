<div>
      {{-- <----- Este fragmento de código es el modal -----> --}}
   <div wire:ignore.self  class="modal fade" id="formedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar producto</h5>
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
    @if($proveedor->count())
    <table class="table bg-white border shadow-sm rounded-2">
      <div class="bg-primary bg-gradient p-1  " style="--bs-bg-opacity: .5;">
        <thead class="">
          <tr>
            <th scope="col" class="text-center text-uppercase">Clave</th>
            <th scope="col" class="text-center text-uppercase">RFC</th>
            <th scope="col" class="text-center text-uppercase">Empresa</th>
            <th scope="col" class=" text-uppercase">Direción</th>
            <th scope="col" class="text-uppercase">Email</th>
            <th scope="col" class="text-center text-uppercase">Telefono</th>
            <th scope="col" class="text-center text-uppercase">Acciones</th>
          </tr>
        </thead>
      </div>
      <tbody>
        @foreach ($proveedor as $item )
          
        <tr class="">
          <th class="pt-3 fst-normal text-decoration-underline text-center">{{ $item->id }}</th>
          <th class="pt-3 fst-normal text-center">{{ $item->rfc }}</th>
          <th class="pt-3 fst-normal text-center">{{ $item->empresa }}</th>
          <th class="pt-3 fst-normal ">{{ $item->direccion }}</th>
          <th class="pt-3 fst-normal ">{{ $item->email }}</th>
          <th class="pt-3 fst-normal text-center">{{ $item->telefono }}</th>
         
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
        @endforeach
      </tbody>
    </table>
    {{ $proveedor->links('vendor.livewire.bootstrap') }}
    @endif
</div>

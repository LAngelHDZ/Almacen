<div>
    
        
        {{-- <button class=" inline-flex  rounded-lg bg-sky-700 text-white font-medium px-3 py-2">Crear</button> --}}
        {{-- <button wire:click="showmodal"  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Crear</button> --}}
        {{-- <x-jet-button wire:click="$set('open', true)">
            Crear
        </x-jet-button> --}}
        {{-- <button click="showmodal" type="button" class="btn btn-outline-primary">Nuevo</button> --}}

            {{-- Este boton abre un modal donde está el formulario para dar de alta un proveedor --}}
            <div class="d-flex justify-content-end">
                <button wire:click.prevent="showmodal" type="button" class="btn btn-outline-primary ">
                    <i class="fa fa-plus-circle"></i> Nuevo 
                  </button>
            </div>

        {{-- <----- Este fragmento de código es el modal -----> --}}
        <div wire:model="openmodal" class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <--- Fin cabecera modal ---> --}}

                {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="text-rfc" class="form-label">RFC</label>
                        <input type="text" class="form-control" id="rfc">
                      </div>
                    <div class="mb-3">
                        <label for="text-nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name-empresa">
                      </div>
                    <div class="mb-3">
                        <label for="text-area-direccion" class="form-label">Dirección</label>
                        <textarea class="form-control" id="direccion" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tetx-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                      </div>
                    <div class="mb-3">
                        <label for="tetx-email" class="form-label">Telefono</label>
                        <input type="tel" class="form-control" id="tel">
                      </div>
                </div>
                {{-- <-- Fin cuerpo modal --> --}}

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>

              </div>
            </div>
          </div>
          {{-- <----- Fin fragmento de código modal -----> --}}

</div>

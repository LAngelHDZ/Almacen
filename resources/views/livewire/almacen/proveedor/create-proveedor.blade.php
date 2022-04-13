<div>   
            {{-- Este boton abre un modal donde está el formulario para dar de alta un proveedor --}}
           
                 <div class=" ">
                    <button wire:click.prevent='showmodal'  class="btn btn-success flex ">
                         <i class="fas fa-plus-circle mt-1 mr-1"></i> 
                         <span class="mb-1">Nuevo</span>  
                    </button>
                 </div>
              
        {{-- <----- Este fragmento de código es el modal -----> --}}
        <div wire:ignore.self  class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
                <div class="modal-header">
                  
                  <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo proveedor</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <--- Fin cabecera modal ---> --}}

                {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
                <div class="modal-body bg-gray-50">
                    <div class="mb-3">
                      {{-- {{ $infoproveedor }} --}}
                        <label for="text-rfc" class="form-label">RFC</label>
                        <input wire:model='rfc' type="text" class="form-input w-100 rounded-lg hover:border-blue-700" id="rfc">
                        @error('rfc') <span class="error">{{ $message }}</span> @enderror
                        {{$rfc}}
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
                            <input wire:model='telefono' type="tel" class="form-input w-100 rounded-lg  hover:border-blue-700" id="tel">
                            @error('telefono') <span class="error">{{ $message }}</span> @enderror
                      </div>
                </div>
                {{-- <-- Fin cuerpo modal --> --}}

                <div class="modal-footer">
                  <a class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                  <span x-on:click="on = false">
                  <a wire:click.prevent="saveProveedor"  class="btn btn-primary">Guardar</a>
                  </span>
                </div>

              </div>
            </div>
          </div>
          {{-- <----- Fin fragmento de código modal -----> --}}
    
</div>

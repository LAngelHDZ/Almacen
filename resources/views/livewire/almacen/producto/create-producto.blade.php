<div>    
            {{-- Este boton abre un modal donde está el formulario para dar de alta un proveedor --}}
           
                 <div class="d-flex justify-content-end">
                    <button wire:click.prevent='showmodal' type="button" class="btn btn-outline-primary ">
                         <i class="fa fa-plus-circle"></i> Nuevo 
                    </button>
                 </div>
              
        {{-- <----- Este fragmento de código es el modal -----> --}}
    <div wire:ignore.self  class="modal fade" id="pro-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
                <div class="modal-header">
                  
                  <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo producto</h5>
                
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <--- Fin cabecera modal ---> --}}

                {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
                <div class="modal-body">
                  <div class="d-flex justify-content-between">
                    <div class=" pr-2 ">
                      <div>
                        <label for="clave" class="form-label">CLave producto</label>
                        <input wire:model='clave' @error('clave')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror type="text" class="form-input  bg-gray-50 rounded-lg hover:border-blue-700"  >
                
                      </div>
                      <div class="pt-2">
                        <label for="proveedor" class="">Proveedor</label>
                        <select wire:model="idprov" @error('idprov')  class=" bg-gray-50  rounded-lg border-danger"  @enderror  name="" id="" style="width: 83%" class="form-select bg-gray-50 rounded-lg hover:border-blue-700">
                          <option value="" selected>seleccionar</option>
                          @foreach ($listP as $data)
                          <option value="{{ $data->id }}" >{{ $data->empresa }}</option>
                          @endforeach
                      </select>
                      </div>
                      <div class="pt-2">
                        <label for="precio" class="form-label">Precio</label>
                        <input wire:model='precio' @error('precio')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror type="text" class="form-input  bg-gray-50 rounded-lg hover:border-blue-700" >
            
                      </div>
                      <div class="pt-2">
                        <label for="empaque" class="">Empaque</label>
                        <select wire:model="empaque" @error('empaque')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror  name="" id="" style="width: 83%" class="form-select bg-gray-50 rounded-lg hover:border-blue-700">
                          <option value="" selected>seleccionar</option>
                          <option value="Caja" >Caja</option>
                          <option value="Paquete" >Paquete</option>
                          <option value="Unidad" >Unidad</option>
                          
                      </select>
                      </div>
                    </div>
                    <div class="">
                      <div>
                        <label for="producto" class="form-label">Producto</label>
                        <input wire:model='producto' @error('producto')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror type="text" class="form-input  bg-gray-50 rounded-lg hover:border-blue-700" >
                        
                      </div>
                      <div class="pt-2">
                        <label for="marca" class="form-label">Marca</label>
                        <input wire:model='marca' @error('marca')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror type="text" class="form-input  bg-gray-50 rounded-lg hover:border-blue-700" >
                        
                      </div>
                      <div class="pt-2">
                        <label for="categoria" class="">Categoria</label>
                        <select wire:model="categoria" @error('categoria')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror name="" id="" style="width: 97%" class="form-select bg-gray-50 rounded-lg hover:border-blue-700">
                          <option value="" selected>seleccionar</option>
                          <option value="Papeleria" >Papeleria</option>
                          <option value="Laboratorio" >Laboratorio Aguas</option>
                         
                        </select>
                      </div>
                      <div class="pt-2">
                        <label for="contenido" class="form-label">Contenido</label>
                        <input wire:model='contenido' @error('contenido')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror type="text" class="form-input  bg-gray-50 rounded-lg hover:border-blue-700" >
                       
                      </div>
                    </div>
                  </div>
                  <div class="pt-2">
                    <label for="descripcion" class="">Descripción</label>
                    <textarea wire:model="des" @error('des') cols="15" rows="5"  class=" bg-gray-50 w-full px-4  rounded-lg border-danger"  placeholder="{{ $message }}"  @enderror  cols="15" rows="5" class="form-input w-full px-4 bg-gray-50 rounded-lg hover:border-blue-700"></textarea>
                    
                  </div>
                </div>
                        {{-- <-- Fin cuerpo modal --> --}}

                <div class="modal-footer">
                  <button type="button" class="px-3 py-2 bg-gray-500 rounded-md border text-white hover:border-blue-700" data-dismiss="modal">Cancelar</button>
                  <span x-on:click="on = false">
                  <button wire:click="createp" type="button" class="px-3 py-2 rounded-md text-white bg-blue ">Guardar</button>
                  </span>
                </div>
              </div>
            </div>
      </div>
          {{-- <----- Fin fragmento de código modal -----> --}}
</div>

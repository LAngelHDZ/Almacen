<div>
      {{-- <----- Este fragmento de código es el modal -----> --}}
    <div wire:ignore.self  class="modal fade" id="pro-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <label for="marca" class="form-label">Marca</label>
                  <input wire:model='marca' @error('marca')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror type="text" class="form-input  bg-gray-50 rounded-lg hover:border-blue-700" >
                  
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
                    <label for="contenido" class="form-label">Contenido</label>
                    <input wire:model='contenido' @error('contenido')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror type="text" class="form-input  bg-gray-50 rounded-lg hover:border-blue-700" >
                   
                  </div>
                
                <div class="pt-2">
                  <label for="categoria" class="">Categoria</label>
                  <select wire:model="categoria" @error('categoria')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror name="" id="" style="width: 97%" class="form-select bg-gray-50 rounded-lg hover:border-blue-700">
                    <option value="" selected>seleccionar</option>
                    <option value="Papeleria" >Papeleria</option>
                    <option value="Laboratorio" >Laboratorio Aguas</option>
                   
                  </select>
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
            <button wire:click.prevent="update" type="button" class="px-3 py-2 rounded-md text-white bg-blue ">Guardar</button>
            </span>
          </div>
        </div>
      </div>
</div>
    {{-- <----- Fin fragmento de código modal -----> --}}

  {{-- <--- Data table de poveedores ---> --}}
    
    <table class="table bg-white border shadow-sm rounded-2">
      <div class="bg-primary bg-gradient p-1  ">
        <thead class="">
          <tr>
            <th scope="col" class="text-center text-uppercase">Clave</th>
            <th scope="col" class="text-center text-uppercase">Material</th>
            <th scope="col" class="text-center text-uppercase">Marca</th>
            <th scope="col" class=" text-uppercase">Descripción</th>
            <th scope="col" class="text-uppercase">Categoria</th>
            <th scope="col" class="text-center text-uppercase">Empaque</th>
            <th scope="col" class="text-center text-uppercase">Contenido</th>
            <th scope="col" class="text-center text-uppercase">acciones</th>
          </tr>
        </thead>
      </div>
      <tbody>
        
          
        @foreach ($products as $data)
        <tr class="">
          <th class="pt-3 font-weight-normal text-decoration-underline text-center">{{ $data->clave_producto }}</th>
          <th class="pt-3 font-weight-normal text-center">{{ $data->producto }}</th>
          <th class="pt-3 font-weight-normal text-center">{{ $data->marca }}</th>
          <th class="pt-3 font-weight-normal ">{{ $data->descripcion }}</th>
          <th class="pt-3 font-weight-normal ">{{ $data->categoria }}</th>
          <th class="pt-3 font-weight-normal text-center">{{ $data->empaque }}</th>
          <th class="pt-3 font-weight-normal text-center">{{ $data->contenido }}</th>
          
          <td class="text-center">
            <button  wire:click.prevent='modalupdate({{$data->id}})' type="button" class="btn btn-outline-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg>
            </button>
            
            <button wire:click.prevent='delete' type="button" class="btn btn-outline-danger" >
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
    {{ $products->links() }}
    
</div>

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
                        <input wire:model='marca' @error('marca')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror type="text" class="form-input   bg-gray-50 rounded-lg hover:border-blue-700" >
                      </div>

                      <div class="pt-2">
                        <label for="presentacion" class="">Presentación</label>
                        <select wire:model="presentacion" @error('empaque')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror  name="" id="" style="width: 83%" class="form-select bg-gray-50 rounded-lg hover:border-blue-700">
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
                        <input wire:model='producto' @error('producto')  class="  bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror type="text" class="form-input w-100 bg-gray-50 rounded-lg hover:border-blue-700" >

                      </div>

                      <div class="pt-2">
                        <label for="categoria" class="">Categoria</label>
                        <select wire:model="categoria" @error('categoria')  class=" bg-gray-50  rounded-lg border-danger"   @enderror name="" id="" style="width: 100%" class="form-select bg-gray-50 rounded-lg hover:border-blue-700">
                          <option value="" selected>seleccionar</option>
                          <option value="Papeleria" >Papeleria</option>
                          <option value="Reactivo" >Reactivo</option>
                          <option value="Insumo general" >Insumo General</option>
                        </select>
                      </div>
                      <div class="pt-2">
                        <label for="contenido" class="form-label">Contenido</label>

                        <input wire:model='contenido' @error('contenido')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror type="text" style="width: 67%" class=" text-left border-end-0 position-relative  form-input  bg-gray-50 rounded-lg hover:border-blue-700" >
                        <select wire:model="unidad" @error('categoria')  class=" bg-gray-50  rounded-lg border-danger"  placeholder="{{ $message }}" @enderror name="" id="" style="" class="border-start-0 position-absolute top-50 start-50 translate-middle form-select bg-gray-50 rounded-lg hover:border-blue-700">
                          <option value="" selected>  </option>
                          <option value="Kg" >kg</option>
                          <option value="gr" >gr</option>
                          <option value="L" >L</option>
                          <option value="pz" >Pz</option>
                          <option value="ml" >ml</option>
                          <option value="Pqt" >Pqt</option>

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
    <div>
      <h5 class="h5 text-bold">Filtros de busqueda:</h5>
      <div class="mb-2 d-flex justify-content-between">
        <div class=" ml-2 d-flex justify-content-between">
          <div>
            <select wire:model="filtercategory" name="" id="" class="form-select  w-64 rounded-lg hover:border-blue-700">
              <option value="0">Seleccione una categoria</option>
              <option value="1">Papeleria</option>
              <option value="2">Reactivo</option>
              <option value="3">Insumo general</option>
            </select>
          </div>
          <div class=" mx-4">
            <select wire:model="campo" name="" id="" class="form-select  w-60 rounded-lg hover:border-blue-700">
              <option value="clave_producto">Clave</option>
              <option value="producto">Producto</option>
            </select>
          </div>
          <div>
            <i class="fa fa-search "> </i>
            <input wire:model="search" type="text" class=" ml-1 w-64 form-input rounded-lg hover:border-blue-700"  placeholder="Buscar">
          </div>
        </div>
        <div class="">
          @livewire('almacen.producto.create-producto')
        </div>
      </div>
  </div>
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
            <th scope="col" class="text-center text-uppercase">presentacion</th>
            <th scope="col" class="text-center text-uppercase">Contenido</th>
            <th scope="col" class="text-center text-uppercase">acciones</th>
          </tr>
        </thead>
      </div>
      <tbody>


        @foreach ($products as $data)
        <tr class="">
          <th class="pt-3 font-weight-normal text-decoration-underline text-center">{{ $data->clave_producto }}</th>
          <th class="pt-3 font-weight-normal text-center"><a href="">{{ $data->producto }}</a></th>
          <th class="pt-3 font-weight-normal text-center">{{ $data->marca }}</th>
          <th class="pt-3 font-weight-normal ">{{ $data->descripcion }}</th>
          <th class="pt-3 font-weight-normal ">{{ $data->categoria }}</th>
          <th class="pt-3 font-weight-normal text-center">{{ $data->presentacion }}</th>
          <th class="pt-3 font-weight-normal text-center">{{ $data->contenido.''.$data->unidad }}</th>

          <td class="text-center">
            <button  wire:click.prevent='modalupdate({{$data->id}})' type="button" class="pr-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-blue" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg>

            </button>

            <button wire:click.prevent='addprecio({{$data->id}})' type="button" class="hover:bg-gray" >
              <div class="flex border border-success border-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-currency-dollar text-green" viewBox="0 0 16 16">
                  <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill text-green pt-1" viewBox="0 0 16 16">
                  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                </svg>
              </div>
            </button>
          </td>

        </tr>
        <div>hola</div>
        @endforeach
      </tbody>
    </table>
    {{ $products->links() }}

</div>

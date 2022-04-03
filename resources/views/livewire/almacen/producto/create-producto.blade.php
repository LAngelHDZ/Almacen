<div>
            {{-- Este boton abre un modal donde está el formulario para dar de alta un proveedor --}}

                 <div class=" p-1 border border-success rounded-lg">
                    <a wire:click.prevent='showmodal'  class="btn btn-success ">
                         <i class="fa fa-plus-circle"></i> Nuevo
                    </a>
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
                <div  class="modal-body">
                    <div x-data="togg()">
                        <div class="border-bottom border-primary flex">
                            <button @click="show(open)"  class="mr-2">
                                <i x-bind:class="{'fas fa-chevron-right text-blue':!open, 'fas fa-chevron-down text-blue':open}"></i>
                                {{-- <i x-show="open" class=""></i> --}}
                            </button>
                            <p>Informacion del producto</p>
                        </div>

                    <div x-show="setOpen()" 
                    x-transition:enter="transition ease-out duration-600"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-600"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90" 
                    id="myDIV" class="mt-2">

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
                <textarea wire:model="des" @error('des') cols="15" rows="2"  class=" bg-gray-50 w-full px-4  rounded-lg border-danger"  placeholder="{{ $message }}"  @enderror  cols="15" rows="2" class="form-input w-full px-4 bg-gray-50 rounded-lg hover:border-blue-700"></textarea>
            </div>

        </div>
          <div class="mt-3">
            <div class="border-bottom border-primary flex">
              <button @click="show2(open2)" class="mr-2">
                <i class="text-blue" x-bind:class="{'fas fa-chevron-right':!open2, 'fas fa-chevron-down':open2}"></i>
              </button>
              <p>Precio/Proveedor</p>
          </div>
          <div x-show="setOpen2()" 
          x-transition:enter="transition ease-out duration-600"
          x-transition:enter-start="opacity-0 scale-90"
          x-transition:enter-end="opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-600"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-90" 
          >

        <div class="shadow-sm  bg-body rounded bg-white mt-2 pb-2">
          <div class="d-flex justify-content-end pr-2 my-2">
            <button class="btn btn-sm btn-success"
            wire:click.prevent="addProveedor">+ Add proveedor</button>
          </div>
          <table class="table" id="products_table">
            <thead>
            <tr>
                <th>Proveedor</th>
                <th>Precio</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
              @foreach($arrayCats as $index=>$arrayCat )
              <tr>
                <td>
                    <select 
                    wire:model="arrayCats.{{ $index }}.idproveedor"
                    class="rounded-lg w-100 form-select bg-gray-50 hover:border-blue-700">
                            <option value="" selected>Seleccionar</option>
                            @foreach($listProve as $data)
                            <option value="{{$data->id}}">{{$data->empresa}}</option>
                            @endforeach
                    </select>
                </td>
                <td>
                    <input type="text"
                           class="rounded-lg form-input bg-gray-50 hover:border-blue-700"
                           wire:model='arrayCats.{{ $index }}.precio'
                    />
                </td>
                <td>
                  <div class="p-2">

                    <a  href="#" wire:click.prevent="removeProveedor({{$index}})">Delete</a>
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

      <script>
          function togg(){
              return{
                open:true,
                open2:false,
                
                show:function(open){
                  if(open){
                    this.open=false;
                  }else{
                    this.open=true;
                  }
                },
                setOpen(){return this.open===true},

                show2:function(open2){
                  if(!open2){
                    this.open2=true;
                  }else{
                    this.open2=false;
                  }
                },
                setOpen2(){return this.open2===true}

              }

              
          }
      </script>
</div>

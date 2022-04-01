 <div>
    {{-- <----- Este fragmento de código es el modal -----> --}}
    <div wire:ignore.self  class="modal fade" id="pro-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
            <div class="modal-header">
              <h5 class="modal-title h3" id="exampleModalLabel">
                  @if($viewinfo)
                      Historial de precios
                  @else
                      @if ($view)
                      Precios y proveedores
                      @else
                      Editar precio
                      @endif
                  @endif
            </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- <--- Fin cabecera modal ---> --}}
            {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
            <div class="modal-body bg-gray-50">
                @if($viewinfo)
                <div class="shadow-sm  bg-body rounded bg-white ">
                    <div class="d-flex justify-content-center border-bottom border-primary h5 text-bold">
                        <div class=" w-100 ">
                            <p class="text-center">Precio</p>
                        </div>
                        <div class=" w-100 ">
                            <p class="text-center">Fecha</p>
                        </div>
                    </div>
                    @foreach ($historyprice as $data )
                        <div class="d-flex justify-content-center border-bottom border-gray h5 ">
                            <div class=" w-100 ">
                                <p class="text-center">{{'$'.$data->precio }}</p>
                            </div>
                            <div class=" w-100 ">
                                <p class="text-center">{{ $data->fecha }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                    <div>
                        <div class="mb-3">
                            <label for="text-empresa" class="form-label">Proveedor</label>
                            <select wire:model="proveedor" @error('proveedor')  class="rounded-lg bg-gray-50 border-danger"  @enderror name="" id="" style="" class="rounded-lg w-100 form-select bg-gray-50 hover:border-blue-700">
                               <option value="" selected>  </option>
                               @foreach($listProve as $data)
                               <option value="{{$data->id}}">{{$data->empresa}}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="mb-3">
                           <label for="text-precio" class="form-label">Precio</label>
                           <input wire:model='precio' type="text" class="rounded-lg form-input w-100 bg-gray-50 hover:border-blue-700" id="name-empresa">
                           @error('precio') <span class="error">{{ $message }}</span> @enderror
                       </div>
                    </div>
                @endif
            </div>
            {{-- <-- Fin cuerpo modal --> --}}

            <div class="modal-footer">
                <button wire:click.prevent='resetdatos' type="button" class="px-4 py-2 rounded-md bg-gray hover:border-black" data-dismiss="modal">Cerrar</button>
                @if($viewinfo)
                @else
                <span x-on:click="on = false">
                    @if($view)
                    <button wire:click.prevent="create" type="button" class="btn btn-outline-primary">guardar</button>
                    @else
                    <button wire:click.prevent="updateprecio" type="button" class="btn btn-outline-primary">Actualizar</button>
                    @endif
                </span>
                @endif
            </div>
          </div>
        </div>
    </div>
    {{-- <----- Fin fragmento de código modal -----> --}}

    <div class="pb-3 ">

    <button wire:click.prevent='createPrice' type="button" class="pt-2 btn btn-outline-success" >
    <i class="pr-1 fa fa-plus-circle"></i>Precio / Proveedor
    </button>

    </div>

    <div>
        <table class="table px-1 bg-white border shadow-sm rounded-2">
            <thead class="">
                <div class="p-1 bg-primary bg-gradient " style="--bs-bg-opacity: .5;">
                    <tr>
                        <th scope="col" class="text-center text-uppercase">#</th>
                        <th scope="col" class="text-center text-uppercase">Proveedor</th>
                        <th scope="col" class="text-center text-uppercase">Precio</th>
                        <!-- <th scope="col" class="text-center text-uppercase"></th> -->
                        <th scope="col" class="text-center text-uppercase">Acciones</th>
                    </tr>
                </div>
            </thead>

            <tbody>
            <!-- if -->

            <!-- <tr>
                <td ><span class="text-center text-gray">No hay registros</span> </td>
            </tr> -->
                @php
                    $int=0;
                @endphp
                @foreach($listPrecio as $data)
                    <tr class="">
                        <th class="pt-3 text-center font-weight-normal text-decoration-underline">1</th>
                        <th class="pt-3 text-center font-weight-normal">{{$data->empresa}}</th>
                        <th class="pt-3 text-center font-weight-normal">${{$data->precio}}</th>

                        <!-- <th class="pt-3 text-center font-weight-normal"></th> -->


                        <td class="text-center">
                            <button wire:click.prevent='historyprices({{ $data->idcat }})' type="button" class="pt-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill text-green" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </button>

                            <button wire:click.prevent='update({{$data->idcat}})'  type="button" class="pt-2 mx-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-blue" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>

                            </button>

                            <!-- <button wire:click='' type="button" class="pt-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eraser-fill text-red" viewBox="0 0 16 16">
                                    <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
                                </svg>
                            </button> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

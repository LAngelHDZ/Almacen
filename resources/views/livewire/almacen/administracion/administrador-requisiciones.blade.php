<div>
    <div>
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Show a second modal and hide this one with the button below.
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Hide this modal and show the first with the button below.
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                </div>
              </div>
            </div>
          </div>
          <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>



{{-- <----- Este fragmento de código es el modal -----> --}}
<div wire:ignore.self  class="modal fade" id="showrec" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
      <div class="modal-content">

        {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Agregar asunto de rechazo</h5>
        </div>
        {{-- <--- Fin cabecera modal ---> --}}

        {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
        <div class="modal-body bg-gray-50">
            <button wire:click='closemodalrec' class="btn btn-secondary" >Cerrar</button>
        </div>
        {{-- <-- Fin cuerpo modal --> --}}

        {{-- <div class="modal-footer">
          <button wire:click='closemodal' class="btn btn-secondary" >Cerrar</button>

          <button wire:click='aceptar({{1}})' @if ($status) class="hidden"  @else class="btn btn-danger" @endif>Rechazar</button>
          <button wire:click='aceptar({{2}})' @if ($status) class="hidden"  @else class="btn btn-success" @endif>Aprobar</button>


        </div> --}}

      </div>
    </div>
  </div>
  {{-- <----- Fin fragmento de código modal -----> --}}
    </div>



  {{-- <----- Este fragmento de código es el modal -----> --}}
  <div wire:ignore.self  class="modal fade" id="showreq" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo proveedor</h5>
        </div>
        {{-- <--- Fin cabecera modal ---> --}}

        {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
        <div class="modal-body bg-gray-50">
            <div class="h-50">
                @if ($messageP)
        <p class="text-red text-sm ">{{ $messagetxt }}</p>
        @endif
                <table class=" table table-hover table-striped table-light table-sm border shadow-sm rounded-2">
                    <div class="p-1 bg-primary bg-gradient ">
                        <thead class=" bg-white">
                            <tr>
                                <th scope="col" class="text-center text-uppercase">Clave</th>
                                <th scope="col" class="text-center text-uppercase">Material</th>
                                <th scope="col" class="text-center text-uppercase">Solicitado</th>
                                <th scope="col" class="text-center text-uppercase">Aprobado</th>

              </tr>
            </thead>
          </div>
          <tbody class="">

            @foreach ($products as $index=> $data)
            <tr class="">
              <th class="pt-3 text-center font-weight-normal text-decoration-underline">{{ $data['clave'] }}</th>
              <th class="pt-3 text-center font-weight-normal">{{ $data['producto'] }}</th>
              <th class="pt-3 text-center font-weight-normal">{{ $data['cantidad'] }}</th>
              <th class="pt-3 text-center font-weight-normal">
                  @if($status)
                    {{ $data['aprobado'] }}
                      @else
                  <input wire:model="products.{{ $index }}.aprobado" class="w-10 rounded-lg hover:border-blue-700" type="text">
                  @endif
                </th>
    </tr>
    @endforeach
    </tbody>
    </table>
        </div>
        {{-- <-- Fin cuerpo modal --> --}}

        <div class="modal-footer">
          <button wire:click='closemodal' class="btn btn-secondary" >Cerrar</button>

          <button wire:click='showmodalrec()'  @if ($status) class="hidden"  @else class="btn btn-danger" @endif>Rechazar</button>
          <button wire:click='aceptar({{2}})' @if ($status) class="hidden"  @else class="btn btn-success" @endif>Aprobar</button>


        </div>

      </div>
    </div>
  </div>
  {{-- <----- Fin fragmento de código modal -----> --}}
    </div>
    <div class="mx-5 mb-3 ">
        <nav class="block">
            <button wire:click='filterquery({{ 2 }})' class="px-3 py-2 rounded-lg  border border-primary bg-white">Nuevas <i class="fas fa-envelope text-primary"></i></button>
            {{-- <button wire:click='filterquery({{ 2 }})' class="px-3 py-2 ml-2 rounded-lg  border border-warning bg-white">Revisado <i class="fas fa-envelope-open-text text-warning"></i></button> --}}
            <button wire:click='filterquery({{ 3 }})' class="px-3 py-2 mx-2 rounded-lg border border-success  bg-white">Aprobado <i class="fas fa-clipboard-check text-green-500"></i></button>
            <button wire:click='filterquery({{ 4 }})' class="px-3 py-2 rounded-lg border border-danger  bg-white">Rechazado  <i class="fas fa-file-excel text-red-500"></i></button>
        </nav>
    </div>
    <div class="mx-5">
        @foreach ( $solicitud as $indexa => $data )
        <div class="my-1 border rounded-sm shadow-sm bg-white ">
            <div class="flex ">
                <div class="flex w-1/3 py-3 pl-3 mr-2 bg-gray-100 border-right">
                    <div class="">
                        {{-- <span class="text-bold">{{ $data['folio'] }}</span>
                        <p class="text-gray-700">{{ $data['date'] }}</p> --}}
                        <span class="text-bold">{{ $data->folio }}</span>
                        @foreach ( $solicitudes as $indexb => $dat )
                        @if($indexb == $indexa)
                        <p class="text-gray-700">{{ $dat['date'] }}</p>
                        <p class="text-gray-700">{{ $dat['time'] }}</p>
                        @break
                        @endif
                        @endforeach
                    </div>
                    <div class="ml-4 flex">
                        <p class="text-gray-700">{{ $data->name }}</p>
                        {{-- <p class="text-gray-700">{{ $data['name'] }}</p> --}}
                    </div>
                </div>
                <div class="flex justify-between w-2/3 ">
                    <div class="w-75 ">
                        <div class="mb-2">
                            <p class="text-bold">Seguimiento:</p>
                        </div>
                        <div class="flex">
                            @foreach ($seguimiento as $indexc => $da )
                                @if ($indexc == $indexa)
                                <div class="px-3 flex">
                                    @foreach ($da['status'] as $indexadoa => $status )
                                    <div class=" mx-3">
                                        <div>
                                            <p class="text-sm text-bold">
                                                {{ $status['status']}}
                                            </p>
                                        </div>
                                        @foreach ($da['icon'] as $indexadob => $icon )
                                        <div class="pl-1">
                                            <i
                                            @if($indexadoa == $indexadob)
                                            class="{{ $icon['icon']}}"

                                            @endif
                                            ></i>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class=" ">
                                        <i class="far fa-lg fa-window-minimize text-gray-500"></i>
                                    </div>
                                    @endforeach                               </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="p-3 ">
                        <button wire:click='inforeq({{ $data['id'] }})' class="p-2 mt-1 btn btn-primary">
                            Revisar
                        </button>
                    </div>
                </div>

            </div>
        </div>
        @endforeach

        <div class="pb-2">

            {{ $solicitud->links() }}
        </div>

    </div>

    <script>
        function togg(){
            return{
              open:[],
              show:function(open){
                if(open){
                  this.open=false;
                }else{
                  this.open=true;
                }
              },
              setOpen(){return this.open===true},
            }
        }
    </script>

</div>

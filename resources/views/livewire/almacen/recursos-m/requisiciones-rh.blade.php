<div>
<div>
{{-- <----- Este fragmento de código es el modal -----> --}}
<div wire:ignore.self  class="modal fade" id="showrec" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
      <div class="modal-content">

        {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Tiempo de espera</h5>
        </div>
        {{-- <--- Fin cabecera modal ---> --}}

        {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
        <div class="modal-body bg-gray-50">

            <select wire:model='descripc' name="" id="" class="rounded-lg w-100 form-select hover:border-blue-700">
                <option value="" selected>Seleccionar</option>
                @foreach ($concept_espera as $data )
                <option value="{{$data->id }}">{{$data->descripcion}}</option>
                @endforeach
            </select>
        </div>
        {{-- <-- Fin cuerpo modal --> --}}

        <div class="modal-footer">
          <button wire:click='closemodaltran' class="btn btn-secondary" >Cerrar</button>
          {{-- <button wire:click='aceptar({{1}})' @if ($status) class="hidden"  @else class="btn btn-danger" @endif>Rechazar</button> --}}
          <button wire:click='aprob_req({{ $data['id'] }})' @if ($status) class="hidden"  @else class="btn btn-success" @endif>Aprobar</button>


        </div>

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

                <table class=" table table-hover table-striped table-light table-sm border shadow-sm rounded-2">
                    <div class="p-1 bg-primary bg-gradient ">
                        <thead class=" bg-white">
                            <tr>
                                <th scope="col" class="text-center text-uppercase">Clave</th>
                                <th scope="col" class="text-center text-uppercase">Material</th>
                                @if(!$aprobado)
                                <th scope="col" class="text-center text-uppercase">Cantidad</th>
                                @else
                                <th scope="col" class="text-center text-uppercase">Aprobado</th>
                                @endif

              </tr>
            </thead>
          </div>
          <tbody class="">

            @foreach ($products as $data)
            <tr class="">
              <th class="pt-3 text-center font-weight-normal text-decoration-underline">{{ $data['clave'] }}</th>
              <th class="pt-3 text-center font-weight-normal"><a href="">{{ $data['producto'] }}</a></th>
              @if(!$aprobado)
              <th class="pt-3 text-center font-weight-normal">{{ $data['cantidad'] }}</th>
              @else
              <th class="pt-3 text-center font-weight-normal">{{ $data['aprobado'] }}</th>
              @endif
    </tr>
    @endforeach
    </tbody>
    </table>
        </div>
        {{-- <-- Fin cuerpo modal --> --}}

        <div class="modal-footer">
          <button wire:click='closemodal' class="btn btn-secondary" >Cerrar</button>

          <button wire:click='aceptar' @if ($status) class="hidden"  @else class="btn btn-success" @endif>Revisado</button>


        </div>

      </div>
    </div>
    </div>
    </div>
    {{-- <----- Fin fragmento de código modal -----> --}}

    <div class="mx-5 mb-3 ">
        <nav class="block">
            <button wire:click='filterquery({{ 1 }})' class="px-3 py-2 rounded-lg  border border-primary bg-white">Nuevas <i class="fas fa-envelope text-primary"></i></button>
            <button wire:click='filterquery({{ 2 }})' class="px-3 py-2 ml-2 rounded-lg  border border-warning bg-white">Revisado <i class="fas fa-envelope-open-text text-warning"></i></button>
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
                                        @if($status['status']!='Rechazada')
                                        <i class="far fa-lg fa-window-minimize text-gray-500"></i>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="p-3 ">
                        @foreach ($seguimiento as $indexz => $dato)
                        @if($indexa == $indexz)
                        @if ($dato['close'])
                        <button
                        wire:click='close_req({{ $data['id'] }})' class=" inline-block px-3 py-2 mt-1  btn btn-danger" >
                        <i class="fas fa-ban"></i>
                    </button>
                    @endif
                        @if ($dato['aprob'])
                        <button
                        wire:click='showmodaltran({{ $data['id'] }})' class=" inline-block  mt-1 px-3 py-2 btn btn-success" >
                        {{-- wire:click='aprob_req({{ $data['id'] }})' class=" inline-block  mt-1 px-3 py-2 btn btn-success" > --}}
                        <i class="fas fa-check"></i>
                    </button>
                    @endif
                    @endif
                        @endforeach
                        <button wire:click='inforeq({{ $data['id'] }})' class="  p-2 mt-1 btn btn-primary">
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


</div>

<div>
    <div>

        {{-- <----- Este fragmento de código es el modal -----> --}}
        <div wire:ignore.self class="modal fade" id="showrec" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-sm-down">
                <div class="modal-content">

                    {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Motivo de rechazo de la solicitud</h5>
                    </div>
                    {{-- <--- Fin cabecera modal ---> --}}

                    {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
                    <div class="modal-body bg-gray-50">
                        @if ($messageP)
                        <p class="text-sm text-red ">{{ $messagetxt }}</p>
                        @endif

                        <select wire:model='descripc' name="" id="" class="rounded-lg w-100 form-select hover:border-blue-700">
                            <option value="" selected>Seleccionar</option>
                            @foreach ($concept_rechazo as $data )
                            <option value="{{$data->id }}">{{$data->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <-- Fin cuerpo modal --> --}}

                    <div class="modal-footer">
                        <button wire:click='closemodalrec' class="btn btn-secondary">Cerrar</button>

                        <button wire:click='aceptar({{1}})' @if ($status) class="hidden" @else class="btn btn-danger" @endif>Rechazar</button>
                        {{-- <button wire:click='aceptar({{2}})' @if ($status) class="hidden" @else class="btn btn-success" @endif>Aprobar</button> --}}


                    </div>

                </div>
            </div>
        </div>
        {{-- <----- Fin fragmento de código modal -----> --}}
    </div>



    {{-- <----- Este fragmento de código es el modal -----> --}}
    <div wire:ignore.self class="modal fade" id="showreq" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                </div>
                {{-- <--- Fin cabecera modal ---> --}}

                {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
                <div class="modal-body bg-gray-50">
                    <div class="h-50">
                        @if ($messageP)
                        <p class="text-sm text-red ">{{ $messagetxt }}</p>
                        @endif
                        <table class="table border shadow-sm table-hover table-striped table-light table-sm rounded-2">
                            <div class="p-1 bg-primary bg-gradient ">
                                <thead class="bg-white ">
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
                        <button wire:click='closemodal' class="btn btn-secondary">Cerrar</button>

                        <button wire:click='showmodalrec()' @if ($status) class="hidden" @else class="btn btn-danger" @endif>Rechazar</button>
                        <button wire:click='aceptar({{2}})' @if ($status) class="hidden" @else class="btn btn-success" @endif>Aprobar</button>


                    </div>

                </div>
            </div>
        </div>
        {{-- <----- Fin fragmento de código modal -----> --}}
    </div>
    <div class="mx-5 mb-3 ">
        <nav class="block">
            <button wire:click='filterquery({{ 2 }})' class="px-3 py-2 bg-white border rounded-lg border-primary">Nuevas <i class="fas fa-envelope text-primary"></i></button>
            {{-- <button wire:click='filterquery({{ 2 }})' class="px-3 py-2 ml-2 bg-white border rounded-lg border-warning">Revisado <i class="fas fa-envelope-open-text text-warning"></i></button> --}}
            <button wire:click='filterquery({{ 3 }})' class="px-3 py-2 mx-2 bg-white border rounded-lg border-success">Aprobado <i class="text-green-500 fas fa-clipboard-check"></i></button>
            <button wire:click='filterquery({{ 4 }})' class="px-3 py-2 bg-white border rounded-lg border-danger">Rechazado <i class="text-red-500 fas fa-file-excel"></i></button>
        </nav>
    </div>
    <div class="mx-5">
        @foreach ( $solicitud as $indexa => $data )
        <div class="my-1 bg-white border rounded-sm shadow-sm ">
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
                    <div class="flex ml-4">
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
                            <div class="flex px-3">
                                @foreach ($da['status'] as $indexadoa => $status )
                                @if ($status['status']!='Enviada')
                                <div class="mx-3 ">
                                    <div>
                                        <p class="text-sm text-bold">
                                            {{ $status['status']}}
                                        </p>
                                    </div>
                                    @foreach ($da['icon'] as $indexadob => $icon )
                                    @if($indexadoa == $indexadob)

                                    <div class="pl-1">
                                        <i class="{{ $icon['icon']}}"></i>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>

                                <div class="">
                                    <i class="text-blue-500 far fa-lg fa-window-minimize"></i>
                                </div>
                                @endif
                                @endforeach
                            </div>
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
        function togg() {
            return {
                open: []
                , show: function(open) {
                    if (open) {
                        this.open = false;
                    } else {
                        this.open = true;
                    }
                }
                , setOpen() {
                    return this.open === true
                }
            , }
        }

    </script>
</div>

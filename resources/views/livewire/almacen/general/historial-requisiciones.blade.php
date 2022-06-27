<div>
    <div>

        @foreach ($solicitud as $index=> $list)
          <div class="pl-3 my-3 {{ $list['class'] }} border-gray-500 rounded-lg shadow-sm">
            <div class="bg-white rounded-sm">
                <div class="p-3">
                    <div class="flex m-0 ">
                        <h3 class="text-bold h5">Número de folio:</h3>
                        <span class="ml-2 h5">{{$list['folio']}}</span>
                    </div>
                    <div class="flex justify-between p-3 bg-gray-50">
                        <div class="flex ">
                            <div class="px-2 py-2">
                                <i class="{{ $list['icon'] }}"></i>
                            </div>
                            <div class="mx-2">
                                <div>
                                    <p class="text-bold">
                                        @if ($list['status'] !='transito')
                                        Solicitud
                                    @else
                                        Materiales en
                                    @endif {{$list['status']}}</p>
                                </div>
                                <div class="flex text-gray-700">
                                    <p class=""><span class="ml-1">{{$list['date']}}</span></p>

                                    <span class="ml-1">{{'- '.$list['time']}}</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-700">@if ($list['status']=='transito')
                                    <span>Compra realizada al provedor </span>
                                @endif{{$list['descripcion']}}</p>


                            </div>
                        </div>
                        <div class="">
                            @foreach ($seguimiento as $indexz => $dato)
                            @if($index == $indexz)
                            @if ($dato['close'])
                            <button
                            wire:click.prevent='close_req({{ $list['id'] }})' class="p-2 mt-1 ml-2 btn btn-danger" >
                            Cerrar
                        </button>
                        @endif
                        @endif
                            @endforeach
                            {{-- <button  class="p-2 mt-1 btn btn-primary">
                                Abrir
                            </button> --}}
                        </div>
                    </div>
                    <div class="mt-2" x-data="togg()">
                        <div class="">
                            <a  href="">Ver detalles</a>
                        </div>
                        <div class="flex">
                            @foreach ($seguimiento as $indexc => $da )
                            @if ($indexc == $index)
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
                                        @if($status['status']!='Terminado')
                                        <i class="far fa-lg fa-window-minimize text-blue-500"></i>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        function togg(){
            return{
              open:true,
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

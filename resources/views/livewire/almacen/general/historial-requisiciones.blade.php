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
                                    <p class="text-bold">Solicitud {{$list['status']}}</p>
                                </div>
                                <div class="flex text-gray-700">
                                    <p class=""><span class="ml-1">{{$list['date']}}</span></p>

                                    <span class="ml-1">{{'- '.$list['time']}}</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-700">{{$list['descripcion']}}</p>

                                
                            </div>
                        </div>
                        <div class="">
                            <button class="px-3 py-2 bg-white border rounded-lg hover:border-blue-700">
                                Edit
                            </button>
                        </div>
                    </div>
                    <div class="mt-2" x>
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
                                        <i class="far fa-lg fa-window-minimize text-gray-500"></i>
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


</div>

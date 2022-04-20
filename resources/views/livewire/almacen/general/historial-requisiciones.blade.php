<div>
    <div>

        @foreach ($solicitud as $index=> $list)
          <div class="pl-3 my-3 bg-gray-500 border border-gray-500 rounded-lg shadow-sm">
            <div class="bg-white rounded-sm">
                <div class="p-3">
                    <div class="flex m-0 ">
                        <h3 class="text-bold h5">Número de folio:</h3>
                        <span class="ml-2 h5">{{$list['folio']}}</span>
                    </div>
                    <div class="flex justify-between p-3 bg-gray-50">
                        <div class="flex ">
                            <div class="px-2 py-2">
                                <i class="fas fa-lg fa-paper-plane"></i>
                            </div>
                            <div class="mx-2">
                                <div>
                                    <p class="text-bold">Solicitud {{$list['status']}}</p>
                                </div>
                                <div class="flex text-gray-700">
                                    <p class=""><span class="ml-1">{{$list['date']}}</span></p>

                                    {{-- <span class="ml-1">{{'/'.$list['time']}}</span> --}}
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
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

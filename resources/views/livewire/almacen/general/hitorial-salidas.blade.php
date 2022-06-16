<div>
    <div class="h-50">
        <table class="table bg-white border shadow-sm rounded-2">
            <div class="p-1 bg-primary bg-gradient ">
                <thead class="">
                    <tr>
                        {{-- <th scope="col" class="text-center text-uppercase">Solicitante</th> --}}
                        {{-- <th scope="col" class="text-center text-uppercase"></th> --}}
                        <th scope="col" class="text-center text-uppercase">Producto</th>
                        <th scope="col" class=" text-center text-uppercase">Cantidad</th>
                        <th scope="col" class="text-center text-uppercase">Fecha de salida</th>
                        {{-- <th scope="col" class="text-center text-uppercase">Acciones</th> --}}
                    </tr>
                </thead>
            </div>
            <tbody>

                @foreach ($salidas as $index => $data)
                    <tr class=" bg-green-100">
                        {{-- <th class="pt-3 text-center font-weight-normal text-decoration-underline">{{ $data->name }}</th> --}}
                        <th class="pt-3 text-center font-weight-normal ">{{ $data->producto }}</th>
                        <th class="pt-3 text-center font-weight-normal ">{{ $data->cantidad }}</th>
                        <th class="pt-3 text-center font-weight-normal ">{{ $data->date . ' - ' . $data->time }} </th>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

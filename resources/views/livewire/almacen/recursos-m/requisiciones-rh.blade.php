<div>
    <div class="mx-5">
        @foreach ( $solicitudes as $data )
        <div class="my-1 border rounded-sm shadow-sm ">
            <div class="flex ">
                <div class="flex w-1/3 py-3 pl-3 mr-2 bg-gray-50 border-right">
                    <div class="">
                        <span class="text-bold">{{ $data->folio }}</span>
                        <p class="text-gray-700">{{ $data->date }}</p>
                    </div>
                    <div class="ml-4 ">
                        <p class="text-gray-700">{{ $data->name }}</p>
                    </div>
                </div>
                <div class="flex justify-between w-2/3">
                    <div class="w-75">
                        <p class="text-bold">Seguimiento:</p>
                        <p>{{$data->descripcion}}</p>
                    </div>
                    <div class="p-3 ">
                        <button class="p-2 mt-1 text-white border rounded-lg bg-blue">
                            Revisar
                        </button>
                    </div>
                </div>

            </div>
        </div>
        @endforeach

        <div class="pb-2">

            {{ $solicitudes->links() }}
        </div>

        {{-- <div class="h-50">

            <table class="table bg-white border shadow-sm rounded-2">
                <div class="p-1 bg-primary bg-gradient ">
                    <thead class="">
                        <tr>
                            <th scope="col" class="text-center text-uppercase">Folio</th>
                            <th scope="col" class="text-center text-uppercase">Fecha</th>
                            <th scope="col" class="text-center text-uppercase">status</th>
                            <th scope="col" class="text-center text-uppercase">Solicitante</th>
            <th scope="col" class=" text-uppercase">Nota</th>
            <th scope="col" class="text-center text-uppercase">acciones</th>
          </tr>
        </thead>
      </div>
      <tbody>


        @foreach ($solicitudes as $data)
        <tr class="">
          <th class="pt-3 text-center font-weight-normal text-decoration-underline">{{ $data->folio }}</th>
          <th class="pt-3 text-center font-weight-normal"><a href="">{{ $data->date }}</a></th>
          <th class="pt-3 text-center font-weight-normal"><a href="">@if ($data->status=='Enviada') Nueva @endif</a></th>
          <th class="pt-3 text-center font-weight-normal">{{ $data->name }}</th>
          <th class="pt-3 font-weight-normal ">{{ $data->descripcion }}</th>

          <td class="text-center">
              <button   type="button" class="pr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-blue" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>

        </button>

        {{-- <button type="button" class="hover:bg-gray" >
            <div class="flex border border-success border-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-currency-dollar text-green" viewBox="0 0 16 16">
                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="pt-1 bi bi-caret-right-fill text-green" viewBox="0 0 16 16">
                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                </svg>
            </div>
        </button> --}}
    {{-- </td>

</tr>

@endforeach
</tbody>
</table> --}}
    </div>
</div>

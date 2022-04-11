<div>
    <div>
        <div class="pt-2 mb-3">
            <div class=" border-bottom border-primary">
                <p class="mb-0 ml-3 h4">Datos requisición</p>
            </div>

            <div class="d-flex justify-content-between ">
                @foreach ($datas as $data)
                <div class="pl-3">
                    <div class="ml-5 ">
                        <p class="mb-0 font-weight-bolder h4">Prefolio: <span class="font-weight-normal h5"> {{$data['prefolio']}}</span> </p>
                    </div>
                    <div class="ml-5">
                        <p class="mb-0 font-weight-bolder ">Departamento: <span class="font-weight-normal">{{$data['usuario'][0]->departamento}}</span></p>
                        <p class="mb-0 font-weight-bolder">Empleado: <span class="font-weight-normal">  {{ auth()->user()->name }}</span></p>
                    </div>
                </div>
                <div class="pr-4 ">
                    <h3 class="font-weight-bolder h5">Fecha: <span class="font-weight-normal h6"> {{ $data['fecha'] }}</span> </h3>
                    {{-- <p class="ms-3 h5"></p> --}}
                </div>
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <div class="border-bottom border-primary">
                <p class="mb-0 ml-3 h4">Productos a solicitar</p>
            </div>
    </div>
    <div class="m-2">
        <form action="">
            <label for=""> Producto:</label>
            <select name="select" style="height:35px" class=" w-25 border-gray form-select">
                <option value="value1">Value 1</option>
                <option value="value2" selected>Value 2</option>
                <option value="value3">Value 3</option>
            </select>
            <label for="" class="ml-5"> Cantidad:</label>
            <input type="text" style="height:35px" class="w-25"   placeholder="0">
            <button class="px-2 ml-5 border-0 rounded btn btn-primary" style="">Aregar</button>
        </form>
    </div>

    <div class="border-white border-top">
    <table class="table bg-white shadow-sm ">
        <thead class="">
          <tr>
            <th scope="col" class="text-center text-uppercase">Producto</th>
            <th scope="col" class="text-center text-uppercase">Descripcion</th>
            <th scope="col" class="text-center text-uppercase">Cantidad</th>
            <th scope="col" class="text-center text-uppercase"></th>
          </tr>
        </thead>
      <tbody>


        <tr class="">
          <th class="pt-3 text-center font-weight-normal text-decoration-underline">Prueba VHI</th>
          <th class="pt-3 text-center font-weight-normal">Prueba VHI con sintomas a 3 meses</th>
          <th class="pt-3 text-center font-weight-normal">10</th>

          <td class="text-center">
            <button type="button" class="btn btn-outline-danger" >
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-center bi bi-x-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    </div>

</div>

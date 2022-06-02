<div>
    <div>
{{-- <----- Este fragmento de código es el modal -----> --}}
<div wire:ignore.self  class="modal fade" id="showreq" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Producto en espera</h5>
        </div>
        {{-- <--- Fin cabecera modal ---> --}}

        {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
        <div  class="modal-body bg-gray-50">
          <div   class="mb-2 px-3 pb-3">
            <div>
                <label for="" class="block">No. de empleado</label>
                <div class="flex">
                  <div class="mr-2 pb-0 border rounded-lg flex border-secondary  hover:border-blue-700">
                    <div class="bg-blue rounded-left pb-0 pt-1 px-1">
                      <i class="mx-1 mt-2 mb-0 fa fa-lg fa-search"></i>
                    </div>
                    <div class="mb-0 pb-0">
                      <input wire:model="" type="text" class="border-0 rounded-right form-input hover:border-blue-700"  placeholder="Buscar">
                    </div>
                </div>
                <div class="">
                  <button  wire:click="search_empleado" class="  px-2 py-2  rounded-sm btn-primary">Buscar</button>
                </div>
              </div>
            </div>
            <div>
            <div class="flex justify-between">
              <div class="flex ">
                <div >
                  <label for="" class="block">Producto clave</label>
                  <input type="text" class="w-64 rounded-lg hover:border-blue-700" name="" id="">
                </div>
                {{-- <div class="mx-4">
                  <label for="" class="block">Proveedor</label>
                  <select  name="" class=" w-64 rounded-lg hover:border-blue-700" id="">
                    <option value="" selected>Seleccionar</option>
                           
                  </select>
                </div>
                <div>
                  <label for="" class="block">Fecha de elaboracion</label>
                  <input  type="date" class="w-64 rounded-lg hover:border-blue-700">
                </div> --}}
              </div>
              <div class=" mt-4">
                <button  class="  px-2 py-2 mt-2 rounded-sm btn-success">Registrar</button>
              </div>

            </div>
            <div class="block mt-2">
              <label for="">Disponibilidad</label>
              <table class="table bg-white border shadow-sm rounded-2">
                <div class="p-1 bg-primary bg-gradient ">
                    <thead class="">
                        <tr>
                            <th scope="col" class="text-center text-uppercase">Clave</th>
                            {{-- <th scope="col" class="text-center text-uppercase"></th> --}}
                            <th scope="col" class="text-center text-uppercase">Producto</th>
                            <th scope="col" class="text-center text-uppercase">Disponible</th>
                            {{-- <th scope="col" class=" text-uppercase">Cantidad</th> --}}
                            {{-- <th scope="col" class="text-center text-uppercase">Acciones</th> --}}
          </tr>
        </thead>
      </div>
      <tbody>
    
        @foreach ($salidas as $index=> $data)
        <tr class=" bg-green-100">
            <th class="pt-3 text-center  text-decoration-underline">{{ $data->name }}</th>
            <th class="pt-3 text-center  text-success">{{ $data->date.' - '.$data->time }} </th>
            <th class="pt-3 text-center  text-danger">{{ $data->producto }}</th>
      
        </tr>
    @endforeach
    </tbody>
    </table>
            </div>
            </div>
           
          </div>
        {{-- <-- Fin cuerpo modal --> --}}

        <div class="modal-footer">
          <button   wire:click='closemodal'  class="btn btn-secondary" >Cerrar</button>

          {{-- <button wire:click='aceptar({{1}})' @if ($status) class="hidden"  @else class="btn btn-danger" @endif>Rechazar</button> --}}
          {{-- <button wire:click='aceptar()' @if ($status) class="hidden"  @else class="btn btn-success" @endif>Aprobar</button> --}}


        </div>

      </div>
    </div>
  </div>
  {{-- <----- Fin fragmento de código modal -----> --}}
    </div>
    </div>

    {{-- Tala de rsultados  --}}

    <div class="flex justify-between">
        <div>
        </div>
        <div>
            <button wire:click='showmodal' class=" rounded-sm mb-3 px-2 py-2 btn-primary">Registrar salida</button>

        </div>
    </div>
    <div class="h-50">
        <table class="table bg-white border shadow-sm rounded-2">
            <div class="p-1 bg-primary bg-gradient ">
                <thead class="">
                    <tr>
                        <th scope="col" class="text-center text-uppercase">Solicitante</th>
                        {{-- <th scope="col" class="text-center text-uppercase"></th> --}}
                        <th scope="col" class="text-center text-uppercase">Fecha de salida</th>
                        <th scope="col" class="text-center text-uppercase">Producto</th>
                        {{-- <th scope="col" class=" text-uppercase">Cantidad</th> --}}
                        {{-- <th scope="col" class="text-center text-uppercase">Acciones</th> --}}
      </tr>
    </thead>
  </div>
  <tbody>

    @foreach ($salidas as $index=> $data)
    <tr class=" bg-green-100">
        <th class="pt-3 text-center  text-decoration-underline">{{ $data->name }}</th>
        <th class="pt-3 text-center  text-success">{{ $data->date.' - '.$data->time }} </th>
        <th class="pt-3 text-center  text-danger">{{ $data->producto }}</th>
  
    </tr>
@endforeach
</tbody>
</table>
</div>

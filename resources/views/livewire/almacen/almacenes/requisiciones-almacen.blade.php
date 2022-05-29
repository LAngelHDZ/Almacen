<div x-data="togg()">
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
            <div class="mb-3">
              <button wire:click='flashdelete' @click="show2(open2)" >Nueva factura</button>
              <button wire:click='flashdelete' @click="show(open)" class="ml-3">Buscar</button>
            </div>

            @if(session()->has('message'))
                        <div>
                          <div class="p-2 mb-2 bg-green-700 text-white text-bold rounded-sm"><p> {{session('message') }}</p></div>
                        </div>
                            @endif
            <div  x-show="setOpen2()"
            x-transition:enter="transition ease-out duration-600"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            >
            <div class="flex justify-between">
              <div class="flex ">
                <div >
                  <label for="" class="block">No. Factura</label>
                  <input wire:model="nfactura" type="text" class="w-64 rounded-lg hover:border-blue-700" name="" id="">
                </div>
                <div class="mx-4">
                  <label for="" class="block">Proveedor</label>
                  <select wire:model="idproveedor" name="" class=" w-64 rounded-lg hover:border-blue-700" id="">
                    <option value="" selected>Seleccionar</option>
                            @foreach($listProve as $data)
                                <option  value="{{$data->id}}">{{$data->empresa}}</option>
                            @endforeach
                  </select>
                </div>
                <div>
                  <label for="" class="block">Fecha de elaboracion</label>
                  <input wire:model="fecha" type="date" class="w-64 rounded-lg hover:border-blue-700">
                </div>
              </div>
              <div class=" mt-4">
                <button  wire:click.prevent='create_factura' class="  px-2 py-2 mt-2 rounded-sm btn-success">Guardar factura</button>
              </div>

            </div>
            <div class="block mt-2">
              <label for="">Descripción</label>
              <textarea wire:model="descripcion" name="" class=" w-100 rounded-lg hover:border-blue-700" cols="30" rows="3" ></textarea>
            </div>
            </div>
            @if(session()->has('messages'))
            <div>
              @if ($alert)
              <div class="p-2 mb-2 bg-green-700 text-white text-bold rounded-sm"><p>{{session('messages')}}</p></div>
              @else
              <div class="p-2 mb-2 bg-red-700 text-white text-bold rounded-sm"><p>{{session('messages')}}</p></div>
              @endif
            </div>
                @endif
            <div
            x-show="setOpen()"
            x-transition:enter="transition ease-out duration-600"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            >
              <label for="" class="block">No. de factura</label>
              <div class="flex">
                <div class="mr-2 pb-0 border rounded-lg flex border-secondary  hover:border-blue-700">
                  <div class="bg-blue rounded-left pb-0 pt-1 px-1">
                    <i class="mx-1 mt-2 mb-0 fa fa-lg fa-search"></i>
                  </div>
                  <div class="mb-0 pb-0">
                    <input wire:model="factura" type="text" class="border-0 rounded-right form-input hover:border-blue-700"  placeholder="Buscar">
                  </div>
              </div>
              <div class="">
                <button  wire:click="search_f" class="  px-2 py-2  rounded-sm btn-primary">Buscar</button>
              </div>
            </div>
          </div>

          </div>

            <div class="h-50">

                <table class=" table table-hover table-striped table-light table-sm border shadow-sm rounded-2">
                    <div class="p-1 bg-primary bg-gradient ">
                        <thead class=" bg-white">
                            <tr>
                                <th scope="col" class="text-center text-uppercase">Clave</th>
                                <th scope="col" class="text-center text-uppercase">Material</th>
                                <th scope="col" class="text-center text-uppercase">Cantidad</th>
                                <th scope="col" class="text-center text-uppercase"></th>


              </tr>
            </thead>
          </div>
          <tbody class="">

            @foreach ($products as $index=> $data)
            <tr class="">
              <th class="pt-3 text-center font-weight-normal text-decoration-underline">{{ $data['clave'] }}</th>
              <th class="pt-3 text-center font-weight-normal">{{ $data['producto'] }}</th>
              <th class="pt-3 text-center font-weight-normal">{{ $data['aprobado'] }}</th>
              <th class="pt-2 text-center font-weight-normal">
                @foreach ($Validateproducts as $indexb=> $dat)
                @if ($index==$indexb)
                @if ($dat['show'] )
                <input wire:model="products.{{ $index }}.alta" @if ($factura==null) disabled @endif class="w-10 rounded-lg hover:border-blue-700" type="text">
                <button wire:click.prevent="stock({{ $index }})" @if ($factura==null) disabled @endif class=" inline-block btn-success ml-2 px-3 py-2 rounded-sm"><i class="fas fa-check"></i></button>
                @else
                <i class="fas fa-check text-green-500"></i>
                @endif
                @endif
                  @endforeach
                </th>
    </tr>
    @endforeach
    </tbody>
    </table>
        </div>
        {{-- <-- Fin cuerpo modal --> --}}

        <div class="modal-footer">
          <button   wire:click='closemodal'  class="btn btn-secondary" >Cerrar</button>

          {{-- <button wire:click='aceptar({{1}})' @if ($status) class="hidden"  @else class="btn btn-danger" @endif>Rechazar</button> --}}
          <button wire:click='aceptar()' @if ($status) class="hidden"  @else class="btn btn-success" @endif>Aprobar</button>


        </div>

      </div>
    </div>
  </div>
  {{-- <----- Fin fragmento de código modal -----> --}}
    </div>

    <div class="h-50">

            <table class="table bg-white border shadow-sm rounded-2">
                <div class="p-1 bg-primary bg-gradient ">
                    <thead class="">
                        <tr>
                            <th scope="col" class="text-center text-uppercase">Folio</th>
                            {{-- <th scope="col" class="text-center text-uppercase"></th> --}}
                            <th scope="col" class="text-center text-uppercase">Fecha</th>
                            <th scope="col" class="text-center text-uppercase">Descripcion</th>
            <th scope="col" class=" text-uppercase">Status</th>
            <th scope="col" class="text-center text-uppercase">Acciones</th>
          </tr>
        </thead>
      </div>
      <tbody>

        @foreach ($solicitud as $index=> $dat)
        @foreach ($solicitudes as $indexB=> $data)
        @if($index == $indexB)

        <tr class=" bg-green-100">
            <th class="pt-3 text-center  text-decoration-underline">{{ $data['folio'] }}</th>
            <th class="pt-3 text-center  text-success">{{ $data['dateA'] }}</th>
            {{-- <th class="pt-3 text-center font-weight-normal"><a href="">@if ($data->status=='Enviada') Nueva @endif</a></th> --}}
            <th class="pt-3 text-center  text-danger">{{ $data['descripcion'] }}</th>
            <th class="pt-3 font-weight-normal ">{{ $data['status'] }}</th>

            <td class="text-center">
                {{-- <button   type="button" class="pr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-blue" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg> --}}
                </button>

                <button @click="reset()" wire:click.prevent='inforeq({{ $data['id'] }})' class="btn-primary px-3 py-2">

                    Abrir
                    {{-- <div class="flex border border-success border-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-currency-dollar text-green" viewBox="0 0 16 16">
                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="pt-1 bi bi-caret-right-fill text-green" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                        </svg>
                    </div> --}}
                </button>
            </td>

        </tr>
        @break
        @endif
@endforeach
@endforeach
</tbody>
</table>
</div>
{{-- <script>
  Livewire.on('alert', postId => {
      alert('A post was added with the id of: ' + postId);
  })
  </script> --}}
<script>
  function togg(){
  return{
    open:true,
    open2:false,

    show:function(open){
      if(open){
        this.open2=false;
        // this.open=true;
      }else{
         this.open2=false;
         this.open=true;
      }
    },
    setOpen(){return this.open==true},

    show2:function(open2){
      if(!open2){
        this.open2=true;
        this.open=false;
      }else{
        // this.open2=true;
        this.open=false;
      }
    },
    setOpen2(){return this.open2==true},

    reset:function(){
      this.open2=false;
         this.open=true;
    }

  }
  }
  </script>
</div>

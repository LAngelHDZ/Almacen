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
                      <p class="mb-0 font-weight-bolder ">Departamento: <span class="font-weight-normal">{{$data['departamento']}}</span></p>
                      <p class="mb-0 font-weight-bolder ">Area: <span class="font-weight-normal">{{$data['area']}}</span></p>
                      <p class="mb-0 font-weight-bolder">Solicitante: <span class="font-weight-normal">  {{ auth()->user()->name }}</span></p>
                    </div>
                </div>
                <div class="pr-4 ">
                    <h3 class="font-weight-bolder h5">Fecha: <span class="font-weight-normal h6"> {{ $data['fecha'] }}</span> </h3>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <div class="border-bottom border-primary">
                <p class="mb-0 ml-3 h4">Productos a solicitar</p>
            </div>
    </div>
    <div class="flex justify-between m-2">
           <div class="flex">
             <div class="flex w-full">
               <label for="" class="mt-1 mr-2">Categoria:</label>
               <select wire:model="cat" name="" id="" class="rounded form-input hover:border-blue-700 w-100">
                 <option value="" selected>Seleccionar</option>
                 <option value="Papeleria">Papeleria</option>
                 <option value="Reactivo">Reactivo</option>
                 <option value="Insumo general">Insumo general</option>

               </select>
             </div>
             <div class="flex w-full mx-4">
              <label for="" class="mt-1 mr-2">Material:</label>
              <select wire:model="producto" name="" id="" class="rounded form-select hover:border-blue-700 w-100">
                <option value="" selected>Seleccionar</option>
                @foreach ($materiales as $data)
                <option value="{{ $data->id }}">{{ strtoupper($data->producto) }}</option>
                @endforeach

              </select>
            </div>
            <div class="flex w-50">
              <label for="" class="mt-1 mr-2">Cantidad:</label>
              <input wire:model="cantidad" type="text" class="rounded form-input hover:border-blue-700 w-75">
            </div>
           </div>
           <div>
             <button wire:click.prevent="addproduct" class="px-2 ml-5 border-0 rounded btn btn-primary" style="">
                 Aregar</button>
           </div>
    </div>
    <div class="ml-2">
        @if ($messageP)
        <p class="text-red text-sm ">Este material ya se encuentra en la lista de solicitud</p>
        @endif
    </div>
    <div x-data="togg()">
      <div class="flex border-bottom border-primary">
        <button @click="show(open)"  class="mr-2">
            <i x-bind:class="{'fas fa-chevron-right text-blue':open, 'fas fa-chevron-down text-blue':!open}"></i>
            {{-- <i x-show="open" class=""></i> --}}
            <span x-text="text" class="hover:text-blue-700"></span>
        </button>
    </div>
      <div x-show="setOpen()"
      x-transition:enter="transition ease-out duration-600"
      x-transition:enter-start="opacity-0 scale-90"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-600"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-90"
      id="myDIV" class="mt-2"
      >
        <div>
          <p class="text-bold">NOTA:</p>
          <span>Si no encuentra algun material en en la lista, por favor rellene el cuadro detalladamente del material que necesita </span>
        </div>
        <textarea wire:model="descripcion" name="" id="" cols="" rows="2" class="rounded w-100 form-input hover:border-blue-700"></textarea>
      </div>
    </div>

    <div class="border-white border-top">
    <table class="table bg-white shadow-sm ">
        <thead class="">
          <tr>
            <th scope="col" class="w-40 text-uppercase">Producto</th>
            <th scope="col" class=" text-uppercase">Descripcion</th>
            <th scope="col" class=" text-uppercase">Cantidad</th>
            <th scope="col" class="text-center text-uppercase"></th>
          </tr>
        </thead>
      <tbody>
        @foreach ($arrayProduct as $index=>$data )
        <tr class="">
          <th class="w-40 pt-3 font-weight-normal text-decoration-underline">{{ $data['producto'] }}</th>
          <th class="pt-3 font-weight-normal">{{ $data['descripcion'] }}</th>
          <th class="pt-3 text-center font-weight-normal">{{ $data['cantidad'] }}</th>
          <td class="text-center">
            <button wire:click.prevent="removeProduct({{$index}})" class="btn btn-danger" >
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    <div>

      <button wire:click.prevent="create"
       @if(!$activeBtn)
        disabled
       @endif
       class="btn btn-success">Solicitar requisición</button>
  </div>

  <script>
    function togg(){
        return{
          open:true,
          text:'Desplegar',

          show:function(open){
            if(open){
              this.open=false;
              this.text='Ocultar'
            }else{
              this.text='Desplegar'
              this.open=true;
            }
          },
          setOpen(){return this.open===false},
        }
    }
</script>
</div>

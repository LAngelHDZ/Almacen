<div x-data="togg()">
  <div >
    <h5 class="h5 text-bold">Filtros de busqueda:</h5>
    <div class="mb-2 d-flex justify-content-between">
      <div class="ml-2 d-flex justify-content-between">
        <div>
          <select wire:model="filterpro" name="" id="" class="rounded-lg form-select hover:border-blue-700">
            <option value="0">Seleccione un proveedor</option>
            @foreach ($proveedor as $data )
            <option value="{{ $data->id }}">{{ $data->empresa }}</option>
            @endforeach
          </select>
        </div>
        <div class="mx-2">
          <select wire:model="filtercat" name="" id="" class="rounded-lg form-select hover:border-blue-700">
            <option value="0">Seleccione una categoria</option>
            <option value="1">Papeleria</option>
            <option value="2">Reactivo</option>
            <option value="3">Insumo general</option>
          </select>
        </div>
        <div class="">
          <select wire:model="campo" name="" id="" class="rounded-lg form-select hover:border-blue-700">
            <option value="productos.clave_producto">Clave</option>
            <option value="productos.producto">Producto</option>
          </select>
        </div>
        <div class="mx-2 pb-0 border rounded-lg flex border-secondary hover:border-blue-700">
          <div class="bg-blue rounded-left pb-0 pt-1 px-1">
            <i class="mx-1 mt-2 mb-0 fa fa-lg fa-search"></i>
          </div>
          <div class="mb-0 pb-0">
              <input wire:model="search" type="text" class="border-0 rounded-right form-input hover:border-blue-700"  placeholder="Buscar">
            </div>
        </div>
        <div class="">
          <a wire:click.prevent='resetfilter' class="text-white btn btn-danger flex">
            <i class="fas fa-filter mt-1 mr-1"></i> 
            <span class="mb-1">Borrar</span> </a>
        </div>
      </div>
      <div  class=" ml-2 ">
        @if($cotizacion)
        <button @click="show(open)" wire:click.prevent='cotizacion' class="text-white btn btn-success flex">
          <i class="fas fa-plus mt-1 mr-1"></i> 
          <span class="mb-1">Cotizaci??n</span>
        </button>
        @else
        <div class="flex">
          <div class="mr-1 ">
            <a href="" class="btn btn-danger pt-2">
              <i class="fas fa-lg fa-times-circle mb-1"></i></a>
          </div>
          <div>
            <button @click="show(open)" wire:click.prevent='savecotizacion' class="text-white btn btn-success flex">
              <i class="fas fa-save mt-1 mr-1"></i> 
              <span class="mb-1">Guardar</span>
            </button>
          </div>
        </div>
        @endif
        
      </div>
    </div>
</div>

  <table class="table bg-white border shadow-sm rounded-2">
    <div class="p-1 bg-primary bg-gradient ">
      <thead class="">
        <tr>
            <th scope="col" class="text-center text-uppercase">Clave</th>
            <th scope="col" class="text-center text-uppercase">Material</th>
            <th scope="col" class=" text-uppercase">Descripci??n</th>
            <th scope="col" class=" text-uppercase">Marca</th>
            <th scope="col" class="text-uppercase">Proveedor</th>
          <th scope="col" class=" text-uppercase">Precio</th>
          <th scope="col" class="text-center text-uppercase">acciones</th>
        </tr>
      </thead>
    </div>
    <tbody>

      @foreach ($catalogo as $data)
      <tr class="">
          <th class="pt-3 text-center font-weight-normal text-decoration-underline">{{ $data->clave}}</th>
          <th class="pt-3 text-center font-weight-normal ">{{ $data->producto }}</th>
          <th class="pt-3 font-weight-normal ">{{ $data->descripcion }}</th>
          <th class="pt-3 font-weight-normal ">{{ $data->marca }}</th>
          <th class="pt-3 font-weight-normal ">{{ $data->empresa }}</th>
        <th class="pt-3 font-weight-normal ">{{ $data->precio}}</th>
        <td class="text-center">
            <div x-show="isOpen()" class="flex">
              <button 
                @foreach ($arraycat as $id )
                  @if($id['idcatalogo']==$data->idcat)
                  disabled
                  @endif
                @endforeach
                wire:click.prevent='addproducto({{$data->idcat}})'
                class="btn btn-primary">
                <i class="fas fa-cart-plus"></i>
              </button>

              @foreach ($arraycat as $index => $id )
              @if($id['idcatalogo']==$data->idcat)
              <a wire:click.prevent='removeCat({{$index}})' class="btn btn-danger ml-1">
                  <i class="fas fa-trash"></i>
              </a>
                @endif
                @endforeach
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $catalogo->links() }}

  <script>
    function togg(){
    return{
      open:false,
      show:function(open){
        if(open){
          this.open=false;
        }else{
          this.open=true;
        }
      },
      isOpen(){return this.open===true},
    }
    }
    </script>
</div>

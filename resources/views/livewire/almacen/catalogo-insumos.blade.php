<div>
  <div>
    <h5 class="h5 text-bold">Filtros de busqueda:</h5>
    <div class="mb-2 d-flex">
      <div class="ml-2 d-flex justify-content-between">
        <div>
          <select wire:model="filterpro" name="" id="" class="w-64 rounded-lg form-select hover:border-blue-700">
            <option value="0">Seleccione un proveedor</option>
            @foreach ($proveedor as $data )
            <option value="{{ $data->id }}">{{ $data->empresa }}</option>
            @endforeach
          </select>
        </div>
        <div class="mx-2">
          <select wire:model="filtercat" name="" id="" class="w-64 rounded-lg form-select hover:border-blue-700">
            <option value="0">Seleccione una categoria</option>
            <option value="1">Papeleria</option>
            <option value="2">Reactivo</option>
            <option value="3">Insumo general</option>
          </select>
        </div>
        <div class="">
          <select wire:model="campo" name="" id="" class="w-40 rounded-lg form-select hover:border-blue-700">
            <option value="productos.clave_producto">Clave</option>
            <option value="productos.producto">Producto</option>
          </select>
        </div>
        <div class="mx-2 border rounded-lg d-flex border-secondary hover:border-blue-700">
          <div class="px-2 pt-1 bg-blue rounded-left">
            <i class="mx-1 mt-2 fa fa-search"> </i>
          </div>
          <input wire:model="search" type="text" class="w-64 border-0 rounded-right form-input hover:border-blue-700"  placeholder="Buscar">
        </div>
        <div class="">
          <a wire:click.prevent='resetfilter' class="text-white btn btn-danger"><i class="fas fa-filter"></i> <p class="inline-block mb-1">Borrar filtros</p> </a>
        </div>
      </div>
    </div>
</div>


  <table class="table bg-white border shadow-sm rounded-2">
    <div class="p-1 bg-primary bg-gradient ">
      <thead class="">
        <tr>
          <th scope="col" class="text-center text-uppercase">Clave</th>
          <th scope="col" class="text-center text-uppercase">Material</th>
          <th scope="col" class=" text-uppercase">Descripción</th>
          <th scope="col" class="text-uppercase">Proveedor</th>
          <th scope="col" class=" text-uppercase">Marca</th>
          <th scope="col" class=" text-uppercase">Precio</th>
          {{-- <th scope="col" class="text-center text-uppercase">acciones</th> --}}
        </tr>
      </thead>
    </div>
    <tbody>


      @foreach ($catalogo as $data)
      <tr class="">
        <th class="pt-3 text-center font-weight-normal text-decoration-underline">{{ $data->clave}}</th>
        <th class="pt-3 text-center font-weight-normal ">{{ $data->producto }}</th>
        <th class="pt-3 font-weight-normal ">{{ $data->descripcion }}</th>
        <th class="pt-3 font-weight-normal ">{{ $data->empresa }}</th>
        <th class="pt-3 font-weight-normal ">{{ $data->marca }}</th>
        <th class="pt-3 font-weight-normal ">{{ $data->precio}}</th>

        {{-- <td class="text-center">
          <button  wire:click.prevent='modalupdate({{$data->id}})' type="button" class="btn btn-outline-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
          </button>

          <button wire:click.prevent='delete' type="button" class="btn btn-outline-danger" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square " viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
          </button>
        </td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $catalogo->links() }}

</div>

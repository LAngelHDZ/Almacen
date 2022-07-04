<div>
   {{-- <----- Este fragmento de código es el modal -----> --}}
   <div wire:ignore.self  class="modal fade" id="showinfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        {{-- <--- Cabecera del modal donde aparece el titulo del modal ---> --}}
        <div class="modal-header">
          <h5 class="modal-title h3" id="exampleModalLabel">Información de usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- <--- Fin cabecera modal ---> --}}

        {{-- <-- Inicio Cuerpo del modal donde estan los controles de formulario --> --}}
        <div class="modal-body">
           <div>
            <div class="pl-3">
              <div class="ml-5 ">
                  <p class="font-weight-bolder h4 mb-0">Clave: <span class="font-weight-normal h5">{{ $clave}}</span> </p> 
              </div>
              <div class="ml-5 mt-2">
                <p class="font-weight-bolder mb-0">Empleado: <span class="font-weight-normal"> {{ $nombre}} </span></p>
                <p class="font-weight-bolder mb-0 ">email: <span class="font-weight-normal"> {{ $email}}</span></p>
                <p class="font-weight-bolder mb-0 ">RFC: <span class="font-weight-normal"> {{ $rfc}}</span></p>
                <div class="flex">
                  <p class="font-weight-bolder mb-0 ">Departamento: <span class="font-weight-normal"> {{ $dep}}</span></p>
                  <p class="font-weight-bolder mb-0 ml-3 ">clave: <span class="font-weight-normal"> {{ $cl_dep}}</span></p>
                </div>
                <div class="flex">
                  <p class="font-weight-bolder mb-0 ">Area: <span class="font-weight-normal"> {{ $area}}</span></p>
                  <p class="font-weight-bolder mb-0 ml-3 ">clave: <span class="font-weight-normal"> {{ $cl_area}}</span></p>
                </div>                
              </div>
          </div>
           </div>
        </div>
        {{-- <-- Fin cuerpo modal --> --}}

        <div class="modal-footer">
          <button type="button" class="bg-gray px-4 py-2 rounded-md hover:border-black" data-dismiss="modal">Cerrar</button>
          <span x-on:click="on = false">
          {{-- <button wire:click.prevent="updateProveedor" type="button" class="btn btn-primary">Actualizar</button>
          </span> --}}
        </div>

      </div>
    </div>
  </div>
  {{-- <----- Fin fragmento de código modal -----> --}}
  <div>
    <h5 class="h5 text-bold">Filtros de busqueda:</h5>
    <div class=" d-flex justify-content-between mb-2">
      <div class=" ml-2 d-flex justify-content-between">
      <div>
        <select wire:model="campo" name="" id="" class="form-select mr-4 w-64 rounded-lg hover:border-blue-700">
          <option value="users.name">Nombre</option>
          <option value="empleados.clave">Clave</option>
          <option value="areas.area">Area</option>
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
    </div> 
    <div class="">
      <a href="{{route('formusers')}}" class="btn btn-success flex">
        <i class="fas fa-user-plus mt-1 mr-1"></i>
        <span class="mb-1">Nuevo</span>
      </a>
      </div>
    </div>
  </div>
<table class="table bg-white border shadow-sm rounded-2">
    <thead class="">
      <div class="bg-primary bg-gradient p-1  " style="--bs-bg-opacity: .5;">
        <tr>
          <th scope="col" class="text-center text-uppercase">#</th>
          <th scope="col" class="text-center text-uppercase">CLave</th>
          <th scope="col" class="text-center text-uppercase">Nombre</th>
          <th scope="col" class=" text-uppercase">Area</th>
          <th scope="col" class="text-uppercase">Email</th>
          <!-- <th scope="col" class="text-center text-uppercase"></th> -->
          <th scope="col" class="text-center text-uppercase">Acciones</th>
        </tr>
      </div>
    </thead>
    
    <tbody>
    <!-- if -->

    <!-- <tr>
      <td ><span class="text-center text-gray">No hay registros</span> </td>
    </tr> -->
   @php
       $int=0;
   @endphp
        @foreach ($listuser as $data)
            
        <tr class="">
          <th class="pt-3 font-weight-normal text-decoration-underline text-center">{{ $int+=1 }}</th>
          <th class="pt-3 font-weight-normal text-center">{{ $data->clave }}</th>
          <th class="pt-3 font-weight-normal text-center">{{ $data->name }}</th>
          <th class="pt-3 font-weight-normal ">{{ $data->area }}</th>
          <th class="pt-3 font-weight-normal ">{{ $data->email }}</th>
          <!-- <th class="pt-3 font-weight-normal text-center"></th> -->
          
          
          <td class="text-center">
            <button wire:click.prevent='viewinfo({{ $data->id }})' type="button" class="pt-2" >
              <i class="fas fa-lg fa-address-card text-green"></i>
            </button>
            
            <button   type="button" class="pt-2 mx-3"><a href="{{route('formupdate',$data->id)}}">
              <i class="fas fa-lg fa-user-edit text-blue-500"></i>
            </a>
            </button>
            
            <button  type="button" class="pt-2 mr-3" >
              <a href="{{route('asingrole',$data->id)}}">
              <i class="fas fa-lg fas fa-key"></i>
              </a>
            </button>

            <button wire:click='delete({{ $data }})' type="button" class="pt-2" >
              <i class="fas fa-lg fa-user-slash text-red-600"></i>
            </button>
          </td>
        </tr>
        @endforeach  
      </tbody>
    </table>
    {{ $listuser->links() }}
</div>

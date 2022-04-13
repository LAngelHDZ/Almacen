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
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill text-green" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
              </svg>
            </button>
            
            <button   type="button" class="pt-2 mx-3"><a href="{{route('formupdate',$data->id)}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-blue" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg>
            </a>
            </button>
            
            <button wire:click='delete({{ $data->id }})' type="button" class="pt-2" >
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eraser-fill text-red" viewBox="0 0 16 16">
                <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
              </svg>
            </button>
          </td>
        </tr>
        @endforeach  
      </tbody>
    </table>
    {{ $listuser->links() }}
</div>

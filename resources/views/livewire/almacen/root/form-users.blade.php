<div>
        <div class="">
            <form wire:ignore.self  action="">
                <div class="px-4 py-3 bg-white border-2">
                    <div class="  flex flex-row  ">
                        <div class=" w-64">
                            <label for="" class="flex ">Clave trabajador:</label>
                            <input wire:model="clave" @if($viewer) disabled  @endif type="text" class="form-input w-full px-4 bg-gray-50  rounded-lg hover:border-blue-700">
                            @error('clave') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="ml-4  w-full">
                            <label for="" class="flex ">Correo Electronico:</label>
                            <input wire:model="email" type="email" class="form-input w-full px-4 bg-gray-50 rounded-lg hover:border-blue-700">
                            @error('email') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @if(!$viewer)
                        <div class="  flex flex-row  ">
                            <div class=" w-full">
                                <label for="" class="flex ">Contraseña:</label>
                                <input wire:model="pass" type="password" class="form-input w-full px-4 bg-gray-50 rounded-lg hover:border-blue-700">
                                @error('pass') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div class="ml-4  w-full">
                                <label for="" class="flex ">Repetir contraseña:</label>
                                <input wire:model="repeatpass" type="password" class="form-input w-full px-4 bg-gray-50  rounded-lg hover:border-blue-700">
                                @error('repeatpass') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    @endif
                </div>

                <div class="px-4 py-3 bg-white border-end border-2 ">
                    <div class="flex flex-row ">
                        <div class="w-full">
                            <label for="" class="flex ">Nombre:</label>
                            <input wire:model="nombre" type="text" class="form-input w-full px-4 bg-gray-50  rounded-lg hover:border-blue-700">
                            @error('nombre') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                        @if(!$viewer)
                            <div class=" mx-4 w-full">
                                <label for="" class="flex ">Apellido paterno:</label>
                                <input wire:model="apaterno" type="text" class="form-input w-full px-4 bg-gray-50  rounded-lg hover:border-blue-700">
                                @error('apaterno') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full ">
                                <label for="" class="flex ">Apellido materno:</label>
                                <input wire:model="amaterno" type="text" class="form-input w-full px-4 bg-gray-50 rounded-lg hover:border-blue-700">
                                @error('amaterno') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-row pt-3">
                        <div class="  w-full">
                            <label for="" class="flex">RFC:</label>
                            <input wire:model="rfc" type="text" class="form-input w-full px-4 bg-gray-50 rounded-lg hover:border-blue-700">
                            @error('rfc') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class=" ml-4 w-full">
                                    <label for="" class="flex">Cargo:</label>
                                    <input wire:model="cargo" type="text" class="form-input w-full px-4 bg-gray-50 rounded-lg hover:border-blue-700">
                                    @error('cargo') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="flex flex-row pt-3" >
                                <div class="  w-full ">
                                    <label for="" class="flex">Departamento:</label>
                                    <select wire:model="idep" name="" id="" class="form-select w-full px-4 bg-gray-50 rounded-lg hover:border-blue-700">
                                        <option value="" selected>seleccionar</option>
                                        @foreach($listdep as $data)
                                        <option value="{{ $data->id }}" >{{ $data->departamento }}</option>
                                        @endforeach
                                    </select>
                                    @error('idarea') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class=" ml-4 w-full">

                                    <label for="" class="flex">Area correspondiente:</label>
                                    <select wire:model="idarea" name="" id="" class="form-select w-full px-4 bg-gray-50 rounded-lg hover:border-blue-700">
                                        <option value="" selected>seleccionar</option>
                                        @foreach($listarea as $data)
                                        @if ($idep==$data->id_dep)
                                        <option value="{{ $data->id }}" >{{ $data->clave.' / '.$data->area }}</option>
                                         @endif
                                        @endforeach
                                    </select>
                                    @error('idarea') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div>
                        
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-2 pb-3 flex justify-center ">
                @if(!$viewer)
                <button wire:click.prevent='create' class="btn btn-primary w-64  ">
                    Registrar
                </button>
                @else
                <button wire:click='update' class="btn btn-primary w-64  ">
                    Actualizar
                </button>
                @endif
            </div>
</div>

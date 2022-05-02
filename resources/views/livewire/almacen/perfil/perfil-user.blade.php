<div>
    <div x-data="togg()" class="container ml-5 w-100 mt-5">
        <div class="inline-flex py-1 mr-5 bg-white rounded-sm ">
            <div>
                <p class="block w-full px-2 py-2 text-center ">Settings</p>
                <nav class="w-full text-white bg-indigo-500">
                    <a @click="showpersonal(personal)" class="block px-2 py-2 text-center text-white border-bottom hover:bg-indigo-600">Personal</a>
                    <a @click="showemail(email)" class="block px-2 py-2 text-center  text-white  border-bottom hover:bg-indigo-600">Email</a>
                    <a @click="showefirma(efirma)" wire:click.prevent='queryEfirma' class="block px-2 py-2 text-center  text-white  border-bottom hover:bg-indigo-600">eFirma</a>
                    {{-- <p class="block px-2 py-2 text-white text-center rounded-bottom hover:bg-indigo-600">Contraseña</p> --}}
                </nav>
            </div>
        </div>

        <div class="inline-flex w-75 ml-5">
                <div class="flex w-full py-3 bg-white rounded-sm ">
                  @foreach ($info as $data)
                    <div
                    x-show="setpersonal()"
                     x-transition:enter="transition ease-out duration-600"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                    {{-- x-transition:leave="transition ease-in duration-600" --}}
                    {{-- x-transition:leave-start="opacity-100 scale-100" --}}
                    {{-- x-transition:leave-end="opacity-0 scale-90"  --}}
                    class="w-2/3 ">
                    <p class="ml-5 text-bold h6">Informacion Personal</p>
                    <div class="px-5 py-1 mt-2">
                      <h6 class="block m-0 text-bold" for="">Usuario</h6>
                      <p class="m-0 p-0">{{ $data->name }}</p>
                      <h6 class="block m-0 text-bold" for="">Clave</h6>
                      <p class="m-0 p-0">{{ $data->clave_emp }}</p>
                      <label class="block mb-0 text-bold" for="">Departamento</label>
                      <p>{{ $data->departamento.' / '.$data->clavedep }}</p>
                      <label class="block  mb-0 text-bold" for="">Area</label>
                      <p>{{ $data->area.' / '.$data->clave }}</p>
                      {{-- <button class="block px-3 py-2 mt-4 text-white bg-indigo-500 rounded-sm hover:bg-indigo-600"> Guardar</button> --}}
                    </div>
                  </div>
                  @endforeach
                    <div
                    x-show="setemail()"
                     x-transition:enter="transition ease-out duration-600"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                    {{-- x-transition:leave="transition ease-in duration-600" --}}
                    {{-- x-transition:leave-start="opacity-100 scale-100" --}}
                    {{-- x-transition:leave-end="opacity-0 scale-90" --}}
                    class="w-2/3">
                        <p class="ml-5 text-bold h6">Informacion de Email</p>
                        <div class="px-5 py-1 mt-2">
                            <label class="block mb-0" for="">Correo Electronico</label>
                            <p>{{$emailInfo}}</p>
                            <label class="block mt-2 mb-0" for="">Nuevo correo</label>
                            <input wire:model='email' type="text" class="form-input rounded-sm hover:border-blue-700 w-75">

                            <button class="block px-3 py-2 mt-4 text-white bg-indigo-500 rounded-sm hover:bg-indigo-600"> Guardar</button>
                        </div>
                    </div>
                    <div  x-show="setefirma()"
                    x-transition:enter="transition ease-out duration-600"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                    {{-- x-transition:leave="transition ease-in duration-600" --}}
                    {{-- x-transition:leave-start="opacity-100 scale-100" --}}
                    {{-- x-transition:leave-end="opacity-0 scale-90" --}}
                    class="w-2/3 ">
                        <p class="ml-5 text-bold h6">Informacion de e.Firma</p>
                        <div class="px-5 py-1 mt-2">
                            <label class="block mb-0" for="">e.Firma</label>
                            {{-- <p>123456789</p>
                            <label class="block mt-2 mb-0" for="">Cadena digital</label> --}}
                            @if ($efirmaInfo!=null)
                            <p>{{$efirmaInfo}}</p>
                            @else
                            <p class="text-gray-500">No existe firma</p>
                            @endif

                            <label class="block mt-2 mb-0" for="">Genenerar firma</label>
                            <input wire:model='efirmaModel' type="text" class="form-input rounded-sm hover:border-blue-700 w-75">
                            <button class=" text-white px-3 py-2 bg-indigo-500 rounded-sm hover:bg-indigo-600"> Generar</button>
                            <button class="block px-3 py-2 mt-4 text-white bg-indigo-500 rounded-sm hover:bg-indigo-600"> Guardar</button>
                        </div>
                    </div>
                <div class="w-1/3 p-2 ml-2 border-left border-primary ">
                    IMAGEN DE PERFIL
                </div>
        </div>
        </div>
    </div>
    <script>
        function togg(){
            return{
              personal:true,
              email:false,
              efirma:false,

              showpersonal:function(personal){
                if(personal){
                  this.efirma=false;
                  this.email=false;
                }else{
                  this.personal=true;
                  this.efirma=false;
                  this.email=false;
                }
              },
              setpersonal(){return this.personal===true},

              showemail:function(email){
                if(!email){
                  this.email=true;
                  this.personal=false;
                  this.efirma=false;
                }else{
                  this.open2=false;
                }
              },
              setemail(){return this.email===true},

              showefirma:function(efirma){
                if(!efirma){
                  this.efirma=true;
                  this.email=false;
                  this.personal=false;
                }else{
                  this.open2=false;
                }
              },
              setefirma(){return this.efirma===true}

            }


        }
    </script>
</div>

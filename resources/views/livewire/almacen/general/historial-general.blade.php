<div x-data="togg()">
    <div class="flex mb-3">
        <div class="">
            <button @click="show(open)" class="btn-primary px-2 py-2 rounded-md">
                Solicitudes
            </button>
        </div>
        <div class="ml-2">
            <button @click="show2(open2)" class="btn-primary px-2 py-2 rounded-md">
                Materiales
            </button>
        </div>
    </div>
    <div x-show="setOpen()" class="h-50">
        <table class="table bg-white border shadow-sm rounded-2">
            <div class="p-1 bg-primary bg-gradient ">
                <thead class="">
                    <tr>
                        <th scope="col" class="text-center text-uppercase">Folio</th>
                        {{-- <th scope="col" class="text-center text-uppercase"></th> --}}
                        <th scope="col" class="text-center text-uppercase">Fecha de elaboración</th>
                        <th scope="col" class="text-center text-uppercase">Fecha de cierre</th>
                        <th scope="col" class=" text-uppercase">Status</th>
                        {{-- <th scope="col" class="text-center text-uppercase">acciones</th> --}}
                    </tr>
                </thead>
            </div>
            <tbody>

                @foreach ($solicitudes as $indexB => $data)
                    @foreach ($solicitud as $index => $dat)
                        @if ($index == $indexB)
                            <tr class=" bg-green-100">
                                <th class="pt-3 text-center  text-decoration-underline">{{ $dat['folio'] }}</th>
                                <th class="pt-3 text-center  ">{{ $dat['dateA'] }}</th>
                                <th class="pt-3 text-center  text-danger">{{ $dat['dateC'] }}</th>
                                <th class="pt-3 font-weight-normal ">{{ $dat['status'] }}</th>

                            </tr>
                        @break
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>

<div x-show="setOpen2()" class="mt-2">
    @livewire('almacen.general.hitorial-salidas')

<script>
    function togg() {
        return {
            open: true,
            open2: false,

            show: function(open) {
                if (open) {
                    this.open2 = false;
                    // this.open=true;
                } else {
                    this.open2 = false;
                    this.open = true;
                }
            },
            setOpen() {
                return this.open === true
            },

            show2: function(open2) {
                if (!open2) {
                    this.open2 = true;
                    this.open = false;
                } else {
                    // this.open2=true;
                    this.open = false;
                }
            },
            setOpen2() {
                return this.open2 === true
            },

        }

    }
</script>
</div>

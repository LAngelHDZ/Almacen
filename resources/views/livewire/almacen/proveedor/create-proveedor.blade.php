<div>
    
        
        {{-- <button class=" inline-flex  rounded-lg bg-sky-700 text-white font-medium px-3 py-2">Crear</button> --}}
        <button wire:click="showmodal"  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Crear</button>
        {{-- <x-jet-button wire:click="$set('open', true)">
            Crear
        </x-jet-button> --}}


        <x-jet-dialog-modal wire:model="openmodal">
            <x-slot name="title">
                Crear Proveedor
            </x-slot>
    
            <x-slot name="content">
    
            </x-slot>
    
            <x-slot name="footer">
                <x-jet-button wire:click="">
                    Crear
                </x-jet-button>
                <x-jet-button wire:click="">
                    Cancelar
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
   

</div>

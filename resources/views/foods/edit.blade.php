<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Alimento') }}
        </h2>
    </x-slot>
    
    <form method="POST" class="pt-3 ">
        @csrf
        <div>
            <div class="row mx-3 mb-3 justify-content-center">
                <x-jet-label class="col-sm-1" for="name" value="{{ __('Nome') }}" />
                <div class="col-sm-3">
                    <x-jet-input id="name" class="form-control" type="text" name="name" value="{{$food->name}}"  required autofocus autocomplete="name" />
                </div>
                <x-jet-label class="col-sm-1" for="category" value="{{ __('Categoria') }}" />
                <div class="col-sm-3">
                    <x-jet-input id="category" class="form-control" type="text" name="category" value="{{$food->category}}" required />
                </div>
                <x-jet-label class="col-sm-1" for="lipids" value="{{ __('Lipídos') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="lipids" class="form-control" type="text" name="lipids" value="{{$food->lipids}}" required />
                </div>
            </div>
            <div class="row mx-3 mb-3 justify-content-center">
                <x-jet-label class="col-sm-1" for="moisture" value="{{ __('Umidade') }}" />
                <div class="col-sm-3">
                    <x-jet-input id="moisture" class="form-control" type="text" name="moisture" value="{{$food->moisture}}" required />
                </div>
                <x-jet-label class="col-sm-1" for="energetic_value" value="{{ __('Valor energético') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="energetic_value" class="form-control" type="text" name="energetic_value" value="{{$food->energetic_value}}" required />
                </div>
                <x-jet-label class="col-sm-1" for="protein_value" value="{{ __('Proteína') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="protein_value" class="form-control" type="text" name="protein_value" value="{{$food->protein_value}}" required />
                </div>
            </div>


            <div class="row mx-3 mb-3 justify-content-center">
                <x-jet-label  class="col-sm-1" for="calcium" value="{{ __('Cálcio') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="calcium" class="form-control" type="text" name="calcium" value="{{$food->calcium}}" required />
                </div>
                <x-jet-label class="col-sm-1" for="fiber" value="{{ __('Fibra') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="fiber" class="form-control" type="text" name="fiber" value="{{$food->fiber}}" required />
                </div>
                <x-jet-label class="col-sm-1" for="carbohydrates" value="{{ __('Carboidratos') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="carbohydrates" class="form-control" type="text" name="carbohydrates" value="{{$food->carbohydrates}}" required autocomplete="new-carbohydrates" />
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">

            <x-jet-button class="ml-4">
                {{ __('Editar') }}
            </x-jet-button>
        </div>
    </form>
</x-app-layout>

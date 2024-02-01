{{-- <div> --}}
    <td class="text-center">
        <form action="#">
            <div class="quantity_input">
                <button type="button" class="input_number_decrement" wire:click="decrementer">
                    <i class="fal fa-minus"></i>
                </button>
                <input class="" type="text" wire:model.live="quantity"/>
                <button type="button" class="input_number_increment" wire:click="incrementer">
                    <i class="fal fa-plus"></i>
                </button>
            </div>
        </form>
    </td>
    {{-- <td class="text-center">
        <span class="price_text"> --}}
            {{-- {{ $total_price }} --}}
        {{-- </span>
    </td> --}}
{{-- </div> --}}


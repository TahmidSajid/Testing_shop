<div>
    <div class="item_attribute">
        <form wire:submit="save()">
            <div class="row d-flex justify-content-between">
                @if ($permit->size == 'enable')
                    <div class="col col-lg-12">
                        <h4 class="input_title">Size *</h4>
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-5">
                                <input type="text" style="width: 250px" class="form-control d-inline"
                                    wire:model.live="size_name" readonly>
                            </div>
                            <div class="col-lg-2 text-center" style="font-size: 25px">
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" style="background-color:#f02757 "
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Select Size
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach ($this->sizes as $size)
                                                <button class="dropdown-item"
                                                    wire:click="getSize({{ $size->size_id }})">{{ $size->getSize->size }}</button>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                @endif
                @if ($permit->variant == 'enable')
                    <div class="col col-lg-12 ">
                        <h4 class="input_title">Variant *</h4>
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-5">
                                <input type="text" style="width: 250px" class="form-control d-inline"
                                    wire:model.live="variant_name" readonly>
                            </div>
                            <div class="col-lg-2 text-center" style="font-size: 25px">
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" style="background-color:#f02757 "
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false" @if($permit->size == 'enable' && !$size_id) disabled @endif>
                                            Select Variant
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach ($this->variants as $variant)
                                                <button class="dropdown-item"
                                                    wire:click="getVariant({{ $variant->variation_id }})">{{ $variant->getVariant->variant }}</button>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                @endif
                    @if ($permit->color == 'enable')
                        <div class="col col-lg-12">
                            <h4 class="input_title">Color *</h4>
                            <div class="row d-flex justify-content-between">
                                <div class="col-lg-5">
                                    <input type="text" style="width: 250px" style="background: " class="form-control d-inline"
                                        wire:model.live="selected_color_name" readonly>
                                </div>
                                <div class="col-lg-2 text-center" style="font-size: 25px">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle" style="background-color:#f02757 "
                                                type="button" data-bs-toggle="dropdown" aria-expanded="false" @if(($permit->variant == 'enable' && !$variant_id) ||  ($permit->size == 'enable' && !$size_id)) disabled @endif>
                                                Select Color
                                            </button>
                                            <ul class="dropdown-menu">
                                                @foreach ($this->colors as $color)
                                                    <button class="dropdown-item"
                                                        style="background-color: {{ $color->getColor->color_code }}"
                                                        wire:click="getColor({{ $color->color_id }})">{{ $color_name->name($color->getColor->color_code)['name'] }}</button>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif
                </div>
            </div>


    <div class="quantity_wrap">
        <div class="quantity_input">
            <button type="button" class="input_number_decrement">
                <i class="fal fa-minus"></i>
            </button>
            <input class="input_number" type="text" value="1">
            <button type="button" class="input_number_increment">
                <i class="fal fa-plus"></i>
            </button>
        </div>
        <div class="total_price">Total: $620,99</div>
    </div>

    <ul class="default_btns_group ul_li">
        <li><a class="btn btn_primary addtocart_btn" href="#!">Add To Cart</a></li>
    </ul>
</div>

</form>


</div>

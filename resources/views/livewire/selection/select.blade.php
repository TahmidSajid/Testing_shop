<div>
    <div class="item_attribute">
        <form wire:submit="save()">
            <div class="row">
                <div class="col col-lg-4">
                    @if ($permit->size == 'enable')
                    <div class="select_option clearfix">
                        <h4 class="input_title">Size *</h4>
                        <div class="basic-form">
                            <div class="form-group">
                                <input type="text" class="form-control input-default" wire:model.live="size_id">
                                {{-- <select class="form-control form-control-lg" wire:model.live="size_id">
                                    <option data-display="- Please select -">Choose A Option</option>
                                    @foreach ($this->sizes as $size)
                                        <option value="{{ $size->size_id }}">{{ $size->getSize->size }}</option>
                                    @endforeach
                                </select> --}}
                                @foreach ($this->sizes as $size)
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="getSize({{ $size->size_id }})">{{ $size->getSize->size }}</button>
                                @endforeach
                            </div>
                            <h5>{{ $size_id }}</h5>
                        </div>
                    </div>
                    @else
                    @endif
                </div>
                <div class="col col-lg-4">
                    @if ($permit->variant == 'enable')
                        <div class="select_option clearfix">
                            <h4 class="input_title">Variant *</h4>
                            <input type="text" class="form-control input-default" wire:model.live="variant_id">
                            {{-- <select>
                                <option data-display="- Please select -">Choose A Option</option>
                            </select> --}}
                            @foreach ($this->variants as $variant)
                                <button class="btn btn-sm btn-danger"
                                    wire:click="getVariant({{ $variant->variation_id }})">{{ $variant->getVariant->variant }}</button>
                            @endforeach
                        </div>
                    @else
                    @endif
                    <h5>{{ $variant_id }}</h5>
                </div>
                <div class="col col-lg-4">
                    @if ($permit->color == 'enable')
                        <div class="select_option clearfix">
                            <h4 class="input_title">Color *</h4>
                            <input type="text" class="form-control input-default" wire:model.live="color_id">
                            {{-- <select>
                                <option data-display="- Please select -">Choose A Option</option>
                            </select> --}}
                            @foreach ($this->colors as $color)
                                <button class="btn btn-sm" style="background-color: {{ $color->getColor->color_code }}" wire:click="getColor({{ $color->color_id }})">{{ $color_name->name($color->getColor->color_code)['name'] }}</button>
                            @endforeach
                        </div>
                        {{ $color_id }}
                    @else
                    @endif
                </div>
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
</div>

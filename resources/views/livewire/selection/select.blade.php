<div>
    <div class="item_attribute">
        <form wire:submit="save()">
            <div class="row">
                <div class="col col-md-6">
                    <div class="select_option clearfix">
                        <h4 class="input_title">Size *</h4>
                        <div class="basic-form">
                            <div class="form-group">
                                <select class="form-control form-control-lg" wire:model.live="size_id">
                                    <option data-display="- Please select -">Choose A Option</option>

                                </select>
                                @foreach ($this->sizes as $size)
                                    <button class="btn btn-sm btn-danger" wire:click="getSize({{ $size->id }})">{{ $size->size }}</button>
                                @endforeach
                            </div>
                            <h5>{{ $size_id }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="select_option clearfix">
                        <h4 class="input_title">Color *</h4>
                        <select>
                            <option data-display="- Please select -">Choose A Option</option>
                            {{-- @foreach ($variants as $variant)
                                <option value={{ $variant->id }}>{{ $variant->variant }}</option>
                            @endforeach --}}
                        </select>
                        @foreach ($this->variants as $variant)
                            <button class="btn btn-sm btn-danger">{{ $variant->getVariant->variant }}</button>
                        @endforeach
                    </div>
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

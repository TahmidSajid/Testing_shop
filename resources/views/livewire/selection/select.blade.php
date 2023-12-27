<div>
    <div class="row">
        @if ($product_details->size == 'enable')
            <div class="col col-md-4">
                <div class="select_option clearfix">
                    <h4 class="input_title">Size *</h4>
                    <select>
                        <option data-display="- Please select -">Choose A Option</option>
                        @forelse ($size_options as $size_option)
                            <option>
                                    {{ $size_option->size }}
                            </option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
        @endif
        @if ($product_details->color == 'enable')
            <div class="col col-md-4">
                <div class="select_option clearfix">
                    <h4 class="input_title">Color *</h4>
                    <select wire:model = "color">
                        <option data-display="- Please select -">Choose A Option</option>
                        @forelse ($color_options as $color_option)
                            <option value="{{ $color_option->id }}">
                                <div style="background:{{ $color_option->color_code }} !important; height:25px; width:auto;">
                                    {{ $color_option->color_code }}
                                </div>
                            </option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
        @endif
        @if ($product_details->variant == 'enable')
            <div class="col col-md-4">
                <div class="select_option clearfix">
                    <h4 class="input_title">Variation *</h4>
                    <select wire:model = "variation">
                        <option data-display="- Please select -">Choose A Option</option>
                        @forelse ($variant_options as $variant_option)
                            <option value="{{ $variant_option->id }}">{{ $variant_option->variant }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
        @endif
    </div>
</div>

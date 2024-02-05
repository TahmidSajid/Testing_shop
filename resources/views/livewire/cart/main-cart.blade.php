<div class="cart_table">
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Total</th>
                <th class="text-center">Remove</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($this->OrderLists as $order_list)
                <tr>
                    <td>
                        <div class="cart_product">
                            <img src="{{ asset('uploads/thumbnail') }}/{{ $order_list->getProduct->thumbnail }}"
                                alt="image_not_found">
                            <h3>
                                <a href="{{ route('product_view', $order_list->getProduct->id) }}">
                                    {{ $order_list->getProduct->name }},
                                    @if ($order_list->getProduct->size === 'enable')
                                        Size : {{ $order_list->getSize->size }},
                                    @endif
                                    @if ($order_list->getProduct->variant === 'enable')
                                        Variant : {{ $order_list->getVariant->variant }},
                                    @endif
                                    @if ($order_list->getProduct->color === 'enable')
                                        Color : {{$color_name->name($order_list->getColor->color_code)['name'] }},
                                    @endif
                                </a>
                            </h3>
                        </div>
                    </td>
                    <td class="text-center">
                        <span class="price_text">
                            @if ($order_list->getProduct->discount_price)
                                ৳ {{ $order_list->getProduct->discount_price }}
                            @else
                                ৳ {{ $order_list->getProduct->regular_price }}
                            @endif
                        </span>
                    </td>

                    <div wire:ignore>
                        <td class="text-center">
                            <div class="quantity_input">
                                <button type="button" class="input_number_decrement"
                                    wire:click="decrementer({{ $order_list->quantity }},{{ $order_list->id }})">
                                    <i class="fal fa-minus"></i>
                                </button>
                                <input type="text" value="{{ $order_list->quantity }}">
                                <button type="button" class="input_number_increment"
                                    wire:click="incrementer({{ $order_list->quantity }},{{ $order_list->id }})">
                                    <i class="fal fa-plus"></i>
                                </button>
                            </div>
                        </td>
                    </div>
                    <td class="text-center">
                        <span class="price_text">
                            @if ($order_list->getProduct->discount_price)
                                ৳ {{ $order_list->getProduct->discount_price * $order_list->quantity }}
                            @else
                                ৳ {{ $order_list->getProduct->regular_price * $order_list->quantity }}
                            @endif
                        </span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="remove_btn" wire:click="delete({{ $order_list->id }})">
                            <i class="fal fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>

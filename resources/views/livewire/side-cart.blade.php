<div>
    <ul class="cart_items_list ul_li_block mb_30 clearfix">
        @forelse ($this->orderItems as $order_item)
            <li>
                <div class="item_image">
                    <img src="{{ asset('uploads/thumbnail') }}/{{ $order_item->getProduct->thumbnail }}"
                        alt="image_not_found">
                </div>
                <div class="item_content">
                    <h4 class="item_title">{{ $order_item->getProduct->name }}</h4>
                    <span class="item_price"> Size:
                        {{ $order_item->getSize->size }}
                    </span>
                    <span class="item_price"> Variant:
                        {{ $order_item->getVariant->variant }}
                    </span>
                    <span class="item_price"> Color:
                        {{ $color_name->name($order_item->getColor->color_code)['name'] }}
                    </span>
                    <span class="item_price"> Quantity:
                        {{ $order_item->quantity}}
                    </span>
                    <span class="item_price"> Price:
                        @if ($order_item->getProduct->discount_price)
                            ৳ {{ $order_item->getProduct->discount_price * $order_item->quantity }}
                        @else
                            ৳ {{ $order_item->getProduct->regular_price * $order_item->quantity }}
                        @endif
                    </span>
                </div>
                <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
            </li>
        @empty
        @endforelse
    </ul>
    <ul class="total_price ul_li_block mb_30 clearfix">
        <li>
            <span>Subtotal:</span>
            <span>৳ {{ $this->totalPrice }}</span>
        </li>
        <li>
            <span>Vat 5%:</span>
            <span>$4.5</span>
        </li>
        <li>
            <span>Discount 20%:</span>
            <span>- $18.9</span>
        </li>
        <li>
            <span>Total:</span>
            <span>$75.6</span>
        </li>
    </ul>

    <ul class="btns_group ul_li_block clearfix">
        <li><a class="btn btn_primary" href="cart.html">View Cart</a></li>
        <li><a class="btn btn_secondary" href="checkout.html">Checkout</a></li>
    </ul>
</div>

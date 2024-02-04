<section class="cart_section section_space">
    <div class="container">
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
                                                Color : {{ $order_list->getSize->size }},
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

        <div class="cart_btns_wrap">
            <div class="row">
                <div class="col col-lg-6">
                    <form action="#">
                        <div class="coupon_form form_item mb-0">
                            <input type="text" name="coupon" placeholder="Coupon Code...">
                            <button type="submit" class="btn btn_dark">Apply Coupon</button>
                            <div class="info_icon">
                                <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Your Info Here"></i>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col col-lg-6">
                    <ul class="btns_group ul_li_right">
                        <li><a class="btn border_black" href="#!">Update Cart</a></li>
                        <li><a class="btn btn_dark" href="#!">Prceed To Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-6">
                <div class="calculate_shipping">
                    <h3 class="wrap_title">Calculate Shipping <span class="icon"><i
                                class="far fa-arrow-up"></i></span></h3>
                    <form action="#">
                        <div class="select_option clearfix">
                            <div wire:ignore>
                                <select>
                                    <option value="">Select Your Option</option>
                                    <option value="1">Inside City</option>
                                    <option value="2">Outside City</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn_primary rounded-pill">Update Total</button>
                    </form>
                </div>
            </div>

            <div class="col col-lg-6">
                <div class="cart_total_table">
                    <h3 class="wrap_title">Cart Totals</h3>
                    <ul class="ul_li_block">
                        <li>
                            <span>Cart Subtotal</span>
                            <span>$52.50</span>
                        </li>
                        <li>
                            <span>Delivery Charge</span>
                            <span>$5</span>
                        </li>
                        <li>
                            <span>Order Total</span>
                            <span class="total_price">$57.50</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

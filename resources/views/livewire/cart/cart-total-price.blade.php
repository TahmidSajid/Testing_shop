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
                    <span>৳{{ $total_cart_price }}</span>
                </li>
                <li>
                    <span>Delivery Charge</span>
                    <span>৳5</span>
                </li>
                <li>
                    <span>Order Total</span>
                    <span class="total_price">৳{{ $total_order_price }}</span>
                </li>
            </ul>
        </div>
    </div>
</div>

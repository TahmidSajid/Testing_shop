<div class="cart_btns_wrap">
    <div class="row">
        @if ($cupon_addition === null)
            <div class="col col-lg-6">
                <form wire:submit="addCupon">
                    <div class="coupon_form form_item mb-0">
                        <input type="text" wire:model = "coupon" placeholder="Coupon Code...">
                        <button type="submit" class="btn btn_dark">Apply Coupon</button>
                        <div class="info_icon">
                            <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Your Info Here"></i>
                        </div>
                    </div>
                </form>
                @if (session('cuponError'))
                    <p class="text-danger">{{ session('cuponError') }}</p>
                @endif
            </div>
        @else
            <div class="col col-lg-6 mt-3">
                <h6 class="d-inline-block">Cupon has been added</h6> <button class="text-danger" type="button"
                    wire:click ='detachCupon'>Remove</button>
            </div>
        @endif

        <div class="col col-lg-6">
            <ul class="btns_group ul_li_right">
                <li><a class="btn btn_dark" href="#!">Prceed To Checkout</a></li>
            </ul>
        </div>
    </div>
</div>

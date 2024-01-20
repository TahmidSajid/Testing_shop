<section class="related_products_section section_space">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="best-selling-products related-product-area">
                    <div class="sec-title-link">
                        <h3>Related products</h3>
                        <div class="view-all"><a href="#">View all<i
                                    class="fal fa-long-arrow-right"></i></a></div>
                    </div>
                    <div class="product-area clearfix">
                        @forelse ($related_products as $related_product)
                        <div class="grid">
                            <div class="product-pic">
                                <img src="{{ asset('uploads/thumbnail') }}/{{ $related_product->thumbnail }}" alt>
                            </div>
                            <div class="details">
                                <h4><a href="{{ route('product_view',$related_product->id) }}">{{ $related_product->name }}</a></h4>
                                <p><a href="{{ route('product_view',$related_product->id) }}">{{ $related_product->short_description }} </a></p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="price">
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">৳</span>
                                                @if ($related_product->discount_price)
                                                    {{ $product->discount_price }}
                                                @else
                                                    {{ $related_product->regular_price }}
                                                @endif
                                            </bdi>
                                        </span>
                                    </ins>
                                    @if ($related_product->discount_price)
                                    <del aria-hidden="true">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">৳</span>{{ $related_product->regular_price }}
                                            </bdi>
                                        </span>
                                    </del>
                                    @endif
                                </span>
                                <div class="add-cart-area">
                                    <button class="add-to-cart">Add to cart</button>
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

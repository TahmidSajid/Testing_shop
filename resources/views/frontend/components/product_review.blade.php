<div class="average_area">
    <div class="row align-items-center">
        <div class="col-md-12 order-last">
            <div class="average_rating_text">
                <ul class="rating_star ul_li_center">
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                </ul>
                <p class="mb-0">
                    Average Star Rating: <span>4 out of 5</span> (2 vote)
                </p>
            </div>
        </div>
    </div>
</div>

<div class="customer_reviews">
    <h4 class="reviews_tab_title">{{ $product_reviews_count }} reviews for this product</h4>

    @forelse ($product_reviews as $product_review)
        <div class="customer_review_item clearfix">
            <div class="customer_image">
                @if ($product_review->getUsers->profile_photo)
                    <img src="{{ asset('uploads/profile_pictures') }}/{{ $product_review->getUsers->profile_photo }}"
                        alt="image_not_found">
                @else
                    <img src="{{ asset('dashboard-assets/images/default_profile.png') }}" alt="image_not_found">
                @endif
            </div>
            <div class="customer_content">
                <div class="customer_info">
                    <ul class="rating_star ul_li">
                        @for ($x = 0; $x < $product_review->rating; $x++)
                            <li><i class="fas fa-star"></i></li>
                        @endfor
                    </ul>
                    <h4 class="customer_name">{{ $product_review->getUsers->name }}</h4>
                    <span class="comment_date">{{ $product_review->created_at }}</span>
                </div>
                <p class="mb-0">{{ $product_review->review }}</p>
            </div>
        </div>
    @empty
    @endforelse
</div>

@if (Auth::check())
    <div class="customer_review_form">
        <h4 class="reviews_tab_title">Add a review</h4>
        <form action="{{ route('add_review', $product->id) }}" method="POST">
            @csrf
            <div class="form_item">
                <input type="text" name="name" placeholder="Your name*">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form_item">
                <input type="email" name="email" placeholder="Your Email*">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="your_ratings">
                <h5>Your Ratings:</h5>
                <div class="rating mt-4">
                    <label>
                        <input type="radio" name="stars" value="1" />
                        <span class="icon"><i class="fas fa-star"></i></span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="2" />
                        <span class="icon"><i class="fas fa-star"></i></span>
                        <span class="icon"><i class="fas fa-star"></i></span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="3" />
                        <span class="icon"><i class="fas fa-star"></i></span>
                        <span class="icon"><i class="fas fa-star"></i></span>
                        <span class="icon"><i class="fas fa-star"></i></span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="4" />
                        <span class="icon"><i class="fas fa-star"></i></span>
                        <span class="icon"><i class="fas fa-star"></i></span>
                        <span class="icon"><i class="fas fa-star"></i></span>
                        <span class="icon"><i class="fas fa-star"></i></span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="5" />
                        <span class="icon"><i class="fas fa-star"></i></span>
                        <span class="icon"><i class="fas fa-star"></i></span>
                        <span class="icon"><i class="fas fa-star"></i></span>
                        <span class="icon"><i class="fas fa-star"></i></span>
                        <span class="icon"><i class="fas fa-star"></i></span>
                    </label>
                </div>
            </div>
            @error('stars')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form_item">
                <textarea name="comment" placeholder="Your Review*"></textarea>
            </div>
            @error('comment')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn_primary">Submit Now</button>
        </form>
    </div>
@endif


@push('reviewCss')
    <Style>
        .rating {
            display: inline-block;
            position: relative;
            height: 50px;
            line-height: 50px;
            font-size: 25px;
        }

        .rating label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            cursor: pointer;
        }

        .rating label:last-child {
            position: static;
        }

        .rating label:nth-child(1) {
            z-index: 5;
        }

        .rating label:nth-child(2) {
            z-index: 4;
        }

        .rating label:nth-child(3) {
            z-index: 3;
        }

        .rating label:nth-child(4) {
            z-index: 2;
        }

        .rating label:nth-child(5) {
            z-index: 1;
        }

        .rating label input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .rating label .icon {
            float: left;
            color: transparent;
        }

        .rating label:last-child .icon {
            color: #000;
        }

        .rating:not(:hover) label input:checked~.icon,
        .rating:hover label:hover input~.icon {
            color: #ee4141;
        }

        .rating label input:focus:not(:checked)~.icon:last-child {
            color: #000;
            text-shadow: 0 0 5px #ee4141;
        }
    </Style>
@endpush

@push('reviewJs')
    <script>
        $(':radio').change(function() {
            console.log('New star rating: ' + this.value);
        });
    </script>
@endpush

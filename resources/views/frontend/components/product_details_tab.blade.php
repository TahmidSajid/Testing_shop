<div class="details_information_tab">
    <ul class="tabs_nav nav ul_li" role=tablist>
        <li>
            <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button" role="tab"
                aria-controls="description_tab" aria-selected="true">
                Description
            </button>
        </li>
        <li>
            <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button" role="tab"
                aria-controls="additional_information_tab" aria-selected="false">
                Additional information
            </button>
        </li>

        <li>
            <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab"
                aria-controls="reviews_tab" aria-selected="false">
                Reviews({{ $product_reviews_count }})
            </button>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis
                justo
                gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.
            </p>
            <p class="mb-0">
                Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis
                fermentum
                turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce
                aliquam,
                purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi
                non
                neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et
                placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras
                neque
                metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in
                imperdiet
                ligula euismod eget.
            </p>
        </div>

        <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
            <p>
                Return into stiff sections the bedding was hardly able to cover it and seemed ready
                to slide
                off any moment. His many legs, pitifully thin compared with the size of the rest of
                him,
                waved about helplessly as he looked what's happened to me he thought It wasn't a
                dream. His
                room, a proper human room although a little too small
            </p>

            <div class="additional_info_list">
                <h4 class="info_title">Additional Info</h4>
                <ul class="ul_li_block">
                    <li>No Side Effects</li>
                    <li>Made in USA</li>
                </ul>
            </div>

            <div class="additional_info_list">
                <h4 class="info_title">Product Features Info</h4>
                <ul class="ul_li_block">
                    <li>Compatible for indoor and outdoor use</li>
                    <li>Wide polypropylene shell seat for unrivalled comfort</li>
                    <li>Rust-resistant frame</li>
                    <li>Durable UV and weather-resistant construction</li>
                    <li>Shell seat features water draining recess</li>
                    <li>Shell and base are stackable for transport</li>
                    <li>Choice of monochrome finishes and colourways</li>
                    <li>Designed by Nagi</li>
                </ul>
            </div>
        </div>

        <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
            <div class="average_area">
                <div class="row align-items-center">
                    <div class="col-md-12 order-last">
                        <div class="average_rating_text">
                            @php
                                $total_rating_individual = 0;
                                $total_review_individual;
                                foreach ($product_reviews as $key => $reviews_individual) {
                                    $total_rating_individual = $total_rating_individual + $reviews_individual->rating;
                                    $total_review_individual = $key + 1;
                                }
                                if ($total_rating_individual === 0) {
                                    $avg_rating_individual = 0;
                                } else {
                                    $avg_rating_individual = $total_rating_individual / $total_review_individual;
                                }
                            @endphp
                            <ul class="rating_star ul_li_center">
                                @if ($avg_rating_individual === 0)
                                    <li>
                                        <p>not rated yet</p>
                                    </li>
                                @else
                                    <li>
                                        @for ($y = 0; $y < round($avg_rating_individual); $y++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </li>
                                @endif
                            </ul>
                            <p class="mb-0">
                                Average Star Rating: <span>{{ round($avg_rating_individual) }} out of 5</span>
                                ({{ $product_reviews_count }})
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
                                <img src="{{ asset('dashboard-assets/images/default_profile.png') }}"
                                    alt="image_not_found">
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
        </div>
    </div>

</div>

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

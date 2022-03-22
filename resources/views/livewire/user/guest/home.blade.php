<div>
    @section('title', 'Home')
    <main id="main">
        <div class="container">
            <!--MAIN SLIDE-->
            <div class="wrap-main-slide">
                <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                    data-dots="false">
                    <div class="item-slide">
                        <img src="assets/images/main-slider-1-1.jpg" alt="" class="img-slide">
                        <div class="slide-info slide-1">
                            <h2 class="f-title">Kid Smart <b>Watches</b></h2>
                            <span class="subtitle">Compra todos tus productos Smart por internet.</span>
                            <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                            <a href="/" class="btn-link">Shop Now</a>
                        </div>
                    </div>
                    <div class="item-slide">
                        <img src="assets/images/main-slider-1-2.jpg" alt="" class="img-slide">
                        <div class="slide-info slide-2">
                            <h2 class="f-title">Extra 25% Off</h2>
                            <span class="f-subtitle">On online payments</span>
                            <p class="discount-code">Use Code: #FA6868</p>
                            <h4 class="s-title">Get Free</h4>
                            <p class="s-subtitle">TRansparent Bra Straps</p>
                        </div>
                    </div>
                    <div class="item-slide">
                        <img src="assets/images/main-slider-1-3.jpg" alt="" class="img-slide">
                        <div class="slide-info slide-3">
                            <h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
                            <span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
                            <p class="sale-info">Stating at: <b class="price">$225.00</b></p>
                            <a href="#" class="btn-link">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--BANNER-->
            <div class="wrap-banner style-twin-default">
                <div class="banner-item">
                    <a href="#" class="link-banner banner-effect-1">
                        <figure><img src="assets/images/home-1-banner-1.jpg" alt="" width="580" height="190">
                        </figure>
                    </a>
                </div>
                <div class="banner-item">
                    <a href="#" class="link-banner banner-effect-1">
                        <figure><img src="assets/images/home-1-banner-2.jpg" alt="" width="580" height="190">
                        </figure>
                    </a>
                </div>
            </div>

            <!--On Sale-->
            @if ($saleObject->status == 1 && $saleObject->date > \Carbon\Carbon::now())
                <div class="wrap-show-advance-info-box style-1 has-countdown">
                    <h3 class="title-box">On Sale</h3>
                    <div class="wrap-countdown mercado-countdown"
                        data-expire="{{ \Carbon\Carbon::parse($saleObject->date)->format('Y/m/d h:m:s') }}"></div>
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                        data-loop="false" data-nav="true" data-dots="false"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                        @forelse ($onsaleProducts as $i)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('product.details', $i->id) }}"
                                        title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/tools_equipment_7.jpg" width="800"
                                                height="800" alt="{{ $i->name }}"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="{{ route('product.details', $i->id) }}" class="function-link">quick
                                            view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('product.details', $i->id) }}"
                                        class="product-name"><span>{{ $i->name }}}</span></a>
                                    <div class="wrap-price"><span
                                            class="product-price">${{ $i->sale_price }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            No Products Avilable
                        @endforelse

                    </div>
                </div>
            @endif

            <!--Latest Products-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">{{ __('public.Latest Products') }}</h3>
                <div class="wrap-top-banner">
                    <a href="#" class="link-banner banner-effect-2">
                        <figure><img src="assets/images/digital-electronic-banner.jpg" width="1170" height="240" alt="">
                        </figure>
                    </a>
                </div>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    @forelse($latestProducts as $lp)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="details/{{ $lp->id }}"
                                                    title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img src="{{ asset('assets/images/products/'.$lp->image) }}" width="800" height="800" alt="{{ $lp->name }}">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="details/{{ $lp->id }}" class="function-link">quick
                                                        view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="details/{{ $lp->id }}"
                                                    class="product-name"><span>{{ $lp->name }}</span></a>
                                                <div class="wrap-price"><span
                                                        class="product-price">${{ $lp->sale_price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        No Avilable Products
                                    @endforelse


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Product Categories-->
            @if ($productCategories)
                <div class="wrap-show-advance-info-box style-1">
                    <h3 class="title-box">{{ __('public.Product Categories') }}</h3>
                    <div class="wrap-top-banner">
                        <a href="#" class="link-banner banner-effect-2">
                            <figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240"
                                    alt="">
                            </figure>
                        </a>
                    </div>
                    <div class="wrap-products">
                        <div class="wrap-product-tab tab-style-1">
                            <div class="tab-control">
                                @forelse($productCategories as $categoryName)
                                    @php
                                        $name = $categoryName->category->name;
                                    @endphp
                                    <a href="#{{ $name }}"
                                        class="tab-control-item {{ $loop->first ? 'active' : '' }} ">{{ $name }}</a>
                                @empty
                                @endforelse
                            </div>
                            <div class="tab-contents">
                                @foreach ($productCategories as $categoryName)
                                    @php
                                        $name = $categoryName->category->name;
                                        $products = $categoryName->category->products->take($categoryName->number_of_products);
                                    @endphp
                                    <div class="tab-content-item {{ $loop->first ? 'active' : '' }}"
                                        id="{{ $name }}">
                                        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                            data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                            {{-- Iterating over the products. --}}
                                            @foreach ($products as $product)
                                                <div class="product product-style-2 equal-elem ">
                                                    <div class="product-thumnail">
                                                        <a href="{{ route('product.details', $product->id) }}"
                                                            title="{{ $product->name }}">
                                                            <figure><img
                                                                    src="{{ asset('assets/images/products/' . $product->image) }}"
                                                                    width="800" height="800"
                                                                    alt="{{ $product->name }}">
                                                            </figure>
                                                        </a>
                                                        <div class="group-flash">
                                                            <span class="flash-item new-label">new</span>
                                                        </div>
                                                        <div class="wrap-btn">
                                                            <a href="{{ route('product.details', $product->id) }}"
                                                                class="function-link">quick view</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{ route('product.details', $product->id) }}"
                                                            class="product-name"><span>{{ $product->name }}</span></a>
                                                        <div class="wrap-price"><span
                                                                class="product-price">${{ $product->regular_price }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </main>
</div>

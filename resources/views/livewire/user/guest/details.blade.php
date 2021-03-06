<div>
    @section('title', 'Product Details')
    <!--main area-->
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>detail</span></li>
                </ul>

            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">
                        <div class="detail-media">
                            <div class="product-gallery">
                                <ul class="slides">
                                    @forelse($images as $image)
                                        <li
                                            data-thumb="{{ asset('uploads/products/' .$product->subCategory->category->name .'/' .$product->subCategory->name .'/gallary' .'/' .$image) }}">
                                            <img
                                                src="{{ asset('uploads/products/' .$product->subCategory->category->name .'/' .$product->subCategory->name .'/gallary' .'/' .$image) }}" />
                                        </li>
                                    @empty
                                        <li data-thumb="{{ asset('assets/images/products/' . $product->image) }}">
                                            <img src="{{ asset('assets/images/products/' . $product->image) }}"
                                                alt="product thumbnail" />
                                        </li>

                                        <li data-thumb="{{ asset('assets/images/products/' . $product->image) }}">
                                            <img src="{{ asset('assets/images/products/' . $product->image) }}"
                                                alt="product thumbnail" />
                                        </li>

                                        <li data-thumb="{{ asset('assets/images/products/' . $product->image) }}">
                                            <img src="{{ asset('assets/images/products/' . $product->image) }}"
                                                alt="product thumbnail" />
                                        </li>

                                        <li data-thumb="{{ asset('assets/images/products/' . $product->image) }}">
                                            <img src="{{ asset('assets/images/products/' . $product->image) }}"
                                                alt="product thumbnail" />
                                        </li>
                                    @endforelse

                                </ul>
                            </div>
                        </div>
                        <div class="detail-info">
                            <div class="product-rating">

                                @php
                                    for($i = 0; $i < $product->rate ;$i++)
                                    {
                                        echo "<i class='fa fa-star' aria-hidden='true'></i>";
                                    }
                                @endphp
                            </div>
                            <h2 class="product-name">{{ $product->name }}</h2>
                            <div class="short-desc">
                                <ul>
                                    <li>7,9-inch LED-backlit, 130Gb</li>
                                    <li>Dual-core A7 with quad-core graphics</li>
                                    <li>FaceTime HD Camera 7.0 MP Photos</li>
                                </ul>
                            </div>
                            {{-- <div class="wrap-social">
                                <a class="link-socail" href="#"><img src="{{ asset('assets/images/social-list.png') }}"
                                        alt=""></a>
                            </div> --}}
                            <div class="wrap-price"><span
                                    class="product-price">${{ $product->sale_price }}</span>
                            </div>
                            <div class="stock-info in-stock">
                                <p class="availability">Availability: <b>{{ $product->stock_status }}</b></p>
                            </div>
                            <div class="wrap-butons">

                                <a href="#" class="btn add-to-cart"
                                    wire:click.prevent="storeItem( {{ $product->id }} , '{{ $product->name }}' , {{ $product->sale_price }} )">Add
                                    to Cart</a>
                                <div class="wrap-btn">
                                    <a href="#" class="btn btn-compare">Add Compare</a>
                                    <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                                </div>
                            </div>
                        </div>
                        <div class="advance-info">
                            <div class="tab-control normal">
                                <a href="#description" class="tab-control-item active">description</a>
                                <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                                <a href="#review" class="tab-control-item">Reviews</a>
                            </div>
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="description">
                                    <p>{{ $product->description }}</p>

                                </div>
                                <div class="tab-content-item " id="add_infomation">
                                    <table class="shop_attributes">
                                        <tbody>
                                            <tr>
                                                <th>Weight</th>
                                                <td class="product_weight">{{ $product->weight ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Dimensions</th>
                                                <td class="product_dimensions">{{ $product->dimensions ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Color</th>
                                                <td>
                                                    <p>{{ $product->color }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-content-item  active" id="review">

                                    <div class="wrap-review-form">

                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">{{ $product->reviews->count() }}
                                                review for
                                                <span>{{ $product->name . '  [' . $product->color . ']' }}</span>
                                            </h2>
                                            <ol class="commentlist">
                                                @forelse($product->reviews as $review)
                                                    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                                        id="li-comment-20">
                                                        <div id="comment-20" class="comment_container">
                                                            <img alt=""
                                                                src="{{ asset('assets/images/author-avata.jpg') }}"
                                                                height="80" width="80">
                                                            <div class="comment-text">
                                                                <div class="star-rating">
                                                                    @php
                                                                    for($i = 0; $i < $review->rating ;$i++)
                                                                    {
                                                                        echo "<i class='fa fa-star' aria-hidden='true'></i>";
                                                                    }
                                                                @endphp
                                                                </div>
                                                                <p class="meta">
                                                                    <strong class="woocommerce-review__author">{{$review->Author}}</strong>
                                                                    <span class="woocommerce-review__dash">???</span>
                                                                    <time class="woocommerce-review__published-date"
                                                                        datetime="2008-02-14 20:00">{{$review->created_at->diffForHumans()}}</time>
                                                                </p>
                                                                <div class="description">
                                                                    <p>
                                                                        {{$review->comment}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                @endforelse
                                            </ol>
                                        </div><!-- #comments -->


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget widget-our-services ">
                        <div class="widget-content">
                            <ul class="our-services">

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Free Shipping</b>
                                            <span class="subtitle">On Oder Over $99</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the
                                                printing...
                                            </p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Special Offer</b>
                                            <span class="subtitle">Get a gift!</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the
                                                printing...
                                            </p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Order Return</b>
                                            <span class="subtitle">Return within 7 days</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the
                                                printing...
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Categories widget-->

                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                @forelse($poularProducts as $p)
                                    <li class="product-item">
                                        <div class="product product-widget-style">
                                            <div class="thumbnnail">
                                                <a href="{{ route('product.details', $p->id) }}"
                                                    title="{{ $p->name }}">
                                                    <figure><img
                                                            src="{{ asset('assets/images/products') }}{{ '/' . $p->image }}"
                                                            alt="{{ $p->name }}"></figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('product.details', $p->id) }}"
                                                    class="product-name"><span>{{ $p->name }}</span></a>
                                                <div class="wrap-price"><span
                                                        class="product-price">${{ $p->sale_price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>

                </div>
                <!--end sitebar-->

                <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wrap-show-advance-info-box style-1 box-in-site">
                        <h3 class="title-box">Related Products</h3>
                        <div class="wrap-products">
                            <div class="products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                                @forelse($relatedProducts as $r)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('product.details', $r->id) }}"
                                                title="{{ $r->name }}">
                                                <figure><img
                                                        src="{{ asset('assets/images/products') . '/' . $r->image }}"
                                                        width="214" height="214" alt="{{ $r->name }}">
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="{{ route('product.details', $r->id) }}"
                                                    class="function-link">quick view</a>
                                            </div>
                                        </div>

                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>
                                                    {{ $r->name }}
                                                </span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">${{ $r->sale_price }}</span></div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse

                                {{-- <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item sale-label">sale</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                                Speaker [White]</span></a>
                                        <div class="wrap-price"><ins>
                                                <p class="product-price">$168.00</p>
                                            </ins> <del>
                                                <p class="product-price">$250.00</p>
                                            </del></div>
                                    </div>
                                </div> --}}

                                {{-- <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_15.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                            <span class="flash-item sale-label">sale</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                                Speaker [White]</span></a>
                                        <div class="wrap-price"><ins>
                                                <p class="product-price">$168.00</p>
                                            </ins> <del>
                                                <p class="product-price">$250.00</p>
                                            </del></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_1.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item bestseller-label">Bestseller</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                                Speaker [White]</span></a>
                                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_21.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            </figure>
                                        </a>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                                Speaker [White]</span></a>
                                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_3.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item sale-label">sale</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                                Speaker [White]</span></a>
                                        <div class="wrap-price"><ins>
                                                <p class="product-price">$168.00</p>
                                            </ins> <del>
                                                <p class="product-price">$250.00</p>
                                            </del></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img
                                                    src="{{ asset('assets/images/products/digital_4.jpg"') }} width="
                                                    214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                                Speaker [White]</span></a>
                                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    </div>
                                </div>

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ asset('assets/images/products/digital_5.jpg') }}"
                                                    width="214" height="214"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item bestseller-label">Bestseller</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                                Speaker [White]</span></a>
                                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                        <!--End wrap-products-->
                    </div>
                </div>

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </main>
    <!--main area-->

</div>

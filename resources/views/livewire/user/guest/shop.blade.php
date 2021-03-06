<div>

    @section('title', 'Shop')
    <!--main area-->
    <main id="main" class="main-site left-sidebar">
        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">{{ __('public.home') }}/a></li>
                    <li class="item-link"><span>Digital & Electronics</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">


                    <div class="banner-shop">
                        <a href="#" class="banner-link">
                            <figure><img src="{{ asset('assets/images/shop-banner.jpg') }}" alt=""></figure>
                        </a>
                    </div>

                    <div class="wrap-shop-control">

                        <h1 class="shop-title">Digital & Electronics</h1>
                        <div class="wrap-right">

                            <div class="sort-item orderby ">
                                <select name="orderby" class="use-chosen" wire:model="sortMode"
                                    wire:change="sortItems">
                                    <option value="default">Default sorting</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div>
                            <div class="sort-item product-per-page">
                                <select class="use-chosen" wire:model="pagesize">
                                    <option value="12">12 per page</option>
                                    <option value="21">21 per page</option>
                                    <option value="24">24 per page</option>
                                    <option value="30">30 per page</option>
                                    <option value="32">32 per page</option>
                                </select>
                            </div>

                            <div class="change-display-mode">
                                <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>

                            </div>

                        </div>

                    </div>
                    <!--end wrap shop control-->
                    <style>
                        .product-wish {
                            position: absolute;
                            top: 10%;
                            left: 0;
                            z-index: 99;
                            right: 30px;
                            text-align: right;
                            padding-top: 0;
                        }

                        .roduct-wish .fa {
                            color: #cbcbcb;
                            font-size: 32px;
                        }

                        .product-wish .fa:hover {
                            color: #ff7007 !important;
                        }

                    </style>

                    <div class="row">
                        @php
                            $wishItems = Cart::instance('wishlist')
                                ->content()
                                ->pluck('id');
                        @endphp
                        @forelse ($products as $i)
                            <ul class="product-list grid-products equal-container">
                                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="details/{{ $i->id }}"
                                                title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="assets/images/products/{{ $i->image }}"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="details/{{ $i->id }}" class="product-name">
                                                <span>{{ $i->name }}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">{{ $i->sale_price }}</span></div>
                                            <a href="#" class="btn add-to-cart"
                                                wire:click.prevent="storeItem( {{ $i->id }} , '{{ $i->name }}' , {{ $i->sale_price }} )">Add
                                                To Cart</a>
                                            <div class="product-wish">
                                                @if ($wishItems->contains($i->id))
                                                    <a wire:click.prevent="removeFromWishlist({{ $i->id }})"><i
                                                            class="fa fa-heart fill-heart"
                                                            style="color:#ff7007"></i></a>
                                                @else
                                                    <a
                                                        wire:click.prevent="addTowishlist(  {{ $i->id }} , '{{ $i->name }}' , {{ $i->sale_price }} )"><i
                                                            class="fa fa-heart" style="cursor: pointer"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        @empty
                            <div>
                                No Items Avilable
                            </div>
                        @endforelse

                    </div>


                    {{-- custom pagination --}}
                    <div class="wrap-pagination-info">
                        {{ $products->links('livewire.user.pagination.custom', ['targetPage' => 'shop']) }}
                    </div>
                </div>
                <!--end main products area-->


                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget">
                        <h2 class="widget-title">All Categories</h2>
                        <div class="widget-content">
                            <ul class="list-category">
                                @forelse($categories as $category)
                                    <li class="category-item has-child-cate">
                                        <a href="#" class="cate-link">{{ $category->name }}</a>
                                        @if($category->subCategories)
                                        <span class="toggle-control">+</span>
                                        @endif
                                        @forelse($category->subCategories as $subCategory)
                                            <ul class="sub-cate">
                                                <li class="category-item"><a href="#" class="cate-link">{{$subCategory->name}}
                                                        ({{$subCategory->products->count()}})</a>
                                                </li>
                                            </ul>
                                            @empty
                                        </li>
                                        @endforelse
                                    </li>
                                @empty
                                    <li class="category-item has-child-cate">
                                        No Categories Yet
                                    </li>
                                @endforelse
                        </div>
                    </div><!-- Categories widget-->


                    <div class="widget mercado-widget filter-widget">
                        <h2 class="widget-title">Color</h2>
                        <div class="widget-content">
                            <ul class="list-style vertical-list has-count-index">
                                <li class="list-item"><a class="filter-link " href="#">Red
                                        <span>(217)</span></a></li>
                                <li class="list-item"><a class="filter-link " href="#">Yellow
                                        <span>(179)</span></a></li>
                                <li class="list-item"><a class="filter-link " href="#">Black
                                        <span>(79)</span></a></li>
                                <li class="list-item"><a class="filter-link " href="#">Blue
                                        <span>(283)</span></a></li>
                                <li class="list-item"><a class="filter-link " href="#">Grey
                                        <span>(116)</span></a></li>
                                <li class="list-item"><a class="filter-link " href="#">Pink
                                        <span>(29)</span></a></li>
                            </ul>
                        </div>
                    </div><!-- Color -->

                    <div class="widget mercado-widget filter-widget">
                        <h2 class="widget-title">Size</h2>
                        <div class="widget-content">
                            <ul class="list-style inline-round ">
                                <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                                <li class="list-item"><a class="filter-link " href="#">M</a></li>
                                <li class="list-item"><a class="filter-link " href="#">l</a></li>
                                <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                            </ul>
                            <div class="widget-banner">
                                <figure><img src="assets/images/size-banner-widget.jpg" width="270" height="331" alt="">
                                </figure>
                            </div>
                        </div>
                    </div><!-- Size -->

                </div>
                <!--end sitebar-->






                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">{{ __('public.Popular Products') }}</h2>
                    <div class="widget-content">
                        <ul class="products">
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="assets/images/products/digital_01.jpg" alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="assets/images/products/digital_17.jpg" alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="assets/images/products/digital_18.jpg" alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="assets/images/products/digital_20.jpg" alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div><!-- brand widget-->

            </div>
            <!--end sitebar-->

        </div>
        <!--end row-->

</div>
<!--end container-->

</main>
<!--main area-->

@push('scripts')
    <script>
        var slider = document.getElementById('slider');
        nouislider.create(slider, {
            start: [1, 250],

            connect: true,
            range: {
                'min': 1,
                'max': 250
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4,
            }
        });
    </script>
@endpush



</div>

<div>
    @section('title', 'Cart')
    <!--main area-->
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">{{ __('public.home') }}</a></li>
                    <li class="item-link"><span>{{ __('header.Cart') }}</span></li>
                </ul>
            </div>
            <div class=" main-content-area">

                <div class="wrap-iten-in-cart">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-warning">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    @if (Cart::instance('cart')->count() > 0)
                        <h3 class="box-title">{{ __('public.Products Name') }}</h3>
                    @endif
                    <ul class="products-cart">
                        @php
                            $flag = 0; //There is No Items
                        @endphp

                        @forelse (Cart::instance('cart')->content() as $i)
                            @php
                                $flag = 1;
                            @endphp
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $i->model->image }}"
                                            alt="{{ $i->model->name }}"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product"
                                        href="/details/{{ $i->model->id }}">{{ $i->model->name }}</a>
                                </div>
                                <div class="price-field produtc-price">
                                    <p class="price">${{ $i->model->sale_price }}</p>
                                </div>
                                <div class="quantity">
                                    <div class="quantity-input">
                                        <input type="text" name="product-quatity" value="{{ $i->qty }}"
                                            data-max="120" pattern="[0-9]*">
                                        <a class="btn btn-increase"
                                            wire:click.prevent="$emit('increaseQty','{{ $i->rowId }}') , $refresh"></a>
                                        <a class="btn btn-reduce"
                                            wire:click.prevent="$emit('reduceQty' , '{{ $i->rowId }}')"></a>
                                    </div>
                                </div>
                                <div class="price-field sub-total">
                                    <p class="price">${{ $i->subtotal }}</p>
                                </div>
                                <div class="delete">
                                    <a href="#" class="btn btn-delete" title=""
                                        wire:click.prevent="$emit('deleteItem' , '{{ $i->rowId }}')">
                                        <span>Delete from your cart</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        @empty
                            <div class="text-center">
                                <h4>{{ __('public.Your Cart Is Empty') }}</h4>
                                <a href="{{ route('shop') }}"
                                    class="btn btn-success">{{ __('public.Shop Now') }}</a>
                            </div>
                        @endforelse


                    </ul>
                </div>

                @if ($flag == 1)
                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">{{ __('public.Order Summary') }}</h4>
                            @if ($couponFlag == 1)
                                <p class="summary-info"><span
                                        class="Subtotals">{{ __('public.Subtotal') }}</span><b
                                        class="index">${{ Cart::instance('cart')->subtotal() }}</b></p>
                                <p class="summary-info"><span
                                        class="Subtotals">{{ __('public.Subtotal After Discount') }}</span><b
                                        class="index">${{ $subtotalAfterDiscount }}</b></p>
                                <p class="summary-info"><span
                                        class="Tax">{{ __('public.Tax After Discount') }}</span><b
                                        class="index">${{ $taxAfterDiscount }}</b></p>
                                <p class="summary-info"><span
                                        class="Total">{{ __('public.Shipping') }}</span><b
                                        class="index">{{ __('public.Free Shipping') }}</b></p>
                                <p class="summary-info total-info "><span
                                        class="title">{{ __('public.Total After Discount') }}</span><b
                                        class="index">${{ $totalAfterDiscount }}</b></p>
                            @else
                                <p class="summary-info"><span
                                        class="Subtotals">{{ __('public.Subtotal') }}</span><b
                                        class="index">${{ Cart::instance('cart')->subtotal() }}</b></p>
                                <p class="summary-info"><span class="Tax">{{ __('public.Tax') }}</span><b
                                        class="index">${{ Cart::instance('cart')->Tax() }}</b></p>
                                <p class="summary-info"><span
                                        class="Total">{{ __('public.Shipping') }}</span><b
                                        class="index">{{ __('public.Free Shipping') }}</b></p>
                                <p class="summary-info total-info "><span
                                        class="title">{{ __('public.Total') }}</span><b
                                        class="index">${{ Cart::instance('cart')->total() }}</b></p>
                            @endif
                        </div>
                        <div class="checkout-info">
                            <label class="checkbox-field">
                                <input class="frm-input " name="have-code" id="have-code" value=""
                                    wire:model="haveCoupon" type="checkbox"><span>I
                                    have promo code</span>

                            </label>
                            @if ($haveCoupon)
                                <form wire:submit.prevent="applyCode()">
                                    <div>
                                        <label>Enter Coupon Code:</label>
                                        <input type="text" class="form-control" wire:model="couponCode"> <br>
                                        <button type="submit" class="btn-sm btn-info">Apply Code</button>
                                    </div>
                                </form>
                            @endif
                            <a class="btn btn-checkout"
                                wire:click.prevent="checkout()">{{ __('public.Check out') }}</a>
                            <a class="link-to-shop" href="/shop">{{ __('public.Continue Shopping') }}<i
                                    class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                @endif
                @if ($mostViewdProducts)
                    <div class="wrap-show-advance-info-box style-1 box-in-site">
                        <h3 class="title-box">{{ __('public.Most Viewed Products') }}</h3>
                        <div class="wrap-products">
                            <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                                data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                                @forelse($mostViewdProducts as $product)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{route('product.details' , $product->id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="assets/images/products/digital_01"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('product.details' , $product->id)}}" class="product-name"><span>
                                                    {{ $product->name }}
                                                </span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">${{ $product->regular_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <!--End wrap-products-->
                @endif
            </div>


        </div>
        <!--end main content area-->
</div>
<!--end container-->

</main>
<!--main area-->
</div>

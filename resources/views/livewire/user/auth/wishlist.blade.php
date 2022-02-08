<div>
    <main id="main" class="main-site left-sidebar">
        <div class="container">
            <div class="row">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <ul class="product-list grid-products equal-container">
                    @forelse($products as $product)
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product-wish">
                                <a wire:click.prevent="removeFromWishlist({{ $product->id }})"><i
                                        class="fa fa-heart fill-heart" style="color:#ff7007" style="cursor: pointer"></i></a>
                            </div>
                            <div class="product product-style-3 equal-elem ">

                                <div class="product-thumnail">
                                    <a href="details/{{ $product->id }}"
                                        title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/{{ $product->image }}"
                                                alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="details/{{ $product->id }}" class="product-name">
                                        <span>{{ $product->name }}</span></a>
                                    <div class="wrap-price"><span
                                            class="product-price">{{ $product->regular_price }}</span></div>
                                    <a href="#" class="btn add-to-cart"
                                        wire:click.prevent="moveToCard( '{{ $product->rowId }}' )" style="cursor: pointer">Add
                                        To Cart</a>

                                </div>
                            </div>
                        </li>
                    @empty
                    <div class="text-center">
                        <h4>No Products in wishlist</h4>
                        <a href="{{route('shop')}}" class="btn btn-success">Shop&Wish</a>
                    </div>
                    @endforelse

                </ul>
            </div>
        </div>
</div>

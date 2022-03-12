<div>
    @section('title', 'Checkout')
    <!--main area-->
    <main id="main" class="main-site">
        <div class="container">
            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
            @endif
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>login</span></li>
                </ul>
            </div>
            <div class=" main-content-area">
                <div class="wrap-address-billing">
                    <h3 class="box-title">Billing Address</h3>
                    <form wire:submit.prevent="placeOrder()">
                        <div class="row">
                            <div class="col-sm-12">

                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input id="fname" type="text" placeholder="Your name" wire:model.lazy="firstName">
                                    @error('firstName')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label>last name<span>*</span></label>
                                    <input type="text" placeholder="Your last name" wire:model.lazy="lastName">
                                    @error('lastName')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input type="email" placeholder="Type your email" wire:model.lazy="email">
                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" placeholder="10 digits format" wire:model.lazy="mobile">
                                    @error('mobile')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label>Address_1:</label>
                                    <input type="text" placeholder="Street at apartment number"
                                        wire:model.lazy="address_1">
                                    @error('address_1')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label>Address_2:</label>
                                    <input type="text" placeholder="Street at apartment number"
                                        wire:model.lazy="address_2">
                                    @error('address_2')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" name="country" placeholder="United States"
                                        wire:model.lazy="country">
                                    @error('country')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input type="number" name="zip-code" placeholder="Your postal code"
                                        wire:model.lazy="zipCode">
                                    @error('zipCode')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input type="text" placeholder="City name" wire:model.lazy="city">
                                    @error('city')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form fill-wife">
                                    <label class="checkbox-field">
                                        <input type="checkbox" wire:model.lazy="diffShippingAddress">
                                        <span>Ship to a different address?</span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            {{-- Different Shippment --}}
                            @if ($diffShippingAddress)
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input type="text" placeholder="Your name" wire:model.lazy="secondFirstName">
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input type="text" placeholder="Your last name" wire:model.lazy="secondLastName">
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input type="email" placeholder="Type your email" wire:model.lazy="secondEmail">
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" placeholder="10 digits format" wire:model.lazy="secondMobile">
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Address_1:</label>
                                    <input type="text" placeholder="Street at apartment number"
                                        wire:model.lazy="secondAddress_1">
                                </p>
                                <p class="row-in-form">
                                    <label>Address_2:</label>
                                    <input type="text" placeholder="Street at apartment number"
                                        wire:model.lazy="secondAddress_2">
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" placeholder="United States" wire:model.lazy="secondCountry">
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input type="number" placeholder="Your postal code" wire:model.lazy="secondZipCode">
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input type="text" wire:model.lazy="secondCity">
                                </p>
                            @endif
                        </div>

                        <div class="summary summary-checkout">
                            <div class="summary-item payment-method">
                                <h4 class="title-box">Payment Method</h4>
                                <p class="summary-info"><span class="title">Check / Money order</span></p>
                                <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                                <div class="choose-payment-methods">
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-bank" value="cod" type="radio"
                                            wire:model.lazy="paymentMethod">
                                        <span>Cash On Delviry</span>
                                        <span class="payment-desc">
                                            Order And pay When u get The product!!
                                            believable</span>
                                    </label>
                                    <label class="payment-method">
                                        <input name="payment-method" value="card" type="radio"
                                            wire:model.lazy="paymentMethod">
                                        <span>Credit Card</span>
                                        <span class="payment-desc">Checkout using Visa or Mastercard</span>
                                    </label>
                                    <label class="payment-method">
                                        <input name="payment-method" id="paypal" value="paypal" type="radio"
                                            wire:model.lazy="paymentMethod">
                                        <span>Paypal</span>
                                        <span class="payment-desc">You can pay with your credit</span>
                                        <span class="payment-desc">card if you don't have a paypal account</span>
                                    </label>
                                    @error('paymentMethod')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if (session()->has('data'))
                                    <p class="summary-info grand-total"><span>Grand Total</span> <span
                                            class="grand-total-price">{{ session()->get('data')['total'] }}</span>
                                    </p>
                                    <button type="submit" class="btn btn-medium">Place order now</button>
                                @endif
                            </div>
                            @if ($paymentMethod == 'card')
                                <div class="summary-item shipping-method">
                                    <h4 class="title-box f-title">Checkout With Credit Card</h4>
                                    <h4 class="title-box">Safe and secure</h4>
                                    <p class="row-in-form">
                                        <label>Enter Card number:</label>
                                        <input type="text" placeholder="42XX-XXXX-XXXX-XXXX" wire:model="cardNumber">
                                        @error('cardNumber')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        <label>Enter Expire year:</label>
                                        <input type="text" placeholder="2022" wire:model="cardExpYear">
                                        @error('cardExp')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        <label>Enter Expire month:</label>
                                        <input type="text" placeholder="2022" wire:model="cardExpMonth">
                                        @error('cardExpMonth')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        <label>CVC:</label>
                                        <input type="text" placeholder="***" wire:model="cardCVC">
                                        @error('cardCVC')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </p>
                                    {{-- <a href="#" class="btn btn-small">Apply</a> --}}
                                </div>
                            @endif
                        </div>

                    </form>



                </div>



                {{-- ---------------------------------- --}}
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Most Viewed Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                            data-loop="false" data-nav="true" data-dots="false"
                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_04.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
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
                                            Speaker
                                            [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_17.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
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
                                            Speaker
                                            [White]</span></a>
                                    <div class="wrap-price"><ins>
                                            <p class="product-price">$168.00</p>
                                        </ins> <del>
                                            <p class="product-price">$250.00</p>
                                        </del></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_15.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
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
                                            Speaker
                                            [White]</span></a>
                                    <div class="wrap-price"><ins>
                                            <p class="product-price">$168.00</p>
                                        </ins> <del>
                                            <p class="product-price">$250.00</p>
                                        </del></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_01.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
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
                                            Speaker
                                            [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_21.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        </figure>
                                    </a>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                            Speaker
                                            [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_03.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
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
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_04.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
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
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_05.jpg" width="214"
                                                height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
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
                        </div>
                    </div>
                    <!--End wrap-products-->
                </div>

            </div>
            <!--end main content area-->
        </div>
        <!--end container-->

    </main>
    <!--main area-->
</div>

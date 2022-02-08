<div>
    @section('page', 'orders / order details')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-3">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                        <h3 class="card-title text-info text-gradient">Basic Information</h3>
                        <blockquote class="blockquote text-white mb-0 ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            First Name: {{ $order->firstname }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Last Name: {{ $order->lastname }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            E-mail: {{ $order->email }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Mobile: {{ $order->mobile }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- <footer class="blockquote-footer text-gradient text-info text-sm ms-3">Someone famous in
                                <cite title="Source Title">Source Title</cite>
                            </footer> --}}
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mb-3">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                        <h3 class="card-title text-info text-gradient">Shipping Information</h3>
                        <blockquote class="blockquote text-white mb-0 ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            First Name: {{ $order->shipping->firstname }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Last Name: {{ $order->shipping->lastname }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            E-mail: {{ $order->shipping->email }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Mobile: {{ $order->shipping->mobile }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- <footer class="blockquote-footer text-gradient text-info text-sm ms-3">Someone famous in
                                <cite title="Source Title">Source Title</cite>
                            </footer> --}}
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mb-3">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                        <h3 class="card-title text-info text-gradient">Location Information</h3>
                        <blockquote class="blockquote text-white mb-0 ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Country: {{ $order->shipping->country }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                        City: {{ $order->shipping->city }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Zip-Code: {{ $order->shipping->zipcode }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Address_1: {{ $order->shipping->line_1 }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Address_2: {{ $order->shipping->line_2 ?? 'Unkown' }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            status: {{ $order->status}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- <footer class="blockquote-footer text-gradient text-info text-sm ms-3">Someone famous in
                                <cite title="Source Title">Source Title</cite>
                            </footer> --}}
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mb-3">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                        <h3 class="card-title text-info text-gradient">Payment Information</h3>
                        <blockquote class="blockquote text-white mb-0 ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Tax: {{ $order->tax }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Subtotal: {{ $order->subtotal }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Discount: {{ $order->discount }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-dark ms-3">
                                            Total: {{ $order->total}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- <footer class="blockquote-footer text-gradient text-info text-sm ms-3">Someone famous in
                                <cite title="Source Title">Source Title</cite>
                            </footer> --}}
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

    </style>
    {{-- Modal area --}}




    <div class="container" style="padding:30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading col-md-12">
                    All Products
                    <div class="col-md pull-right">
                        <a href="{{route('admin.products.add') }}" class="btn-sm btn-success">Add New</a>
                    </div>
                </div>
                @if (Session::has('deleted'))
                    <div class=" col-md-12 alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('deleted') }}
                    </div>
                @endif
                <div class="panel-body table-responsive">
                    <table class="table table-striped  table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>short_description</th>
                                <th>regular_price</th>
                                <th>sale_price</th>
                                <th>SKU</th>
                                <th>featured</th>
                                <th>quantity</th>
                                <th>stock_status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="product-thumnail">
                                        <figure><img src="assets/images/products/{{ $product->image }}"
                                                alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->short_description }}</td>
                                    <td>{{ $product->regular_price }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    <td>{{ $product->SKU }}</td>
                                    <td>{{ $product->stock_status }}</td>
                                    <td>{{ $product->featured }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <button class="btn-xs btn-danger"
                                            wire:click="deleteProdcut({{ $product->id }})"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                    <td>
                                        <button class="btn-xs btn-info" wire:click="edit({{ $product->id }})"><i
                                                class="fa fa-edit"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No Products Avilable</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>





</div>

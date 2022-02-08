<div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12  mb-4">
                <div class="card">
                    <div class="card-body px-0 pb-2">
                        @if (Session::has('deleted'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text">{{ Session::get('deleted') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            short_description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            regular_price</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            sale_price</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            SKU</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            featured</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            quantity</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            stock_status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            creation date</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            <a class="btn btn-info" href="{{ route('admin.products.add') }}">
                                                Add New
                                            </a>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets/images/small-logos/logo-xd.svg') }}"
                                                            class="avatar avatar-sm me-3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $product->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $product->short_description }}
                                            </td>
                                            <td>
                                                {{ $product->regular_price }}
                                            </td>
                                            <td>
                                                {{ $product->sale_price }}
                                            </td>
                                            <td>
                                                {{ $product->SKU }}
                                            </td>
                                            <td>
                                                {{ $product->featured }}
                                            </td>
                                            <td>
                                                {{ $product->quantity }}
                                            </td>
                                            <td>
                                                {{ $product->stock_status }}
                                            </td>
                                            <td>
                                                {{ $product->created_at }}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm "
                                                    wire:click="deleteProdcut({{ $product->id }})">
                                                    <i class="fa fa-trash fa-sm"></i>
                                                </button>

                                                <button class="btn btn-success btn-sm "
                                                    wire:click="editProduct({{ $product->id }})">
                                                    <i class="fa fa-edit fa-sm"></i>
                                                </button>
                                            </td>
                                        </tr>
                        </div>
                    @empty
                        @endforelse
                        </tbody>
                        </table>
                        {{ $products->links('livewire.admin.components.custom-pagination', ['targetPage' => 'products']) }}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

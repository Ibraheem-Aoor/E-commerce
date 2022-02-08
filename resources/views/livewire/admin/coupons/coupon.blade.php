<div>
    @section('page', 'Sales / All Coupons')
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
                                            Coupon Code</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            type</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            value</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            expire Date</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Cart Value</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Actions</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            <a class="btn btn-info" href="{{ route('admin.coupons.add') }}">
                                                Add New
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($coupons as $coupon)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets/images/small-logos/logo-xd.svg') }}"
                                                            class="avatar avatar-sm me-3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $coupon->code }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>

                                                {{ $coupon->type }}
                                            </td>
                                            <td>
                                                {{ $coupon->value }} @if ($coupon->type == 'percent') <span>%</span>@endif
                                            </td>
                                            <td>

                                                {{ $coupon->exprie_date }}
                                            </td>
                                            <td>

                                                {{ $coupon->cart_value }}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm " title="delete"
                                                    wire:click="deleteCoupon({{ $coupon->id }})">
                                                    <i class="fa fa-trash fa-sm"></i>
                                                </button>

                                                <button class="btn btn-success btn-sm " title="edit"
                                                    wire:click="editCoupon({{ $coupon->id }})">
                                                    <i class="fa fa-edit fa-sm"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- {{ $coupons->links('livewire.admin.components.custom-pagination', ['targetPage' => 'coupons']) }} --}}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

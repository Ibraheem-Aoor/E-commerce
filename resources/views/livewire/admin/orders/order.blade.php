<div>
    @section('page', 'orders / All orders')
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
                                            user</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            address</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            city</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            country</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                            subtotal

                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            tax
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            discount
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            total
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                            Actions

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets/images/small-logos/logo-xd.svg') }}"
                                                            class="avatar avatar-sm me-3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $order->user->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $order->firstname . '' . $order->lastname }}
                                            </td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->line_1 }}</td>
                                            <td>{{ $order->city }}</td>
                                            <td>{{ $order->country }}</td>
                                            <td>{{ $order->subtotal }}</td>
                                            <td>{{ $order->tax }}</td>
                                            <td>{{ $order->discount}}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn bg-gradient-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Info
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <a href="{{route('admin.order.edit' , $order->id)}}" type="button" class="btn bg-default dropdown-item">
                                                                <i class="fa fa-edit"></i> Update status
                                                            </a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.orders.deatils', $order->id) }}"><i
                                                                    class="fa fa-eye"></i> show details
                                                            </a></li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $orders->links('livewire.admin.components.custom-pagination', ['targetPage' => 'orders']) }}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

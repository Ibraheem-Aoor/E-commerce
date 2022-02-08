<div>
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>orders</span></li>
            </ul>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-responsive table-stripped">
                    <thead>
                        <th>Address:</th>
                        <th>subtotal</th>
                        <th>Tax:</th>
                        <th>Total</th>
                        <th>status</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $order->line_1 }}</td>
                                <td>{{ $order->subtotal }}</td>
                                <td>{{ $order->tax }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->status }}</td>
                                <td><button class="btn btn-danger" wire:click="cancelOrder({{$order->id}})">Cancel</button></td>
                            </tr>
                        @empty
                            <div class="text-center">
                                <h4>Your Cart Is Empty</h4>
                                <a href="{{ route('shop') }}" class="btn btn-success">Shop Now</a>
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{$orders->links('livewire.user.pagination.custom' , ['targetPage' =>'orders'])}}
            </div>
        </div>
    </div>

<div>
    <div class="container" style="padding: 30px;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Order Details
                </div>
                <div class="panel-heading">
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Order Products
                        </div>
                        <div class="panel-body">
                            <table class="table table-responsive table-stripped">
                                <thead>
                                    <tr>
                                        <td>image</td>
                                        <td>NAME</td>
                                        <td>PRICE</td>
                                        <td>Review</td>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems as $item)
                                        <tr>
                                            <td>
                                                <figure>
                                                    <img class="img-fluid" width="100" height="100" src="{{asset('assets/images/products/'.$item->product->image)}}" alt="{{$item->product->name}}">
                                                </figure>
                                            </td>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->price}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <h4 class="text-success">ORDER TOTAL: {{$orderTotal}}$</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    @section('page', 'Sales / All Transactions')
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment method</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">creatino date</th>
                                </thead>
                                <tbody>
                                    @forelse($transactions as  $transaction)
                                    <tr>
                                        <td>{{$transaction->user->name}}</td>
                                        <td>{{$transaction->mode}}</td>
                                        <td>{{$transaction->status}}</td>
                                        <td>{{$transaction->created_at}}</td>
                                    </tr>
                                    @empty
                                        <h2>No Transactinos Yet!</h2>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

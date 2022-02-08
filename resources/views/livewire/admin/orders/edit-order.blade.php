<div>
    @section('pageName', 'Edit Category')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12  mb-4">
                <div class="card">
                    <div class="card-body px-5 pb-2">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text">{{ Session::get('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form wire:submit.prevent="updateOrderStatus()">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Update Order Status:</label>
                                        <select class="form-control" wire:model.lazy="orderNewStatus">
                                            <option value="delivered">delivered</option>
                                            <option value="canceled">canceled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <button class="btn btn-info">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

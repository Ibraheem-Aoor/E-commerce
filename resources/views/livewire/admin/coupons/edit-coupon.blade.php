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
                        <form wire:submit.prevent="editCoupon()">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Coupon Code:</label>
                                        <input type="text" class="form-control" wire:model.lazy="code">
                                        @error('code')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Coupon Type:</label>
                                        <select class="form-control" wire:model="type">
                                            <option selected>Choose one</option>
                                            <option value="fixed">Fixed</option>
                                            <option value="percent">percent</option>
                                        </select>
                                        @error('type')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Coupon Value:</label>
                                        <input type="text" class="form-control" wire:model.lazy="value">
                                        @error('value')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Cart Value:</label>
                                        <input type="text" class="form-control" wire:model.lazy="cartValue">
                                        @error('cartValue')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Expire Date:</label>
                                        <input type="date" class="form-control" wire:model.lazy="expDate">
                                        @error('expDate')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="form-control" value="Edit">
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

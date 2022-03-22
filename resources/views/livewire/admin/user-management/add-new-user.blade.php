<div>
    @section('page', 'Users')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12  mb-4">
                <div class="card">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <span class="alert-text">{{ Session::get('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body px-5 pb-2">
                        <form wire:submit.prevent="addNewUser();">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" wire:model.lazy="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" wire:model.lazy="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" class="form-control" wire:model.lazy="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>confirm-password</label>
                                <input type="password" class="form-control" wire:model.lazy="password_confirmation">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-success">ADD</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

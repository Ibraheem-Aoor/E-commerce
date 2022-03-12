<div>
    @section('page', 'orders / order details')
    <div class="container-fluid py-4">
        <div class="row">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text">{{ Session::get('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="col-sm-12 mb-3">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                        <h3 class="card-title text-info text-gradient">Contact Links</h3>
                        <blockquote class="blockquote text-white mb-0 ">
                            <form wire:submit.prevent="saveSettings()">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6 form-gruop">
                                            <p class="text-dark ms-3">
                                                <label for="">Site E-mail</label>
                                                <input type="text" class="form-control" wire:model.lazy="email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </p>
                                        </div>
                                        <div class="col-sm-6 form-gruop">
                                            <p class="text-dark ms-3">
                                                <label for="">Mobile</label>
                                                <input type="text" class="form-control" wire:model.lazy="mobile">
                                                @error('mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </p>
                                        </div>
                                        <div class="col-sm-6 form-gruop">
                                            <p class="text-dark ms-3">
                                                <label for="">MAil Office</label>
                                                <input type="text" class="form-control" wire:model.lazy="mailOffice">
                                                @error('mailOffice')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </p>
                                        </div>
                                        <div class="col-sm-6 form-gruop">
                                            <p class="text-dark ms-3">
                                                <label for="">Address</label>
                                                <input type="text" class="form-control" wire:model.lazy="address">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <footer class="blockquote-footer text-gradient text-info text-sm ms-3">
                                    <cite title="Source Title">All will These Data Shown on The Site Footer</cite>
                                </footer>
                        </blockquote>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 mb-3">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                        <h3 class="card-title text-info text-gradient">Social Media Links</h3>
                        <blockquote class="blockquote text-white mb-0 ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 form-gruop">
                                        <p class="text-dark ms-3">
                                            <label for="">LinkedIn</label>
                                            <input type="text" class="form-control" wire:model.lazy="linkedIn">
                                            @error('linkedIn')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                    </div>
                                    <div class="col-sm-6 form-gruop">
                                        <p class="text-dark ms-3">
                                            <label for="">twitter</label>
                                            <input type="text" class="form-control" wire:model.lazy="twitter">
                                            @error('twitter')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                    </div>
                                    <div class="col-sm-6 form-gruop">
                                        <p class="text-dark ms-3">
                                            <label for="">Youtube</label>
                                            <input type="text" class="form-control" wire:model.lazy="youtube">
                                            @error('youtube')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                    </div>
                                    <div class="col-sm-6 form-gruop">
                                        <p class="text-dark ms-3">
                                            <label for="">Facebook</label>
                                            <input type="text" class="form-control" wire:model.lazy="fb">
                                            @error('fb')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <footer class="blockquote-footer text-gradient text-info text-sm ms-3">
                                <cite title="Source Title">All will These Data Shown on The Site Footer.</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>

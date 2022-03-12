<div>
    @section('page', 'orders / Admin Prfoile')
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
                        <h3 class="card-title text-info text-gradient">Information</h3>
                        <blockquote class="blockquote text-white mb-0 ">
                            <form wire:submit.prevent="saveProfile()">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            @if ($admin->profile_photo_path)
                                                {{-- <img src="{{}}" alt=""> --}}
                                            @else
                                                <img src="{{ asset('assets/images/user.png') }}" alt="user-avatar">
                                            @endif
                                            <div>
                                                <input type="file" placeholder="Change Image" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="">name:</label>
                                                <input type="text" class="form-control" wire:model.lazy="name"
                                                    value="{{ $admin->name }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">email:</label>
                                                <input type="email" class="form-control" wire:model.lazy="email"
                                                    value="{{ $admin->email }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="">Mobile:</label>

                                                <input type="text" class="form-control" wire:model.lazy="mobile"
                                                    value="{{ $admin->profile->mobile ?? '' }}">
                                                @error('mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Country:</label>
                                                <input type="text" class="form-control" wire:model.lazy="country"
                                                    value="{{ $admin->profile->country ?? '' }}">
                                                @error('country')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">City:</label>
                                                <input type="text" class="form-control" wire:model.lazy="city"
                                                    value="{{ $admin->profile->city ?? '' }}">
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                            </form>
                    </div>
                    <footer class="blockquote-footer  text-info text-sm ms-3">
                        <a href="{{ route('admin.profile.update') }}" class="btn btn-info">Update Password</a>
                    </footer>
                    </blockquote>
                </div>
            </div>
        </div>


    </div>
</div>

@push('scripts')
    <script>
        function showPw() {
            $('#name').removeAttr('readonly');
        }
    </script>
@endpush

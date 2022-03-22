<div>
    <div class="container">
        <div class="row">
            @if (Session::has('success'))
                <div class="alert alert-success" style="margin: 5px;">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="panel defult panel">
                <div class="panel-heading">
                    Update Profile Informations
                </div>
                <form wire:submit.prevent="updateProfile()">
                    <div class="panel-body">
                        <div class="col-sm-4">
                            @if ($user->profile_photo_path)
                            <img src="{{asset('uploads/users/'.Auth::id().'/'.$user->profile_photo_path)}}" width="250" height="250"
                                    alt="user-avatar">
                            @else
                                <img src="{{ asset('assets/images/user.png') }}" width="300" height="300"
                                    alt="user-avatar">
                            @endif
                            </p>
                            <h5><b>change image: <input type="file" class="form-control"
                                        wire:model.lazy="newImage"></b>
                            </h5>
                            </p>
                        </div>
                        <div class="col-sm-8">
                            <p>
                            <h4><b>name: {{ $user->name }}</b></h4>
                            </p>
                            <p>
                            <h5><b>E-mail: {{ $user->email }}</b></h5>
                            </p>
                            <p>
                            <h5><b>Mobile: <input type="text" class="form-control" wire:model.lazy="mobile"></b></h5>
                            @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </p>
                            <p>
                            <h5><b>Country: <input type="text" class="form-control" wire:model.lazy="country"></b>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </h5>
                            </p>
                            <p>
                            <h5><b>City: <input type="text" class="form-control" wire:model.lazy="city"></b></h5>
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </p>
                            <p>
                            <h5><b>Address: <input type="text" class="form-control" wire:model.lazy="address"></b>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </h5>

                            <p>
                            <h5><b>Joined At: {{ $user->created_at }}</b></h5>
                            </p>

                        </div>
                        <div class="panel-footer text-center">
                            <button class="btn btn-success">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

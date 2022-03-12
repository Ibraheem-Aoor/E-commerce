<div>
    <div class="container">
        <div class="row">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    Profile
                </div>
                <div class="panel-body">
                    <div class="col-sm-4">
                        @if ($user->profile_photo_path)
                            <img class="img-responsive" src="{{ asset('uploads/users/' . Auth::id() . '/' . $user->profile_photo_path) }}"
                                width="250" height="250" alt="user-avatar">
                        @else
                            <img src="{{ asset('assets/images/user.png') }}" width="300" height="300"
                                alt="user-avatar">
                        @endif
                    </div>
                    <div class="col-sm-8">
                        <p>
                        <h4><b>name: {{ $user->name }}</b></h4>
                        </p>
                        <p>
                        <h4><b>E-mail: {{ $user->email }}</b></h4>
                        </p>
                        <p>
                        <h4><b>Mobile: {{ $user->profile->mobile ?? '' }}</b></h4>
                        </p>
                        <p>
                        <h4><b>Country: {{ $user->profile->country ?? '' }}</b></h4>
                        </p>
                        <p>
                        <h4><b>City: {{ $user->profile->city ?? '' }}</b></h4>
                        </p>
                        <p>
                        <h4><b>Address: {{ $user->profile->address ?? '' }}</b></h4>
                        </p>
                        <p>
                        <h4><b>Joined At: {{ $user->created_at }}</b></h4>
                        </p>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="{{ route('user.profile.update') }}" class="btn btn-success">Update Profile</a>
                    <a href="{{ route('user.password.update') }}" class="btn btn-success pull-right">Update Password</a>

                </div>
            </div>
        </div>
    </div>
</div>

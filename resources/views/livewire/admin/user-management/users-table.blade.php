<div>
    @section('page', 'Users')
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
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Regesteration Date</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Actions</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            <a class="btn btn-info" href="{{route('admin.users.add')}}">ADD NEW</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        @php
                                                            if($user->profile_photo_path)
                                                                $path = 'uploads/users/' . $user->id . '/' . $user->profile_photo_path;
<<<<<<< HEAD
                                                            else    
=======
                                                            else
>>>>>>> 95d4ed153837b2dcbc2e06237d40bb304277db34
                                                                $path = 'assets/images/user.png';
                                                        @endphp
                                                        <img src="{{ asset($path) }} "
                                                            class="avatar avatar-sm me-3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $user->created_at }}
                        </div>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm " wire:click="deleteUser({{ $user->id }})">
                                <i class="fa fa-trash fa-sm"></i>
                            </button>
                        </td>
                        </tr>
                    @empty
                        @endforelse
                        </tbody>
                        </table>
                        {{ $users->links('livewire.admin.components.custom-pagination' , ['targetPage' => 'user-managment']) }}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

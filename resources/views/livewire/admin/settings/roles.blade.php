<div>
    @section('page', 'Sales / Categories')
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
                                            Role</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            number of users</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Creation Date</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Actions</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            <a class="btn btn-info" href="{{ route('admin.settings.roles.new') }}">
                                                Add New
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets/images/small-logos/logo-xd.svg') }}"
                                                            class="avatar avatar-sm me-3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $role->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $role->users->count() }}
                                            </td>
                                            <td>{{ $role->created_at }}</td>
                                            <td>
                                                @if ($role->name == 'owner')
                                                    @continue
                                                @endif
                                                <a class="btn btn-info btn-sm" title="details"
                                                    href="{{ route('admin.settings.role.details', $role->id) }}">
                                                    <i class="fa fa-eye "></i>
                                                    Details
                                                </a>
                                                <a class="btn btn-danger btn-sm" title="details"
                                                    wire:click.prevent="deleteRole({{$role->id}})">
                                                    <i class="fa fa-trash "></i>

                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- {{ $roles->links('livewire.admin.components.custom-pagination', ['targetPage' => 'roles']) }} --}}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

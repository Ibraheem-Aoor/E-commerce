<div>
    @section('page', 'User-Management / Contacts')
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
                                            E-mail</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Phone</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Comment</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Sending Date:

                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Details:
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contacts as $contact)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets/images/small-logos/logo-xd.svg') }}"
                                                            class="avatar avatar-sm me-3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $contact->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $contact->email }}
                                            </td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ Str::limit($contact->comment, 20, '...') }}</td>
                                            <td>{{ $contact->created_at }}</td>
                                            <td><a href="{{ route('admin.users.contact.details', $contact->id) }}"
                                                    class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i>&nbsp;
                                                    Details</a></td>
                                        </tr>
                                    @empty
                                        <td colspan="6" class="text-center"><h2 style="color: ">No Records Yet </h2></td>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $contacts->links('livewire.admin.components.custom-pagination', ['targetPage' => 'contacts']) }}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

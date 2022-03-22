<div>
    @section('page', 'Roles / Role-details')
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
                        <h3 class="card-title text-info text-gradient"> <strong>Add </strong> New Role
                        </h3>
                        <blockquote class="blockquote text-white mb-0 ">
                            <form wire:submit.prevent="addRole()">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <p class="text-dark ms-3">
                                                <label for="">Role Name</label>
                                                <input type="text" class="form-control" wire:model.lazy="name">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </p>
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <p class="text-dark ms-3">
                                                <label for="">Permissions</label> <br>
                                                <select class="js-example-basic-multiple" id="select-state"
                                                    multiple="multiple" name="states[]"
                                                    wire:model.lazy="selectedPermissions">
                                                    @forelse($allPermissions as $permission)
                                                            <option value="{{ $permission->id }}">
                                                                {{ $permission->name }}</option>
                                                    @empty
                                                        <option selected>No Permissions exists</option>
                                                    @endforelse
                                                </select>
                                                @error('allPermissions')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </p>
                                        </div>
                                        <div class="col-sm-12 text-center form-group">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <footer class="blockquote-footer text-gradient text-info text-sm ms-3">
                                <cite title="Source Title">All will These Data Shown on The Site Footer</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>



        </div>
    </div>

</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#select-state").selectize({
                maxItems: 3,
            });
        });
    </script>
@endsection

<div>
    @section('page', 'Sales / sale-date')
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
                        <form wire:submit.prevent="setSaleDate()">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <select class="form-control" wire:model="status">
                                            <option value="" selected>Choose one</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                @if ($status == 1)
                                    <div class='col-sm-12'>
                                        <input type='date' class="form-control datetimepicker" id='sale-date'
                                            wire:model="date" />
                                        @error('date')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                                <br>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="form-control" value="ADD">
                                    </div>
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


@push('scripts')
    <script>
        $('document').ready(

            $(function() {
                $('#sale-date').datetimepicker({
                        format: "Y-MP-DD h:m:s",
                    })
                    .on("dp.change", function(ev) {

                    });
            });
        )
    </script>
@endpush

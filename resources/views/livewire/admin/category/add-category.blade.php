<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        input {
            width: 50%;
        }

    </style>
    {{-- Modal area --}}




    <div class="container" style="padding:30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading col-md-12">
                    New Category
                    <div class="col-md pull-right">
                        <a href="{{ route('admin.categories') }}" class="btn-sm btn-success">All Categories</a>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session()->has('success'))
                        <div class="col-md-12 alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @elseif(session()->has('edited'))
                        <div class="col-md-12 alert alert-success">
                            {{ session()->get('edited') }}
                        </div>
                    @endif

                    <form class="form" wire:submit.prevent="addNewCategory">
                        <div class="form-group col-md-8">
                            <label>Category Name:</label>
                            <input type="text" class="form-control" wire:model.lazy="name">
                            @error('name')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label>Category Slug:</label>
                            <input type="text" class="form-control" wire:model.lazy="slug"><br>
                            {{-- ADD Flag --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">ADD</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>





</div>

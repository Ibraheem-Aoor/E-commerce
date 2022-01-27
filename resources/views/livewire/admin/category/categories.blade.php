<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

    </style>
    {{-- Modal area --}}




    <div class="container" style="padding:30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading col-md-12">
                    All Categories
                    <div class="col-md pull-right">
                        <a href="{{ route('admin.categories.add') }}" class="btn-sm btn-success">Add New</a>
                    </div>
                </div>
                @if (Session::has('deleted'))
                    <div class=" col-md-12 alert alert-warning" >
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('deleted') }}
                    </div>
                @endif
                <div class="panel-body table-responsive">
                    <table class="table table-striped  table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <button class="btn-xs btn-danger"
                                            wire:click="deleteCategory({{ $category->id }})"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                    <td>
                                        <button class="btn-xs btn-info" wire:click="edit({{$category->id}})"><i class="fa fa-edit"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No Categories Avilable</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>





</div>

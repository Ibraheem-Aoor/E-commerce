<div>
    @section('pageName', 'Edit Category')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12  mb-4">
                <div class="card">
                    <div class="card-body px-2 pb-2">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text">{{ Session::get('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form wire:submit.prevent="addNewProduct()" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>product Name:</label>
                                        <input type="text" class="form-control" wire:model.lazy="name">
                                        @error('name')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>short description:</label>
                                        <input type="text" class="form-control" wire:model.lazy="shortDescription">
                                        @error('shortDescription')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>regular price:</label>
                                        <input type="text" class="form-control" wire:model.lazy="regularPrice">
                                        @error('regularPrice')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>sale price:</label>
                                        <input type="text" class="form-control" wire:model.lazy="salePrice">
                                        @error('salePrice')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" wire:model.lazy="productCategoryId">
                                            <option value="" selected>choose one</option>
                                            @forelse($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('productCategoryId')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity:</label>
                                        <input type="text" class="form-control" wire:model.lazy="quanitiy">
                                        @error('quanitiy')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>featured? (true/false)</label>
                                        <input type="text" class="form-control" wire:model.lazy="featured">
                                        @error('featured')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>stock status?(instock/outofstock)</label>
                                        <input type="text" class="form-control" wire:model.lazy="stockStatus">
                                        @error('stockStatus')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SKU</label>
                                        <input type="text" class="form-control" wire:model.lazy="sku">
                                        @error('sku')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>primary image:</label>
                                        <input type="file" class="form-control" id="image"
                                            wire:model.lazy="primaryImage">
                                        @error('primaryImage')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="form-control" value="ADD">
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
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker4').datetimepicker();
        });
    </script>
@endpush

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
                                @if ($productCategoryId)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sub Category</label>
                                            <select class="form-control" wire:model="productSubCategoryId">
                                                <option value="" selected>Choose</option>
                                                {{-- <option value="" selected>choose one</option> --}}
                                                @forelse(\App\Models\Category::where('id' , $productCategoryId)->first()->subCategories as $subCategory)
                                                    <option value="{{ $subCategory->id }}">{{ $subCategory->name }}
                                                    </option>
                                                @empty
                                                @endforelse
                                            </select>
                                            @error('productSubCategoryId')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
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
                                        @if ($primaryImage)
                                            <img width="300" src="{{ $primaryImage->temporaryUrl() }}" alt="">
                                        @endif
                                        @error('primaryImage')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Image Gallary:</label>
                                        <input type="file" class="form-control" id="image" multiple
                                            wire:model.lazy="images">
                                        @if ($images)
                                            @foreach ($images as $image)
                                                <img width="300" src="{{ $image->temporaryUrl() }}">
                                            @endforeach
                                        @endif
                                        @error('images')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12" wire:ignore>
                                    <div class="form-group">
                                        <label for="Description">Description:</label> <br>
                                        <textarea class="form-controll" wire:model.lazy="description" cols="50" rows="15" style="resize: none" id="description"></textarea>
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
{{--
@push('scripts')
    <script src="https://cdn.tiny.cloud/1/03zj9so83mh0q16aoxr0z465d1dxzqxic21h544gsh9f2xor/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#description', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
            // setup: function(editor) {
            //     editor.on('change', function(e) {
            //         tinyMCE.triggerSave();
            //         var data = $('#description').val();
            //         @this.set('description', data);
            //     });
            // }
        });
    </script>
@endpush
--}}

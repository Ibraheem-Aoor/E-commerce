<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;
    // Attributes
    public  $name , $shortDescription , $description ,  $productCategoryId,
            $regularPrice , $salePrice , $featured , $quanitiy ,
            $sku , $primaryImage , $stockStatus , $productSubCategoryId,
            $images;

// Add new Product!
    public function addNewProduct()
    {
        $this->validate($this->rules() , $this->messages());
        Product::create([
            'name' => $this->name ,
            'slug' =>  $this->name.'Slug'.Auth::id().random_int(1,200000000),
            'short_description' => $this->shortDescription ,
            'description' => $this->description ,
            'regular_price' => $this->regularPrice ,
            'sale_price' => $this->salePrice ,
            'SKU' => $this->sku ,
            'stock_status' => $this->stockStatus ,
            'featured' => $this->featured ,
            'quantity' => $this->quanitiy ,
            'sub_category_id' => 1,
            'image' => $this->getImageName(),
            'images' => $this->getImages()
        ]);
        session()->flash('success' , 'product added successfully');
        $this->setAttributesEmpty();
    }




// Saving the primary image and return the name of it
    public function getImageName()
    {
        if (!$this->primaryImage)
            return null;
    $imageName = time().'.'.$this->primaryImage->getClientOriginalExtension();
    $categoryName = Category::findOrFail($this->productCategoryId)->name;
    $subCategoryName = SubCategory::findOrFail($this->productSubCategoryId)->name;
    $path = 'products/'.$categoryName.'/'.$subCategoryName.'/primary';
    Storage::disk('uploads')->putFileAs ($path , $this->primaryImage , $imageName);
    return $imageName;
    }

// storing the images (Gallary) and return
    public function getImages()
    {
        $categoryName = Category::findOrFail($this->productCategoryId)->name;
        $subCategoryName = SubCategory::findOrFail($this->productSubCategoryId)->name;
        $path = 'products/'.$categoryName.'/'.$subCategoryName.'/gallary';
        $images = '';
        foreach($this->images as $image)
        {
            $imgName = time().'.'.$image->getClientOriginalExtension();
            Storage::disk('uploads')->putFileAs($path , $image , $imgName);
            $images .= $imgName.',';
        }
        return $images;
    }


// Make the Attributes empty after adding the product
    public function setAttributesEmpty()
    {
        $this->name = '';
        $this->shortDescription = '';
        $this->salePrice = '';
        $this->regularPrice = '';
        $this->featured = '';
        $this->primaryImage = '';
        $this->productCategoryId = '';
        $this->quanitiy = '';
        $this->stockStatus = '';
        $this->sku = '';
    }



// Attributes validation rules
    public function rules()
    {
        return   [
            'name' => 'required|max:255',
            'shortDescription' => 'required|max:255',
            'productCategoryId' => 'required|numeric',
            'regularPrice' => 'required|numeric',
            'salePrice' => 'numeric|nullable',
            // 'featured' => 'in_array:["true" , "false" , 0 , 1]',
            'quanitiy' => 'required|numeric',
            'sku' => 'required|max:255',
            'productSubCategoryId' => 'required',
            'primaryImage' => 'nullable|image|mimes:jpg,png,*',
            'description' => 'nullable|string',
            // 'stockStatus' => 'required|in_array:["instock" , "outofstock"]',
            // 'images' => 'nullable|image|mimes:jpg,png,*',
        ];
    }

// Attributes failed vaildation custom messages
    public function messages()
    {
        return [
            'shortDescription.required' => 'short description is required',
            'shortDescription.max' => 'short description is too long',
            'productCategoryId.required' => 'choose a product related category',
            'productCategoryId.numeric' => 'choose a valid related category',
            'salePrice.required' => 'Enter the sale price',
            'salePrice.numeric' => 'Enter a valid sale price',
            'quanitiy.required' => 'Enter the quanitiy',
            'quanitiy.numeric' => 'Enter a valid quanitiy',
            'sku.required' => 'product SKU is required',
            'sku.max' => 'product SKU is too long',
            'primaryImage.image' => 'image is not valid',
            'productSubCategoryId.required' => 'Sub Category Is Required !',
        ];
    }


    public function render()
    {
        return view('livewire.admin.product.add-product' , ['categories' => Category::with('subCategories')->get()])->layout('layouts.Admin.base');
    }
}

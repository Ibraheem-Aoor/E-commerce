<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
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
    public  $name , $shortDescription ,  $productCategoryId,
            $regularPrice , $salePrice , $featured , $quanitiy ,
            $sku , $primaryImage , $stockStatus;


    public function render()
    {
        return view('livewire.admin.product.add-product' , ['categories' => Category::all()])->layout('layouts.Admin.base');
    }


// Add new Product
    public function addNewProduct()
    {
        $this->validate($this->rules() , $this->messages());
        $imageName = $this->getImageName();
        Product::create([
            'name' => $this->name ,
            'slug' =>  $this->name.'Slug'.Auth::id().random_int(1,200000000),
            'short_description' => $this->shortDescription ,
            'description' => $this->shortDescription ,
            'regular_price' => $this->regularPrice ,
            'sale_price' => $this->salePrice ,
            'SKU' => $this->sku ,
            'stock_status' => $this->stockStatus ,
            'featured' => $this->featured ,
            'quantity' => $this->quanitiy ,
            'image' => $imageName,
        ]);
        session()->flash('success' , 'product added successfully');
        $this->setAttributesEmpty();
    }


// Make the Attributes empty after adding the product
    public function setAttributesEmpty()
    {
        $this->name = '';
        $this->shortDescription = '';
        $this->salePrice = '';
        $this->regularPrice = '';
        $this->featured = '';
        $this->primaryImage = null;
        $this->productCategoryId = '';
        $this->quanitiy = '';
        $this->stockStatus = '';
        $this->sku = '';
    }

// Saving the primary image and return the name of it
    public function getImageName()
    {
        $imageName = time().'.jpg';
        $newIamge = Image::make($this->primaryImage)->encode('jpg' , 80)->resize(300,300);
        $path = public_path($imageName);
        $newIamge->save($path ,80);
        return $imageName;
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
            'primaryImage' => 'image|max:10000000',
            // 'stockStatus' => 'required|in_array:["instock" , "outofstock"]',
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
        ];
    }
}

<?php

namespace App\Http\Livewire\Admin\Product;

use App\Http\Livewire\Category;
use App\Models\Category as ModelsCategory;
use App\Models\Product;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;
// Attributes
    public $product , $name , $shortDescription ,  $productCategoryId,
    $regularPrice , $salePrice , $featured , $quanitiy ,
    $sku , $primaryImage  , $imageName, $stockStatus;

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
        $this->name = $this->product->name;
        $this->shortDescription = $this->product->short_description;
        $this->productCategoryId = $this->product->category_id;
        $this->regularPrice = $this->product->regular_price;
        $this->salePrice = $this->product->sale_price;
        $this->featured = $this->product->featured;
        $this->quanitiy = $this->product->quantity;
        $this->sku = $this->product->SKU;
        $this->imageName = $this->product->image;
        $this->stockStatus = $this->product->stock_status;
    }

    public function render()
    {
        return view('livewire.admin.product.edit-product' , ['categories' => ModelsCategory::all()])->layout('layouts.Admin.base');
    }


// Edit the current Product
    public function editProduct()
    {
        $this->validate($this->rules() , $this->messages());
        if($this->primaryImage != null)
        {
            $imageName = time().'.jpg';
            $newIamge = Image::make($this->primaryImage)->encode('jpg' , 80)->resize(300,300);
            $path = public_path($imageName);
            $newIamge->save($path ,80);
            $this->imageName = $imageName;
        }
        $this->updateCurrentProductData();
        session()->flash('success' , 'Product Updated Successfully');
    }

// Updating the current product data and saving to db
    public function updateCurrentProductData()
    {
        $this->product->name = $this->name;
        $this->product->short_description = $this->shortDescription;
        $this->product->category_id = $this->productCategoryId;
        $this->product->regular_price = $this->regularPrice;
        $this->product->sale_price = $this->salePrice;
        $this->product->quantity = $this->quanitiy;
        $this->product->SKU = $this->sku;
        $this->product->image = $this->imageName;
        $this->product->stock_status = $this->stockStatus;
        $this->product->featured = $this->featured;
    }

// Attributes validation rules
    public function rules()
    {
        return   [
            'name' => 'required|max:255',
            'shortDescription' => 'required|max:255',
            'productCategoryId' => 'required|numeric',
            'regularPrice' => 'required|numeric',
            'salePrice' => 'required|numeric',
            // 'featured' => 'in_array:["true" , "false" , 0 , 1]',
            'quanitiy' => 'required|numeric',
            'sku' => 'required|max:255',
            'primaryImage' => 'image|max:10000000|nullable',
            // 'stockStatus' => 'required|in_array:["instock" , "outofstock"]',
        ];
    }

// Attributes custom messages
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

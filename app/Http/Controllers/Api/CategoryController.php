<?php

namespace App\Http\Controllers\Api;

use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Traits\GeneralApiTrait;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
    use GeneralApiTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ModelsCategory::all();
        return $this->returnData("All_Categories" , $categories , "Success");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = ModelsCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return $this->returnSuccessMessage('Category created Successfully' , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ModelsCategory $category)
    {
        $categoryResource = new CategoryResource($category);
        return $categoryResource->toArray($category);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = ModelsCategory::findOrFail($id);
        $category->update([
            'name' => $request->has('name') ? $request->name : $category->name,
            'slug' => $request->has('slug') ? $request->slug : $category->slug,
        ]);
        return $this->returnSuccessMessage("Category Updated Successfully" , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsCategory $category)
    {
            $category = ModelsCategory::findOrFail($category->id);
            $category->delete();
            return $this->returnSuccessMessage('Category Deleted Successfully' , 200);
    }
}

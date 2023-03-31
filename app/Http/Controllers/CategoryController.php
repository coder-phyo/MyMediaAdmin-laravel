<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // direct category page
    public function index()
    {
        $category = Category::get();
        return view('admin.category.index', compact('category'));
    }

    // create category
    public function createCategory(Request $request)
    {
        $this->categoryValidationCheck($request);
        $data = $this->getCategoryData($request);

        Category::create($data);
        return back();
    }

    // delete category
    public function deleteCategory($id)
    {
        Category::where('category_id', $id)->delete();
        return redirect()->route('admin#category')->with(['deleteSuccess' => 'Category Delected!']);
    }

    // search category
    public function categorySearch(Request $request)
    {
        $category = Category::where('title', 'like', '%' . $request->categorySearch . '%')->get();
        return view('admin.category.index', compact('category'));

    }

    // category edit page
    public function categoryEditPage($id)
    {
        $category = Category::get();
        $updateData = Category::where('category_id', $id)->first();
        return view('admin.category.edit', compact('category', 'updateData'));
    }

    // update category
    public function categoryUpdate($id, Request $request)
    {
        $this->categoryValidationCheck($request);
        $updateData = $this->getUpdateData($request);
        Category::where('category_id', $id)->update($updateData);
        return redirect()->route('admin#category');
    }

    // get category data
    private function getCategoryData($request)
    {
        return [
            'title' => $request->categoryName,
            'description' => $request->categoryDescription,
        ];
    }

    // get category update data
    private function getUpdateData($request)
    {

        return [
            'title' => $request->categoryName,
            'description' => $request->categoryDescription,
            'updated_at' => Carbon::now(),
        ];

    }

    // category validation check
    private function categoryValidationCheck($request)
    {
        return Validator::make($request->all(), [
            'categoryName' => 'required',
            'categoryDescription' => 'required',
        ])->validate();
    }
}

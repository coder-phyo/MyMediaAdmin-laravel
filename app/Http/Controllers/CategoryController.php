<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return back()->with(['deleteSuccess' => 'Category Delected!']);
    }

    // search category
    public function categorySearch(Request $request)
    {
        $category = Category::where('title', 'like', '%' . $request->categorySearch . '%')->get();
        return view('admin.category.index', compact('category'));

    }

    // get category data
    private function getCategoryData($request)
    {
        return [
            'title' => $request->categoryName,
            'description' => $request->categoryDescription,
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

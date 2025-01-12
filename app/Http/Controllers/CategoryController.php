<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = Category::all();
        return view("CategoryFiles.allCategories", [
            "data" => $date
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("CategoryFiles.addCategory");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "categoryName" => "required|min:5"
            ],
            [
                "categoryName.required" => "هذه القيمة اجبارية",
                "categoryName.min" => "عدد الحروف يجب أن يكون أكبر من 5"
            ]
        );
        $categoryName = $request->post("categoryName");
        $category = new Category();
        $category->name = $categoryName;
        $category->user_id = Auth::id();
        $status = $category->save();
        if ($status) {
            Session::flash("insertion_true", "insertion done");
            return redirect()->route("viewCategories");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return view("CategoryFiles.updateCategory", [
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->name = $request->input("categoryName");
        $result = $category->update();
        if ($result) {
            return redirect()->route("viewCategories");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $numOfRows = $category->delete();
        if ($numOfRows == 1) {
            return redirect()->route("viewCategories");
        }
    }
}

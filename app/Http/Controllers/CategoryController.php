<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = Category::all()->toArray();

        return view('category', compact('categories'));
    }

    public function add(Request $request)
    {
        $this->categoryService->store($request);

        return redirect('/category');
    }

}

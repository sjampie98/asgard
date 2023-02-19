<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class PreviewController extends Controller
{

    public function preview()
    {
        $images = DB::table('images')
            ->where('sort', '!=', 0)
            ->join('category', 'images.categoryId', '=', 'category.id')

            ->select('images.*', 'category.id')
            ->orderBy('sort')
            ->get()
            ->toArray();

        return view('preview', compact('images'));
    }

    public function previewCategory($id)
    {

        $images = DB::table('images')
            ->where('sort', '!=', 0)
            ->where('categoryId', '=', $id)
            ->orderBy('sort')
            ->get();

        return view('viewcategory', compact('images'));
    }

    public function contact()
    {
        return view('contacts');
    }
}

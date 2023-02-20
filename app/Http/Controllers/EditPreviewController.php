<?php

namespace App\Http\Controllers;

use App\Http\Services\ImageUploadService;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditPreviewController extends Controller
{
    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->middleware('auth');
        $this->imageUploadService = $imageUploadService;
    }

    public function index()
    {
        $images = DB::table('images')
            ->where('sort', '!=', 0)
            ->join('category', 'images.categoryId', '=', 'category.id')

            ->select('images.*', 'categoryId')
            ->orderBy('sort')
            ->get()
            ->toArray();

        return view('admin.editpreview', compact('images'));
    }

    public function editSort(Request $request)
    {
        $this->imageUploadService->editPreview($request->input('targetId'), $request->input('endTarget'));

        return redirect('edit-preview')->with('status', 'done');
    }

}

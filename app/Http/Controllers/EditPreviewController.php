<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditPreviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $target = DB::table('images')
            ->where('id', '=', $request->input('targetId'))
            ->get();
        $endtarget = DB::table('images')
            ->where('id', '=', $request->input('endTarget'))
            ->get();

        Images::updateOrCreate([
            'id' => $target[0]->id
        ],[
            'sort' => $endtarget[0]->sort
        ]);
        Images::updateOrCreate([
            'id' => $endtarget[0]->id
        ],[
            'sort' => $target[0]->sort
        ]);

        return redirect('edit-preview')->with('status', 'done');
    }

}

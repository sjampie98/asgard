<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class PreviewService
{

    /**
     * @param $data
     * @return mixed
     */
    public function preview()
    {
        return DB::table('images')
            ->where('sort', '!=', 0)
            ->join('category', 'images.categoryId', '=', 'category.id')
            ->select('images.*', 'category.id')
            ->orderBy('sort')
            ->get()
            ->toArray();
    }

    /**
     * @param $id
     * @return \Illuminate\Support\Collection
     */
    public function previewCategory($id)
    {
        return DB::table('images')
            ->where('sort', '!=', 0)
            ->where('categoryId', '=', $id)
            ->orderBy('sort')
            ->get();
    }

    /**
     * @return mixed
     */
    public function editPreview()
    {
        return DB::table('images')
            ->where('sort', '!=', 0)
            ->join('category', 'images.categoryId', '=', 'category.id')

            ->select('images.*', 'categoryId')
            ->orderBy('sort')
            ->get()
            ->toArray();
    }
}

<?php

namespace App\Http\Services;

use App\Models\Category;

class CategoryService
{

    /**
     * @param $data
     * @return true
     */
    public function store($data)
    {
        $category = new Category();
        $category->name = $data->input('category');
        $category->description = $data->input('description');

        $category->save();

        return true;
    }
}

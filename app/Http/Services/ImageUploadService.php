<?php

namespace App\Http\Services;

use App\Http\Requests\ImageUploadRequest;
use App\Models\Images;
use Illuminate\Http\Request;

class ImageUploadService
{

    /**
     * @param ImageUploadRequest $request
     * @return true
     */
    public function store(ImageUploadRequest $request)
    {
        $category = $request->input('category');
        $data = $this->saveStorage($request);
        $sort = $this->getMaxSort() + 1;

        try {
            Images::create([
                'name' => $data['name'],
                'path' => $data['path'],
                'sort' => $sort,
                'categoryId' => $category,
            ]);
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

        return true;
    }

    /**
     * @return mixed
     */
    private function getMaxSort()
    {
        return (Images::where('sort', '!=', null)->max('sort'));
    }

    /**
     * @param $data
     * @return array
     */
    private function saveStorage($data)
    {
        $name = $data->file('image')->getClientOriginalName();
        $path = $data->file('image')->store('public/images');

        return [
            'name' => $name,
            'path' => $path
        ];
    }
}

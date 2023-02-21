<?php

namespace App\Http\Services;

use App\Http\Requests\ImageUploadRequest;
use App\Models\Images;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $filenamewithextension = $data->file('image')->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $info = Storage::disk('s3')->put('images', $data->file('image'));

        return [
            'name' => $filename,
            'path' => $info
        ];
    }

    /**
     * @param $targetId
     * @param $endTarget
     * @return true
     */
    public function editPreview($targetId, $endTarget)
    {
        $target = DB::table('images')
            ->where('id', '=', $targetId)
            ->get();
        $endtarget = DB::table('images')
            ->where('id', '=', $endTarget)
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

        return true;
    }
}

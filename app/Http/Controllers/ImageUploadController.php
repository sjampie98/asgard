<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use App\Http\Services\ImageUploadService;

class ImageUploadController extends Controller
{
    /**
     * @var ImageUploadService
     */
    private ImageUploadService $imageUploadService;

    /**
     * @param ImageUploadService $imageUploadService
     */
    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->middleware('auth');
        $this->imageUploadService = $imageUploadService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('image-upload');
    }

    /**
     * @param ImageUploadRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ImageUploadRequest $request)
    {
        $this->imageUploadService->store($request);

        return redirect('home')->with('status', 'Изображение было успешно загружено');
    }
}

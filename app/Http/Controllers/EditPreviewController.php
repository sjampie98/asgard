<?php

namespace App\Http\Controllers;

use App\Http\Services\ImageUploadService;
use App\Http\Services\PreviewService;
use Illuminate\Http\Request;

class EditPreviewController extends Controller
{
    /**
     * @param ImageUploadService $imageUploadService
     */
    public function __construct(
        ImageUploadService $imageUploadService,
        PreviewService $previewService
    ) {
        $this->middleware('auth');
        $this->imageUploadService = $imageUploadService;
        $this->previewService = $previewService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $images = $this->previewService->editPreview();

        return view('admin.editpreview', compact('images'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function editSort(Request $request)
    {
        $this->imageUploadService->editPreview($request->input('targetId'), $request->input('endTarget'));

        return redirect('edit-preview')->with('status', 'done');
    }
}

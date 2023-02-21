<?php

namespace App\Http\Controllers;

use App\Http\Services\ContactService;
use App\Http\Services\PreviewService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PreviewController extends Controller
{
    /**
     * @param ContactService $contactService
     * @param PreviewService $previewService
     */
    public function __construct(
        ContactService $contactService,
        PreviewService $previewService
    ) {
        $this->contactService = $contactService;
        $this->previewService = $previewService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function preview()
    {
        $images = $this->previewService->preview();

        return view('preview', compact('images'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function previewCategory($id)
    {
        $images = $this->previewService->previewCategory($id);

        return view('viewcategory', compact('images'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function contact()
    {
        $contact = $this->contactService->index();

        return view('contact', compact('contact'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function sendContact(Request $request): View
    {
         $this->contactService->send($request->all());

        return view('contact');
    }
}

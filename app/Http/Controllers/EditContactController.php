<?php

namespace App\Http\Controllers;

use App\Http\Services\ContactService;
use App\Http\Services\ImageUploadService;
use Illuminate\Http\Request;

class EditContactController extends Controller
{
    /**
     * @param ImageUploadService $imageUploadService
     * @param ContactService $contactService
     */
    public function __construct(
        ImageUploadService $imageUploadService,
        ContactService $contactService,
    ) {
        $this->middleware('auth');
        $this->imageUploadService = $imageUploadService;
        $this->contactService = $contactService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $contact = $this->contactService->index();

        return view('admin.contact', compact('contact'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function editContact(Request $request)
    {
        $this->contactService->editContact($request->all());

        return redirect('/edit-contact');
    }


}

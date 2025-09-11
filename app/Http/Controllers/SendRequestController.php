<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendRequestRequest;
use App\Services\SendRequestService;
use Illuminate\Support\Facades\Redirect;
use Nnjeim\World\World;

class SendRequestController extends Controller
{
    protected $sendRequestService;
    public function __construct(SendRequestService $sendRequestService)
    {
        $this->sendRequestService = $sendRequestService;
    }
    public function create()
    {
        $countries = World::countries(['fields' => 'name, id'])->data;
        return view('send-request', compact('countries'));
    }

    public function store(SendRequestRequest $request)
    {
        $this->sendRequestService->storeSentRequest($request->validated());
        return Redirect::route('');
    }
}

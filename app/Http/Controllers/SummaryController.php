<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\GroqService;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    protected GroqService $groqService;

    public function __construct(GroqService $groqService)
    {
        $this->groqService = $groqService;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $response = $this->groqService->summary($request);

        return $response;
    }
}

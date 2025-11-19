<?php

namespace App\HelpBoard\Http\Controllers;

use App\HelpBoard\Requests\HelpPostRequest;
use App\HelpBoard\Services\HelpPostService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class HelpPostController extends Controller
{
    protected $helpPostService;

    public function __construct(HelpPostService $post)
    {
        $this->helpPostService = $post;
    }

    public function create(HelpPostRequest $request): JsonResponse
    {
        $data = $request->validated();
        $uid = Auth::id();

        try{
            $res = $this->helpPostService->createHelpPost($data, $uid);
            return response()->json([
                'message' => 'Help post created',
                'data' => $res
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => $e->errors()['limit'][0] ?? 'Validation error',
            ], 422);
        }
    }
}

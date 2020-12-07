<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\ClientsRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ClientsRequest $request)
    {
        Client::create($request->only(['name', 'address']));
        return response()->json(['data' => ['success' => 'Client created successfully']], 201);
    }
}

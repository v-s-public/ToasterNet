<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\ComplaintsRequest;
use App\Models\Client;
use App\Models\Complaint;
use Illuminate\Http\JsonResponse;

class ComplaintsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  ComplaintsRequest  $request
     * @return JsonResponse
     */
    public function store(ComplaintsRequest $request) : JsonResponse
    {
        Complaint::create($request->only(['title', 'text', 'client_id']));
        return response()->json(['data' => ['success' => 'Complaint created successfully']], 201);
    }

    /**
     * Get all complaints of specified client.
     *
     * @param  int  $clientId
     * @return JsonResponse
     */
    public function showComplaintsByClientId(int $clientId) : JsonResponse
    {
        try {
            $model = Client::findOrFail($clientId);
            return response()->json(['data' => $model->complaints], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => ['client' => 'Client not found']], 422);
        }
    }

    /**
     * Take complaint to work.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function takeToWork(int $id) : JsonResponse
    {
        try {
            $model = Complaint::findOrFail($id);
            $model->takeToWork();
            return response()->json(['data' => $model->toArray()], 204);
        } catch (\Exception $e) {
            return response()->json(['errors' => ['complaint' => 'Complaint not found']], 422);
        }
    }
}

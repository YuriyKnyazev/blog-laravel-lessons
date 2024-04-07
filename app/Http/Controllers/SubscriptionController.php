<?php

namespace App\Http\Controllers;


use App\Http\Requests\Subscription\IdRequest;
use App\Http\Requests\Subscription\StoreRequest;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SubscriptionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): JsonResponse
    {
        try {
        Subscription::query()->create($request->validated());
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ] , $e->getCode());
        }
        return response()->json(['status' => 'success'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IdRequest $request): JsonResponse
    {
        try {
        Subscription::query()
            ->where('author_id', $request->author_id)
            ->where('reader_id', auth()->id())
            ->delete();
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ] , $e->getCode());
        }
        return response()->json(['status' => 'success']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Actions\StoreRequestAction;
use App\Actions\UpdateRequestAction;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Resources\RequestResource;
use App\Models\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RequestController extends Controller
{
    public function __construct(
        private readonly StoreRequestAction $storeRequestAction,
        private readonly UpdateRequestAction $updateRequestAction
    )
    {
    }

    public function index(): AnonymousResourceCollection
    {
        $requests = Request::query()->paginate(10);

        return RequestResource::collection($requests);
    }

    public function store(StoreRequest $request): RequestResource
    {
        $data = $this->storeRequestAction->handle($request->validated());

        return new RequestResource($data);
    }

    public function update(UpdateRequest $updateRequest, Request $request): Request
    {
        $this->updateRequestAction->handle($updateRequest->validated(), $request);

        return $request;
    }
}

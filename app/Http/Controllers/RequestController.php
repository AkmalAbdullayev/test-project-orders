<?php

namespace App\Http\Controllers;

use App\Actions\StoreRequestAction;
use App\Http\Requests\StoreRequest;
use App\Http\Resources\RequestResource;
use App\Models\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RequestController extends Controller
{
    public function __construct(private readonly StoreRequestAction $storeRequestAction)
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
}

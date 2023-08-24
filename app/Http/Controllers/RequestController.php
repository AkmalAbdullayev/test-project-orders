<?php

namespace App\Http\Controllers;

use App\Http\Resources\RequestResource;
use App\Models\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RequestController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $requests = Request::query()->paginate(10);

        return RequestResource::collection($requests);
    }
}

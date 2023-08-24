<?php

namespace App\Actions;

use App\Mail\RequestCreated;
use App\Models\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class StoreRequestAction
{
    public function handle(array $data): Model|Builder
    {
        $model = Request::query()->create($data);

        Mail::to($model->email)->send(new RequestCreated());

        return $model;
    }
}

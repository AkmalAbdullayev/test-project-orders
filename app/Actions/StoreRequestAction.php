<?php

namespace App\Actions;

use App\Models\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class StoreRequestAction
{
    public function handle(array $data): Model|Builder
    {
        return Request::query()->create($data);
    }
}

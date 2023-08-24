<?php

namespace App\Actions;

use App\Models\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UpdateRequestAction
{
    public function handle(array $data, Request $request): int
    {
        return $request->update($data);
    }
}

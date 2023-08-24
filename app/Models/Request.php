<?php

namespace App\Models;

use App\Enums\RequestEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $casts = [
        'status' => RequestEnum::class
    ];
}

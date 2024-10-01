<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait MultitenantableUserTrait
{
    public static function bootMultitenantableUserTrait()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::user()->id;
        });
    }
}

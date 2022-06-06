<?php

namespace App\Scope;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ExpireScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $builder->whereDate('expire_at', '>', Carbon::today());
    }

}

<?php

namespace App\Http\Services\Facade;

use Illuminate\Support\Facades\Facade;

class Sms extends Facade
{
    protected static function getFacadeAccessor() { return 'sms'; }
}
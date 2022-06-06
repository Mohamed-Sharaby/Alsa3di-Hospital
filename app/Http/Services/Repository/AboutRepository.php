<?php

namespace App\Http\Services\Repository;

use App\Models\About;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

class AboutRepository extends Repository
{

    public function __construct(About $about)
    {
        parent::__construct($about);
    }
}
<?php

namespace App\Http\Services\Repository;

use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends Repository
{

    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function register($data)
    {

    }

    public function login($data)
    {

    }

    public function find($userId)
    {

    }

    public function user()
    {

    }

    public function updateUserImage($userId,$image)
    {

    }
}

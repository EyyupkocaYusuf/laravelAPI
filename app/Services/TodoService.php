<?php

namespace App\Services;

use App\Repositories\TodoRepository;
use Illuminate\Support\Facades\Request;

class TodoService
{
    protected $todoRepository;
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }
    public function getAll()
    {
        return $this->todoRepository->getAll();
    }

    public function find($id)
    {
        return $this->todoRepository->find($id);
    }

    public function store($data)
    {
        return $this->todoRepository->store($data);
    }

    public function update($id,$data)
    {
        return $this->todoRepository->update($id,$data);
    }

    public function destroy($id)
    {
        return $this->todoRepository->destroy($id);
    }
}

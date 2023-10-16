<?php

namespace App\Services;

use App\Http\Resources\TodoResource;
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
        $todos = TodoResource::collection($this->todoRepository->getAll());
        if($todos->count() > 0)
        {
            return apiResponse(__('Listeleme Yapıldı'),200,$todos);
        }
        return apiResponse(__('Hic todo yok'),200,$todos);

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
        $todo = $this->todoRepository->find($id);
        if(!isset($todo))
        {
            return apiResponse(__('Bu degerlere sahip bir todo bulunamadı'),404,$todo);
        }
        $this->todoRepository->destroy($id);
        return apiResponse(__('Todo Silindi'),200);
    }
}

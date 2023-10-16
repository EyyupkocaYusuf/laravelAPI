<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Services\TodoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    protected $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }
    public function index()
    {
        $todos = TodoResource::collection($this->todoService->getAll());
        return apiResponse(__('Listeleme Yapıldı'),200,$todos);
    }

    public function edit($id,Request $request)
    {
        $todo = $this->todoService->find($id);
        return apiResponse(__('todo bulundu'),200,$todo);
    }

    public function store(TodoRequest $request)
    {
        $data = $request->all();

        $todo = $this->todoService->store($data);
        return apiResponse(__('Todo Eklendi'),200,$todo);
    }

    public function update($id,TodoRequest $request)
    {
        $data = $request->all();

        $this->todoService->update($id,$data);
        $todo = $this->todoService->find($id);
        return apiResponse(__('Todo Güncellendi'),200,$todo);
    }

    public function destroy($id)
    {
        $this->todoService->destroy($id);
        return apiResponse(__('Todo Silindi'),200);
    }
}

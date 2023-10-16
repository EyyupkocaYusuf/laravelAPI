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
        return $this->todoService->getAll();
    }

    public function edit($id)
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
        $todo = $this->todoService->find($id);
        if(!isset($todo))
        {
            return apiResponse(__('Bu degerlere sahip bir todo bulunamadı'),404,$todo);
        }
        $this->todoService->update($id,$data);

        return apiResponse(__('Todo Güncellendi'),200,$todo);
    }

    public function destroy($id)
    {
        return $this->todoService->destroy($id);

    }
}

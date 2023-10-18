<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Support\Facades\Request;

class TodoRepository
{
    protected $model;

    public function __construct(Todo $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        return $this->model->create([
            'name' => $data['name'],
            'completed' => $data['completed']
        ]);
    }

    public function update($id,$data)
    {

        return $this->model->where('id',$id)->update([
            'name' => $data['name'],
            'completed' => $data['completed']
        ]);
    }

    public function destroy($id)
    {
        return $this->model->where('id',$id)->delete();
    }
}

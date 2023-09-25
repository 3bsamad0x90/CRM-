<?php

namespace Crm\Base\Repositories;

use Crm\Base\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    protected Model $model;

    public function index()
    {
        return $this->model->get();
    }

    public function show($id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function store(array $data):?Model
    {
        return $this->model->create($data);
    }

    public function update($data, $id) : ?Model
    {
        $model = $this->model->findOrFail($id);
        $model->update($data);
        return $model;
    }

    public function destroy($id): bool
    {
        $model = $this->model->findOrFail($id);
        return $model->delete();
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setModel(Model $model): Model
    {
        return $this->model = $model;
    }

}

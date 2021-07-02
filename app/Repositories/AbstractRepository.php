<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class AbstractRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    protected function create(array $parameters)
    {
        return $this->model::create($parameters);
    }

    protected function where(string $key, $value)
    {
        return $this->model::where($key, $value)->first();
    }

    protected function update(int $id, array $parameters)
    {
        return $this->model::where('id', $id)->update($parameters);
    }
}

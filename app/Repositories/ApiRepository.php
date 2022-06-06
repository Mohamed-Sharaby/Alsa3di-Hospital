<?php

namespace App\Repositories;

use App\Models\Area;
use App\Models\City;
use App\Repositories\Src\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ApiRepository implements RepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function all()
    {
        return $this->model->latest()->get();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->show($id);

        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        $record = $this->show($id);
        return $record->delete();
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function paginate($number = 10)
    {
        return $this->model->paginate($number);
    }

}

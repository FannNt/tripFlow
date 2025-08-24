<?php

namespace App\Repositories\City;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\City;

class CityRepositoryImplement extends Eloquent implements CityRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property City|mixed $model;
    */
    protected City $model;

    public function __construct(City $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    public function update($id, array $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function all()
    {
        return $this->model->all();

    }

    public function destroy(array $id)
    {
        return $this->model->destroy($id);
    }
}

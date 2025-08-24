<?php

namespace App\Services\City;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\UniqueConstraintViolationException;
use LaravelEasyRepository\Service;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\City\CityRepository;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CityServiceImplement extends Service implements CityService{
     protected CityRepository $mainRepository;

    public function __construct(CityRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }
    public function create($data)
    {
        try {
            return $this->mainRepository->create($data);
        }catch (UniqueConstraintViolationException $e){
            throw new BadRequestException($e->getMessage());
        }
    }
    public function update($id, $data) {
        try {
        return $this->mainRepository->update($id, $data);
        } catch (UniqueConstraintViolationException $e){
            throw new BadRequestException($e->getMessage());
        }
    }
    public function delete($id) {
        $this->mainRepository->delete($id);
    }
    public function all()
    {
        return $this->mainRepository->all();
    }

    public function find($id)
    {
        $result = $this->mainRepository->find($id);
        if ($result){
            return $result;
        } else {
            throw new ModelNotFoundException("City with id: $id found");
        }
    }
}

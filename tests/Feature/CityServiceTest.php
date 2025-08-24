<?php

use App\Models\City;
use App\Services\City\CityService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\UniqueConstraintViolationException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

beforeEach(function () {
    $this->service = app(CityService::class);
});
//test('city page', function () {
//    $response = $this->get('/city');
//
//    $response->assertStatus(200);
//});

test('create city', function () {
    $city = $this->service->create([
        'name' => 'test'
    ]);
   $this->assertDatabaseHas('cities', ['name' => 'test']);
});

test('get city by id', function () {
    $city = City::factory()->create();
    $result = $this->service->find($city->id);
    $this->assertEquals($result->name, $city->name);
});
test('failed get city by id', function () {
    expect(fn() => $this->service->find(1))->toThrow(ModelNotFoundException::class);

});

test('update city', function () {
    $city = City::factory()->create();
    $this->service->update($city->id, ['name' => 'edit']);
    $this->assertDatabaseHas('cities', ['name' => 'edit']);
});

test('delete city', function () {
    $city = City::factory()->create();
    $this->service->delete($city->id);
    $this->assertDatabaseMissing('cities', ['id' => $city->id]);
});

test('get cities', function () {
    City::factory(6)->create();
   $result = $this->service->all();
   $this->assertCount(6, $result);
});

test('test unique', function () {
    City::factory()->create(['name' => 'test']);
    expect(fn() => $this->service->create(['name' => 'test']))->toThrow(BadRequestException::class);
});


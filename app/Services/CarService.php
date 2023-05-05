<?php

namespace App\Services;

use App\Contracts\CarContract;
use App\Services\BaseService\BaseService;
final class CarService extends BaseService implements CarContract
{
    /**
     * @param $carDto
     * @param $car
     * @return mixed
     */
    public function storeCarsData($carDto, $car) {
        $car->make = $carDto->make ?? '';
        $car->model = $carDto->model ?? '';
        $car->year = $carDto->year ?? '';
        $car->seats = $carDto->seats ?? 0;
        $car->color = $carDto->color ?? '';
        $car->vin = $carDto->vin ?? '';
        $car->current_mileage = $carDto->current_mileage ?? '';
        $car->service_interval = $carDto->service_interval ?? '';
        $car->next_service = $carDto->next_service ?? '';
        $car->save();

        return $car;
    }

}

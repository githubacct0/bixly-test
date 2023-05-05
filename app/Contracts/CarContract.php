<?php

namespace App\Contracts;
use App\DTOs\CarDto;

interface CarContract
{
    /**
     * @param CarDto $carDto
     * @param $car
     * @return mixed
     */
    public function storeCarsData(CarDto $carDto, $car);
}

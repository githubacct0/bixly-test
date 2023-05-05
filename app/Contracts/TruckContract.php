<?php

namespace App\Contracts;
use App\DTOs\TruckDto;

interface TruckContract
{
    /**
     * @param TruckDto $truckDto
     * @param $truck
     * @return mixed
     */
    public function storeTrucksData(TruckDto $truckDto, $truck);
}

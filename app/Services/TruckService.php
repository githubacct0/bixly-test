<?php

namespace App\Services;

use App\Contracts\TruckContract;
use App\Services\BaseService\BaseService;
final class TruckService extends BaseService implements TruckContract
{
    /**
     * @param $truckDto
     * @param $truck
     * @return mixed
     */
    public function storeTrucksData($truckDto, $truck) {
        $truck->make = $truckDto->make ?? '';
        $truck->model = $truckDto->model ?? '';
        $truck->year = $truckDto->year ?? '';
        $truck->seats = $truckDto->seats ?? 0;
        $truck->bed_length = $truckDto->bed_length ?? 0;
        $truck->color = $truckDto->color ?? '';
        $truck->vin = $truckDto->vin ?? '';
        $truck->current_mileage = $truckDto->current_mileage ?? '';
        $truck->service_interval = $truckDto->service_interval ?? '';
        $truck->next_service = $truckDto->next_service ?? '';
        $truck->save();

        return $truck;
    }
}

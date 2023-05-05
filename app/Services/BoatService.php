<?php

namespace App\Services;

use App\Contracts\BoatContract;
use App\Services\BaseService\BaseService;
final class BoatService extends BaseService implements BoatContract
{
    /**
     * @param $boatDto
     * @param $boat
     * @return mixed
     */
    public function storeBoatsData($boatDto, $boat) {
        $boat->make = $boatDto->make ?? '';
        $boat->model = $boatDto->model ?? '';
        $boat->year = $boatDto->year ?? '';
        $boat->length = $boatDto->length ?? 0;
        $boat->width = $boatDto->width ?? 0;
        $boat->hin = $boatDto->hin ?? '';
        $boat->current_hours = $boatDto->current_hours ?? 0;
        $boat->service_interval = $boatDto->service_interval ?? '';
        $boat->next_service = $boatDto->next_service ?? '';
        $boat->save();

        return $boat;
    }
}

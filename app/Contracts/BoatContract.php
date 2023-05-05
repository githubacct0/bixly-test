<?php

namespace App\Contracts;
use App\DTOs\BoatDto;

interface BoatContract
{
    /**
     * @param $boatDto
     * @param $boat
     * @return mixed
     */
    public function storeBoatsData(BoatDto $boatDto, $boat);
}

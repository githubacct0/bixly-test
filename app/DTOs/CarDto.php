<?php

namespace App\DTOs;

use Spatie\LaravelData\Data;

final class CarDto extends Data
{
    public function __construct(
        public string $make,
        public string $model,
        public int $year,
        public int $seats,
        public string $color,
        public string $vin,
        public float $current_mileage,
        public string $service_interval,
        public string $next_service,
    ) {
    }
}

<?php

namespace App\DTOs;

use Spatie\LaravelData\Data;

final class BoatDto extends Data
{
    public function __construct(
        public string $make,
        public string $model,
        public int $year,
        public float $length,
        public float $width,
        public string $hin,
        public float $current_hours,
        public string $service_interval,
        public string $next_service,
    ) {
    }
}

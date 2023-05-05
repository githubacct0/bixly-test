<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'seats' => $this->seats,
            'color' => $this->color,
            'vin' => $this->vin,
            'current_mileage' => $this->current_mileage,
            'service_interval' => $this->service_interval,
            'next_service' => $this->next_service,
        ];
    }
}

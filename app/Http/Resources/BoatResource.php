<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'length' => $this->length,
            'width' => $this->width,
            'hin' => $this->hin,
            'current_hours' => $this->current_hours,
            'service_interval' => $this->service_interval,
            'next_service' => $this->next_service
        ];
    }
}

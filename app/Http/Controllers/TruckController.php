<?php

namespace App\Http\Controllers;

use App\Contracts\TruckContract;
use App\DTOs\TruckDto;
use App\Http\Requests\TruckRequest;
use App\Http\Resources\TruckResource;
use App\Models\Truck;

class TruckController extends Controller
{
    /**
     * @param TruckContract $truckService
     */
    public function __construct(private TruckContract $truckService){
    }
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/trucks",
     *     summary="Get List of all Trucks",
     *     description="Returns List of all trucks",
     *     operationId ="truckIndex",
     *     security={{"bearerToken":{}}},
     *     tags={"Trucks"},
     *     @OA\Response(response="200", description="A list of trucks"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found")
     * )
     */
    public function index()
    {
        return TruckResource::collection(Truck::all());
    }
    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *      path="/api/trucks",
     *      security={{"bearerToken":{} }},
     *      operationId="truckStore",
     *      tags={"Trucks"},
     *      summary="Store a truck",
     *      description="Store truck",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass truck data",
     *          @OA\MediaType(
     *             mediaType="application/json",
     *              @OA\Schema (
     *              required={"make","model","year","seats","color","vin","current_mileage","service_interval","next_service"},
     *              @OA\Property(property="make", type="string", format="text", example="KIA"),
     *              @OA\Property(property="model", type="string", format="text", example="Sportage"),
     *              @OA\Property(property="year", type="integer", format="text", example="2023"),
     *              @OA\Property(property="seats", type="integer", format="text", example="4"),
     *              @OA\Property(property="color", type="string", format="text", example="White"),
     *              @OA\Property(property="vin", type="string", format="text", example="KUCHBELIKH465452"),
     *              @OA\Property(property="current_mileage", type="decimal", format="text", example="11.5"),
     *              @OA\Property(property="service_interval", type="string", format="text", example="3000KM"),
     *              @OA\Property(property="next_service", type="string", format="text", example="6000KM"),
     *              ),
     *          ),
     *     ),
     *     @OA\Response(response="200", description="Display a truck"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found ")
     * )
     */
    public function store(TruckRequest $request)
    {
        $validated = $request->validated();
        $truckDto = TruckDto::from([
            ...$validated,
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'seats' => $request->seats,
            'bed_length' => $request->bed_length,
            'color' => $request->color,
            'vin' => $request->vin,
            'current_mileage' => $request->current_mileage,
            'service_interval' => $request->service_interval,
            'next_service' => $request->next_service,
        ]);
        return new TruckResource($this->truckService->storeTrucksData($truckDto,new Truck()));
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *     path="/api/trucks/{id}",
     *     summary="Show a Truck",
     *     description="Display a truck",
     *     operationId ="truckShow",
     *     security={{"bearerToken":{}}},
     *     tags={"Trucks"},
     *      @OA\Parameter(
     *       description="ID of the truck to show",
     *       in="path",
     *       name="id",
     *       required=true,
     *
     *       @OA\Schema(
     *           type="integer",
     *           example="1"
     *         )
     *   ),
     *     @OA\Response(response="200", description="show a truck"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found")
     * )
     */
    public function show(Truck $truck)
    {
        return new TruckResource($truck);
    }
    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\Put(
     *      path="/api/trucks/{id}",
     *      security={{"bearerToken":{} }},
     *      operationId="truckUpdate",
     *      tags={"Trucks"},
     *      summary="Update a truck",
     *      description="Update truck",
     *      @OA\Parameter(
     *       description="ID of the truck to update",
     *       in="path",
     *       name="id",
     *       required=true,
     *
     *       @OA\Schema(
     *           type="integer",
     *           example="1"
     *         )
     *   ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass truck data",
     *          @OA\MediaType(
     *             mediaType="application/json",
     *              @OA\Schema (
     *              required={"make","model","year","seats","color","vin","current_mileage","service_interval","next_service"},
     *              @OA\Property(property="make", type="string", format="text", example="KIA"),
     *              @OA\Property(property="model", type="string", format="text", example="Sportage"),
     *              @OA\Property(property="year", type="integer", format="text", example="2023"),
     *              @OA\Property(property="seats", type="integer", format="text", example="4"),
     *              @OA\Property(property="color", type="string", format="text", example="White"),
     *              @OA\Property(property="vin", type="string", format="text", example="KUCHBELIKH465452"),
     *              @OA\Property(property="current_mileage", type="decimal", format="text", example="11.5"),
     *              @OA\Property(property="service_interval", type="string", format="text", example="3000KM"),
     *              @OA\Property(property="next_service", type="string", format="text", example="6000KM"),
     *              ),
     *          ),
     *     ),
     *     @OA\Response(response="200", description="Update a truck"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found ")
     * )
     */
    public function update(TruckRequest $request, Truck $truck)
    {
        $validated = $request->validated();
        $truckDto = TruckDto::from([
            ...$validated,
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'seats' => $request->seats,
            'bed_length' => $request->bed_length,
            'color' => $request->color,
            'vin' => $request->vin,
            'current_mileage' => $request->current_mileage,
            'service_interval' => $request->service_interval,
            'next_service' => $request->next_service,
        ]);
        return new TruckResource($this->truckService->storeTrucksData($truckDto, $truck));
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\Delete(
     *     path="/api/trucks/{id}",
     *     summary="Get a Truck",
     *     description="Delete a truck",
     *     operationId ="truckDestroy",
     *     security={{"bearerToken":{}}},
     *     tags={"Trucks"},
     *     @OA\Parameter(
     *       description="ID of the truck to update",
     *       in="path",
     *       name="id",
     *       required=true,
     *
     *       @OA\Schema(
     *           type="integer",
     *           example="1"
     *         )
     *   ),
     *     @OA\Response(response="200", description="Delete a truck"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found")
     * )
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();
    }
}

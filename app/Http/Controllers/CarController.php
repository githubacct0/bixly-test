<?php

namespace App\Http\Controllers;

use App\Contracts\CarContract;
use App\DTOs\CarDto;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;

class CarController extends Controller
{


    public function __construct(private CarContract $carService){
    }
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/cars",
     *     summary="Get List of all Cars",
     *     description="Returns List of all cars",
     *     operationId ="index",
     *     security={{"bearerToken":{}}},
     *     tags={"Cars"},
     *     @OA\Response(response="200", description="A list of cars"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found")
     * )
     */
    public function index()
    {
       return CarResource::collection(Car::all());
    }

    /**
     * @OA\Post(
     *      path="/api/cars",
     *      security={{"bearerToken":{} }},
     *      operationId="store",
     *      tags={"Cars"},
     *      summary="Store a car",
     *      description="Store car",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass car data",
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
     *     @OA\Response(response="200", description="Display a car"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found ")
     * )
     */
    public function store(CarRequest $request)
    {
        $validated = $request->validated();
        $carDto = CarDto::from([
            ...$validated,
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'seats' => $request->seats,
            'color' => $request->color,
            'vin' => $request->vin,
            'current_mileage' => $request->current_mileage,
            'service_interval' => $request->service_interval,
            'next_service' => $request->next_service,
        ]);
       return new CarResource($this->carService->storeCarsData($carDto, new Car()));
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *     path="/api/cars/{id}",
     *     summary="Get a Car",
     *     description="Display a car",
     *     operationId ="show",
     *     security={{"bearerToken":{}}},
     *     tags={"Cars"},
     *      @OA\Parameter(
     *       description="ID of the car to show",
     *       in="path",
     *       name="id",
     *       required=true,
     *
     *       @OA\Schema(
     *           type="integer",
     *           example="1"
     *         )
     *   ),
     *     @OA\Response(response="200", description="show a car"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found")
     * )
     */
    public function show(Car $car)
    {
       return new CarResource($car);
    }
    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\Put(
     *      path="/api/cars/{id}",
     *      security={{"bearerToken":{} }},
     *      operationId="update",
     *      tags={"Cars"},
     *      summary="Update a car",
     *      description="Update car",
     *      @OA\Parameter(
     *       description="ID of the car to update",
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
     *          description="Pass car data",
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
     *     @OA\Response(response="200", description="Update a car"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found ")
     * )
     */
    public function update(CarRequest $request, Car $car)
    {
        $validated = $request->validated();
        $carDto = CarDto::from([
            ...$validated,
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'seats' => $request->seats,
            'color' => $request->color,
            'vin' => $request->vin,
            'current_mileage' => $request->current_mileage,
            'service_interval' => $request->service_interval,
            'next_service' => $request->next_service,
        ]);
       return new CarResource($this->carService->storeCarsData($carDto, $car));
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\Delete(
     *     path="/api/cars/{id}",
     *     summary="Get a Car",
     *     description="Delete a car",
     *     operationId ="carDestroy",
     *     security={{"bearerToken":{}}},
     *     tags={"Cars"},
     *     @OA\Parameter(
     *       description="ID of the car to update",
     *       in="path",
     *       name="id",
     *       required=true,
     *
     *       @OA\Schema(
     *           type="integer",
     *           example="1"
     *         )
     *   ),
     *     @OA\Response(response="200", description="Delete a car"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found")
     * )
     */
    public function destroy(Car $car)
    {
       $car->delete();
    }
}

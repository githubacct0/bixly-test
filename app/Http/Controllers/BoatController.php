<?php

namespace App\Http\Controllers;

use App\Contracts\BoatContract;
use App\DTOs\BoatDto;
use App\Http\Requests\BoatRequest;
use App\Http\Resources\BoatResource;
use App\Models\Boat;

class BoatController extends Controller
{
    /**
     * @param BoatContract $boatService
     */
    public function __construct(private BoatContract $boatService){
    }
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/boats",
     *     summary="Get List of all Boats",
     *     description="Returns List of all boats",
     *     operationId ="boatIndex",
     *     security={{"bearerToken":{}}},
     *     tags={"Boats"},
     *     @OA\Response(response="200", description="A list of boats"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found")
     * )
     */
    public function index()
    {
        return BoatResource::collection(Boat::all());
    }
    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *      path="/api/boats",
     *      security={{"bearerToken":{} }},
     *      operationId="boatStore",
     *      tags={"Boats"},
     *      summary="Store a boat",
     *      description="Store boat",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass boat data",
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
     *     @OA\Response(response="200", description="Display a boat"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found ")
     * )
     */
    public function store(BoatRequest $request)
    {
        $validated = $request->validated();
        $boatDto = BoatDto::from([
            ...$validated,
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'length' => $request->length,
            'width' => $request->width,
            'hin' => $request->hin,
            'current_hours' => $request->current_hours,
            'service_interval' => $request->service_interval,
            'next_service' => $request->next_service
        ]);
        return new BoatResource($this->boatService->storeBoatsData($boatDto, new Boat()));
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *     path="/api/boats/{id}",
     *     summary="Get a Boat",
     *     description="Display a boat",
     *     operationId ="boatShow",
     *     security={{"bearerToken":{}}},
     *     tags={"Boats"},
     *      @OA\Parameter(
     *       description="ID of the boat to show",
     *       in="path",
     *       name="id",
     *       required=true,
     *
     *       @OA\Schema(
     *           type="integer",
     *           example="1"
     *         )
     *   ),
     *     @OA\Response(response="200", description="show a boat"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found")
     * )
     */
    public function show(Boat $boat)
    {
        return new BoatResource($boat);
    }
    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\Put(
     *      path="/api/boats/{id}",
     *      security={{"bearerToken":{} }},
     *      operationId="boatUpdate",
     *      tags={"Boats"},
     *      summary="Update a boat",
     *      description="Update boat",
     *      @OA\Parameter(
     *       description="ID of the boat to update",
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
     *          description="Pass boat data",
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
     *     @OA\Response(response="200", description="Update a boat"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found ")
     * )
     */
    public function update(BoatRequest $request, Boat $boat)
    {
        $validated = $request->validated();
        $boatDto = BoatDto::from([
            ...$validated,
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'length' => $request->length,
            'width' => $request->width,
            'hin' => $request->hin,
            'current_hours' => $request->current_hours,
            'service_interval' => $request->service_interval,
            'next_service' => $request->next_service
        ]);
        return new BoatResource($this->boatService->storeBoatsData($boatDto, $boat));
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\Delete(
     *     path="/api/boats/{id}",
     *     summary="Get a Boat",
     *     description="Delete a boat",
     *     operationId ="boatDestroy",
     *     security={{"bearerToken":{}}},
     *     tags={"Boats"},
     *     @OA\Parameter(
     *       description="ID of the boat to update",
     *       in="path",
     *       name="id",
     *       required=true,
     *
     *       @OA\Schema(
     *           type="integer",
     *           example="1"
     *         )
     *   ),
     *     @OA\Response(response="200", description="Delete a boat"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found")
     * )
     */
    public function destroy(Boat $boat)
    {
        $boat->delete();
    }
}

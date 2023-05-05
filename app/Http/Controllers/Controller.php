<?php

namespace App\Http\Controllers;

use App\Traits\AuthUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *      version="1.0",
 *      title="Vehicle Management System Api Documentation",
 *      description="L5 Swagger API Documentation for Laravel Project Pharmacy",
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 *
 * @OA\Get(
 *     path="/",
 *     description="Home page",
 *     @OA\Response(response="default", description="Welcome page")
 * )
 *
 * @OA\SecurityScheme(
 *    securityScheme="bearerToken",
 *    type="http",
 *    scheme="bearer",
 *    bearerFormat="JWT",
 * ),
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, AuthUser;


}

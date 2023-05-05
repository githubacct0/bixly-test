<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param LoginRequest $request
     * @return AuthResource
     * @throws ValidationException
     */
    /**
     * @OA\Post(
     *      path="/api/login",
     *      operationId="login",
     *      tags={"Authentication"},
     *      summary="Login User",
     *      description="Login a user",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass user credentials",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema (
     *              required={"email","password"},
     *              @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *              @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *              ),
     *          ),
     *     ),
     *     @OA\Response(response="200", description="USer Logged in"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Page Not Found ")
     * )
     */
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $data = $this->authService->getLoginPayload($this->getAuthUser());
        $this->destroySession();

        return new AuthResource($data);
    }

    /**
     * Destroy an authenticated session.
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $user = $this->getAuthUser();
        if ($user) {
            $user->currentAccessToken()->delete();
        }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function destroySession()
    {
        Auth::guard('web')->logout();
    }
}

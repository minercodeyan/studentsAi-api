<?php

namespace App\Http\Controllers;

use App\Servises\UserService;
use Carbon\Carbon;
use Psy\Readline\Hoa\Console;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class AuthController extends Controller
{

    protected UserService $userService;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     *
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }


    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register() {
        return response()->json($this->userService->createUser(request()->all()), ResponseAlias::HTTP_CREATED);
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        $expTime = Carbon::now()->addDays(7)->timestamp;

        $token = $this->userService->getAuthToken($credentials,$expTime);

        return $this->respondWithToken($token,$expTime);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user(),ResponseAlias::HTTP_OK);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out'],ResponseAlias::HTTP_OK);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken(string $token, $expAt): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'user'=>auth()->user(),
            'accessToken' => $token,
            'expiredAt'=>$expAt
        ],ResponseAlias::HTTP_OK);
    }
}

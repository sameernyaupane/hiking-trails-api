<?php

use App\Models\User;
use App\Models\Trail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Services\RecommendationService;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TrailController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\RecommendationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $name = $user->name;

    $token = $user->createToken($request->device_name)->plainTextToken;
 
    return compact('name', 'token');
});

Route::post('register', [RegisteredUserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/logout', function (Request $request) {
        if($request->user()->currentAccessToken()->delete()) {
            return response()->json(["success" => true]);
        }
    
        return response()->json(["success" => false]);
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResources([
        'users'  => UserController::class,
        'trails' => TrailController::class,
        'groups' => GroupController::class,
    ]);

    Route::get('/trail-recommendation', [RecommendationController::class, 'index']);
});
<?php
namespace App\Core\Modules\Auth;

use Illuminate\Support\Facades\Route;
use App\Core\Modules\auth\AuthController;

Route::group(['prefix' => 'auth'],function (){
    Route::post('login/', [AuthController::class,'login'])->name( 'login');
    Route::middleware('auth:sanctum')->post( '/logout',[AuthController::class, 'logout']
);

});
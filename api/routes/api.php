<?php

use App\HelpBoard\Http\Controllers\HelpPostController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
  Route::post('/help-requests', [HelpPostController::class,'create']);
});

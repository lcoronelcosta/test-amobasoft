<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CalendarDaysDisabledController;
use App\Http\Controllers\RouteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resources([
    'calendars' => CalendarController::class,
    'routes' => RouteController::class,
]);

Route::get('get_calendar_days_disabled/{calendar}', [CalendarDaysDisabledController::class, 'getCalendarDaysDisabled'])->name('get_calendar_days_disabled');
Route::get('get_routes_by_calendar/{calendar}', [RouteController::class, 'getRoutesByCalendar'])->name('get_routes_by_calendar');

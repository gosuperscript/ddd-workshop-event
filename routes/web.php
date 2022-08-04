<?php

use App\Http\Livewire\Attendance\CheckIn;
use App\Http\Livewire\Events\CreateEvent;
use App\Http\Livewire\Events\EventsList;
use App\Http\Livewire\Registration\Attendee;
use App\Http\Livewire\Registration\Register;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('events')->group(function () {
        Route::get('/', EventsList::class)->name('events.list');
        Route::get('/create', CreateEvent::class)->name('events.create');
    });

    Route::prefix('registration')->group(function () {
        Route::get('/{event_id}', Register::class)->name('registration.register');
        Route::get('/attendee/{attendee_id}', Attendee::class)->name('registration.attendee');
    });

    Route::prefix('attendance')->group(function () {
        Route::get('/checkin/{event_id}', CheckIn::class)->name('attendance.checkin');
    });

});

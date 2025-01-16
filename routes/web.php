<?php
use App\Livewire\AcceptInvitation;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/devices', function () {
    return view('pages.devices');
});

Route::middleware('signed')
    ->get('invitation/{invitation}/accept', AcceptInvitation::class)
    ->name('invitation.accept');

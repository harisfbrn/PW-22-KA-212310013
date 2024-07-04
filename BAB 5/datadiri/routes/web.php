<?php

use App\Http\Controllers\DataDiriController;

Route::get('/', function () {
    return redirect('/datadiri');
});

Route::resource('datadiri', DataDiriController::class);

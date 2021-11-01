<?php

use Illuminate\Support\Facades\Route;

use splittlogic\scout\Http\Controllers\scoutController;

Route::get(
  'splittlogic/scout',
  [scoutController::class, 'index']
)->name('splittlogic.scout');

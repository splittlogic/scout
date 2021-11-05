<?php

use Illuminate\Support\Facades\Route;

use splittlogic\scout\Http\Controllers\scoutController;

Route::get(
  'splittlogic/scout',
  [scoutController::class, 'index']
)->name('splittlogic.scout');

if (config('scout.domains.parent') !== '')
{

  Route::group(['domain' => config('scout.domains.parent')], function() {
    Route::get('/', function() {
      dd('Pink');
    });
  });

  Route::group(['domain' => 'x.' . config('scout.domains.parent')], function() {
    Route::get('/', function() {
      dd('This is X');
    });
  });

}

if (is_array(config('scout.domains.children')))
{

  foreach (config('scout.domains.children') as $key => $child)
  {

    if ($key !== 'example.com') {

      Route::group(['domain' => $key], function() {
        Route::get('/', function() {
          dd('Dummy');
        });
      });

    }

  }

}

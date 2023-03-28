<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resources(['activity' => 'App\Http\Controllers\ActivityController'], ['names' => resourcesName('activity')]);



function resourcesName(string $name): array
{
    return [
        "index"   => "$name.index",
        "create"  => "$name.create",
        "show"    => "$name.show",
        "edit"    => "$name.edit",
        "store"   => "$name.store",
        "update"  => "$name.update",
        "destroy" => "$name.destroy",
    ];
}
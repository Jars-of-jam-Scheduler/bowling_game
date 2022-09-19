<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{PhpTestsController, GroupController};

use \App\BusinessEnums\Fruit;


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

Route::get('/phpinfo', function() {
	return phpinfo();
});

Route::get('/phptests', [PhpTestsController::class, 'startAllTests']);

Route::get('test', function() {
	return 'test';
});

Route::view('/my_super_view', 'my_super_view', [ 'name' => 'My Super View' ]);


Route::get('/test2/{param}/{another_param?}', function(string $param, ?int $another_param = null) {
	return $param . ' ' . $another_param;
});

Route::prefix('super_group')->group(function() {
	Route::get('/group_route_1', function() {  // super_group/group_route_1
		return 'test';
	});
	Route::get('/group_route_2', function() {
		return 'test';
	});
		
});

Route::controller(GroupController::class)->group(function() {
	Route::get('/test3', 'ctrlMethod');
});

Route::get('/enumed_route/{fruit}', function (Fruit $fruit) {
	return $fruit->value;
});
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Staff;
use App\Models\Product;
use App\Models\Photo;

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

Auth::routes();

Route::get('/create', function(){

	$staff = Staff::find(1);
	$staff->photos()->create([

		'path' => 'test.jpg'

	]);

	// $product = Product::find(1);
	// $product->photos()->create([
	// 	'path' => 'url.jpg'
	// ]);

});

Route::get('/read', function(){

	$staff = Staff::find(1);

	foreach($staff->photos as $photo){
		echo $photo->path."<br>";
	}

});

Route::get('/update', function(){

	$staff = Staff::find(1);

	$photo = $staff->photos()->whereId(1)->first();

	$photo->path = 'Acer.jpg';

	$photo->save();


});

Route::get('/delete',function(){

	$staff = Staff::findOrFail(1);

	$staff->photos()->delete();

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

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


// Route::get('/', function()
// {
// 	# code...
// 	$json = file_get_contents('http://www.galacentre.ru/api/v2/catalog/json/?key=d27b9aa09102f001d6f6f5c5fc97d222&section=1439&store=msk');
//                 $data =  array_merge((array) json_decode($json));
//                 $products = $data['DATA'];

// 	dd (data_get($products, 'name'));
                

// 	// $array = array_merge((array) json_decode($json));
// 	// $catalogs = $array['DATA'];
// 	//     foreach ($catalogs as $key => $data){
// 	//                 $products = $data;
// 	//                 $key;
// 	//     }

                
//  //    dd($products->sert);


// 	return view('welcome', compact('products'));
// });

//use App\Product;
//
//Route::get('/', function () {
//
//    Product::createIndex($shards = null, $replicas = null);
//    Product::putMapping($ignoreConflicts = true);
//    Product::addAllToIndex();
//
//
////    Product::reindex();
//
//    return view('welcome');
//});

Route::resource('/categories',  'CategoriesController');
Route::resource('/products', 'ProductsController');

//Route::get('/search', 'SearchesController@search')->name('search.search');
Route::get('/searches/product', 'SearchesController@search')->name('search.product');

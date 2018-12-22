<?php

/**
 * ProductController
 */
Route::prefix('product')->group(function () {
    Route::get('/', 'Api\ProductController@getAll');
    Route::post('/', 'Api\ProductController@add');
    Route::get('/{product}', 'Api\ProductController@get');
    Route::post('/{product}', 'Api\ProductController@update');
    Route::post('/{product}/delete', 'Api\ProductController@delete');
});

/**
 * ProductCategoryController
 */
Route::prefix('product-category')->group(function () {
    Route::get('/', 'Api\ProductCategoryController@getAll');
    Route::post('/', 'Api\ProductCategoryController@add');
    Route::get('/{product_category}', 'Api\ProductCategoryController@get');
    Route::post('/{product_category}', 'Api\ProductCategoryController@update');
    Route::post('/{product_category}/delete', 'Api\ProductCategoryController@delete');
});

/**
 * CustomerController
 */
Route::prefix('customer')->group(function () {
    Route::get('/', 'Api\CustomerController@getAll');
    Route::post('/', 'Api\CustomerController@add');
    Route::get('/{customer}', 'Api\CustomerController@get');
    Route::post('/{customer}', 'Api\CustomerController@update');
    Route::post('/{customer}/delete', 'Api\CustomerController@delete');
});

/**
 * DistributorController
 */
Route::prefix('distributor')->group(function () {
    Route::get('/', 'Api\DistributorController@getAll');
    Route::get('/{distributor}', 'Api\DistributorController@get');
    Route::post('/', 'Api\DistributorController@add');
    Route::post('/{distributor}', 'Api\DistributorController@update');
    Route::post('/{distributor}/delete', 'Api\DistributorController@delete');
});

/**
 * UnitController
 */
Route::prefix('unit')->group(function () {
    Route::get('/', 'Api\UnitController@getAll');
    Route::get('/{unit}', 'Api\UnitController@get');
    Route::post('/', 'Api\UnitController@add');
    Route::post('/{unit}', 'Api\UnitController@update');
    Route::post('/{unit}/delete', 'Api\UnitController@delete');
});

/**
 * TransactionCategoryController
 */
Route::prefix('transaction-category')->group(function () {
    Route::get('/', 'Api\TransactionCategoryController@getAll');
    Route::get('/{transaction_category}', 'Api\TransactionCategoryController@get');
    Route::post('/', 'Api\TransactionCategoryController@add');
    Route::post('/{transaction_category}', 'Api\TransactionCategoryController@update');
    Route::post('/{transaction_category}/delete', 'Api\TransactionCategoryController@delete');
});

/**
 * TransactionItemController
 */
Route::prefix('transaction-item')->group(function () {
    Route::get('/{transaction_item}', 'Api\TransactionItemController@get');
    Route::post('/{transaction_item}', 'Api\TransactionItemController@update');
    Route::post('/{transaction_item}/delete', 'Api\TransactionItemController@delete');
});

/**
 * TransactionController
 */
Route::prefix('/transaction')->group(function () {
    Route::get('/', 'Api\TransactionController@getAll');
    Route::get('/{transaction}', 'Api\TransactionController@getDetail');
    Route::post('/find-all', 'Api\TransactionController@findAll');
    Route::post('/', 'Api\TransactionController@add');
    Route::post('/{transaction}', 'Api\TransactionController@update');
    Route::post('/{transaction}/delete', 'Api\TransactionController@delete');
});


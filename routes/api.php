<?php

Route::get('/sites', 'ApiController@sites');
Route::get('/sites/{siteId}', 'ApiController@site');

Route::get('/sites/{siteId}/currencies', 'ApiController@currencies');
Route::get('/sites/{siteId}/listing_types', 'ApiController@listingTypes');
Route::get('/sites/{siteId}/shipping_methods', 'ApiController@shippingMethods');
Route::get('/sites/{siteId}/payment_methods', 'ApiController@paymentMethods');
Route::get('/sites/{siteId}/categories', 'ApiController@categories');

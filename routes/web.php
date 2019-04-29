<?php

Route::get('/cache/clear', function() {
    \MeliSdk::clearCache();

    return redirect('/');
});

Route::get('/{any}', 'HomeController@index')->where('any', '.*');


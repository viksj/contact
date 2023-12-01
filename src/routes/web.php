<?php

use Illuminate\Http\Request;
use Viksj\Contact\Http\Controllers\Contact\ContactController;


// Route::get('/contact', function () {
//     return view('contact::contact.index');
// })->name('contact');

// Route::post('/contact', function (Request $request) {
//     return $request->all();
// });

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact', 'send');
});
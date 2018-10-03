<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Route::group(['prefix' => 'api/v1'], function () {
   
   //Regiseter
   Route::post('users/register','Users\Http\Controllers\UserController@register'); 
   
   //Login
   Route::post('users/login','Users\Http\Controllers\UserController@login'); 
    
   Route::get('users','Users\Http\Controllers\UserController@getUser')->middleware('jwt.auth');
   
});

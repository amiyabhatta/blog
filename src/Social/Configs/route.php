<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Route::group(['prefix' => 'api/v1'], function () {
   Route::get('users','Users\Http\Controllers\UserController@getUser');   
});

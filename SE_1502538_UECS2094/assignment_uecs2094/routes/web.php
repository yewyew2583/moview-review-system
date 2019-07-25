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

//homepage
Route::get('/homepage', 'HomeController@viewHomePage');

//list movies(homepage)
Route::get('/listMovies', 'HomeController@listMovies');

Route::get('/searchMovies', 'Homecontroller@searchMovies');

Route::get('/movieDetail', 'HomeController@viewMovieDetailPage');

//MOVIE MANAGEMENT
Route::post('/addMovie', 'HomeController@addMovie');

Route::post('/editMovie', 'HomeController@editMovie');

Route::post('/deleteMovie', 'HomeController@deleteMovie');

//login
Route::get('/loginpage', 'Authentication\authController@viewLoginPage');

Route::get('/login', 'Authentication\authController@userLogin');

//register
Route::get('/signuppage','Authentication\authController@viewSignUpPage');

Route::get('/register', 'Authentication\authController@userRegister');



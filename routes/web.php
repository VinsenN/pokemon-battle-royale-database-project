<?php

use Illuminate\Support\Facades\Route;

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

// Match Setup
Route::get('/', [
    'uses' => 'MatchsController@view'
]);
Route::post('/match/process_battle', [
    'uses' => 'MatchsController@add_match_process'
]);
Route::post('/match/reset_simulation', [
    'uses' => 'MatchsController@reset_simulator'
]);

// Pokemon Section
Route::get('/pokemon', [
    'uses' => 'PokemonController@view_pokemon'
]);
Route::get('/pokemon/add_pokemon', [
    'uses' => 'PokemonController@add_pokemon'
]);
Route::post('/pokemon/add_pokemon/process', [
    'uses' => 'PokemonController@add_pokemon_process'
]);
Route::get('/pokemon/view_pokemon/{id}', [
    'uses' => 'PokemonController@view_pokemon_id'
]);
Route::post('/pokemon/view_pokemon/{id}/update', [
    'uses' => 'PokemonController@update_pokemon'
]);
Route::post('/pokemon/view_pokemon/{id}/delete', [
    'uses' => 'PokemonController@delete_pokemon'
]);

// Pokemon Type
Route::get('/pokemon/add_pokemon_type', [
    'uses' => 'PokemonTypesController@add_pokemon_type_view'
]);
Route::get('/pokemon/add_pokemon_type/{id}', [
    'uses' => 'PokemonTypesController@add_pokemon_type_view_id'
]);
Route::post('/pokemon/add_pokemon_type/process', [
    'uses' => 'PokemonTypesController@add_pokemon_type'
]);
Route::post('/pokemon/add_pokemon_type/{id}/update', [
    'uses' => 'PokemonTypesController@add_pokemon_type_update_id'
]);
Route::post('/pokemon/add_pokemon_type/{id}/delete', [
    'uses' => 'PokemonTypesController@add_pokemon_type_delete_id'
]);


// Trainer Section
Route::get('/player', [
    'uses' => 'PlayersController@view_player'
]);
Route::get('/player/{id}', [
    'uses' => 'PlayersController@view_player_id'
]);
Route::post('/player/add', [
    'uses' => 'PlayersController@add_player'
]);
Route::post('/player/{id}/update', [
    'uses' => 'PlayersController@update_player'
]);
Route::post('/player/{id}/delete', [
    'uses' => 'PlayersController@delete_player'
]);


// Leaderboard statistic
Route::get('/leaderboard', [
    'uses' => 'MatchDetailsController@view_statistic'
]);
Route::get('/leaderboard/all', [
    'uses' => 'MatchDetailsController@view_statistic_all'
]);

<?php

use Illuminate\Support\Facades\Route;


$router->get('', ['uses' => 'App\Http\Controllers\HeroesController@select'])->name('heroes');
$router->post('/heroes/delete', ['uses' => 'App\Http\Controllers\HeroesController@delete']);
$router->post('/heroes/insert', ['uses' => 'App\Http\Controllers\HeroesController@insert']);
$router->post('/heroes/update', ['uses' => 'App\Http\Controllers\HeroesController@update']);

$router->get('/armor', ['uses' => 'App\Http\Controllers\ArmorController@select'])->name('armor');
$router->post('/armor/delete', ['uses' => 'App\Http\Controllers\ArmorController@delete']);
$router->post('/armor/insert', ['uses' => 'App\Http\Controllers\ArmorController@insert']);
$router->post('/armor/update', ['uses' => 'App\Http\Controllers\ArmorController@update']);

$router->get('/move_speed', ['uses' => 'App\Http\Controllers\MoveSpeedController@select'])->name('move_speed');
$router->post('/move_speed/delete', ['uses' => 'App\Http\Controllers\MoveSpeedController@delete']);
$router->post('/move_speed/insert', ['uses' => 'App\Http\Controllers\MoveSpeedController@insert']);
$router->post('/move_speed/update', ['uses' => 'App\Http\Controllers\MoveSpeedController@update']);

$router->get('/complexity', ['uses' => 'App\Http\Controllers\ComplexityController@select'])->name('complexity');
$router->post('/complexity/delete', ['uses' => 'App\Http\Controllers\ComplexityController@delete']);
$router->post('/complexity/insert', ['uses' => 'App\Http\Controllers\ComplexityController@insert']);
$router->post('/complexity/update', ['uses' => 'App\Http\Controllers\ComplexityController@update']);

$router->get('/main_attribute', ['uses' => 'App\Http\Controllers\MainAttributeController@select'])->name('main_attribute');
$router->post('/main_attribute/delete', ['uses' => 'App\Http\Controllers\MainAttributeController@delete']);
$router->post('/main_attribute/insert', ['uses' => 'App\Http\Controllers\MainAttributeController@insert']);
$router->post('/main_attribute/update', ['uses' => 'App\Http\Controllers\MainAttributeController@update']);

$router->get('/position', ['uses' => 'App\Http\Controllers\PositionController@select'])->name('position');
$router->post('/position/delete', ['uses' => 'App\Http\Controllers\PositionController@delete']);
$router->post('/position/insert', ['uses' => 'App\Http\Controllers\PositionController@insert']);
$router->post('/position/update', ['uses' => 'App\Http\Controllers\PositionController@update']);

$router->get('/attack', ['uses' => 'App\Http\Controllers\AttackController@select'])->name('attack');
$router->post('/attack/delete', ['uses' => 'App\Http\Controllers\AttackController@delete']);
$router->post('/attack/insert', ['uses' => 'App\Http\Controllers\AttackController@insert']);
$router->post('/attack/update', ['uses' => 'App\Http\Controllers\AttackController@update']);

$router->get('/attack_type', ['uses' => 'App\Http\Controllers\AttackTypeController@select'])->name('attack_type');
$router->post('/attack_type/delete', ['uses' => 'App\Http\Controllers\AttackTypeController@delete']);
$router->post('/attack_type/insert', ['uses' => 'App\Http\Controllers\AttackTypeController@insert']);
$router->post('/attack_type/update', ['uses' => 'App\Http\Controllers\AttackTypeController@update']);








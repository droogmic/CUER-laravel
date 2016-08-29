<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;

/*
 * Show Homepage
 */
Route::get('/', function () {
    return view('welcome');
});

/*
 * InvItem
 */
Route::get('/invitem', 'InvItemController@index');
Route::get('/invitem/type/{invtype}', 'InvItemController@index_type');
Route::post('/invitem/add', 'InvItemController@store');
Route::delete('/invitem/{invitem}', 'InvItemController@destroy');

/*
 * InvType
 */
Route::get('/invtype', 'InvTypeController@index');
Route::post('/invtype/add', 'InvTypeController@store');
Route::get('/invtype/edit/{invtype}', 'InvTypeController@edit');
Route::post('/invtype/update/{invtype}', 'InvTypeController@update');
Route::delete('/invtype/{invtype}', 'InvTypeController@destroy');

/*
 * InvList
 */
Route::get('/invlist', 'InvListController@index');
Route::post('/invlist/add', 'InvListController@store');
Route::delete('/invlist/{invlist}', 'InvListController@destroy');

/*
 * Task
 */
Route::get('/task', 'TaskController@index');
Route::post('/task/add', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');

/****
 * Testing
 */
use App\InvItem;
use App\InvType;
Route::get('/test', function () {

    // print_r("Start");
    // $user = App\User::find(1);
    // print_r($user->name);
    // print_r($users = DB::table('users')->where('id', 1)->get());
    // print_r(DB::table('users')->select('name', 'email as user_email')->get());

    // $invtypes = InvType::orderBy('created_at', 'asc')->get();
    // foreach ($invtypes as $invtype) {
    //     echo '<pre>';
    //     // print_r(is_null(NULL));
    //     print_r(is_null($invtype->mass));
    //     echo '</pre>';
    // }

    // $invtype_ids = DB::table('inv_types')->select('id')->get();
    // $invtypes = InvType::orderBy('created_at', 'asc')->get();
    // var_dump($invtypes);
    // print_r($invtype_ids[0]);

    // $invtypes = InvType::orderBy('name', 'asc')->get();
    //$invitems = InvType::join('inv_items', 'inv_items.type_id', '=', 'inv_types.id')->select('name as type_name', 'inv_types.id as type_id', 'inv_items')->orderBy('name', 'asc')->get();
    //$invitems = \DB::table('inv_types')->select('inv_items.*')->join('inv_items', 'inv_items.type_id', '=', 'inv_types.id')->orderBy('name', 'asc')->get();
    $invitems = InvItem::select('inv_items.*')->join('inv_types', 'inv_items.type_id', '=', 'inv_types.id')->orderBy('name', 'asc')->get();
    // $invitem_ids = DB::table('inv_items')->select('id')->get();
    print_r($invitems[1]->id);
    var_dump($invitems);
});

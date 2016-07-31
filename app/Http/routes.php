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

/*

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', function()
{
    return 'Users!';
});

*/
use Illuminate\Http\Request;

use App\InvItem;
use App\InvType;

/****
 * Testing
 */
Route::get('/test', function () {
    
    // $flights = App\User::all();
    
    // print_r("Start");
    // $user = App\User::find(1);
    // print_r($user->name);
    // print_r($users = DB::table('users')->where('id', 1)->get());
    // print_r(DB::table('users')->select('name', 'email as user_email')->get());
    
    $invtypes = InvType::orderBy('created_at', 'asc')->get();
    foreach ($invtypes as $invtype) {
        echo '<pre>';
        // print_r(is_null(NULL));
        print_r(is_null($invtype->mass));
        echo '</pre>';
    }
    
});


/****
 * Show Dashboard
 */
Route::get('/', function () {
    return show_invitems();
});


/****
 * Show InvType Dashboard
 */
Route::get('/invtype', function () {
    return show_invtypes();
});

/**
 * Add New InvType
 */
Route::post('/invtype/add', function (Request $request) {
    return add_invtype($request);
});

/**
 * Delete InvType
 */
Route::delete('/invtype/{invtype}', function (InvType $invtype) {
    $invtype->delete();
    return redirect('/invtype');
});


/****
 * Show InvItem Dashboard
 */
Route::get('/invitem', function () {
    return show_invitems();
});

/**
 * Add New InvItem
 */
Route::post('/invitem/add', function (Request $request) {
    return add_invitem($request);
});

/**
 * Delete InvItem
 */
Route::delete('/invitem/{invitem}', function (InvItem $invitem) {
    $invitem->delete();
    return redirect('/invitem');
});




/*****************************************************************************
 * InvTypes                                                                  *
 *****************************************************************************/
 
/**
 * Show InvType Dashboard
 */
function show_invtypes() {
    $invitems = InvItem::orderBy('created_at', 'asc')->get();
    $invtypes = InvType::orderBy('created_at', 'asc')->get();

    return view('invtypes', [
        'invitems' => $invitems,
        'invtypes' => $invtypes,
    ]);
}

/**
 * Add New InvType
 */
function add_invtype(Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'mass' => 'numeric',
    ]);

    if ($validator->fails()) {
        return redirect('/invtype')
            ->withInput()
            ->withErrors($validator);
    }

    $invtype = new InvType;
    $invtype->name = $request->name;
    $invtype->description = $request->description;
    if ($request->mass != '')
        $invtype->mass = $request->mass;
    else
        $invtype->mass = NULL;
    $invtype->save();

    return redirect('/invtype');
}




/*****************************************************************************
 * InvItems                                                                  *
 *****************************************************************************/
 
/**
 * Show InvItem Dashboard
 */
function show_invitems() {
    $invitems = InvItem::orderBy('created_at', 'asc')->get();
    $invtypes = InvType::orderBy('created_at', 'asc')->get();

    return view('invitems', [
        'invitems' => $invitems,
        'invtypes' => $invtypes,
    ]);
}

/**
 * Add New InvItem
 */
function add_invitem(Request $request) {
    $validator = Validator::make($request->all(), [
        'type' => 'required',
        'reference' => 'unique:inv_items',
    ]);
    
    if ($validator->fails()) {
        return redirect('/invitem')
            ->withInput()
            ->withErrors($validator);
    }
    
    // print_r($request);
    $invitem = new InvItem;
    $invitem->type_id = $request->type;
    $invitem->reference = $request->reference;
    $invitem->updated_by = 1;
    $invitem->save();

    return redirect('/invitem');
}




/*****************************************************************************
 * Tasks                                                                     *
 *****************************************************************************/
use App\Task;
/**
 * Show Task Dashboard
 */
Route::get('/task', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
        'tasks' => $tasks
    ]);
});

/**
 * Add New Task
 */
Route::post('/task/add', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/task')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/task');
});

/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect('/task');
});

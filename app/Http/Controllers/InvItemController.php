<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use App\InvItem;
use App\InvType;

class InvItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitems = InvItem::join('inv_types', 'inv_items.type_id', '=', 'inv_types.id')->orderBy('name', 'asc')->select('inv_items.*')->paginate(20);
        $invtypes = InvType::orderBy('name', 'asc')->get();

        return view('dashboard', [
            'type' => 'InvItems', // Name of view folder
            'invitems' => $invitems,
            'invtypes' => $invtypes,
        ]);
    }

    /**
     * Display a listing of the resource of a specific type.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_type(InvType $invtype)
    {
        // $invitems = InvItem::where('type_id', '=', $invtype->id)->orderBy('created_at', 'asc')->simplePaginate(50);
        // $invtypes = InvType::orderBy('created_at', 'asc')->get();
        $invitems = InvItem::where('type_id', '=', $invtype->id)->join('inv_types', 'inv_items.type_id', '=', 'inv_types.id')->orderBy('name', 'asc')->paginate(20);
        $invtypes = InvType::orderBy('name', 'asc')->get();

        return view('dashboard', [
            'type' => 'InvItems', // Name of view folder
            'invitems' => $invitems,
            'invtypes' => $invtypes,
            // 'invitem_type_name' => '"'.$invtype->name.'"',
            'invitem_type_name' => $invtype->name,
            'invitem_type_id' => $invtype->id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'type' => 'required',
        'reference' => 'unique:inv_items',
        ]);

        if ($validator->fails()) {
            return redirect('/invitem')
                ->withInput()
                ->withErrors($validator);
        }

        $invitem = new InvItem;
        $invitem->type_id = $request->type;
        $invitem->reference = $request->reference;
        // $invitem->updated_by = 1;
        $invitem->save();

        return redirect('/invitem');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  InvItem  $invitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvItem $invitem)
    {
        $invitem->delete();
        return redirect('/invitem');
    }
}

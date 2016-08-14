<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use App\InvItem;
use App\InvType;

class InvTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $invitems = InvItem::orderBy('created_at', 'asc')->get();
        $invitems = InvItem::get();
        // $invtypes = InvType::orderBy('created_at', 'asc')->get();
        $invtypes = InvType::orderBy('name', 'asc')->paginate(20);
        
        // return view('invtypes', [
        //     'invitems' => $invitems,
        //     'invtypes' => $invtypes,
        // ]);
        return view('dashboard', [
            'type' => 'InvTypes',
            'invitems' => $invitems,
            'invtypes' => $invtypes,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvType $invtype)
    {
        // TODO: Add conbfirmation as cascades onto invitems
        $invtype->delete();
        return redirect('/invtype');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use App\InvCategory;

class InvCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$invcategories = InvCategory::paginate(20);
        
        return view('dashboard', [
            'type' => 'InvCategories',
            'invcategories' => $invcategories,
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
        ]);
    
        if ($validator->fails()) {
            return redirect('/invcategory')
                ->withInput()
                ->withErrors($validator);
        }
    
        $invcategory = new InvCategory;
        $invcategory->name = $request->name;
        $invcategory->description = $request->description;
		//$invcategory->team = $request->team;
        
        $invcategory->save();
        
        return redirect('/invcategory');
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
     * @param  InvCategory $invcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(InvCategory $invcategory)
    {
        $invtypes = InvType::where('category_id', '=', $invcategory->id)->join('inv_categories', 'inv_types.category_id', '=', 'inv_categories.id')->orderBy('name', 'asc')->paginate(20);
        $invcategories = InvType::orderBy('name', 'asc')->get();
        return view('edit', [
            'type' => 'InvCategories',
            'invcategory' => $invcategory,
            'type_list' => 'InvTypes',
            'invtypes' => $invtypes,
            'invcategories' => $invcategories,
            'invtype_category_name' => $invcategory->name,
            'invtype_category_id' => $invcategory->id,
        ]);
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
    public function destroy(InvCategory $invcategory)
    {
        $invcategory->delete();
        return redirect('/invcategory');
    }
}

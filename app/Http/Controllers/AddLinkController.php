<?php

namespace App\Http\Controllers;

use App\Models\AddLink;
use Illuminate\Http\Request;

class AddLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
         $this->middleware('auth');

    }
    public function index()
    {
        $addLink = AddLink::all();
        return view('customersAndSuppliers.addLink', compact('addLink'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'link_name'  => 'required|unique:add_links|max:255',
        ],[

            'link_name.required' =>'يرجي ادخال اسم الصلة ',
            'link_name.unique' =>' هدا الاسم مسجل مسبقا',
        ]);

            AddLink::create([
                'link_name' => $request->link_name,
                'description' => $request->description,

            ]);
            session()->flash('Add', 'تم اضافة الصلة  بنجاح ');
            return redirect('/addLink');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'link_name' => 'required|max:255|unique:add_links,link_name,'.$id,
        ],[
            'link_name.required' =>'يرجي ادخال اسم الصلة ',
            'link_name.unique' =>'هده الصلة مسجل مسبقا',
        ]);

        $addLink = AddLink::find($id);
        $addLink->update([
            'link_name' => $request->link_name,
            'description' => $request->description,
        ]);

        session()->flash('edit','تم تعديل الصلة  بنجاج');
        return redirect('/addLink');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        AddLink::find($id)->delete();
        session()->flash('delete','تم حذف الصلة بنجاح');
        return redirect('/addLink');
    }
}


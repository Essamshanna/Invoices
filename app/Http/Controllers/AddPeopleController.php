<?php

namespace App\Http\Controllers;

use App\Models\AddPeople;
use Illuminate\Http\Request;

class AddPeopleController extends Controller
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
        $addPeople = AddPeople::all();
        return view('customersAndSuppliers.addPeople', compact('addPeople'));
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

            'people_fname'  => 'required|unique:add_people|max:255',
            'people_lname' => 'required',
            // 'addedInEmails' => 'required',

        ],[

            'people_fname.required' =>'يرجي ادخال الاسم ',
            'people_fname.unique' =>' هدا الاسم مسجل مسبقا',
            'people_lname.required' =>'يرجي ادخال اسم  العائلة  ',
            // 'addedInEmails.required' =>'يجب عليك الاختيار من قائمة مضاف الى الايميلات ',
        ]);

            AddPeople::create([
                'people_fname'  => $request->people_fname,
                'people_lname'  => $request->people_lname,
                'email'         => $request->email,
                // 'addedInEmails' => $request->addedInEmails,

            ]);
            session()->flash('Add', 'تم عملية الاضافة بنجاح ');
            return redirect('/addPeople');
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

            'people_fname' => 'required|max:255|unique:add_people,people_fname,'.$id,
            'people_lname' => 'required',
        ],[
            'people_fname.required' =>'يرجي ادخال الاسم  ',
            'people_fname.unique' =>'هده الاسم مسجل مسبقا',
            'people_lname.required' =>'يرجي ادخال اسم  العائلة  ',
        ]);

        $addPeople = AddPeople::find($id);
        $addPeople->update([
            'people_fname'  => $request->people_fname,
            'people_lname'  => $request->people_lname,
            'email'         => $request->email,
            // 'addedInEmails' => $request->addedInEmails,
        ]);

        session()->flash('edit','تم عملية التعديل بنجاج');
        return redirect('/addPeople');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        AddPeople::find($id)->delete();
        session()->flash('delete','تم عملية الحذف بنجاح');
        return redirect('/addPeople');
    }
}

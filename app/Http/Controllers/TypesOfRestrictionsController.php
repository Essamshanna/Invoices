<?php

namespace App\Http\Controllers;

use App\Models\TypesOfRestrictions;
use Illuminate\Http\Request;


class TypesOfRestrictionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * أنواع القيود
     */
    public function __construct()
    {
         $this->middleware('auth');
    }
    public function index()
    {
        $typesOfRestriction = TypesOfRestrictions::all();
        return view('typesOfRestrictions.typesOfRestrictions', compact('typesOfRestriction'));
        // return $typesOfRestriction;
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

            'typeOfRestr_aname'  => 'required|unique:types_of_restrictions|max:255',
            'typeOfRestr_ename'  => 'required',
        ],[

            'typeOfRestr_aname.required' =>'يرجي ادخال اسم نوع القيد بالعربي',
            'typeOfRestr_aname.unique' =>' هدا الاسم مسجل مسبقا',
            'typeOfRestr_ename' => 'يرجي ادخال اسم نوع القيد بالانجليزي',


        ]);

            TypesOfRestrictions::create([
                'typeOfRestr_aname' => $request->typeOfRestr_aname,
                'typeOfRestr_ename' => $request->typeOfRestr_ename,
                'description'       => $request->description,

            ]);
            session()->flash('Add', 'تم اضافة القيد  بنجاح ');
            return redirect('/typesOfRestrictions');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
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

            'typeOfRestr_aname' => 'required|max:255|unique:types_of_restrictions,typeOfRestr_aname,'.$id,
        ],[
            'typeOfRestr_aname.required' =>'يرجي ادخال اسم نوع القيد بالغة العربية',
            'typeOfRestr_aname.unique' =>'هده القيد مسجل مسبقا',
        ]);

        $typesOfRestrictions = TypesOfRestrictions::find($id);
        $typesOfRestrictions->update([
            'typeOfRestr_aname' => $request->typeOfRestr_aname,
            'typeOfRestr_ename' => $request->typeOfRestr_ename,
            'description'       => $request->description,
        ]);

        session()->flash('edit','تم تعديل نوع القيد  بنجاج');
        return redirect('/typesOfRestrictions');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        TypesOfRestrictions::find($id)->delete();
        session()->flash('delete','تم عملية الحذف بنجاح');
        return redirect('/typesOfRestrictions');
        // return $request;
    }
}

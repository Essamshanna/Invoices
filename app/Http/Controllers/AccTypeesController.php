<?php

namespace App\Http\Controllers;

use App\Models\AccTypees;
use Illuminate\Http\Request;

class AccTypeesController extends Controller
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
        $acc_Typees = AccTypees::all();
        return view('typees.typees', compact('acc_Typees'));
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

            'acc_type_aname' => 'required|unique:acc_typees|max:255',
        ],[

            'acc_type_aname.required' =>'يرجي ادخال نوع الحساب',
            'acc_type_aname.unique' =>'اسم الحساب مسجل مسبقا',


        ]);

            AccTypees::create([
                'acc_type_aname' => $request->acc_type_aname,
                'acc_type_ename' => $request->acc_type_ename,

            ]);
            session()->flash('Add', 'تم اضافة نوع الحساب بنجاح ');
            return redirect('/typees');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccTypees $accTypees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccTypees $accTypees)
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

            'acc_type_aname' => 'required|max:255|unique:acc_typees,acc_type_aname,'.$id,
        ],[
            'acc_type_aname.required' =>'يرجي ادخال اسم الحساب بالغة العربية',
            'acc_type_aname.unique' =>'نوع الحساب مسجل مسبقا',
        ]);

        $Acc_Typees = AccTypees::find($id);
        $Acc_Typees->update([
            'acc_type_aname' => $request->acc_type_aname,
            'acc_type_ename' => $request->acc_type_ename,
        ]);

        session()->flash('edit','تم تعديل نوع الحساب  بنجاج');
        return redirect('/typees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        AccTypees::find($id)->delete();
        session()->flash('delete','تم حذف نوع الحساب بنجاح');
        return redirect('/typees');
    }
}

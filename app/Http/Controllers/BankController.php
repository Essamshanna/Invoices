<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
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
        $banks = Bank::all();
        return view('bank.bank', compact('banks'));
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

            'bank_aname'  => 'required|unique:banks|max:255',
            'bank_ename'  => 'required',
        ],[

            'bank_aname.required' =>'يرجي ادخال اسم البنك بالعربي',
            'bank_aname.unique' =>' هدا الاسم مسجل مسبقا',
            'bank_ename' => 'يرجي ادخال اسم البنك بالانجليزي',


        ]);

            Bank::create([
                'bank_aname' => $request->bank_aname,
                'bank_ename' => $request->bank_ename,

            ]);
            session()->flash('Add', 'تم اضافة البنك  بنجاح ');
            return redirect('/bank');
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

            'bank_aname' => 'required|max:255|unique:banks,bank_aname,'.$id,
        ],[
            'bank_aname.required' =>'يرجي ادخال اسم البنك بالغة العربية',
            'bank_aname.unique' =>'هده البنك مسجل مسبقا',
        ]);

        $banks = Bank::find($id);
        $banks->update([
            'bank_aname' => $request->bank_aname,
            'bank_ename' => $request->bank_ename,
        ]);

        session()->flash('edit','تم تعديل البنك  بنجاج');
        return redirect('/bank');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Bank::find($id)->delete();
        session()->flash('delete','تم حذف البنك بنجاح');
        return redirect('/bank');
    }
}

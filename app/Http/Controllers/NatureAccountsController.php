<?php

namespace App\Http\Controllers;

use App\Models\NatureAccounts;
use Illuminate\Http\Request;

class NatureAccountsController extends Controller
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
        $nature_accounts = NatureAccounts::all();
        return view('natureAccounts.natureAccounts', compact('nature_accounts'));
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

            'nature_type_aname' => 'required|unique:nature_accounts|max:255',
        ],[

            'nature_type_aname.required' =>'يرجي ادخال طبيعة الحساب',
            'nature_type_aname.unique' =>'طبيعة الحساب مسجل مسبقا',


        ]);

            NatureAccounts::create([
                'nature_type_aname' => $request->nature_type_aname,
                'nature_type_ename' => $request->nature_type_ename,

            ]);
            session()->flash('Add', 'تم اضافة طبيعة الحساب بنجاح ');
            return redirect('/natureAccounts');
    }

    /**
     * Display the specified resource.
     */
    public function show(NatureAccounts $natureAccounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NatureAccounts $natureAccounts)
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

            'nature_type_aname' => 'required|max:255|unique:nature_accounts,nature_type_aname,'.$id,
        ],[
            'nature_type_aname.required' =>'يرجي ادخال طبيعة الحساب بالغة العربية',
            'nature_type_aname.unique' =>'طبيعة الحساب مسجل مسبقا',
        ]);

        $Acc_Typees = NatureAccounts::find($id);
        $Acc_Typees->update([
            'acc_type_aname' => $request->acc_type_aname,
            'acc_type_ename' => $request->acc_type_ename,
        ]);

        session()->flash('edit','تم تعديل طبيعة الحساب  بنجاج');
        return redirect('/natureAccounts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        NatureAccounts::find($id)->delete();
        session()->flash('delete','تم حذف طبيعة الحساب بنجاح');
        return redirect('/natureAccounts');
    }
}

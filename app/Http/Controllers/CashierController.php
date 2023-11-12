<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use Illuminate\Http\Request;

class CashierController extends Controller
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
        $cashiers = Cashier::all();
        return view('cashier.cashier', compact('cashiers'));
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

            'cash_aname'  => 'required|unique:cashiers|max:255',
            'cash_ename'  => 'required',
        ],[

            'cash_aname.required' =>'يرجي ادخال اسم الصندوق بالعربي',
            'cash_aname.unique' =>' هدا الاسم مسجل مسبقا',
            'cash_ename' => 'يرجي ادخال اسم الصندوق بالانجليزي',


        ]);

            Cashier::create([
                'cash_aname' => $request->cash_aname,
                'cash_ename' => $request->cash_ename,

            ]);
            session()->flash('Add', 'تم اضافة الصندوق  بنجاح ');
            return redirect('/cashier');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cashier $cashier)
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

            'cash_aname' => 'required|max:255|unique:currency_typesses,currency_type_aname,'.$id,
        ],[
            'cash_aname.required' =>'يرجي ادخال الصندوق بالغة العربية',
            'cash_aname.unique' =>'هده الصندوق مسجل مسبقا',
        ]);

        $cashiers = Cashier::find($id);
        $cashiers->update([
            'cash_aname' => $request->cash_aname,
            'cash_ename' => $request->cash_ename,
        ]);

        session()->flash('edit','تم تعديل هده الصندوق  بنجاج');
        return redirect('/cashier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Cashier::find($id)->delete();
        session()->flash('delete','تم حذف الصندوق بنجاح');
        return redirect('/cashier');
    }
}

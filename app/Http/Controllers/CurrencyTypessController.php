<?php

namespace App\Http\Controllers;

use App\Models\CurrencyTypess;
use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyTypessController extends Controller
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
        $currency_typess = CurrencyTypess::all();
        $currency = Currency::all();
        return view('currency.currencyType', compact('currency','currency_typess'));
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

            'currency_type_aname'  => 'required|unique:currency_typesses|max:255',
            'currency_type_ename'  => 'required',
        ],[

            'currency_type_aname.required' =>'يرجي ادخال اسم العملة بالعربي',
            'currency_type_aname.unique' =>' هدا الاسم مسجل مسبقا',
            'currency_type_ename' => 'يرجي ادخال اسم العملة بالانجليزي',


        ]);

            CurrencyTypess::create([
                'currency_type_aname' => $request->currency_type_aname,
                'currency_type_ename' => $request->currency_type_ename,

            ]);
            session()->flash('Add', 'تم اضافة العملة  بنجاح ');
            return redirect('/currencyType');
    }

    /**
     * Display the specified resource.
     */
    public function show(CurrencyTypess $currencyTypess)
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

            'currency_type_aname' => 'required|max:255|unique:currency_typesses,currency_type_aname,'.$id,
        ],[
            'currency_type_aname.required' =>'يرجي ادخال العملة بالغة العربية',
            'currency_type_aname.unique' =>'هده العملة مسجل مسبقا',
        ]);

        $currencyType = CurrencyTypess::find($id);
        $currencyType->update([
            'currency_type_aname' => $request->currency_type_aname,
            'currency_type_ename' => $request->currency_type_ename,
        ]);

        session()->flash('edit','تم تعديل هده العملة  بنجاج');
        return redirect('/currencyType');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        CurrencyTypess::find($id)->delete();
        session()->flash('delete','تم حذف العملة  بنجاح');
        return redirect('/currencyType');
    }
}

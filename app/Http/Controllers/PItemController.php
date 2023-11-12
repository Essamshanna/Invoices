<?php

namespace App\Http\Controllers;

use App\Models\P_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;

class PItemController extends Controller
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
        $Pitem = P_item::all();
        $product = Products::all();
        return view('products.p_item', compact('Pitem','product'));
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

            'items_name' => 'required|unique:p_items|max:255',
            'product_price' => 'required',

        ],[

            'items_name.required' =>'يرجي ادخال اسم الصنف',
            'items_name.unique' =>'هده الصنف مسجل مسبقا',
            'product_price.required' =>'حقل سعر الصنف مطلوب',
        ]);

            P_item::create([
                'items_name' => $request->items_name,
                'product_id' => $request->product_id,
                'product_price' => $request->product_price,
                'description' => $request->description,
                'Created_by' => (Auth::user()->name),
            ]);
            session()->flash('Add', 'تمة عميلةالاضافة بنجاح ');
            return redirect('/item');
    }

    /**
     * Display the specified resource.
     */
    public function show(P_item $p_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(P_item $p_item)
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

            'items_name' => 'required|max:255|unique:p_items,items_name,'.$id,
            'product_price' => 'required',
        ],[
            'items_name.required' =>'يرجي ادخال اسم الصنف',
            'items_name.unique' =>'هده الصنف مسجل مسبقا',
            'product_price.required' =>'حقل سعر الصنف مطلوب',
        ]);

        $Pitem = P_item::find($id);
        $Pitem->update([
            'items_name' => $request->items_name,
            'product_id' => $request->product_id,
            'product_price' => $request->product_price,
            'description' => $request->description,
            'Created_by' => (Auth::user()->name),
        ]);

        session()->flash('edit','تمة عملية التعديل بنجاج');
        return redirect('/item');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        P_item::find($id)->delete();
        session()->flash('delete','تمة عملية الحدف بنجاح');
        return redirect('/item');
    }
}

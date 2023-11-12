<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
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
        $products = Products::all();
        return view('products.products', compact('products'));
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

            'product_name' => 'required|unique:products|max:255',
        ],[

            'product_name.required' =>'يرجي ادخال اسم المنتج',
            'product_name.unique' =>'هده المنتج مسجل مسبقا',
        ]);

            Products::create([
                'product_name' => $request->product_name,
                'description' => $request->description,
                'Created_by' => (Auth::user()->name),
            ]);
            session()->flash('Add', 'تمة عميلةالاضافة بنجاح ');
            return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $Products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $Products)
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

            'product_name' => 'required|max:255|unique:products,product_name,'.$id,
        ],[
            'product_name.required' =>'يرجي ادخال نوع المنتج',
            'product_name.unique' =>'هده المنتج مسجل مسبقا',
        ]);

        $products = Products::find($id);
        $products->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'Created_by' => (Auth::user()->name),
        ]);

        session()->flash('edit','تمة عملية التعديل بنجاج');
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Products::find($id)->delete();
        session()->flash('delete','تمة عملية الحدف بنجاح');
        return redirect('/product');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CardTypees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardTypeesController extends Controller
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
        $card_typees = CardTypees::all();
        return view('cardTypees.cardTypees', compact('card_typees'));
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

            'card_name' => 'required|unique:card_typees|max:255',
            'card_price' => 'required',
        ],[

            'card_name.required' =>'يرجي ادخال فئة الكرت',
            'card_name.unique' =>'فئة الكرت مسجل مسبقا',
            'card_price.required' =>'يرجي ادخال سعر الكرت',
        ]);

            CardTypees::create([
                'card_name' => $request->card_name,
                'card_price' => $request->card_price,
                'description' => $request->description,
                'Created_by' => (Auth::user()->name),
            ]);
            session()->flash('Add', 'تم اضافة فئة الكرت بنجاح ');
            return redirect('/cardTypees');
    }

    /**
     * Display the specified resource.
     */
    public function show(CardTypees $cardTypees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CardTypees $cardTypees)
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

            'card_name' => 'required|max:255|unique:card_typees,card_name,'.$id,
            'card_price' => 'required:card_typees,card_price,'.$id,
        ],[
            'card_name.required' =>'يرجي ادخال فئة الكرت',
            'card_name.unique' =>'فئة الكرت مسجل مسبقا',
            'card_price.required' =>'يرجي ادخال سعر الكرت',
        ]);

        $card_typees = CardTypees::find($id);
        $card_typees->update([
            'card_name' => $request->card_name,
            'card_price' => $request->card_price,
            'description' => $request->description,
            'Created_by' => (Auth::user()->name),
        ]);

        session()->flash('edit','تم تعديل فئة الكرت  بنجاج');
        return redirect('/cardTypees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        CardTypees::find($id)->delete();
        session()->flash('delete','تم حذف فئة الكرت بنجاح');
        return redirect('/cardTypees');
    }
}

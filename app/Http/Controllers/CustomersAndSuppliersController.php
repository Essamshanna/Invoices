<?php

namespace App\Http\Controllers;

use App\Models\CustomersAndSuppliers;
use Illuminate\Http\Request;

use App\Models\AddLink;
use App\Models\AddPeople;

class CustomersAndSuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     * العملاء والموردين
     */
    public function __construct()
    {
         $this->middleware('auth');
    }
    public function index()
    {
        $customersAndSuppliers = CustomersAndSuppliers::all();
        $addLink = AddLink::all();
        $addPeople = AddPeople::all();
        return view('customersAndSuppliers.customersAndSuppliers',
                compact(
                    'customersAndSuppliers',
                    'addLink',
                    'addPeople'

                ));
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

            'C_Name'  => 'required|unique:customers_and_suppliers|max:255',
        ],[

            'C_Name.required' =>'يرجي ادخال الاسم ',
            'C_Name.unique' =>' هدا الاسم مسجل مسبقا',
        ]);

            CustomersAndSuppliers::create([
                'C_Name'                 => $request->C_Name,
                'people_id'              => $request->people_id,
                'email'                  => $request->email,
                'links_id'               => $request->links_id,
                'country'                => $request->country,
                'city'                   => $request->city,
                'address'                => $request->address,
                'phone'                  => $request->phone,
                'Tax_Nu'                 => $request->Tax_Nu,

            ]);
            session()->flash('Add', 'تم عملية الاضافة بنجاح ');
            return redirect('/customersAndSuppliers');
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

            'C_Name' => 'required|max:255|unique:customers_and_suppliers,C_Name,'.$id,
        ],[
            'C_Name.required' =>'يرجي ادخال الاسم ',
            'C_Name.unique' =>'هده الصلة مسجل مسبقا',
        ]);

        $customersAndSuppliers = CustomersAndSuppliers::find($id);
        $customersAndSuppliers->update([
            'C_Name'                 => $request->C_Name,
            'people_id'              => $request->people_id,
            'email'                  => $request->email,
            'links_id'               => $request->links_id,
            'country'                => $request->country,
            'city'                   => $request->city,
            'address'                => $request->address,
            'phone'                  => $request->phone,
            'Tax_Nu'                 => $request->Tax_Nu,
        ]);

        session()->flash('edit','لقد تمة عملية التعديل  بنجاج');
        return redirect('/customersAndSuppliers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        CustomersAndSuppliers::find($id)->delete();
        session()->flash('delete','تم عملية الحذف بنجاح');
        return redirect('/customersAndSuppliers');
    }
}

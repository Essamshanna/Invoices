<?php

namespace App\Http\Controllers;

use App\Models\CompanyBranches;
use Illuminate\Http\Request;

class CompanyBranchesController extends Controller
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
        $companyBranches = CompanyBranches::all();
        return view('companyBranches.companyBranches', compact('companyBranches'));
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

            'branch_aname'  => 'required|unique:company_branches|max:255',
            'branch_ename'  => 'required',
            'address'       => 'required',
            'phone_1'       =>'required',
            'email'         => 'required',
        ],[

            'branch_aname.required' =>'يرجي ادخال اسم الفرع بالعربي',
            'branch_aname.unique' =>' هدا الاسم مسجل مسبقا',
            'branch_ename' => 'يرجي ادخال اسم الفرع بالانجليزي',
            'address' => 'يرجي ادخال عنوان الشركة',
            'phone_1' => 'يرجي ادخال رقم الهاتف',
            'email' => 'يرجي ادخال الايميل',


        ]);

            CompanyBranches::create([
                'branch_aname' => $request->branch_aname,
                'branch_ename' => $request->branch_ename,
                'address'      => $request->address,
                'phone_1'      => $request->phone_1,
                'phone_2'      => $request->phone_2,
                'phone_3'      => $request->phone_3,
                'email'        => $request->email,

            ]);
            session()->flash('Add', 'تم اضافة فرع الشركة  بنجاح ');
            return redirect('/companyBranches');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyBranches $companyBranches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyBranches $companyBranches)
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

            'branch_aname' => 'required|max:255|unique:company_branches,branch_aname,'.$id,
        ],[
            'branch_aname.required' =>'يرجي ادخال اسم الفرع بالغة العربية',
            'branch_aname.unique' =>'هده الفرع مسجل مسبقا',
        ]);

        $companyBranches = CompanyBranches::find($id);
        $companyBranches->update([
            'branch_aname' => $request->branch_aname,
            'branch_ename' => $request->branch_ename,
            'address'      => $request->address,
            'phone_1'      => $request->phone_1,
            'phone_2'      => $request->phone_2,
            'phone_3'      => $request->phone_3,
            'email'        => $request->email,
        ]);

        session()->flash('edit','تم تعديل البنك  بنجاج');
        return redirect('/companyBranches');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        CompanyBranches::find($id)->delete();
        session()->flash('delete','تم حذف البنك بنجاح');
        return redirect('/companyBranches');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AccReports;
use Illuminate\Http\Request;

class AccReportsController extends Controller
{
    /**
     * Display a listing of
     * the resource.
     */
    public function __construct()
    {
         $this->middleware('auth');

    }
    public function index()
    {
        $acc_reports = AccReports::all();
        return view('reports.reports', compact('acc_reports'));
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

            'acc_rep_aname' => 'required|unique:acc_reports|max:255',
        ],[

            'acc_rep_aname.required' =>'يرجي ادخال تاثير التقارير',
            'acc_rep_aname.unique' =>' هدا التاثير في التقرير مسجل مسبقا',


        ]);

            AccReports::create([
                'acc_rep_aname' => $request->acc_rep_aname,
                'acc_rep_ename' => $request->acc_rep_ename,

            ]);
            session()->flash('Add', 'تم اضافة تاثير التقارير بنجاح ');
            return redirect('/reports');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccReports $accReports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccReports $accReports)
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

            'acc_rep_aname' => 'required|max:255|unique:acc_reports,acc_rep_aname,'.$id,
        ],[
            'acc_rep_aname.required' =>'يرجي ادخال تاثير التقارير بالغة العربية',
            'acc_rep_aname.unique' =>' تاثير التقارير مسجل مسبقا',
        ]);

        $acc_reports = AccReports::find($id);
        $acc_reports->update([
            'acc_rep_aname' => $request->acc_rep_aname,
            'acc_rep_ename' => $request->acc_rep_ename,
        ]);

        session()->flash('edit','تم تعديل تاثير التقارير  بنجاج');
        return redirect('/reports');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        AccReports::find($id)->delete();
        session()->flash('delete','تم حذف تاثير التقارير  بنجاح');
        return redirect('/reports');
    }
}

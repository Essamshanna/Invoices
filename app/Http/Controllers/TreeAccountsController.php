<?php

namespace App\Http\Controllers;

use App\Models\TreeAccounts;
use Illuminate\Http\Request;

use App\Models\AccReports;
use App\Models\AccTypees;
use App\Models\NatureAccounts;

class TreeAccountsController extends Controller
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
        $treeAccounts = TreeAccounts::all();
        $acc_report = AccReports::all();
        $acc_typee = AccTypees::all();
        $nnatureAccount = NatureAccounts::all();
        return view('treeAccounts.treeAccounts',
            compact('treeAccounts',
                'acc_report',
                'acc_typee',
                'nnatureAccount'
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
        // return $request;

        $validatedData = $request->validate([

            'acc_id' => 'required|unique:tree_accounts|max:255',
            'acc_parent_no' => 'required',
            'acc_aname'=> 'required',
            'acc_ename'=> 'required',
            'acc_type_id'=> 'required',
            'acc_report_id'=> 'required',
            'acc_level'=> 'required',
            'acc_debit'=> 'required',
            'acc_nature_id'=> 'required',
            'acc_credit'=> 'required',
            'acc_balance'=> 'required',
        ],[
            'acc_id.required' =>'يرجي ادخال رقم الحساب',
            'acc_id.unique' =>'رقم الحساب مسجل مسبقا',

            'acc_parent_no' => 'يرجي ادخال رقم حساب الاب',
            'acc_aname'=> ' يرجي ادخال اسم الحساب العربية',
            'acc_ename'=> 'يرجي ادخال اسم الحساب بالانجليزي',
            'acc_type_id'=> 'يرجي ادخال نوع الحساب',
            'acc_report_id'=> 'يرجي ادخال تاثير الحساب',
            'acc_level'=> 'يرجي ادخال مستواء الحساب',
            'acc_debit'=> 'يرجي ادخال حقل الدئن',
            'acc_nature_id'=> 'يرجي ادخال حقل طبيعة الحساب',
            'acc_credit'=> 'يرجي ادخال حقل المدين',
            'acc_balance'=> 'يرجي ادخال حقل الرصيد',
        ]);

            TreeAccounts::create([
                'acc_id'        => $request->acc_id,
                'acc_parent_no' => $request->acc_parent_no,
                'acc_aname'     => $request->acc_aname,
                'acc_ename'     => $request->acc_ename,
                'acc_type_id'   => $request->acc_type_id,
                'acc_report_id' => $request->acc_report_id,
                'acc_level'     => $request->acc_level,
                'acc_debit'     => $request->acc_debit,
                'acc_nature_id' => $request->acc_nature_id,
                'acc_credit'    => $request->acc_credit,
                'acc_balance'   => $request->acc_balance,


            ]);
            session()->flash('Add', 'تم اضافة الحساب بنجاح ');
            return redirect('/treeAccounts');
    }

    /**
     * Display the specified resource.
     */
    public function show(TreeAccounts $treeAccounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TreeAccounts $treeAccounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $acc_type_id = AccTypees::where('acc_type_aname', $request->acc_type_aname)->first()->id;
        // $acc_report_id = AccReports::where('acc_rep_aname', $request->acc_rep_aname)->first()->id;
        // $acc_nature_id = NatureAccounts::where('nature_type_aname', $request->nature_type_aname)->first()->id;


        $id = $request->id;

        // $this->validate($request, [
        //     'acc_id'     => 'required|unique:tree_accounts,acc_id'.$id,
        //     'acc_aname'        => 'required',
        //     'acc_parent_no' => 'required',
        //     'acc_ename'     => 'required',
        //     'acc_type_id'   => 'required',
        //     'acc_report_id' => 'required',
        //     'acc_level'     => 'required',
        //     'acc_debit'     => 'required',
        //     'acc_nature_id' => 'required',
        //     'acc_credit'    => 'required',
        //     'acc_balance'   => 'required',
        // ],[

        //     'acc_id.required' =>'يرجي ادخال رقم الحساب',
        //     'acc_id.unique'   =>'رقم الحساب مسجل مسبقا',

        //     'acc_parent_no'   => 'يرجي ادخال رقم حساب الاب',
        //     'acc_aname'          => ' يرجي ادخال اسم الحساب بالعربي ',
        //     'acc_ename'       => 'يرجي ادخال اسم الحساب بالانجليزي',
        //     'acc_type_id'     => 'يرجي ادخال نوع الحساب',
        //     'acc_report_id'   => 'يرجي ادخال تاثير الحساب',
        //     'acc_level'       => 'يرجي ادخال مستواء الحساب',
        //     'acc_debit'       => 'يرجي ادخال حقل الدئن',
        //     'acc_nature_id'   => 'يرجي ادخال حقل طبيعة الحساب',
        //     'acc_credit'      => 'يرجي ادخال حقل المدين',
        //     'acc_balance'     => 'يرجي ادخال حقل الرصيد',
        // ]);

        $treeAccounts = TreeAccounts::find($id);
        $treeAccounts->update([
            'acc_id'        => $request->acc_id,
            'acc_parent_no' => $request->acc_parent_no,
            'acc_aname'     => $request->acc_aname,
            'acc_ename'     => $request->acc_ename,
            'acc_type_id'   => $request->acc_type_id,
            'acc_report_id' => $request->acc_report_id,
            'acc_level'     => $request->acc_level,
            'acc_debit'     => $request->acc_debit,
            'acc_nature_id' => $request->acc_nature_id,
            'acc_credit'    => $request->acc_credit,
            'acc_balance'   => $request->acc_balance,
        ]);

        session()->flash('edit','تم تعديل الحساب بنجاج');
        return redirect('/treeAccounts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        TreeAccounts::find($id)->delete();
        session()->flash('delete','تم حذف الحساب بنجاح');
        return redirect('/treeAccounts');
    }
}

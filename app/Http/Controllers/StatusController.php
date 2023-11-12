<?php

namespace App\Http\Controllers;

use App\Models\Statuses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StatusController extends Controller
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
        $statuses = Statuses::all();
        return view('statuses.statuses', compact('statuses'));
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

            'status_name' => 'required|unique:Statuses|max:255',
        ],[

            'status_name.required' =>'يرجي ادخال اسم الحالة',
            'status_name.unique' =>'اسم الحالة مسجل مسبقا',


        ]);

            Statuses::create([
                'status_name' => $request->status_name,
                'description' => $request->description,
                'Created_by' => (Auth::user()->name),

            ]);
            session()->flash('Add', 'تم اضافة الحالة بنجاح ');
            return redirect('/statuses');

    }

    /**
     * Display the specified resource.
     */
    public function show(status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(status $status)
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

            'status_name' => 'required|max:255|unique:statuses,status_name,'.$id,
            'description' => 'required',
        ],[

            'status_name.required' =>'يرجي ادخال اسم الحالة',
            'status_name.unique' =>'اسم الحالة مسجل مسبقا',
            'description.required' =>'يرجي ادخال الوصف',

        ]);

        $statuses = Statuses::find($id);
        $statuses->update([
            'status_name' => $request->status_name,
            'description' => $request->description,
        ]);

        session()->flash('edit','تم تعديل الحالة بنجاج');
        return redirect('/statuses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Statuses::find($id)->delete();
        session()->flash('delete','تم حذف الحالة بنجاح');
        return redirect('/statuses');
    }
}

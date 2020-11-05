<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;
use DB;
use DataTables;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth', 'checkRole:admin');
    // }
    
    public function index()
    {
        $grade = Grade::all();

        // if ($request->ajax()) {
        //     return datatables()->of($data_grade)
        //     ->addIndexColumn()
        //     ->make(true);
        // }

        return view('grade.index', compact('grade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        // karyawan()->grade()->create($request->all());
        Grade::create($request->all());
        return redirect('/grade')->with('status', 'Grade Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('grade.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        Grade::where('id', $grade->id)->update([
            'grade' => $request->grade,
            'gaji' => $request->gaji
        ]);
        return redirect('/grade')->with('status', 'Grade Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grade::destroy($grade->id);
        return redirect('/grade')->with('error', 'Grade Dihapus');
    }
}

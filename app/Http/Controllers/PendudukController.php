<?php

namespace App\Http\Controllers;


use App\Penduduk;
use Illuminate\Http\Request;

use Session;

use App\Imports\PendudukImport;
use App\Exports\PendudukExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use DataTables;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth', 'checkRole:admin,karyawan');
    // }

    public function index(Request $request)
    {
        $data_penduduk = Penduduk::all();
        //dd($data_penduduk);
        // if ($request->ajax()) {
        //     return datatables()->of($data_penduduk)
        //     ->addIndexColumn()
        //     ->make(true);
        // }
        return view('penduduk.index', ['data_penduduk' => $data_penduduk]);
        // $penduduk = Penduduk::when($request->keyword, function ($query) use ($request) {
        //     $query->where('kelurahan', 'like', "%{$request->keyword}%"); })->latest()->paginate(10);
        // // $penduduk = Penduduk::all();
        // return view('penduduk.index', ['penduduk' => $penduduk]);
        //dump($penduduk);
    }

    public function export_excel()
	{
		return Excel::download(new PendudukExport, 'penduduk.xlsx');
    }
    
    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_p di dalam folder public
		$file->move('file_penduduk',$nama_file);
 
		// import data
        //Excel::import(new PendudukImport, public_path('/file_penduduk/'.$nama_file));
        $penduduk = Excel::toCollection(new PendudukImport(), public_path('/file_penduduk/'.$nama_file));
        //dd($penduduk);
        foreach ($penduduk[0] as $data) {
            Penduduk::where('id', $data[0])->update([
                'provinsi'          => $data[1],
                'kabupaten'         => $data[2],
                'kecamatan'         => $data[3],
                'status'            => $data[4],
                'kode_pum'          => $data[5],
                'kelurahan'         => $data[6],
                'tanggal'           => $data[7],
                'tanggal_str'       => $data[8],
                'laki_laki'         => $data[9],
                'perempuan'         => $data[10],
                'jumlah_penduduk'   => $data[11],
                'jumlah_kk'         => $data[12],
                'kepadatan'         => $data[13],
            ]);
        }
 
		// notifikasi dengan session
		Session::flash('sukses','Data Penduduk Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/penduduk');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

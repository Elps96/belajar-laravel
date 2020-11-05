<?php


namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Grade;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;
use DataTables;
//use Yajra\Datatables\Facades\Datatables;

class KaryawanController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth', 'checkRole:admin');
    // }

    public function index(Request $request)
    {
        $grade = Grade::all();

        $data_karyawan = DB::table('karyawan')
        ->join('grade', 'karyawan.grade_id', '=', 'grade.id')
        ->select('karyawan.*','grade.grade', 'grade.gaji')
        // ->latest();
        // ->first();
        ->orderBy('created_at', 'desc')
        ->get();
        if ($request->ajax()) {
            return datatables()->of($data_karyawan)
            ->addColumn('action', function($data){
                $button = '<button type="button" name="detail" data-id="'.$data->id.'" class="detail btn btn-info btn-sm detail-post"><i class="far fa-trash-alt"></i> Detail</button>';
                $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                // $button .= '&nbsp;&nbsp;&nbsp';
                $button .= '<button type="button" name="delete" data-id="'.$data->id.'" class="delete btn btn-danger btn-sm delete-post"><i class="far fa-trash-alt"></i> Delete</button>';   
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
            
        }
        return view('karyawan.index', compact('grade'));
        // if ($request->has('keyword')) {
        //     $data_karyawan = Karyawan::where('name', 'LIKE', '%' .$request->keyword. '%' )->get();
        // }else{
        //     $data_karyawan = Karyawan::all();
        // }
        // $data_karyawan = DB::table('karyawan')
        // ->join('grade', 'karyawan.grade_id', '=', 'grade.id')
        // ->select('karyawan.*','grade.grade', 'grade.gaji')
        // ->get();
        // $karyawan = DB::table('karyawans')->get();
        // $karyawan = \App\Karyawan::all();

        // $karyawan1 = Karyawan::when($request->keyword, function ($query) use ($request) {
        //     $query->where('name', 'like', "%{$request->keyword}%"); })->latest()->paginate(10);
        //dump($data_karyawan);
        //return view('karyawan.index',['data_karyawan' => $data_karyawan]);
        // return view('karyawan.index', compact('karyawan'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $grade = DB::table('grade')->get();
        $grade = Grade::all();
        //dd($grade);
        return view('karyawan.create', ['grade' => $grade]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $user = new \App\User;
        // $user->role = 'karyawan';
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->email = $request->email;
        // $user->password = Hash::make($request['password']);
        // $user->save();
        
        $id = $request->id;

        $request->request->add(['user_id' => 20]);

        $data = request()->validate([
            'name' => 'required',
            'user_id' => 'required',
            'grade_id' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_masuk' => 'required',
            'password' => 'required',

        ]);

        // if ($files = $request->file('image'))
        // {
        //     $fileName =  "image-".time().'.'.$request->image->getClientOriginalExtension();
        //     $request->image->storeAs('image', $fileName);
            
        //     $image = new Image;
        //     $image->image = $fileName;
        //     $image->save();
        //     // request('image');
        //     // $imagePath = request('image')->store('karyawan', 'public');

        //     // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
        //     // $image->save();
        //     //$imageArray = ['image'=> $imagePath];
        // }
        
        //dd($data,$imageArray);
        // $post= Karyawan::updateOrCreate(['id'=> $id],
        //     array_merge(
        //         $data,
        //         ['image'=> $imagePath]
        // ));
        $post= Karyawan::updateOrCreate(['id'=> $id], $data);

        return response()->json($post);


        // $user = new \App\User;
        // $user->role = 'karyawan';
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->email = $request->email;
        // $user->password = Hash::make($request['password']);
        // $user->save();


        // $request->request->add(['user_id' => $user->id]);

        // $data = request()->validate([
        //     'name' => 'required',
        //     'user_id' => 'required',
        //     'grade_id' => 'required',
        //     'email' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'tanggal_masuk' => 'required',
        //     'password' => 'required',
        //     'image' => ['required', 'image']
        // ]);

        // if (request('image'))
        // {
        //     request('image');
        //     $imagePath = request('image')->store('karyawan', 'public');

        //     $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
        //     $image->save();
        //     // $imageArray = ['image'=> $imagePath];
        // }
        
        // Karyawan::create(array_merge(
        //     $data,
        //     ['image' => $imagePath]
        // ));

        //return redirect('/karyawan')->with('status', 'karyawan ditambah');

        // Karyawan::create($data);


        
        // if (request('image'))
        // {
        //     $imagePath = request('image')->store('profile', 'public');

        //     $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
        //     $image->save();
        // }

        // dd(array_merge(
        //     $data,
        //     ['image' => $imagePath]
        // ));

        // dd($data);
        
        // auth()->user()->profile->update($data);
        // auth()->user()->profile->update(array_merge(
        //     $data,
        //     ['image'=> $imagePath]
        // ));

        // $karyawan = new Karyawan;
        // $karyawan->nama = $request->nama;
        // $karyawan->grade_id = $grade->id;
        // $karyawan->jenis_kelamin = $request->jenis_kelamin;
        // $karyawan->tanggal_lahir = $request->tanggal_lahir;
        // $karyawan->tanggal_masuk = $request->tanggal_masuk;


        // garde()->karyawan->update($karyawan);
        // $validatedData = $request->validate([
        //     'nama' => ['required', 'string', 'max:255'],
        //     'grade_id' => 'required,'
        //     'jenis_kelamin' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'tanggal_masuk' => 'required',
        // ]);



        //Karyawan::create($request->all());
        // $karyawan = $this->karyawan->create([
        //     'name' => $request->nama,
        //     'grade_id' => $request->grade,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'tanggal_masuk' => $request->tanggal_masuk
        // ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(Karyawan $karyawan, Grade $grade)
    // {
    //     $where = array('id' => $id);
    //     $post  = Karyawan::where($where)->first();
     
    //     return response()->json($post);
    //     // $grade = Grade::all();
    //     // return view('karyawan.edit', compact('karyawan', 'grade'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Karyawan $karyawan)
    // {
    //     // return $request;
    //     $validatedData = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'grade_id'  => 'required',
    //         'email'  => 'required',
    //         'jenis_kelamin' => 'required',
    //         'tanggal_lahir' => 'required',
    //         'tanggal_masuk' => 'required',
    //         'password'  => 'required'
            
    //     ]);
        
    //     Karyawan::where('id', $karyawan->id)
    //     ->update([
    //         'name' => $request->name,
    //         'grade_id'      => $request->grade_id,
    //         'email'      => $request->email,
    //         'jenis_kelamin' => $request->jenis_kelamin,
    //         'tanggal_lahir' => $request->tanggal_lahir,
    //         'tanggal_masuk' => $request->tanggal_masuk,
    //         'password'      => $request->password,
            
    //     ]);
    //     return redirect('/karyawan')->with('status', 'Karyawan Diupdate');
    // }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Karyawan::where($where)->first();
     
        return response()->json($post);
    }


    public function destroy($id)
    {
        $post = Karyawan::where('id',$id)->delete();
     
        return response()->json($post);

        // Karyawan::destroy($karyawan->id);
        // return redirect('/karyawan')->with('error', 'Karyawan Dihapus');
    }

    public function getdatakaryawan()
    {
        $karyawan = DB::table('karyawan')
        ->join('grade', 'karyawan.grade_id', '=', 'grade.id')
        ->select('karyawan.*','grade.grade', 'grade.gaji')
        ->get();
        //dd($karyawan);

        return DataTables::of($karyawan)-toJson();

        //$karyawan = Karyawan::select('karyawan.*');
        //$grade = Grade::select('grade.*');

        // return DataTables::of($karyawan)
        // ->addColumn('action', function($data){
        //     $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
        //     $button .= '&nbsp;&nbsp;';
        //     $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
        //     return $button;
        // })
        // ->rawColumns(['action'])

        
        // ->toJson();
    }
}

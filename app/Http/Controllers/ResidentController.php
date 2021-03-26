<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Http\Requests\ResidentRequest;
use Illuminate\Http\UploadedFile;
class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residents = Resident::paginate(5);
        return view('backend.resident.index', ['residents' => $residents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd($resident);
        return view('backend.resident.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'foto_file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required',
            'alamat' => 'required',
            'DOB' => 'required',
            'pekerjaan' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'status' => 'required',
		]);
        
        if ($request->file('foto_file')) {
            $file = $request->file('foto_file');
            $tujuan_upload = 'foto/';
            $nama_file = time()."_".$file->getClientOriginalName();
            $foto_path = 'public/'.$tujuan_upload.$nama_file;
            $file->move($tujuan_upload,$nama_file);
            $request->request->add(['foto' => $foto_path]); 
        }
        
        $nik = rand(1,999999999999999);
        $request->request->add(['nik' => $nik]); 
        $data = $request->except(['_token']);
        if (!isset($data['id'])) {
            // dd('masuk 1');
            Resident::create($data);
        }else{
            // dd('masuk 2');
            Resident::where('id', $data['id'])->update($data);
        }
        // die;
        Resident::updateOrCreate($data);
        
        return redirect('residents')->with('status', 'Data Tersimpan!');;
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
        $resident = Resident::findOrFail($id);
        return view('backend.resident.edit',['resident' => $resident]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Resident::find($id);
        $user->delete();

        return redirect('/residents')->with('status', 'Data has been deleted');
    }
}

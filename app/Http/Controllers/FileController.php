<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Files = File::all();
        return view('links',compact('Files'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sfiles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'File' => 'required|file|max:500'

         ]);



        if($request->hasFile('File')){

        $file=$request->file('File');

        if($file->isValid()){

        $data['file']=$file->store('files',['disk'=>'local']);

        $data['code']=Str::random(6);

        $filedb=File::create($data);

         return redirect()->route('bitfiles.create')->with(['success'=>'the file has been uploaded','link'=>'http://localhost:8000/bitfiles/'.$data['code'],'code'=>$data['code']]);
        }
        else{
            throw ValidationException::withMessages([

                'File'=>'file corrupted'
            ]);
        }

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //$file=File::wherecode($files)->firstOrFail();


        // return Storage::download(public_path().'/storage/files/jj13S51vlXJzvo7GF6t0A2n2ec7qjiRVFN1LrI0W.jpg',uniqid());

        return Response::download(storage_path('app').'/'.$file->file,uniqid());

        // return Response::download('http://localhost:8000/storage/files/jj13S51vlXJzvo7GF6t0A2n2ec7qjiRVFN1LrI0W.jpg',uniqid());


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {

        return Response::file(storage_path('app').'/'.$file->file);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

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

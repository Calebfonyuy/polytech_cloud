<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Validator;
use App\Models\Departement;
use App\Models\Matiere;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('depart.departs')->withDepartements(Departement::all());
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
        $validation = Validator::make($request->all(),[
            'nom' => 'required',
            'description' => 'required'
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }

        $fileName = null;
        if ($request->photo!= null) {
            $file = $request->file('photo');
            $fileName = $request->photo->getClientOriginalName();
            $file->move(public_path('../../public_html/images'), $fileName);
        }

        Departement::create([
            'nom' => $validation->attributes()['nom'],
            'description' => $validation->attributes()['description'],
            'photo' => $fileName
        ]);

        return redirect()->route('departement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dept = Departement::find($id);
        $class = Classe::where('departement',$id)->get();
        $mats = Matiere::where('departement',$id)->get();
        return view('dashboard.admin.departement')->withDepartement($dept)
                                        ->withClasses($class)
                                        ->withMatieres($mats);
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

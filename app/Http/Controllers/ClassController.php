<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Classe;
use App\Models\Departement;
use App\Models\Matiere;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('class.classes')->withClasses(Classe::all())->withDepartements(Departement::all());
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
            'dept' => 'required',
            'description' => 'required'
        ]);

        if ($validation->fails()) {
            dd($validation->errors());
            return redirect()->back()->withErrors($validation);
        }

        $filename = null;
        if ($request->photo!=null) {
            $file = $request->file('photo');
            $filename = $request->photo->getClientOriginalName();
             $file->move(public_path('../../public_html/images'), $fileName);
        }

        Classe::create([
            'nom' => $validation->attributes()['nom'],
            'departement' => $validation->attributes()['dept'],
            'description' => $validation->attributes()['description'],
            'photo' => $filename
        ]);

        return redirect()->route('class.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Classe::find($id);
        $depart = Departement::find($class->departement);
        $mats = Matiere::where('classe',$id)->get();
        return view('matiere.matieres')->withClass($class)
                            ->withMatieres($mats)
                            ->withDepartement($depart);
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

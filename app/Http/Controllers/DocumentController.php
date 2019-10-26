<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Document;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Document::all();
        $user = User::where('admin',1)->get();
        $mats = Matiere::all();
        $depts = Departement::all();

        $class_map = Classe::all();
        
        return view('dashboard.admin.documents')
                ->withDocuments($docs)
                ->withUsers($user)
                ->withMatieres($mats)
                ->withDepartements($depts)
                ->withClasses($class_map);
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
            'dept' => 'required',
            'class' => 'required',
            'mat' => 'required',
            'nom' => 'required',
            'annee' => 'required',
            'type' => 'required',
            'lien' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }

        Document::create([
            'user' => Auth::user()->id,
            'nom' => $validation->attributes()['nom'],
            'matiere' => $validation->attributes()['mat'],
            'annee' => $validation->attributes()['annee'],
            'type' => $validation->attributes()['type'],
            'lien' => $validation->attributes()['lien']
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mats = Matiere::where('classe',$id)->get();
        return json_encode($mats);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->back();
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
        $doc = Document::find($id);
        $doc->status = 1;
        $doc->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = Document::find($id);
        $doc->status = 0;
        $doc->save();
        return redirect()->back();
    }
}

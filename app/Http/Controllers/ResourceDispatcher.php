<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Departement;
use App\Models\Document;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResourceDispatcher extends Controller
{
    public function showDepartements()
    {
        $depts = Departement::all();
        foreach ($depts as $dept ) {
            $dept->classes = DB::select('select count(*) as total from classes where departement = ?', [$dept->id])[0]->total;
            $dept->matieres = DB::select('select count(*) as total from matieres where departement = ?', [$dept->id])[0]->total;
            $dept->docs = DB::select('select count(*) as total from documents where id in '.
                                '(select id from matieres where departement = ?)', [$dept->id])[0]->total;
        }
        return view('resources.departements')->withDepartements($depts);
    }

    public function showClasses(int $dept)
    {
        $departt = Departement::find($dept);
        $class = Classe::where('departement',$dept)->get();
        foreach ($class as $item ) {
            $item->matieres = DB::select('select count(*) as total from matieres where classe = ?', [$item->id])[0]->total;
            $item->docs = DB::select('select count(*) as total from documents where id in ' .
                '(select id from matieres where classe = ?)', [$item->id])[0]->total;
        }
        return view('resources.dept_classes')->withDepartement($departt)
                                            ->withClasses($class);
    }

    public function showMatieres(int $dept, int $clas)
    {
        $dept = Departement::find($dept);
        $clas = Classe::find($clas);
        $mats = Matiere::where('classe',$clas->id)->get();
        foreach ($mats as $mat ) {
            $mat->docs = DB::select('select count(*) as total from documents where matiere = ?', [$mat->id])[0]->total;
            $mat->years = DB::select('select distinct annee from documents where matiere = ?',[$mat->id]);
        }

        return view('resources.matieres')->withClass($clas)
                                        ->withDepartement($dept)
                                        ->withMatieres($mats);
    }

    public function showDocuments(int $dept, int $class, int $mat,string $year)
    {
        $dept = Departement::find($dept);
        $class = Classe::find($class);
        $mat = Matiere::find($mat);
        $epreuves = Document::where('matiere',$mat->id)->where('annee',$year)->where('type',0)->get();
        $cors = Document::where('matiere', $mat->id)->where('annee', $year)->where('type', 1)->get();

        return view('resources.documents')->withDepartement($dept)
                                        ->withClasse($class)
                                        ->withMatiere($mat)
                                        ->withEpreuves($epreuves)
                                        ->withCorrections($cors)
                                        ->withAnnee($year);
    }
}

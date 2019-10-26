<?php

namespace App\Http\Controllers;

use App\Views\DeptStat;
use App\Views\ClassStat;
use App\Views\MatStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsDispatcher extends Controller
{
    public function adminStats(){
        $users = array();
        $users['admins'] = DB::select('select count(*) as total from users where admin=1')[0]->total;
        $users['others'] = DB::select('select count(*) as total from users where admin=0')[0]->total;
        $users['inactive'] = DB::select('select count(*) as total from users where disable=1 and users.delete=0')[0]->total;
        $users['deleted'] = DB::select('select count(*) as total from users where users.delete=1')[0]->total;

        $depts = DeptStat::all();
        $class = ClassStat::all();
        $mats = MatStat::all();

        return view('dashboard.admin.home')->withUsers($users)
                                                ->withDepartements($depts)
                                                ->withClasses($class)
                                                ->withMatieres($mats);
    }

    public function showGeneralStats(){
        $depts = DeptStat::all();
        $class = ClassStat::all();
        $mats = MatStat::all();

        return view('resources.statistic')->withDepartements($depts)
                                        ->withClasses($class)
                                        ->withMatieres($mats);
    }
}
